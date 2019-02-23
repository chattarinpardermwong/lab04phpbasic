<?php

//import.php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['name'], 'r');
 fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $data[] = array(
   'player_id'  => $row[0],
   'player_name'  => $row[1],
   'player_gold'  => $row[2]
  );
 }
 echo json_encode($data);
}

?>
