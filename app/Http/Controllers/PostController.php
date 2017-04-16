<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use File;
use App\Events\PostWasViewed;
class PostController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(10);
      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array(
        'title' => 'required|max:255',
        'text'  => 'required|max:4000',
        'slug'  => 'required|alpha_dash|max:255',
        'author' => 'required|max:50',
        'image' => 'required',
        'avatar' => 'required'
      ));

      $post = new Post;

      $post->title = $request->title;
      $post->text = $request->text;
      $post->slug = $request->slug;
      $post->author = $request->author;

      $post->save();

      if(($request->file('image') !== null)&&($request->file('avatar') !== null)){

      $imageName = $post->id . '.' .
      $request->file('image')->getClientOriginalExtension();
      File::delete(base_path() . '/public/images/catalog/' . $imageName);
      $request->file('image')->move(
        base_path() . '/public/images/catalog/', $imageName
      );
      
      $imageNameAvatar = $post->id . 'avatar.' .
      $request->file('avatar')->getClientOriginalExtension();
      File::delete(base_path() . '/public/images/catalog/' . $imageNameAvatar);
      $request->file('avatar')->move(
        base_path() . '/public/images/catalog/', $imageNameAvatar
      );

      Session::flash('success', 'Treść newsa została pomyślnie zapisana!');
      return redirect()->route('posts.show', $post->id);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'))->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      if ($request->input('slug') === $post->slug) {
        $this->validate($request, array(
        'title' => 'required|max:255',
        'text'  => 'required|max:3000',
        'recommended' => 'required'
        ));
      } else {
        $this->validate($request, array(
        'title' => 'required|max:255',
        'text'  => 'required|max:3000',
        'slug'  => 'required|max:255|unique:posts,slug',
        'recommended' => 'required'
        ));
      }

      $post->title = $request->input('title');
      $post->slug = $request->input('slug');
      $post->text = $request->input('text');
      $post->recommended = $request->input('recommended');

      $post->save();

      if($request->file('image') !== null)
      {
      $imageName = $post->id . '.' .
      $request->file('image')->getClientOriginalExtension();
      File::delete(base_path() . '/public/images/catalog/' . $imageName);
      $request->file('image')->move(
        base_path() . '/public/images/catalog/', $imageName
      );
      }

      if($request->file('avatar') !== null)
      {
      $imageName = $post->id . 'avatar.' .
      $request->file('avatar')->getClientOriginalExtension();
      File::delete(base_path() . '/public/images/catalog/' . $imageName);
      $request->file('avatar')->move(
        base_path() . '/public/images/catalog/', $imageName
      );
      }

      Session::flash('success', 'Pomyślnie zaktualizowano newsa!');
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete(base_path() . '/public/images/catalog/' . $post->id . '.jpg');
        File::delete(base_path() . '/public/images/catalog/' . $post->id . 'avatar.jpg');
        $post->delete();
        Session::flash('success', 'Post usunięty pomyślnie!');
        return redirect()->route('posts.index');
    }
}
