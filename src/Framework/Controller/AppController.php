<?php

namespace App\Framework\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController extends Controller
{
    /**
     * @Route("/")
     *
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/search")
     *
     * @return JsonResponse
     */
    public function searchAction()
    {
        return new JsonResponse([]);
    }
}