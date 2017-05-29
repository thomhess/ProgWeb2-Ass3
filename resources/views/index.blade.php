@extends ('layout')


@section ('content')
    
    <div class="album text-muted">
      <div class="container">
        <div class="row">
           <div class="col-center">
            <div class="btn-group" role="group" aria-label="...">
              <button type="button" class="btn btn-default" onclick="loadAll()" name="cat[]" value="0">Alle</button>
              @foreach($categories as $category)
                  <button type="button" class="btn btn-default" onclick="loadCat( {{$category->id}} )" name="cat[]" value="{{$category->id}}">{{$category->name}}</button>
              @endforeach
            </div>
            </div>
        </div>
        <hr>
        
        <div class="row" id="posts">
         
<!--
        @foreach($posts as $post)
          <div class="card">
            <img src="http://placehold.it/300x200" alt="Card image cap">
            <h2> <a href="/public/posts/{{$post->id}}">{{ $post->title }}</a></h2>
          </div>
        @endforeach
-->

      </div>
    </div>
@endsection

@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/ajax-index.js') }}"></script>

@endsection