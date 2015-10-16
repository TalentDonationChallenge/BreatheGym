$(document).ready(function () {
    var unload = true;
    $(window).on('beforeunload', function () {
        if(unload) {
            $('td .delete').click();
        }
    });
    $('nav>button.submit').click(function (event) {
        event.preventDefault();
        //여기 예외처리해야함
        if($('input[type="text"]').val()===''||$('textarea').val()===''){
            // 에러메시지 띄우기
            return;
        } else {
            // 예외처리따위 할시간이 없음
            var files = [];
            $('tr.template-download').each(function () {
                files.push($(this).data('data'));
            });
            $.ajax({
                url: 'add.php',
                method:'post',
                data : {
                    requestType: 'posting',
                    title: $("#title").val(),
                    content : $("textarea").val(),
                    files : files
                }
            }).done(function (msg) {
                location.reload();
                //msg로 글번호 불러와서 디비연결만 하면됨
            });
        // }
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
