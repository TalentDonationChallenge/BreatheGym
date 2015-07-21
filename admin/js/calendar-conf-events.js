$(document).ready(function () {
    /* 저장된 운동목록 불러오기 */
    

    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#exercises .exercise').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    /* initialize the calendar
     -----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	$('#calendar').fullCalendar({
	    header: {
	        left: 'prev,next today',
	        center: 'title',
	        right: 'month,basicWeek,basicDay'
	    },
	    editable: true,
	    droppable: true, // this allows things to be dropped onto the calendar !!!
	    drop: function(date, allDay) { // this function is called when something is dropped

	        // retrieve the dropped element's stored Event Object
	        var originalEventObject = $(this).data('eventObject');

	        // we need to copy it, so that multiple events don't have a reference to the same object
	        var copiedEventObject = $.extend({}, originalEventObject);

	        // assign it the date that was reported
	        copiedEventObject.start = date;
	        copiedEventObject.allDay = allDay;

	        // render the event on the calendar
	        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
	        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

	        // is the "remove after drop" checkbox checked?
	        if ($('#drop-remove').is(':checked')) {
	            // if so, remove the element from the "Draggable Events" list
	            $(this).remove();
	        }

	    },
	    events: [
	        // {
	        //     title: 'All Day Event',
	        //     start: new Date(y, m, 1)
	        // },
	        // {
	        //     title: 'Long Event',
	        //     start: new Date(y, m, d-5),
	        //     end: new Date(y, m, d-2)
	        // },
	        // {
	        //     id: 999,
	        //     title: 'Repeating Event',
	        //     start: new Date(y, m, d-3, 16, 0),
	        //     allDay: false
	        // },
	        // {
	        //     id: 999,
	        //     title: 'Repeating Event',
	        //     start: new Date(y, m, d+4, 16, 0),
	        //     allDay: false
	        // },
	        // {
	        //     title: 'Meeting',
	        //     start: new Date(y, m, d, 10, 30),
	        //     allDay: false
	        // },
	        // {
	        //     title: 'Lunch',
	        //     start: new Date(y, m, d, 12, 0),
	        //     end: new Date(y, m, d, 14, 0),
	        //     allDay: false
	        // },
	        // {
	        //     title: 'Birthday Party',
	        //     start: new Date(y, m, d+1, 19, 0),
	        //     end: new Date(y, m, d+1, 22, 30),
	        //     allDay: false
	        // },
	        // {
	        //     title: 'Click for Google',
	        //     start: new Date(y, m, 28),
	        //     end: new Date(y, m, 29),
	        //     url: 'http://google.com/'
	        // }
	    ]
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
		if ($("input[name='exercise-type']").val()==="time"){
			if ($("#minute").val()>59 || $("#second").val()>59
			|| ($("#minute").val()==='' && $("#second").val() === '')) {
				alert("값이 올바르지 않습니다");
				return ;
			}
			insertObject.type = 'time';
			insertObject.minute = $('#minute').val();
			insertObject.second = $('#second').val();
		} else if ($("input[name='exercise-type']").val()==="count") {
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
			var colors = ['theme', 'success', 'info', 'warning', 'danger', 'default'];
			$('#exercises').append('<div>'+insertObject.name+'<span></span></div>');
			$('#exercises>div:last-child')
			.addClass('exercise label label-'+colors[$('.exercise').size()%6]).attr('no', msg.no)
			.draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		}).fail(function (msg) {
			alert('서버 오류가 발생하여 운동을 추가하는데 실패하였습니다.');
			location.reload();
		});
	});

/* 운동목록 삭제하기 */
	$(document).on('mouseenter', '.exercise', function () {
		$(this).find('span').addClass("fa fa-minus-circle remove");
	});
	$(document).on('mouseleave', '.exercise', function () {
		$(this).find('span').removeClass("fa fa-minus-circle remove");  
	});
	$(document).on('click', '.remove', function () {
		var exercise = $(this).parent();
		$.ajax({
			url:"delete.php",
			method:"post",
			data: {requestType: 'exercise', no : exercise.attr('no')}
		}).done(function (msg){
			exercise.remove(); 
		}).fail(function (msg) {
			alert('서버 오류가 발생하여 운동을 삭제하는데 실패하였습니다.');
			location.reload();
		});
	});
});