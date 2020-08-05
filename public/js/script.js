        $(document).ready(function(){

            // update category

        $('.editdata').on('click',function(){
           $('#updateCategory');
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                $('#update_id').val(data[0]);
                $('#edit').val(data[1]);
		    });
       

            // remove category

        $('.deletedata').on('click',function(){
            $('#removeCategory');
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                $('#delete_id').val(data[0]);
		    });
    });


        function myFunction() {
          var inputSearch = document.getElementById("search");
          var inputName = document.getElementById("name");
          var filter = inputSearch.value.toUpperCase();
          var table = document.getElementById("table");
          var tr = table.getElementsByTagName("tr");
          for (var i = 0; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              textValue = td.textContent || td.innerText;
              if (textValue.toUpperCase().indexOf(filter) > -1 ) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }

