@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mine Annonser</div>

                <div class="panel-body" id="allPosts">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> var id = {{ $id }}</script>
<script src="{{ asset('js/ajax-myposts.js') }}"></script>

@endsection