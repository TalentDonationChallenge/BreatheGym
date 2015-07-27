$(document).ready(function(){
	//입력 작업 수행

	$(":button").on("click", function(event){
		var recordRow = $('.recordCol');
		for(var i=0;i<recordRow.length;i++){
			
		}
		$.ajax({
			url : '/admin/record/input.php',
			type : 'post',
			data : {
				
			},
			success : function(msg){
				alert("no");
				location.reload();
			}
		});
	});

});