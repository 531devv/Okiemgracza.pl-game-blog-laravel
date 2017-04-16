@extends('vendor.main')
@section('title', '| Blog')
@section('content')
        <!--content-->
        <div class="blog">
            <div class="container">
                <h2>Newsy</h2>
                @foreach($posts as $post)
                <div class="single-inline">
                    <div class="blog-to">
                        <a href="{{route('blog.single', $post->slug)}}">{{Html::image('/images/catalog/' . $post->id . '.jpg', '', array('class' => 'img-responsive sin-on'))}}</a>
                        <div class="blog-top">
                            <div class="blog-left">
                                <b>{{date("d", strtotime($post->created_at))}}</b>
                                <span>{{date("m-y", strtotime($post->created_at))}}</span>
                            </div>
                            <div class="top-blog">
                                <a class="fast" href="{{route('blog.single', $post->slug)}}">{{$post->title}}</a>
                                <p>Napisany przez <a href="{{route('blog.single', $post->slug)}}">{{$post->author}}</a></p>
                                <p class="sed">{{substr($post->text, 0, 600)}} {{strlen($post->text) > 100 ? "..." : ""}}</p>
                                <a href="{{route('blog.single', $post->slug)}}" class="more">Czytaj więcej<span> </span></a>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
            <div class="text-center">
              {!! $pages->links(); !!}
            </div>
        </div>
@endsection
