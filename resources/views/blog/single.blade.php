@extends('vendor.main')
@section('title', "| $post->title")
@section('content')
        <div class="single">
            <div class="blog-to">

                <a href="/single">{{Html::image('/images/catalog/' . $post->id . '.jpg', '', array('class' => 'img-responsive sin-on'))}}</a>
                <div class="blog-top">
                    <div class="blog-left">
                      <b>{{date("d", strtotime($post->created_at))}}</b>
                      <span>{{date("m-y", strtotime($post->created_at))}}</span>
                    </div>
                    <div class="top-blog">
                        <a class="fast" href="#">{{$post->title}}</a>
                        <p>Opublikowany przez <a href="#">{{$post->author}}</a></p>
                        <p>{{$post->text}}</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@endsection
