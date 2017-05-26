@extends ('layout')


@section ('content')
    <div class="container">
        <h1>Send melding</h1>
        <hr>
        <form method="POST" action="/public/messages">
         {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputTitle">Tittel</label>
            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Tittel" name="title">
          </div>
          <div class="form-group">
            <label for="desc">Beskrivelse</label>
            <textarea class="form-control" id="desc" rows="3" name="content"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send melding</button>
        </form>
        <br>
    </div>
@endsection