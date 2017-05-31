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

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form>
         {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="control-label">Tittel:</label>
            <input type="text" class="form-control" id="input-reciever" name="title">
          </div>
          <input type="hidden" name="reciever">
          <div class="form-group">
            <label for="message-text" class="control-label">Melding:</label>
            <textarea class="form-control" name="content"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendMessage">Send melding</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> var id = {{ $id }}</script>
<script src="{{ asset('js/ajax-messages.js') }}"></script>

@endsection