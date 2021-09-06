<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Cache;
use jcobhams\NewsApi\NewsApi;

class TestController extends Controller
{
    public function testing()
    {
        {
            $categories=Category::get()->where("status",1)
            ->where("api_name","!=",null);

            foreach ($categories as $cat) {
            // dd($cat->id);


            $newsapi = new NewsApi('97685f4f0823492f8a2cd2bc44d46b5f');
            $sources = $newsapi->getSources("sports", "en", "us");
            // $sources = https://newsapi.org/v2/top-headlines?category=sports&apiKey=97685f4f0823492f8a2cd2bc44d46b5f;
            $endpoint = "https://newsapi.org/v2/top-headlines";
            $client = new \GuzzleHttp\Client();
            $category = $cat->api_name;
            $apiKey = '97685f4f0823492f8a2cd2bc44d46b5f';
            // $value = "ABC";

            $response = $client->request('GET', $endpoint, ['query' => [
                'category' => $category,
                'apiKey' => $apiKey,
            ]]);

            // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);


            $api_posts=array();
            foreach ($data['articles'] as $key => $single) {
                // dd($single);
                $api_posts[$key]['source'] = $single['source']['name'];
                $api_posts[$key]['author'] =$single['author'];
                $api_posts[$key]['title'] =$single['title'];
                $api_posts[$key]['slug'] =preg_replace('/[^A-Za-z0-9-]+/', '-',  $api_posts[$key]['title']);
                $api_posts[$key]['description'] =$single['description'];
                $api_posts[$key]['url'] =$single['url'];
                $api_posts[$key]['urlToImage'] =$single['urlToImage'];
                $api_posts[$key]['publishedAt'] =$single['publishedAt'];
                $api_posts[$key]['content'] =$single['content'];
            }

            foreach($api_posts as $single_api) {
                // dd($cat->id);

                $slugs = Post::where('slug', '=', $single_api['slug'])->first();
                if ($slugs === null) {
                    Post::create([
                        'title' => $single_api['title'],
                        'short_description' => $single_api['description'],
                        'description' => $single_api['content'],
                        'slug' => $single_api['slug'],
                        'author_name_api' => $single_api['author'],
                        'source' => $single_api['source'],
                        'url' => $single_api['url'],
                        'url_to_image' => $single_api['urlToImage'],
                        'category_id' => $cat->id
                    ]);
                }

            }
            // dd($api_posts);


        }
        // dd("004 is chutya");
    }
    }
}