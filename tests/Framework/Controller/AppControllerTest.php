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
    public function testEmptyIndexAction()
    {
        $response = $this->controller->indexAction();
        $this->assertEmpty($response);
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
