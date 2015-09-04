$(document).ready(function () {
    var loadRankers = function () {
        event.stopPropagation();
        $('ul.exercises>li').removeClass('active');
        $(this).addClass('active');
        var info = $(this).data('info');
        $.ajax({
            url:'load.php',
            type:'get',
            data:{
                requestType:'ranking',
                exerciseNo: info.exerciseNo,
                type: info.exerciseType
            }
        }).done(function (msg) {
            $('.rank tbody').empty();
            for (var i in msg.rankers) {
                var list = $('<tr />')
                .append($('<td />').append((i*1)+1))
                .append($('<td />').append(msg.rankers[i].name));
                if(info.exerciseType==='0'){
                    list.append($('<td />').append(msg.rankers[i].count));
                } else {
                    list.append($('<td />').append(msg.rankers[i].time));
                }
                $('.rank tbody').append(list);
            }
        });
    };
    //운동목록 불러오기
    $.ajax({
		url: 'load.php',
		type: 'get',
		data : {requestType : 'exercise'}
	}).done(function (msg) {
		if (msg.exercises.length === 0) {
			$('.rank tbody').append($('<tr><td colspan="3"> 오늘 운동 안했음 </td></tr>'));
			return;
		}
		for(var i in msg.exercises) {
			var list = $('<li />').append($('<a />').attr('href','#')
			.append(msg.exercises[i].name));
			list.data('info', {
				exerciseNo : msg.exercises[i].no,
				exerciseType : msg.exercises[i].type
			});
			$('ul.exercises').append(list);
			list.click(loadRankers);
		}
		// $('ul.exercises').append('<li><i class="fa fa-pencil-square-o"></i> 수정</li>')
		$('ul.exercises>li:first-child').each(loadRankers);
	});
    // Morris.Line({
    //     element:'line-graph',
    //     data:[
    //         {y:'2015-08-20', a:25},
    //         {y:'2015-08-21', a:30},
    //         {y:'2015-08-22', a:20},
    //         {y:'2015-08-23', a:10}
    //     ],
    //     xkey:'y',
    //     ykeys:['a'],
    //     labels:['백분위'],
    //     xLabels:"day"
    // });
});
