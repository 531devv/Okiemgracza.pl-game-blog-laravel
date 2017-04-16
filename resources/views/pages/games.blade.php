@extends('vendor.main')
@section('title', '| Polecane gry')
@section('content')
    <div class="games">
        <h2>Lista gier:</h2>

        <div class="wrap">
            <div class="main">
                <ul id="og-grid" class="og-grid">
                  @foreach($posts as $post)
          					<li>
          						<a href="{{route('blog.single', $post->slug)}}" data-largesrc="images/catalog/{{$post->id . 'avatar.jpg'}}" data-title="Słowem wstępu:" data-description="{{substr($post->text, 0, 200)}} {{strlen($post->text) > 50 ? "..." : ""}}">
          							<img class="img-responsive" src="images/catalog/{{$post->id . 'avatar.jpg'}}" alt="img02"/>
          						</a>
          					</li>
          				@endforeach
                    <div class="clearfix"> </div>
                </ul>
            </div>
        </div>
    </div>
    <script src="js/grid.js"></script>
    <script>
        $(function() {
            Grid.init();
        });
    </script>
@endsection
