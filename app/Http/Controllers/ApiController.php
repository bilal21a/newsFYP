<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function api_source($source)
    {
        // dd($source);
            $endpoint = "https://newsapi.org/v2/top-headlines";
            $client = new \GuzzleHttp\Client();
            $apiKey = getenv('NEWS_API_KEY');
            // $value = "ABC";

            $response = $client->request('GET', $endpoint, ['query' => [
                'sources' => $source,
                'apiKey' => $apiKey,
            ]]);

            // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);
            $this->data['data'] = $data;
            return view('user.apisource',$this->data);
            // dd($data);
    }
}
