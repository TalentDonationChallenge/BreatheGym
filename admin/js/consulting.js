$(document).ready(function(){
    $('button.submit').click(function () {
        $.ajax({
            url: 'writeReply.php',
            method:'post',
            data : {
                origin:$('.panel-heading').attr('no'),
                content:$('.answer').val()
            }
        }).done(function () {
            location.reload();
        });
    });
});
