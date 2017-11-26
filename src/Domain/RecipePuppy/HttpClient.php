<?php

namespace App\Domain\RecipePuppy;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;

class HttpClient
{

    /** @var Client */
    private $client;

    /** @var HttpResponseProcessor */
    private $responseProcessor;

    /**
     * HttpClient constructor.
     *
     * @param HttpResponseProcessor $responseProcessor
     */
    public function __construct(HttpResponseProcessor $responseProcessor)
    {
        $this->client = new Client();
        $this->responseProcessor = $responseProcessor;
    }

    /**
     * Make request to server
     *
     * @param $method
     * @param $uri
     * @param array $headers
     * @param array $requestBody
     *
     * @return array
     */
    public function send($method, $uri, array $headers = [], array $requestBody = [])
    {
        $request = new Request(
            $method,
            $uri,
            $headers,
            http_build_query($requestBody)
        );

        $options = [
            RequestOptions::VERIFY => false,
        ];

        $response = $this->client->send($request, $options);

        return $this->responseProcessor->processResponse((string)$response->getBody());
    }
}
