@extends('vendor.main')
@section('title', '| Strona Główna')
@section('stylesheet')
  {!! Html::style('css/parsley.css')  !!}
@endsection
@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="col-md-offset-5">
      <h1 class="text-center">Tworzenie wpisu..</h1>
      {!! Form::open(array('route' => 'posts.store', 'style' => 'margin-top: 20px;', 'files' => 'true')) !!}
          {{ Form::label('author', "Autor:") }}
          {{ Form::text('author', null, array('class' => 'form-control', 'required' => '', 'maxlenght' => '255'))}}

          {{ Form::label('slug', "Nazwa adresu url(np. nasze-zdanie-na-temat-fifa-17):")}}
          {{ Form::text('slug', null, array('class' =>'form-control', 'required' => '', 'maxlenght' => '255'))}}

          {{ Form::label('image', 'Główny obrazek(Użyj formatu .jpg):') }}
          {{ Form::file('image', null, array('class' => 'form-control', 'required' => '')) }}

          {{Form::label('avatar', 'Avatar(będzie wyświetlany na stronie głównej, użyj .jpg):')}}
          {{Form::file('avatar', null, array('class' => 'form-control', 'required' => ''))}}

          {{ Form::label('title', 'Tytuł:') }}
          {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}

          {{ Form::label('text', 'Treść:') }}
          {{ Form::textarea('text', null, array('class' => 'form-control', 'required' => '')) }}

          {{ Form::submit('Stwórz post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-bottom: 20px;')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}

@endsection

@endsection
