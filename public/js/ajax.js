function loadCat(id){
        $.ajax({
            url: "makeJSON/" + id
        }).done(function(response) {
            $('#posts').html('');
            for (var i = 0; i < response.length; i++) {
                writePosts(response[i]);
            }
        });
    }
    
    function loadAll(){
        $.ajax({
            url: "makeJSON"
        }).done(function(response) {
            $('#posts').html('');
            for (var i = 0; i < response.length; i++) {
                writePosts(response[i]);
            }
        });
    }
    
    function writePosts (response) {
        $('#posts').append('<div class="card" id="card'+ response.id +'"><img src="http://placehold.it/300x200" alt="Card image cap"><h2><a href="/public/posts/'+ response.id +'">'+ response.title +'</a></h2></div>');
    }
    
    loadAll();