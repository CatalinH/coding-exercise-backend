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
        return new JsonResponse(['available_endpoints' => [
            '/search',
            '/search/1/',
            '/search/1/ingredients=fish&query=salad'
        ]]);
    }

    /**
     * @Route("/search")
     * @Route("/search/{page}/", defaults={"page" : 1})
     * @Route(
     *     "/search/{page}/{query}",
     *     defaults={
     *         "page" : 1,
     *         "query" : ""
     *     }
     * )
     *
     * @param int $page
     * @param string $query
     *
     * @return JsonResponse
     */
    public function searchAction($page = 1, $query = '')
    {
        return new JsonResponse([$query, $page]);
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
