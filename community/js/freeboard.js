$(document).ready(function () {
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
    $('.hit-reply .delete').click(function () {
        var postNo = $('.panel-heading').attr('no');
        $.ajax({
            url: 'delete.php',
            method: 'post',
            data : {
                requestType : 'posting',
                no : postNo
            }
        }).done(function () {
            location.reload();
        });
    });
    $('.box-reply .btn-option').click(function () { // 댓글 작성
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
    $('.box-reply .delete').click(function () { // 댓글 삭제
        var commentNo = $(this).parent().attr('no');
        $.ajax({
            url: 'delete.php',
            method: 'post',
            data : {
                requestType : 'comment',
                no : commentNo
            }
        }).done(function () {
            location.reload();
        });
    })
});
