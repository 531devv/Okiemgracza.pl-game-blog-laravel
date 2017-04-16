@extends('vendor.main')
@section('title', '| Czytaj więcej')
@section('stylesheet')
  {!! Html::style('css/parsley.css')  !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8">
      {{Html::image('/images/catalog/' . $post->id . '.jpg', '', array('class' => 'img-responsive sin-on'))}}
        <h1 style="margin-bottom: 15px;">{{$post->title}}</h1>

        <p style="margin-bottom: 50px;">{{$post->text}}</p>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Stworzony: </dt>
          <dd>{{$post->created_at}}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Ostatnia aktualizacja:</dt>
          <dd>{{$post->updated_at}}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Wygląd adresu URL:</dt>
          <dd><a href="{{url('/blog/' . $post->slug)}}">{{$post->slug}}</a></dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Autor:</dt>
          <dd>{{$post->author}}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Avatar:</dt>
          <dd>{{ HTML::image('/images/catalog/' . $post->id . 'avatar.jpg', '', array('class' => 'img-responsive sin-on')) }}</dd>
        </dl>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edytuj', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Usun', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
          </div>
          <div class="col-sm-6">
            <a href="{{route('posts.index')}}" class="btn btn-default btn-block" style="margin-top:5px;">Powrót</a>
          </div>
        </div>

      </div>
    </div>
  </div>


@endsection
