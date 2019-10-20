<?php

namespace App\Controller;

use App\Entity\Produtor;
use App\Form\ProdutorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProdutorController extends AbstractController
{
    /**
     * @Route("/produtor/new", name="produtor_new")
     */
    public function new()
    {
        return $this->render('produtor/index.html.twig', [
            'controller_name' => 'ProdutorController',
        ]);
    }

    /**
     * @Route("/produtor/save/{id}", name="produtor_save")
     * @param Produtor $produtor
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function save(Produtor $produtor, Request $request)
    {
        $form = $this->createForm(ProdutorType::class, $produtor);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getRepository(Produtor::class)->save($produtor);
            return $this->redirectToRoute('index');
        }
        return $this->render('produtor/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
