<?php

namespace Tan\Provider;


use GuzzleHttp\Client;

class GitHub implements ProviderInterface
{

    private $client;

    private $apiUrl = 'https://api.github.com/repos/symfony/symfony';


    public function __construct()
    {
        $this->client = new Client(
            [
                'base_url' => $this->apiUrl,
                'timeout' => 2.0
            ]
        );

    }

    public function pulls()
    {

        $response = $this->client->request('GET','https://api.github.com/repos/symfony/symfony/pulls');

        $responseBody = \GuzzleHttp\json_decode((string)$response->getBody());

        $desiredResponse = array_map(

            function ($data) {

                return [
                    'id' => $data->id,
                    'number' => $data->number,
                    'status' => $data->status,
                    'user' => $data->user->login,
                    'title' => $data->title
                ];
            },
            $responseBody
        );

        return $desiredResponse;

    }


    public function issues()
    {

        $response = $this->client->request('GET','https://api.github.com/repos/symfony/symfony/issues');

        $responseBody = \GuzzleHttp\json_decode((string)$response->getBody());

        $desiredResponse = array_map(

            function ($data) {

                return [
                    'id' => $data->id,
                    'number' => $data->number,
                    'status' => $data->state,
                    'user' => $data->user->login,
                    'title' => $data->title
                ];
            },
            $responseBody
        );

        return $desiredResponse;

    }

    public function releases()
    {

        $response = $this->client->request('GET','https://api.github.com/repos/symfony/symfony/releases');

        $responseBody = \GuzzleHttp\json_decode((string)$response->getBody());

        $desiredResponse = array_map(

            function ($data) {

                return [
                    'id' => $data->id,
                    'number' => $data->tag_name,
                    'user' => $data->author->login,
                    'title' => $data->name
                ];
            },
            $responseBody
        );

        return $desiredResponse;

    }

}