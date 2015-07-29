$(document).ready(function(){

	//데이터로드 - 운동한 사람
	var loadMembers = function () {
		var info = $(this).data('info');
		$.ajax({
			url:'load.php',
			type:'get',
			data:{
				requestType: 'member',
				exerciseNo : info.exerciseNo
			}
		}).done(function (msg) {
			console.log(msg);
			if (msg.members.length === 0) {
				$('tbody').append($('<tr><td colspan="5"> 오늘 출석한 회원이 없습니다 </td></tr>'));
				return;
			}
			for (var i in msg.members) {
				var list = $('<tr />')
				.append($('<td />').append(msg.members[i].name))
				.append($('<td />').append(msg.members[i].barcode))
				.append($('<td />').append(msg.members[i].date));
				if(msg.members[i].type === 0) {
					list.append(
						$('<td />').addClass('form-inline col-md-4')
						.append($('<input />').attr('type','text').addClass('form-control'))
						.append(' 개'));
				} else {
					list.append(
						$('<td />').addClass('form-inline col-md-4')
						.append($('<input />').attr('type','text').addClass('form-control'))
						.append(' 분')
						.append($('<input />').attr('type','text').addClass('form-control'))
						.append(' 초'));
				}
				$('tbody').append(list);
			}
		});
	}
	//데이터 로드 - 운동기록
	$.ajax({
		url: 'load.php',
		type: 'get',
		data : {requestType : 'exercise'}
	}).done(function (msg) {
		if (msg.exercises.length === 0) {
			$('tbody').append($('<tr><td colspan="5"> 오늘 운동 안했음 </td></tr>'));
			return;
		}
		for(var i in msg.exercises) {
			var list = $('<li />').append($('<a />').attr('href','#').append(msg.exercises[i].name));
			list.data('info', {
				exerciseNo : msg.exercises[i].no,
				exerciseType : msg.exercises[i].type
			});
			$('ul.exercises').append(list);
			list.click(function (e) {
				e.preventDefault();
				$('ul.exercises>li').removeClass('active');
				$(this).addClass('active');
			});
		}
		$('ul.exercises>li:first-child').addClass('active').each(loadMembers);
	});
	//입력 작업 수행
	$('button[type="submit"]').on("click", function(event){
		var recordRow = $('.recordCol');
		var dataArray = new Array();
		var inputRecord = $('input:text');
		var exerciseType = $('input:hidden');
		alert(recordRow.length);
		for(var i=0;i<recordRow.length;i++){
			var objectData = new Object();
			if(i%4==0){
				objectData.name = recordRow[i];
			} else if(i%4==1){
				objectData.barcode = recordRow[i];
			} else if(i%4==2){
				objectData.time = recordRow[i];
			} else if(i%4==3){
				objectData.exercise = recordRow[i];

				dataArray.push(objectData);
			}
		}

		$.ajax({
			url : '/admin/record/input.php',
			type : 'post',
			data : dataArray,
			success : function(msg){
				alert("no");
				location.reload();
			}
		});
	});
});