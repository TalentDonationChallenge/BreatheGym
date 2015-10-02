$(document).ready(function () {
    $('#calendar').fullCalendar({
        lang:'ko',
        header: {
			left: 'prev,next',
			center: 'title',
			right: ''
		},
		defaultView : 'month'
    });
});
