var username = null;
var allPosts = $('#allPosts');

function getUsersPosts(id){
    $.ajax({
        url: '../api/posts/user/' + id,
        success: function(posts) {
            $.each(posts, function(i, post){
                $('#allPosts').append('<div id="mypost'+ post.id +'"><h3>'+ post.title +'</h3><p>'+ post.body +'</p><button class="delPost" value="' + post.id + '" onclick="delPost('+ post.id +')">Slett</button><hr></div>');
            })
        },
        error: function(){
            $('#' + type).append('<h3>Kunne ikke laste meldinger</h3>');
        }
    })
}


/*allPosts.delegate('.delPost', 'click', function() {
    
    console.log($(this).val());
    
    $.ajax({
            type: "DELETE",
            url: '../api/posts/' + $(this).val(),
            data: { "_token": "{{ csrf_token() }}" },
            success: function (data) {

                $("#mypost" + delPostID).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
}) */

/*function delPost(delPostID){
    console.log(delPostID);
    
    var token = $('#token').val();
    
    $.ajax({
            type: "DELETE",
            url: '../api/posts/' + delPostID,
            success: function (data) {

                $("#mypost" + delPostID).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
}*/


getUsersPosts(id);