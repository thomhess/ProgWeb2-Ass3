var allMessages = $('#to');

function getMessages(id, type){
    
    $.ajax({
        url: '../api/messages/' + type + '/' + id,
        success: function(messages) {
            $.each(messages, function(i, message){
                var username = ((type == 'to') ? 'Melding fra: <b>' + message.sender.name + '</b>' : 'Melding til: <b>' +  message.reciever.name + '</b>');
                var reply = ((type == 'to')) ? '<button type="button" class="replyBtn" data-toggle="modal" data-target="#messageModal" data-from="'+ message.sender.name +'" data-rec="'+ message.from +'">Svar</button>' : '';
                
                $('#' + type).append('<p>'+ username +'</p><h3>'+ message.title +'</h3><p>'+ message.content +'</p>'+ reply +'<hr>');
            })
        },
        error: function(){
            $('#' + type).append('<h3>Kunne ikke laste meldinger</h3>');
        }
    })
}

getMessages(id, 'to');
getMessages(id, 'from');

allMessages.delegate('.replyBtn', 'click', function() {
    var name = $(this).data('from');
    var id = $(this).data('rec');
    var modal = $('#messageModal')
    var button = $(event.relatedTarget)
    var recipient = button.data('from')
    modal.find('.modal-title').text('Melding til ' + name)
    modal.find('input[name=reciever]').val(id);
})

$("#messageModal").delegate('#sendMessage', 'click', function() {         
    var token = $('input[name="_token"]').val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
      url: '/public/messages',
      type: "post",
      data: {
          'title':$('input[name=title]').val(), 
          'content':$('textarea[name=content]').val(), 
          'to':$('input[name=reciever]').val(), 
          '_token': token},
      success: function(data){
        console.log(data);
      }
    });      
  }); 