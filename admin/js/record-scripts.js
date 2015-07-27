$(document).ready(function(){
	//입력 작업 수행

	$(":button").on("click", function(event){
		$insertObject={};
		
		$.ajax({
			url : 'input.php',
			type : 'post',
			success : function(msg){
				location.reload();
			}
		});
	});

});