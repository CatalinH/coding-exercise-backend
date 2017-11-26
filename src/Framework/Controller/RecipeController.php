<?php

namespace App\Framework\Controller;

use App\Domain\RecipePuppy\RecipeService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class RecipeController extends Controller
{

    /** @var RecipeService */
    private $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

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
        $result = $this->recipeService->searchRecipes($page, $query);

        return new JsonResponse($result);
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
        //TODO store recipe data + uniqueid for each so can be later link recipe as user favorites
        //TODO ability to get specific recipe data
        //TODO ability to filter by meal type / food type (vegan, vegetarian, dairy-free, gluten-free, meat, fish & seafood)
        return new JsonResponse(['error' => 'Item Not Found'], 404);
    }
}
