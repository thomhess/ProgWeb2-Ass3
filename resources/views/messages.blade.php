@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inbox</div>

                <div class="panel-body" id="to">
                </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Sendte meldinger</div>

                <div class="panel-body" id="from">
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection


@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> <?php echo "var id = $id" ?></script>
<script src="{{ asset('js/ajax-messages.js') }}"></script>

@endsection