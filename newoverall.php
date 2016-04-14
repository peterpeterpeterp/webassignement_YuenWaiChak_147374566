<?php
include ('db.php');
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

$comment = "";

switch ($method) {

	
	 
   case 'PUT':

  break;
  
  
  
  
  case 'POST':
  $a = $_POST['comment'];
  $b = $_POST['userid'];
 
  $sql = "insert into comment (comment, comment_by) VALUES('$a', '$b');";
  $result = mysql_query($sql);
  $sql = "select * from comment;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result))
	{
		if ($b == $row['comment_by']) {
			$comment =  $b . ": " . $row['comment'];
			break;
		}
		else {
			$comment = "";
		}
 }
  break;
  
  case 'DELETE':
    $sql = "delete `$table` where id=$key"; break;
}

echo $comment;
?>