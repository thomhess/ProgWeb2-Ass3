@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inbox</div>

                <div class="panel-body">
                    @foreach ($recievedMessages as $message)
                        <h3>{{ $message->title }}</h3>
                        <p>{{ $message->content }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Sendte meldinger</div>

            <div class="panel-body">
                @foreach ($sentMessages as $message)
                    <h3>{{ $message->title }}</h3>
                    <p>{{ $message->content }}</p>
                    <hr>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection