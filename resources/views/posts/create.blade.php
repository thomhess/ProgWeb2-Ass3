@extends ('layout')


@section ('content')
    <div class="container">
        <h1>Legg inn ny annonse</h1>
        <hr>
        <form method="POST" action="{{ route('posts') }}" enctype="multipart/form-data">
         {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputTitle">Tittel</label>
            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Tittel" name="title" required>
          </div>
          <div class="form-group">
            <label for="cat">Velg kategori</label>
            <select class="form-control" id="cat" name="category">
                @foreach($categories as $category)
              
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="desc">Beskrivelse</label>
            <textarea class="form-control" id="desc" rows="3" name="body" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Last opp bilde</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image" accept="image/*">
            <small id="fileHelp" class="form-text text-muted">Her kan du laste opp et bilde som passer til annonsen (jpeg, png, bmp, gif, or svg)</small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Publiser annonse</button>
          </div>
          
          @if (count($errors))
          <div class="form-group">
             <div class="alert alert-danger">
                <ul>

                  @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                  @endforeach

                </ul>
            </div>
          </div>
          @endif
        </form>

       

        <br>
    </div>
@endsection