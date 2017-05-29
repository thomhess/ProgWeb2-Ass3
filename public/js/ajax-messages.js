function getMessages(id, type){
    $.ajax({
        url: '/public/api/messages/' + type + '/' + id,
        success: function(messages) {
            $.each(messages, function(i, message){
                $('#' + type).append('<h3>'+ message.title +'</h3><p>'+ message.content +'</p><hr>');
            })
        },
        error: function(){
            $('#' + type).append('<h3>Kunne ikke laste meldinger</h3>');
        }
    })
}

getMessages(id, 'from');
getMessages(id, 'to');