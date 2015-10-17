  //엑셀 버튼을 눌렀을 때 동작하는 exportToExcel.js 파일입니다.
  //table에 있는 내용을 jquery.battatech.excelexport.js 파일을 이용하여 엑셀파일로 다운로드 해주게 합니다.
  //윈도우버전에서는 잘 되는데 맥 버전에서는..... table 과 tr,td 등 table attr 모두 나오네요... 이부분은 계속 보면서 수정하겠습니다.

  
 $(document).ready(function () {

        var btn = $('#export');
        

        btn.on('click', function () {
            
            var fileName = "회원리스트.xls";
            var uri = $("#memberlist").battatech_excelexport({
                containerid: tbl
                , datatype: 'table'
                
            });

           
            
        });
    });