function loadCat(id){
        $.ajax({
            url: "api/posts/" + id
        }).done(function(response) {
            $('#posts').html('');
            for (var i = 0; i < response.length; i++) {
                writePosts(response[i]);
            }
        });
    }
    
    function loadAll(){
        $.ajax({
            url: "api/posts"
        }).done(function(response) {
            $('#posts').html('');
            for (var i = 0; i < response.length; i++) {
                writePosts(response[i]);
            }
        });
    }
    
    function writePosts (response) {
        $('#posts').append('<div class="card col-xs-12 col-md-4 " id="card'+ response.id +'"><img class="img-responsive" src="../storage/app/'+response.img+'" alt="Card image cap"><h2><a href="posts/'+ response.id +'">'+ response.title +'</a></h2></div>');
    }
    
    loadAll();