<?php

namespace App\Services;

use GuzzleHttp\Client;

class ReportService
{
    protected $guzzle;

    public function __construct()
    {
        $apiUrl = 'https://api.spaceflightnewsapi.net/v3/reports';

        $this->guzzle = new Client([
            'base_uri' => $apiUrl
        ]);
    }

    public function getAllReports()
    {
        $rawResult = json_decode($this->guzzle->get('reports')->getBody(), true);

        return $rawResult;
    }
}
