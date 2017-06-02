//// AJAX to load messages ////


var allMessages = $('#to');
var name = '';


// Method to fetch all messages
function getMessages(id, type){
    
    $.ajax({
        url: '../api/messages/' + type + '/' + id,
        success: function(messages) {
            $.each(messages, function(i, message){
                var username = ((type == 'to') ? 'Melding fra: <b>' + message.sender.name + '</b>' : 'Melding til: <b>' +  message.reciever.name + '</b>');
                var reply = ((type == 'to')) ? '<button type="button" class="replyBtn" data-toggle="modal" data-target="#messageModal" data-from="'+ message.sender.name +'" data-rec="'+ message.from +'">Svar</button>' : '';
                
                $('#' + type).prepend('<p>Sendt: '+ message.created_at +'</p><p>'+ username +'</p><h3>'+ message.title +'</h3><p>'+ message.content +'</p>'+ reply +'<hr>');
            })
        },
        error: function(){
            $('#' + type).append('<h3>Kunne ikke laste meldinger</h3>');
        }
    })
}

// Runs the method twice, once for inbox and once for sent messages
getMessages(id, 'to');
getMessages(id, 'from');

// Presents the modal with info
allMessages.delegate('.replyBtn', 'click', function() {
    name = $(this).data('from');
    var id = $(this).data('rec');
    var modal = $('#messageModal')
    var button = $(event.relatedTarget)
    var recipient = button.data('from')
    modal.find('.modal-title').text('Melding til ' + name)
    modal.find('input[name=reciever]').val(id);
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
            $('#modal-error').html('<div class="alert alert-danger" role="alert"></span><span class="sr-only">Error:</span>Melding-feltet er påkrevd</div>');
        } else if (errors.title && !errors.content) {
            $('#modal-error').html('<div class="alert alert-danger" role="alert"></span><span class="sr-only">Error:</span>Tittel-feltet er påkrevd</div>');
        } else if (errors.title && errors.content){
            $('#modal-error').html('<div class="alert alert-danger" role="alert"></span><span class="sr-only">Error:</span>Dy må fylle ut begge feltene</div>');
        }
      }
    });      
}); 