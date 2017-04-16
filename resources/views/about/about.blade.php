@extends('vendor.main')
@section('title', '| O założycielu')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <br>
      <dl class="dl-horizontal">
        <dt>{{ Html::image('images/531.png', '', array('class' => 'img-responsive')) }}</dt>
        <dd><strong>O mnie:</strong><br>Portal został założony głównie w celach humorystycznych oraz w celu edukacyjnym. Dlaczego w celu edukacyjnym?
        Bo cały czas się uczę, jestem programistą i chcę osiągać sukcesy w moich aplikacjach. Projekt Okiemgracza.pl jest
        tworzony na frameworku Laravel. Jest to mój pierwszy projekt na tym frameworku, laravel bardzo przypadł mi do gustu
        i będę chciał rozwijać ten z czasem.<br><br>
            <strong>Czego będę mógł się dowiedzieć na portalu?</strong><br>Tak jak pisałem wyżej portal został stworzony w celach humorystycznych, nie ma tutaj nacisku na pismo formalne/urzędowe.
          Artykuły będą krótkie i zwięzłe, a opinia na temat gry będzie odnosić do naszych odczuć podczas grania w tą grę. Czyli w skrócie
          W artykułach będzie szczera i może czasem bolesna prawda bez zachamowań.</dd>
      </dl>
    </div>
  </div>
@endsection
