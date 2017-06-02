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
    <h2><button type="button" class="replyBtn btn-link" data-toggle="modal" data-target="#messageModal">Send forespørsel</button> på dette</h2> <!-- Send forespørsel må fikses route på-->
    
    
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
        <div class="modal-error">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendMessage">Send melding</button>
      </div>
    </div>
  </div>
</div>
@endif
</div>

@endsection


@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var username = '{{ $post->user->name }}';
    var userid = {{ $post->user_id }};
</script>
<script src="{{ asset('js/ajax-post.js') }}"></script>

@endsection