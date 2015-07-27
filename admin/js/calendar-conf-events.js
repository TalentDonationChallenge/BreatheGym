$(document).ready(function () {
	var colorDetermine = function (obj, eventObject) { // 색깔 결정하는 함수
		var colorObject = {
			theme : '#68dff0',
			success : '#5cb85c',
			info : '#5bc0de',
			warning : '#f0ad4e',
			danger : '#d9534f',
			'default' : '#999'
		};
		if (obj.hasClass('label-theme'))
			eventObject.color = colorObject.theme;
		else if (obj.hasClass('label-success'))
			eventObject.color = colorObject.success;
		else if (obj.hasClass('label-info'))
			eventObject.color = colorObject.info;
		else if (obj.hasClass('label-warning'))
			eventObject.color = colorObject.warning;
		else if (obj.hasClass('label-danger'))
			eventObject.color = colorObject.danger;
		else if (obj.hasClass('label-default'))
			eventObject.color = colorObject.default;
	}
	var bindEventData = function () { // 운동 정보를 스케줄 오브젝트로 만들기
		var eventObject = {
			title: $.trim($(this).text()),
			no : $(this).attr('no'),
			durationEditable : false
		};
		colorDetermine($(this), eventObject);
		$(this).data('eventObject', eventObject);
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
	}

	/* initialize the external events
	 -----------------------------------------------------------------*/
	$('#exercises .exercise').each(bindEventData);

	/* initialize the calendar
	 -----------------------------------------------------------------*/
	 var d = new Date();
	$('#calendar').fullCalendar({
		lang : 'ko',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek'
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
			// // retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var events = $('#calendar').fullCalendar('clientEvents', function (e) {
				return date.format() === e.start.format();
			});
			for (var i in events) {
				if (events[i].no === originalEventObject.no) {
					alert('이미 추가한 운동입니다');
					return;
				}
			}
			$.ajax({ //스케줄을 DB에 추가하기
				url: 'insert.php',
				type : 'post',
				data : {
					requestType : 'schedule',
					no : originalEventObject.no,
					date : date.format()
				},
				success : function (msg) {
					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject);

					// assign it the date that was reported
					copiedEventObject.start = date;
					copiedEventObject.allDay = allDay;

					// render the event on the calendar
					// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
					$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				}
			});
		},
		events : function (start, end, timezone, callback) {
			$.ajax({
				url: 'load.php',
				dataType: 'json',
				data : {
					requestType : 'schedule',
					start : start.format(),
					end : end.format()
				},
				success : function (msg) {
					for (var i in msg.schedule) {
						var exercise = $('.exercise[no="'+msg.schedule[i].no+'"]');
						colorDetermine(exercise, msg.schedule[i]);
						msg.schedule[i].durationEditable = false;
					}
					callback(msg.schedule);
				}
			});
		},
		eventMouseover : function (event, jsEvent, view) {
			$(this).find('.fc-content').append('<i class="fa fa-times pull-right"></i>');
			$(this).find('i').data('id', event._id);
		},
		eventMouseout : function (event, jsEvent, view) {
			$(this).find('i').remove();
		},
		allDayDefault : true
	});

	/* 운동추가창 만들기 */
	$("#add-exercise-form").focusin(function () {
		event.stopPropagation();
		$("#exercise-spec").removeClass("hidden");
	});
	$("#add-exercise-form").click(function () {
		event.stopPropagation();
	});
	$("body").click(function () {
		$("#exercise-spec").addClass("hidden");
	});
	$("input[name='exercise-type']").click(function () {
		$("#time-spec").toggleClass("hidden");
		$("#count-spec").toggleClass("hidden");
	});

	/* 운동 추가하기 */

	$("#add-exercise-form .btn-insert").click(function () {
		var insertObject = { requestType : 'exercise' };
		if ($('#exercise-name').val()===''){ // 운동이름 제한 규칙을 어떻게 둬야 할까?
			alert("운동이름을 입력해주세요");
			return;
		}
		insertObject.name = $('#exercise-name').val();
		if ($("input[name='exercise-type']:checked").val()==="time"){
			if ($("#minute").val()>59 || $("#second").val()>59
			|| ($("#minute").val()==='' && $("#second").val() === '')) {
				alert("값이 올바르지 않습니다");
				return ;
			}
			insertObject.type = 'time';
			insertObject.minute = $('#minute').val();
			insertObject.second = $('#second').val();
		} else if ($("input[name='exercise-type']:checked").val()==="count") {
			if ($("#count").val() === '' || isNaN($('#count').val())) { // isNaN은 숫자인 경우 false, 문자가 섞인경우 true를 반환
				alert('값이 올바르지 않습니다.');
				return ;
			}
			insertObject.type = 'count';
			insertObject.count = $('#count').val();
		}
		$.ajax({
			url:"insert.php",
			method:"post",
			data: insertObject
		}).done(function (msg){
			location.reload(); // 그냥 새로고침을 하는게 더 나아보인다
		}).fail(function (msg) {
			alert('서버 오류가 발생하여 운동을 추가하는데 실패하였습니다.');
			location.reload();
		});
	});

	/* 운동목록 삭제하기 */
	$(document).on('mouseenter', '.exercise', function () {
		$(this).find('span').addClass("fa fa-minus-circle remove");
		$('#exercises').css({'margin-right': 0});
	});
	$(document).on('mouseleave', '.exercise', function () {
		$(this).find('span').removeClass("fa fa-minus-circle remove");  
		$('#exercises').css({'margin-right': '20px'});
	});
	$(document).on('click', '.exercise .remove', function () {
		var exercise = $(this).parent();
		$.ajax({
			url:"delete.php",
			method:"post",
			data: {requestType: 'exercise', no : exercise.attr('no')}
		}).done(function (msg){
			location.reload();
		}).fail(function (msg) {
			alert('서버 오류가 발생하여 운동을 삭제하는데 실패하였습니다.');
			location.reload();
		});
	});

	//스케줄 삭제하기
	$(document).on('click', '.fc-content i', function () {
		var schedule = $('#calendar').fullCalendar('clientEvents', $(this).data('id'));
		$.ajax({ //스케줄을 DB에서 삭제하기
			url: 'delete.php',
			type : 'post',
			data : {
				requestType : 'schedule',
				no : schedule[0].no,
				date : schedule[0].start.format()
			},
			success : function (msg) {
				$('#calendar').fullCalendar('removeEvents', schedule[0]._id);
			}
		});
	});

});