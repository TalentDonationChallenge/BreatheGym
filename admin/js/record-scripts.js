$(document).ready(function(){
	//입력 작업 수행

	$(":button").on("click", function(event){
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