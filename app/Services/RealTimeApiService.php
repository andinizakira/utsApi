<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RealTimeApiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('RAPIDAPI_KEY'); // Ambil API key dari file .env
    }

    // Fungsi untuk mendapatkan semua tim
    public function getAllRealTime()
    {
        try {
            $response = $this->client->request('GET', 'https://real-time-finance-data.p.rapidapi.com/company-cash-flow?symbol=AAPL%3ANASDAQ&period=QUARTERLY&language=en', [
                'headers' => [
                    'x-rapidapi-key' => $this->apiKey
                ],
                'verify' => false // Menonaktifkan verifikasi SSL
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            return $data;

        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}