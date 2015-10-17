 $(document).ready(function () {
//alert("click");
    
    	
    	//alert("호점 : " + no);     
        var btn = $('#export');
        var tbl = 'memberlist';

        btn.on('click', function () {
            //alert("click");
            //alert("btn : " + btn);
            var fileName = "회원리스트.xls";
            alert("fileName : " + fileName);
            var uri = $("#memberlist").battatech_excelexport({
                containerid: tbl
                , datatype: 'table'
                
            });

           
            
        });
    });