$(document).ready(function () {

	/* initialize the calendar
	 -----------------------------------------------------------------*/
	$('#calendar').fullCalendar({
		lang : 'ko',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek'
		},
		defaultView : 'basicWeek',
		editable: false,
		events : function (start, end, timezone, callback) {
			$.ajax({
				url: 'load.php',
				dataType: 'json',
				data : {
					requestType : 'exercises',
					start : start.format(),
					end : end.format()
				},
				success : function (msg) {
					//색깔정하기 만들어야함
					callback(msg.exercises);
				}
			});
		},
		eventClick : function (calEvent, jsEvent, view) {
			$('.exercise-info-view>h4').empty();
			$('.exercise-info-view>p').empty();
			$.ajax({
				url: 'load.php',
				data : {
					requestType : 'exercise',
					no : calEvent.no
				}
			}).done(function (msg) {
				$('.exercise-info-view>h4').html(msg.exercise.name);
				$('.exercise-info-view .memo').html(msg.exercise.memo);
				if (msg.exercise.type === '0') {
					$('.exercise-info-view .type').html('시간');
					var time = moment(msg.exercise.time, 'HH:mm:ss');
					$('.exercise-info-view .time').removeClass('hidden')
					.html(time.minute()+'분 '+time.second()+'초');
					$('.exercise-info-view .count').addClass('hidden');
				} else if (msg.exercise.type === '1') {
					$('.exercise-info-view .type').html('횟수');
					$('.exercise-info-view .count').removeClass('hidden')
					.html(msg.exercise.count+'회');
					$('.exercise-info-view .time').addClass('hidden');
				}
				$('#exercise-spec').addClass('hidden');
				$('.exercise-info-view').removeClass('hidden');
			});
		},
		aspectRatio : 1.8,
		allDayDefault : true,
		weekends : false
	});

	/* 운동추가창 만들기 */
	$('#add-exercise-form').focusin(function () {
		event.stopPropagation();
		$('.exercise-info-view').addClass('hidden');
		$('#exercise-spec').removeClass('hidden');
	});
	$('#add-exercise-form').click(function () {
		event.stopPropagation();
	});
	$('body').click(function () {
		$('#exercise-spec').addClass('hidden');
		$('.exercise-info-view').addClass('hidden');
	});
	$('input[name="exercise-type"]').click(function () {
		$('#time-spec').toggleClass('hidden');
		$('#count-spec').toggleClass('hidden');
	});
	$('.fc-view-container').click(function () {
		event.stopPropagation();
	});
	/* 날짜 선택하기 */

	$('.fc-day').click(function () {
		var isSelected = $(this).hasClass('selected');
		$('.fc-day').removeClass('selected');
		if(!isSelected){
			$(this).addClass('selected');
		}
	});

	/* 운동 추가하기 */

	$('#add-exercise-form .btn-insert').click(function () {
		var insertObject = {};
		if ($('#exercise-name').val()===''){ // 운동이름 제한 규칙을 어떻게 둬야 할까?
			$('.alert').html('운동이름을 입력해주세요');
			$('.alert').css('display','block');
			$('.alert').fadeOut(2000, function () {
				$(this).empty();
			});
			return;
		}
		insertObject.name = $('#exercise-name').val();
		if ($('input[name="exercise-type"]:checked').val()==='time'){
			if ($('#minute').val()>59 || $('#second').val()>59
			|| ($('#minute').val()==='' && $('#second').val() === '')) {
				$('.alert').html('값이 올바르지 않습니다');
				$('.alert').css('display','block');
				$('.alert').fadeOut(2000, function () {
					$(this).empty();
				});
				return ;
			}
			insertObject.type = 'time';
			insertObject.minute = $('#minute').val();
			insertObject.second = $('#second').val();
		} else if ($('input[name="exercise-type"]:checked').val()==='count') {
			if ($('#count').val() === '' || isNaN($('#count').val())) { // isNaN은 숫자인 경우 false, 문자가 섞인경우 true를 반환
				$('.alert').html('값이 올바르지 않습니다');
				$('.alert').css('display','block');
				$('.alert').fadeOut(2000, function () {
					$(this).empty();
				});
				return ;
			}
			insertObject.type = 'count';
			insertObject.count = $('#count').val();
		}
		if ($('.fc-day.selected').attr('data-date')===undefined) {
			$('.alert').html('날짜를 선택해 주세요');
			$('.alert').css('display','block');
			$('.alert').fadeOut(2000, function () {
				$(this).empty();
			});
			return;
		}
		insertObject.date = $('.fc-day.selected').attr('data-date');
		insertObject.memo = $('#memo').val();
		$.ajax({
			url:'insert.php',
			method:'post',
			data: insertObject
		}).fail(function (msg) {
			$('.alert').html('서버오류가 발생하여 운동을 추가하는데 실패하였습니다');
			$('.alert').css('display','block');
			$('.alert').fadeOut(2000, function () {
				$(this).empty();
				location.reload();
			});
		}).done(function (msg){
			location.reload(); // 그냥 새로고침을 하는게 더 나아보인다
		});
	});

	/* 운동목록 삭제하기 */
	// $(document).on('mouseenter', '.exercise', function () {
	// 	$(this).find('span').addClass('fa fa-minus-circle remove');
	// 	$('#exercises').css({'margin-right': 0});
	// });
	// $(document).on('mouseleave', '.exercise', function () {
	// 	$(this).find('span').removeClass('fa fa-minus-circle remove');
	// 	$('#exercises').css({'margin-right': '20px'});
	// });
	// $(document).on('click', '.exercise .remove', function () {
	// 	var exercise = $(this).parent();
	// 	$.ajax({
	// 		url:'delete.php',
	// 		method:'post',
	// 		data: {requestType: 'exercise', no : exercise.attr('no')}
	// 	}).done(function (msg){
	// 		location.reload();
	// 	}).fail(function (msg) {
	// 		alert('서버 오류가 발생하여 운동을 삭제하는데 실패하였습니다.');
	// 		location.reload();
	// 	});
	// });
	//
	// //스케줄 삭제하기
	// $(document).on('click', '.fc-content i', function () {
	// 	var schedule = $('#calendar').fullCalendar('clientEvents', $(this).data('id'));
	// 	$.ajax({ //스케줄을 DB에서 삭제하기
	// 		url: 'delete.php',
	// 		type : 'post',
	// 		data : {
	// 			requestType : 'schedule',
	// 			no : schedule[0].no,
	// 			date : schedule[0].start.format()
	// 		},
	// 		success : function (msg) {
	// 			$('#calendar').fullCalendar('removeEvents', schedule[0]._id);
	// 		}
	// 	});
	// });

});
