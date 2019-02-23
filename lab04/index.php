<?php

//index.php

?>
<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
 </head>
 <body>
  <div class="container">
   <br />
   <form id="upload_csv" method="post" enctype="multipart/form-data">
    <div class="col-3">
    </div>  
                <div class="col-4">  
                   <input type="file" name="csv_file" id="csv_file" accept=".csv"/>
                </div>  
                <div class="col-5">  
                    <input type="submit" name="upload" id="upload" value="Upload CSV File to see the table" class="btn btn-success" />
                </div>  
                <div style="clear:both"></div>
   </form>
   <a href="tbl_player.csv" >Download CSV file</a>
   <br />
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered" id="data-table">
     <thead>
      <tr>
       <th>Player ID</th>
       <th>Player Name</th>
       <th>Player Gold</th>
      </tr>
     </thead>
    </table>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type = "file" name = "file">
      <button type="submit" name = "submit">Upload image here</button>
    </form>
   </div>
  </div>
 </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>

$(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"import.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(jsonData)
   {
    $('#csv_file').val('');
    $('#data-table').DataTable({
     data  :  jsonData,
     columns :  [
      { data : "player_id" },
      { data : "player_name" },
      { data : "player_gold" }
     ]
    });
   }
  });
 });
});

</script>
