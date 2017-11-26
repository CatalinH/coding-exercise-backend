<?php

namespace App\Domain\RecipePuppy;


class HttpResponseProcessor
{

    /**
     * Process http response
     *
     * @param string $httpResponse
     *
     * @return array
     */
    public function processResponse($httpResponse = '')
    {
        $response = json_decode($httpResponse, true);

        if (!is_array($response)) {
            return [];
        }

        return $response;
    }
}
