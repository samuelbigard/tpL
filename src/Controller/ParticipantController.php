<?php
namespace App\Controller;


use App\Entity\Participant;
use App\Form\ParticipantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/participant")
 */
class ParticipantController extends Controller
{
    /**
     * @Route("/index", name="index")
     */
    public function index(EntityManagerInterface $manager)
    {
        $participants = $manager->getRepository(Participant::class)->findEnabled();

        return $this->render("Participant/index.html.twig", array("participants"=>$participants));
    }

    /**
     * @Route("/new_participant", name="newParticipant")
     */
    public function newParticipant(Request $request)
    {
        $participant = new Participant();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ParticipantType::class, $participant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($participant);
            $em->flush();
            return $this->redirectToRoute("index");
        }
        return $this->render('Participant/new.html.twig', array('form' => $form->createView()));
    }
}