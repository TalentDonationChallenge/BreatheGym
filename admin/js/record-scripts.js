$(document).ready(function(){

	//데이터로드 - 운동한 사람
	var loadMembers = function () {
		$('ul.exercises>li').removeClass('active');
		$(this).addClass('active');
		var info = $(this).data('info');
		$.ajax({
			url:'load.php',
			type:'get',
			data:{
				requestType: 'member',
				exerciseNo : info.exerciseNo
			}
		}).done(function (msg) {
			$('tbody').empty();
			if (msg.members.length === 0) {
				$('tbody').append($('<tr><td colspan="5"> 오늘 출석한 회원이 없습니다 </td></tr>'));
				return;
			}
			for (var i in msg.members) {
				var list = $('<tr />')
				.append($('<td />').append(msg.members[i].name))
				.append($('<td />').append(msg.members[i].barcode))
				.append($('<td />').append(msg.members[i].date));
				if(info.exerciseType === '0') {
					list.append(
						$('<td />').addClass('form-inline col-md-4')
						.append($('<input />').attr('type','number').attr('name','count')
							.addClass('form-control'))
						.append(' 개'));
				} else {
					list.append(
						$('<td />').addClass('form-inline col-md-4')
						.append($('<input />').attr('type','number').attr('name','minute')
							.addClass('form-control'))
						.append(' 분')
						.append($('<input />').attr('type','number').attr('name','second')
							.addClass('form-control'))
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
			list.click(loadMembers);
		}
		$('ul.exercises>li:first-child').each(loadMembers);
	});
	//입력 작업 수행
	$('button[type="submit"]').click(function (e) {
		var info = $('.exercises>li.active').data('info');
		var memberRecords = [];
		$('tbody').find('tr').each(function () {
			if ($(this).find('input').val() === '' || $(this).find('input:nth-child(2)').val() === '') return;
			var memberRecord = {
				barcode : $(this).find('td:nth-child(2)').text()
			};
			if (info.exerciseType === '0') {
				memberRecord.record = $(this).find('input[name="count"]').val();
			} else {
				memberRecord.record = {
					minute : $(this).find('input[name="minute"]').val(),
					second : $(this).find('input[name="second"]').val()
				};
			}
			memberRecords.push(memberRecord);
		});
		$.ajax({
			url:'input.php',
			type:'post',
			data: {
				members : memberRecords,
				exercise : info
			}
		}).done(function (msg) {
			$('ul.exercises>li.active').each(loadMembers);
			console.console.log('testing');
		});
	});
});
