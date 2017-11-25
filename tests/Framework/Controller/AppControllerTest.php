<?php

namespace App\Tests\Framework\Controller;

use App\Framework\Controller\AppController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppControllerTest extends TestCase
{
    /** @var AppController */
    private $controller;

    /**
     * Setup tests
     */
    public function setUp()
    {
        $this->controller = new AppController();
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
        $this->assertEquals(2, count($decodedResponse['available_endpoints']));
    }

    /**
     * Test that search returns JsonResponse
     */
    public function testSearchAction()
    {
        $response = $this->controller->searchAction();

        $this->assertInstanceOf(JsonResponse::class, $response);
    }
}
