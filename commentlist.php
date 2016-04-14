<?php
include "db.php";
header("Content-type: text/javascript");

$userid = $_GET['userid'];
$sql = "SELECT * FROM comment where comment_by = '$userid'";
$result = mysql_query($sql);
$num_rows = $result;

  $druglist =  array();
  while($row = mysql_fetch_array($result)){   
  $rows =  array(
				 "comment_writer" => $row['comment_by'],
				 "comment" => $row['comment']
                 ); 
		 array_push($druglist, $rows);
        }
	
	echo json_encode($druglist);



?>