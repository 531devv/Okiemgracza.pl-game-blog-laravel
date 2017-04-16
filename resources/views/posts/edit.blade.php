@extends('vendor.main')
@section('title', '| Czytaj więcej')
@section('stylesheet')
  {!! Html::style('css/parsley.css')  !!}
@endsection
@section('content')
  <div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => 'true'])!!}
    <div class="col-md-8">
        {{ Form::label('image', 'Główny obrazek(Użyj formatu .jpg):') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}

        {{ Form::label('slug', "Nazwa adresu url(np. nasze-zdanie-na-temat-fifa-17):")}}
        {{ Form::text('slug', null, array('class' =>'form-control', 'required' => '', 'maxlenght' => '255'))}}

        {{Form::label('avatar', 'Avatar(będzie wyświetlany na stronie głównej, użyj .jpg):')}}
        {{Form::file('avatar', null, array('class' => 'form-control'))}}

        {{Form::label('title:', "Tytuł:", ['class' => 'form-spacing-top'])}}
        {{Form::text('title', null, ['class' => 'form-control'])}}

        {{ Form::label('recommended', 'Polecany?(Jeśli tak wpisz: yes)') }}
        {{ Form::text('recommended', null, array('class' => 'form-control', 'required' => '')) }}

        {{Form::label('text', "Treść:", ['class' => 'form-spacing-top'])}}
        {{Form::textarea('text', null, ['class' => 'form-control', 'style' => 'margin-bottom: 20px;'])}}
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
        <hr>

        <div class="row">
          <div class="col-sm-6">
            <a href="{{route('posts.show', $post->id)}}" class='btn btn-primary btn-block'>Powrót</a>
          </div>
          <div class="col-sm-6">
            {!! Form::submit('Zapisz zmiany', ['class' => 'btn btn-success btn-block']) !!}
          </div>
        </div>

      </div>
    </div>
    {!! Form::close() !!}
  </div>


@endsection
