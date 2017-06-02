//// Front-page ajax to load posts ////


// Loading posts based on category
function loadCat(id){
        $.ajax({
            url: "api/posts/cat/" + id
        }).done(function(response) {
            $('#posts').html('');
            response.reverse();
            for (var i = 0; i < response.length; i++) {
                writePosts(response[i]);
            }
        });
    }
    
// Loading every post
    function loadAll(){
        $.ajax({
            url: "api/posts"
        }).done(function(response) {
            $('#posts').html('');
            response.reverse();
            for (var i = 0; i < response.length; i++) {
                writePosts(response[i]);
            }
        });
    }

// Printes det posts
    function writePosts (response) {
        $('#posts').append('<div style="display: none;" class="card col-xs-12 col-md-4 " id="card'+ response.id +'"><img class="img-responsive" src="../storage/app/'+response.img+'" alt="Card image cap"><h2><a href="posts/'+ response.id +'">'+ response.title +'</a></h2><p>Publisert av: <b>'+ response.user.name +'</b></p></div>');
        
        $('.card').fadeIn(1000);
    }
    
    loadAll();