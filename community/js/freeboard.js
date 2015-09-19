$(document).ready(function () {
    $('.btn-write').click(function () {
        location.href="write.php";
    });
    $('nav>button.submit').click(function () {
        //여기 예외처리해야함
        $.ajax({
            url: 'add.php',
            method:'post',
            data : {
                requestType: 'posting',
                title: $("#title").val(),
                content : $("textarea.write").val()
            }
        }).done(function () {
            location.href="index.php";
        });
    });
    $('.box-reply .btn-option').click(function () {
        $.ajax({
            url: 'add.php',
            method: 'post',
            data : {
                requestType: 'comment',
                content : $('.write-comm textarea').val(),
                postNumber : $('.panel-heading').attr('no')
            }
        }).done(function () {
            location.reload();
        });
    });
});
