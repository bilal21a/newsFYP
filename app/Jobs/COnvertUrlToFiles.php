<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;
use App\Api;
use App\Category;
use App\Post;
use Exception;
use Illuminate\Support\Facades\Cache;
use jcobhams\NewsApi\NewsApi;
use Storage;
use Intervention\Image\Facades\Image;
use File;

class COnvertUrlToFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $posts_files=Post::where('main_image',null)
        ->where('list_image',null)
        ->where('thumb_image',null)
        ->where('url_to_image','!=',null)
        ->get();
        // dd($posts_files);

        foreach ($posts_files as $single_file) {
            // dd($single_file->url_to_image);

            try{
            $url = $single_file->url_to_image;
            $imageName="api_".uniqid(rand(), true).".jpg";
            File::copy(public_path('test.png'), public_path('img/main_image/'.$imageName));

            $img = public_path('img/main_image/'.$imageName);

            // Function to write image into file
            file_put_contents($img, file_get_contents($url));

            // main img
            $image = Image::make(public_path('img/main_image/'. $imageName))->fit(920, 520);
            $image->save();

            // thumb img
            $image = Image::make(public_path('img/main_image/'. $imageName))->fit(340, 180);
            $image->save(public_path('img/thumb_image/' . $imageName));

            // list img
            $image = Image::make(public_path('img/main_image/'. $imageName))->fit(110, 60);
            $image->save(public_path('img/list_image/' . $imageName));
        }
        catch(Exception $e){
            $imageName = null;
        }

            $post = Post::find( $single_file->id );
            $post->update([
                'main_image' => $imageName,
                'thumb_image' => $imageName,
                'list_image' => $imageName,
        ]);
        }
            }
        }
