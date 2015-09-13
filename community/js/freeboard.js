$(document).ready(function () {
    $('.btn-write').click(function () {
        location.href="write.php";
    });
    $('nav>button.submit').click(function () {
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
});
