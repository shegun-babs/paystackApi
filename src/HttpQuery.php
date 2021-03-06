<?php

namespace ShegunBabs\PayStack;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

const EXTRACT_ERROR_RETURN_TYPE = 0; 

class HttpQuery
{

    private $client;
    private $params = null;

    const PAYSTACK_BASE_URL = 'https://api.paystack.co/';

    private function __construct($secret_key, array $config=[])
    {
        $this->client = new Client([
            'base_uri' => self::PAYSTACK_BASE_URL,
            'headers' => [
                'Authorization' => "Bearer " .$secret_key,
                'Content-type' => 'application/json',
                'User-Agent' => 'EasyCreditNg API Server',
            ],
        ]);
    }


    public static function withConfig($secret_key, array $config=[]) : self
    {
        return new static($secret_key, $config);
    }


    protected function params(array $array) 
    {
        $this->params = $array;
        return $this;
    }


    protected function post($url) : array
    {
        $http_status = NULL;
        $response = NULL;

        try {
            $apiResponse = $this->client->request('POST', $url, [
                'json' => $this->params,
            ]);
            $http_status = $apiResponse->getStatusCode();
            $data = (string)$apiResponse->getBody();
            $response = json_decode($data);
            $status = TRUE;
        } catch (RequestException $exception) {
            $extractedErrors = $this->extractError($exception->getMessage());
            $http_status = $exception->getCode();
            $status = FALSE;
            $response = $extractedErrors;
        }

        return compact('status', 'http_status', 'response');
    }


    protected function get($url)
    {
        $http_status = NULL;
        $response = NULL;

        try {
            if (is_null($this->params))
                $response = $this->client->request('GET', $url);
            else
                $response = $this->client->request('GET', $url, [
                    'query' => $this->params
                ]);

            $http_status = $response->getStatusCode();
            $data = (string)$response->getBody();
            $response = json_decode($data);
            $status = TRUE;

        } catch (RequestException $e) {
            $extractedErrors = $this->extractError($e->getMessage());
            $http_status = $e->getCode();
            $status = FALSE;
            $response = $extractedErrors;
        }
        return compact('status', 'http_status', 'response');
    }


    private function extractError($e_message, $returnType=0)
    {
        //@TODO implement configurable return type
        $out = null;
        $pattern = "/({[\s\"a-zA-Z:,']+})/";
        if ( \preg_match($pattern, $e_message, $matches) )
        {
            $out = json_decode(trim($matches[0]));
        }
        return $out;
    }


    private function handleError($response)
    {

    }
   
}