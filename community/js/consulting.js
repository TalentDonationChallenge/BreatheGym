$(document).ready(function(){
    $('button.btn-primary').click(function () {
        $.ajax({
            url: 'add.php',
            method:'post',
            data : {
                title:$('#title').val(),
                content:$('.write').val()
            }
        }).done(function () {
            location.reload();
        });
    });
});
