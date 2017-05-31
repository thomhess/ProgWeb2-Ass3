@extends ('layout')


@section ('content')

<div class="container">
    
<h1>{{ $post->title }}</h1>
<p> {{ $post->body }}</p>
<p> Publisert av: <b>{{ $post->user->name }}</b></p>
<img class="showImage" src="../../storage/app/{{ $post->img }}">

 <!-- Authentication Links -->
@if (Auth::guest())
    <h2><a href="{{ route('login') }}">Login</a> eller <a href="{{ route('register') }}">registrer</a> for å sende forespørsel</h2>
@else
    <h2><a href="{{ route('login') }}">Send forespørsel</a> på dette</h2> <!-- Send forespørsel må fikses route på-->
@endif
</div>

@endsection


@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var username = {{ $post->user->name }};
    var userid = {{ $post->user_id }}
</script>
<script src="{{ asset('js/ajax-post.js') }}"></script>

@endsection