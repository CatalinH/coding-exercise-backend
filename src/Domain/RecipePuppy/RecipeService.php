<?php

namespace App\Domain\RecipePuppy;


use App\Data\Recipe\RecipeCreator;
use function GuzzleHttp\Psr7\build_query;

class RecipeService
{

    const SERVICE_URL = 'http://www.recipepuppy.com/api/';

    /** @var HttpClient */
    private $client;

    /**
     * RecipeService constructor.
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $page
     * @param string $query
     *
     * @return array
     */
    public function searchRecipes($page = 1, $query = '')
    {
        parse_str($query, $requestedQuery);

        $requestQuery = ['p' => (int)$page];

        if (isset($requestedQuery['ingredients'])) {
            $requestQuery['i'] = $requestedQuery['ingredients'];
        }

        if (isset($requestedQuery['query'])) {
            $requestQuery['q'] = $requestedQuery['query'];
        }

        $response = $this->client->send('GET', self::SERVICE_URL . '?' . build_query($requestQuery));

        $results = $this->getRecipesFromResponse($response);

        return $results;
    }

    /**
     * @param array $response
     *
     * @return array
     */
    private function getRecipesFromResponse($response = [])
    {
        $results = [];

        if (isset($response['results']) && count($response['results']) > 0) {
            foreach ($response['results'] as $result) {
                $results[] = RecipeCreator::create($result['title'], $result['href'], $result['ingredients'], $result['thumbnail']);
            }
        }

        return $results;
    }
}
