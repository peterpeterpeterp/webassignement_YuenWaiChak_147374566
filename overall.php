<?php
include ('db.php');
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

$num_row=0;
$comment = "";

switch ($method) {
  case 'GET':
  $a = $_GET['userid'];
  $b = $_GET['password'];

    $sql = "select * from users where userid = '$a' and password = '$b'";
	$result = mysql_query($sql);
	$num_row = mysql_num_rows($result);
	
/*8
	while ($row = mysql_fetch_assoc($result))
	{
		if ($a == $row["userid"] && $b == $row["passsword"] ) {
			$num_row = 1;
			break;
		}
		else {
			$num_row = 0;
		}
 }
*/
	
	 break;
	 
   case 'PUT':
  parse_str(file_get_contents("php://input"),$post_vars);
  $a = $_post_vars['comment'];
  $b = $_post_vars['userid'];
  $sql = "insert into comment (comment, comment_by) VALUES('$a', '$b');";
  $result = mysql_query($sql);
  $num_row = $result; 
  $sql = "select * from comment;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result))
	{
		if ($b == $row["comment_by"]) {
			$comment = $b + ": " + $row["comment"];
			break;
		}
		else {
			$comment = "";
		}
 }
  break;
  
  
  
  
  case 'POST':
  $a = $_POST['userid'];
  $b = $_POST['password'];
  $sql = "insert into users (userid, password) VALUES('$a', '$b');";
  $result = mysql_query($sql);
  $num_row = $result; 
 
  break;
  case 'DELETE':
    $sql = "delete `$table` where id=$key"; break;
}

if ($num_row != 0 && $comment != "") {
	echo $comment;
}
else {
echo $num_row;
}
?>