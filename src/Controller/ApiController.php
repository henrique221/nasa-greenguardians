<?php

namespace App\Controller;

use App\Service\CurlRequestDispatcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller
 * @Route("api", name="api_")
 */
class ApiController extends AbstractController
{
    /**
     * @var CurlRequestDispatcher
     */
    private $curlRequestDispatcher;

    /**
     * ApiController constructor.
     * @param CurlRequestDispatcher $curlRequestDispatcher
     */
    public function __construct(CurlRequestDispatcher $curlRequestDispatcher)
    {
        $this->curlRequestDispatcher = $curlRequestDispatcher;
    }

    /**
     * @Route("/hasfire", name="has_fire", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $response = null;
        if($request->getMethod() == "POST") {
            $url = "https://opennex.org/getAPIResult";
            $params = array('serviceId' => 23);
            $response = $this->curlRequestDispatcher->post($url, $params);
        }
        return $this->render('api/hadFire.html.twig', array(
            'response' => $response
        ));
    }
}
