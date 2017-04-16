<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;

class BlogController extends Controller
{
    public function getSingle($slug){
      $post = Post::where('slug', '=', $slug)->first();
      $blogKey = 'blog_' . $post->id;

      if (!Session::has($blogKey)) {
          Post::where('id', $post->id)->increment('views');
          Session::put($blogKey, 1);
      }
      return view('blog.single')->withPost($post);
    }

    public function getIndex(){
      $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
      $pages = Post::orderBy('id', 'desc')->paginate(3);
      return view('blog.index')->withPosts($posts)->withPages($pages);
    }
}
