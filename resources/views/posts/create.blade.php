@extends ('layout')


@section ('content')
    <div class="container">
        <h1>Legg inn ny annonse</h1>
        <hr>
        <form method="POST" action="/public/posts">
         {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputTitle">Tittel</label>
            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Tittel" name="title">
          </div>
          <!--div class="form-group">
            <label for="cat">Velg kategori</label>
            <select class="form-control" id="cat" name="category">
                @foreach($categories as $category)
              
                <option>{{ $category->name }}</option>
              
                @endforeach
            </select>
          </div-->
          <div class="form-group">
            <label for="desc">Beskrivelse</label>
            <textarea class="form-control" id="desc" rows="3" name="body"></textarea>
          </div>
          <!--div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
          </div-->
          <button type="submit" class="btn btn-primary">Publiser annonse</button>
        </form>
        <br>
    </div>
@endsection