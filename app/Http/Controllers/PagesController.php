<?php
namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

  public function getIndex() {
    $posts_last_top = Post::orderBy('created_at', 'desc')->limit(9)->get();
    $posts_last_down = Post::orderBy('created_at', 'desc')->limit(3)->get();
    $posts_recommended = Post::where('recommended', 'yes')->limit(3)->get();
    $posts_popular = Post::orderBy('views', 'desc')->limit(3)->get();
    return view('pages.welcome')->withPostsLastTop($posts_last_top)->withPostsLastDown($posts_last_down)->withPostsRecommended($posts_recommended)->withPostsPopular($posts_popular);
  }

  public function getGames() {
    $posts = Post::orderBy('created_at', 'desc')->limit(36)->get();
    return view('pages.games')->withPosts($posts);
  }

  public function getSingle() {
    return view('pages.single');
  }

  public function getContact() {
    return view('pages.contact');
  }
}
