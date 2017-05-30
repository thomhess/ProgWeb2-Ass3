var username = null;

function getMessages(id, type){
    $.ajax({
        url: '../api/messages/' + type + '/' + id,
        success: function(messages) {
            $.each(messages, function(i, message){
                var username = ((type == 'to') ? 'Melding fra: <b>' + message.sender.name + '</b>' : 'Melding til: <b>' +  message.reciever.name + '</b>');
                $('#' + type).append('<p>'+ username +'</p><h3>'+ message.title +'</h3><p>'+ message.content +'</p><hr>');
            })
        },
        error: function(){
            $('#' + type).append('<h3>Kunne ikke laste meldinger</h3>');
        }
    })
}


getMessages(id, 'to');
getMessages(id, 'from');