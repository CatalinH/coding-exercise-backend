<?php

namespace App\Framework\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController extends Controller
{
    /**
     * @Route("/")
     *
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse(['available_endpoints' => ['/search', '/search?ingredients=eggs']]);
    }

    /**
     * @Route("/search")
     * @Route("/search?ingredients={ingredients}")
     *
     * @param string $ingredients
     *
     * @return JsonResponse
     */
    public function searchAction($ingredients = '')
    {
        return new JsonResponse([]);
    }

    /**
     * @Route("recipe/{recipeId}")
     *
     * @param $recipeId
     *
     * @return JsonResponse
     */
    public function recipeAction($recipeId)
    {
        return new JsonResponse(['error' => 'Item Not Found'], 404);
    }
}
