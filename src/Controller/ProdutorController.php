<?php

namespace App\Controller;

use App\Entity\Produtor;
use App\Entity\Propriedade;
use App\Form\ProdutorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProdutorController extends AbstractController
{

    /**
     * @Route("/produtor/{id}", name="produtor_index")
     * @param Produtor $produtor
     * @IsGranted("ROLE_PRODUTOR", message="Acesso não permitido")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexProdutor(Produtor $produtor)
    {
        if($this->getUser() == $produtor->getUser()){
            return $this->render("produtor/show.html.twig", array("produtor" => $produtor));
        }
        return $this->redirectToRoute("produtor_index", ["id" => $this->getUser()->getProdutor()]);
    }

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
            $propriedade = new Propriedade();
            $propriedade->setLocalizacao($request->request->get('local'));
            $propriedade->setProdutorId($produtor);
            $propriedade->setTipoProducao($request->get('tipo'));
            $produtor->addPropriedade($propriedade);
            $this->getDoctrine()->getRepository(Produtor::class)->save($produtor);
            return $this->redirectToRoute('index');
        }
        return $this->render('produtor/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
