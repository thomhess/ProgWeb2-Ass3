// Presents modal with info
$('.replyBtn').on('click', function() {
    var modal = $('#messageModal')
    var button = $(event.relatedTarget)
    modal.find('.modal-title').text('Melding til ' + username)
    modal.find('input[name=reciever]').val(userid);
})

// AJAX to send post-request for each new message
$("#messageModal").delegate('#sendMessage', 'click', function() {         
    var token = $('input[name="_token"]').val();
    var title = $('input[name=title]').val();
    var content = $('textarea[name=content]').val();
    var reciever = $('input[name=reciever]').val();
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: '../messages',
        type: "post",
        data: {
          'title': title, 
          'content':content, 
          'to':reciever, 
          '_token': token
        },
        success: function(data){
            console.log(data);
              $('.modal-body').html('<h2>Melding sendt!</h2>');
              $('.modal-footer').html('<button type="button" class="btn btn-primary" data-dismiss="modal">Lukk</button>');
              $('#from').prepend('<p>Melding til: <b>'+ name +'</b></p><h3>'+ title +'</h3><p>'+ content +'</p><hr>');
        },
        error: function(data){
        var errors = data.responseJSON;
        //console.log(errors);
        if (errors.content && !errors.title){
            $('.modal-error').html('<div class="alert alert-danger" role="alert"></span><span class="sr-only">Error:</span>Melding-feltet er påkrevd</div>');
        } else if (errors.title && !errors.content) {
            $('.modal-error').html('<div class="alert alert-danger" role="alert"></span><span class="sr-only">Error:</span>Tittel-feltet er påkrevd</div>');
        } else if (errors.title && errors.content){
            $('.modal-error').html('<div class="alert alert-danger" role="alert"></span><span class="sr-only">Error:</span>Dy må fylle ut begge feltene</div>');
        }
      }
    });      
}); 