<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 1)->count();
        $unpublishedPosts = Post::where('status', 0)->count();
        
        return view('dashboard', [
            'totalPosts' => $totalPosts,
            'publishedPosts' => $publishedPosts,
            'unpublishedPosts' => $unpublishedPosts,

        ]);
    }
}
