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
            if (msg.rankers.length === 0) {
                $('.rank tbody').append($('<tr><td colspan="3"> 아직 입력 안됨 <td/></tr>'));
                return;
            }
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
    var lineChartSetting = { //꺾은선 그래프 설정
        animation: false,
        showScale: false,
        responsive: true,
        scaleShowGridLines : false,
        bezierCurve : false,
        pointDot : true,
        datasetStroke : false,
        datasetFill : false
    };
    var monthlyJoinedChart = new Chart($("#line-graph").get(0).getContext("2d")).Line({
        labels: ['10일','10일','10일','10일','10일','10일','10일','10일','10일','10일'],
        datasets:[{
            label: "월별 가입회원수",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data : [20, 40, 36, 37, 65, 49, 36, 50, 50, 66, 55, 68]
        }]
    },lineChartSetting);
});
