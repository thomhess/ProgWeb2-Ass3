@extends ('layout')


@section ('content')

<div class="container">
    
<h1>{{ $post->title }}</h1>
<p> {{ $post->body }}</p>
<img src="../../storage/app/{{ $post->img }}">

 <!-- Authentication Links -->
@if (Auth::guest())
    <h2><a href="{{ route('login') }}">Login</a> eller <a href="{{ route('register') }}">registrer</a> for å sende forespørsel</h2>
@else
    <h2><a href="{{ route('login') }}">Send forespørsel</a> på dette</h2> <!-- Send forespørsel må fikses route på-->
@endif
</div>

@endsection