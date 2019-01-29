<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Hidehalo\Nanoid\Client;

class AppController extends AbstractController
{
    /**
     * @Route("/suscribe", name="suscribe")
     */
    public function suscribe(Request $request)
    {
        $user = new User();
        $user->setIsActivated(false);


        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $client = new Client();
            $user->setUserId($client->generateId($size = 21));

            dump($user);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('activate', array(
                'user_id' => $user->getUserId(),
                'user' => $user,
            ));
        }

        return $this->render('base.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/activate/{user_id}", name="activate")
     */
    public function activate($user_id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(User::class);

        $user = $repository->findOneBy(array( 'user_id' => $user_id));

        return $this->render('activate.html.twig', array(
            'user' => $user,
        ));
    }
}
