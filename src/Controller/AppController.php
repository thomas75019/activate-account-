<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\HttpFoundation\Response;

class AppController extends AbstractController
{
    /**
     * @Route("/suscribe", name="suscribe")
     */
    public function suscribe()
    {
        return new Response('Suscribe page');
    }

    /**
     * @Route("/activate/{user_id}", name="activate")
     */
    public function activate($user_id)
    {
        return new Response('Activation page '.$user_id );
    }
}
