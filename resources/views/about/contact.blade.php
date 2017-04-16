@extends('vendor.main')
@section('title', '| Formularz kontaktowy')
@section('content')
<div class="contact">

    <div class="container">
        <h2>Kontakt</h2>
        <div class="contact-form">

            <div class="col-md-8 contact-grid">
              {!! Form::open(array('route' => 'contact_store', 'class' => 'form', 'method' => 'POST')) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                  {!! Form::text('name', null,
                      array('required',
                            'class'=>'form-control',
                            'placeholder'=>'Wpisz swój nick/imię')) !!}
              </div>

              <div class="form-group">
                  {!! Form::text('email', null,
                      array('required',
                            'class'=>'form-control',
                            'placeholder'=>'Wpisz adreas email')) !!}
              </div>

              <div class="form-group">
                {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Treść wiadomości'])!!}
              </div>
              <div class="form-group">
                {!! form::text('captcha', null, ['class' =>'form-control', 'placeholder' => '2+2=']) !!}
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LcGTRMUAAAAAP3tlkO7A55xzY5Y2PjfxkxspjGd"></div>
                  {!! Form::submit('Napisz do nas!',
                    array('class'=>'btn btn-primary', 'style' => 'margin-top:10px;')) !!}
              </div>
              {!! Form::close() !!}
              <!---js--->
              <script src='https://www.google.com/recaptcha/api.js'></script>
            </div>
            <div class="col-md-4 contact-in">

                <div class="address-more">
                    <h4>Email:</h4>
                    <p>kontakt@okiemgracza.pl</p>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="map">
        <div style="width: 100%"><iframe width="100%" height="600" src="http://www.citymaps.ie/create-google-map/map.php?width=100%&amp;height=600&amp;hl=en&amp;q=Ostrowiec%20%C5%9Awi%C4%99tokrzyski+(OkiemGracza.pl)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/medir-distancia-area.html">Calculadora de distancias google</a> en <a href="http://www.mapsdirections.info/">Calcular Ruta España</a></iframe></div><br />
    </div>
</div>
@endsection
