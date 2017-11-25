<?php

namespace App\Tests\Framework\Controller;

use App\Framework\Controller\AppController;
use PHPUnit\Framework\TestCase;

class AppControllerTest extends TestCase
{
    /** @var AppController */
    private $controller;

    public function setUp()
    {
        $this->controller = new AppController();

    }

    public function testEmptyIndexAction()
    {
        $indexResponse = $this->controller->indexAction();
        $this->assertEmpty($indexResponse);
    }
}
