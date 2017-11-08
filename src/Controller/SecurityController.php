<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 08/11/17
 * Time: 10:58
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    public function login(Request $request, AuthenticationUtils $authutils){
        $error = $authutils->getLastAuthenticationError();
        $lastUsername = $authutils->getLastUsername();

        return $this->render('login.html.twig', array('last_username' => $lastUsername, 'error' => $error));
    }
}