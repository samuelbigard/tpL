<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Entity\UserCard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route(path="/user")
 */
class UserController extends Controller
{
    /**
     * @Route(
     *     path="/",
     *     name="app_user_index"
     * )
     */
    public function indexAction(AuthorizationCheckerInterface $authorizationChecker)
    {
        if($authorizationChecker->isGranted('ROLE_ADMIN')){

            $userCards = $this->getDoctrine()->getManager()->getRepository(UserCard::class)->findAll();

        }else{
            $userCards = $this->getDoctrine()->getManager()->getRepository(UserCard::class)->findBy(["user" => $this->getUser()]);
        }

        return $this->render('User/index.html.twig', ["userCards" => $userCards]);
    }

    /**
     * @Route(
     *     path="/new",
     *     name="app_user_new"
     * )
     */
    public function newAction(Request $request, UserPasswordEncoderInterface $encoder){
        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['validation_groups' => ["new", "Default"]]);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($encoder->encodePassword($user,$user->getPassword()));
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("app_user_index");
        }

        return $this->render("User/new.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route(
     *     path="/edit/{id}",
     *     name="app_user_edit"
     * )
     */
    public function editAction(Request $request, User $user, UserPasswordEncoderInterface $encoder){
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(UserType::class, $user, ['validation_groups' => ["edit", "Default"]]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($encoder->encodePassword($user,$user->getPassword()));
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("app_user_index");
        }

        return $this->render("User/new.html.twig", ["form" => $form->createView()]);
    }
}
