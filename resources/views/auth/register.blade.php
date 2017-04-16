@extends('vendor.main')
@section('title', '| Rejestrowanie nowego użytkownika')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3" style="margin-top:55px;">
      {!! Form::open() !!}
        {{form::label('name', 'Imię:')}}
        {{Form::text('name', null, ['class' => 'form-control', 'required' => ''])}}

        {{form::label('email', 'Email:')}}
        {{Form::email('email', null, ['class' => 'form-control', 'required' => ''])}}

        {{form::label('password', 'Hasło:')}}
        {{form::password('password', ['class' => 'form-control', 'required' => ''])}}

        {{form::label('password_confirmation', 'Potwierdź hasło:')}}
        {{form::password('password_confirmation', ['class' => 'form-control', 'required' => ''])}}
        <br>
        {{form::checkbox('remember')}}{{form::label('remember', 'Zapamiętaj mnie')}}
        <br>
        {{form::submit('Zarejestruj mnie', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:5px;margin-bottom: 150px;'])}}
      {!! Form::close() !!}
    </div>
  </div>
@endsection
