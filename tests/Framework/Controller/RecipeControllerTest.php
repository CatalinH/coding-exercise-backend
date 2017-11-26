<?php

namespace App\Tests\Framework\Controller;

use App\Framework\Controller\RecipeController;
use App\Framework\Services\Recipe\RecipeService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class RecipeControllerTest extends TestCase
{
    /** @var RecipeController */
    private $controller;

    /** @var RecipeService|\PHPUnit_Framework_MockObject_MockObject */
    private $recipeServiceMock;

    /**
     * Setup tests
     */
    public function setUp()
    {
        $this->recipeServiceMock = $this->getMockBuilder(RecipeService::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->controller = new RecipeController($this->recipeServiceMock);
    }

    /**
     * Test that index returns empty
     */
    public function testIndexReturnEndpointsList()
    {
        $response = $this->controller->indexAction();
        $decodedResponse = json_decode($response->getContent(), true);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(1, count($decodedResponse));
        $this->assertArrayHasKey('available_endpoints', $decodedResponse);
        $this->assertEquals(3, count($decodedResponse['available_endpoints']));
    }

    /**
     * Test that search returns JsonResponse
     */
    public function testSearchAction()
    {
        $response = $this->controller->searchAction();

        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    /**
     * Test that recipe action returns error
     */
    public function testRecipeAction()
    {
        $response = $this->controller->recipeAction('abc');
        $decodedResponse = json_decode($response->getContent(), true);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(1, count($decodedResponse));
        $this->assertArrayHasKey('error', $decodedResponse);
    }
}
