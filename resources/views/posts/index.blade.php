@extends('vendor.main')
@section('title', '| Panel Redaktora')
@section('stylesheet')
  {!! Html::style('css/parsley.css')  !!}
  {{ Html::style('css/table.css') }}
@endsection
@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>Wszystkie posty</h1>
    </div>
    <div class="col-md-2">
      <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-lg btn-h1-spacing">Stwórz newsa</a>
    </div>
    <div class="col-md-12">
    </div>
    <hr>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <td>Autor</td>
          <td>Tytuł</td>
          <td>URL</td>
          <td>Treść</td>
          <td>Polecany</td>
          <td>Stworzony</td>
          <td>Aktualizowany</td>
        </thead>

        <tbody>
          @foreach ($posts as $post)
            <tr>
              <th>{{$post->id}}</th>
              <td>{{$post->author}}</td>
              <td>{{$post->title}}</td>
              <td><a href="{{url('/blog/' . $post->slug)}}">{{$post->slug}}</a></td>
              <td>{{substr($post->text, 0, 50)}} {{strlen($post->text) > 50 ? "..." : ""}}</td>
              <td>{{$post->recommended}}</td>
              <td>{{$post->created_at}}</td>
              <td>{{$post->updated_at}}</td>
              <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-block btn-sm">Zobacz</a><a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-block btn-sm">Edytuj</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
      </div>
    </div>


@endsection
