<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(){
        $repo = $this->getDoctrine()->getManager()->getRepository(Participant::class);
        $participants = $repo->findAll();

        return $this->render("index.html.twig", array("participants"=>$participants));
    }

    /**
     * @Route("/new", name="new_participant")
     */
    public function newParticipant(Request $request){
        $participant = new Participant();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ParticipantType::class, $participant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($participant);
            $em->flush();
            return $this->redirectToRoute("homepage");
        }

        return $this->render("Participant/new.html.twig", array("form"=>$form->createView()));
    }

}