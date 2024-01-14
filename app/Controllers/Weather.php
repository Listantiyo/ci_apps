<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;

class Weather extends BaseController
{
    public function index()
    {

        $data = cache('weather');
        // cache()->delete('weather');
        // die;
        if ($data > 0) {
            if ($data['status']) {
                $data['is'] = true;
            } else {
                $data['is'] = false;
                $data['location'] = 'Location Not Found';
            }
        } else {
            $data['is'] = false;
            $data['location'] = 'Find Location';
        }


        return view('weather/index', $data);
    }

    public function getLocation()
    {
        $location  = $this->request->getPost('location');

        $options = [
            'baseURI' => 'http://api.weatherapi.com/v1/',
            'timeout' => 3,
            'query' => ['key' => env('API_KEY'), 'q' => $location],
            'http_errors' => false,
        ];

        $client = \Config\Services::curlrequest($options)->get('current.json');

        $response = $client->getBody();
        $data['weather'] = json_decode($response, true);
        $data['status'] = true;
        if ($client->getStatusCode() >= 300) {
            $data['status'] = false;
        }
        cache()->save('weather', $data, 300);
        return redirect('weather', 302);
    }
}
