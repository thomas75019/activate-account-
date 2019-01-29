<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation;

class AppController extends AbstractController
{
    /**
     * @Route("/suscribe", name="suscribe")
     */
    public function suscribe()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/activate/{user_id}", name="activate"
     */
    public function activate()
    {
        
    }
}
