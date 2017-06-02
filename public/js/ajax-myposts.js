var username = null;
var allPosts = $('#allPosts');

// Gets all posts written by user
function getUsersPosts(id){
    $.ajax({
        url: '../api/posts/user/' + id,
        success: function(posts) {
            $.each(posts, function(i, post){
                $('#allPosts').append('<div id="mypost'+ post.id +'"><p>'+ post.created_at+'</p><h3>'+ post.title +'</h3><p>'+ post.body +'</p><button class="delPost" value="' + post.id + '" >Slett</button><hr></div>');
            })
        },
        error: function(){
            $('#' + type).append('<h3>Kunne ikke laste meldinger</h3>');
        }
    })
}

// Runs method
getUsersPosts(id);

// AJAX to delete post
allPosts.delegate('.delPost', 'click', function() {
    var delPostID = $(this).val();
    var token = $('input[name="_token"]').val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
            method: 'POST',
            url: '../posts',
            data: {
                "id": delPostID,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function (data) {
                console.log(data);
                if(data.status) $("#mypost" + delPostID).slideUp();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
})