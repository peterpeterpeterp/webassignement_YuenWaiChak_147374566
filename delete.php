<?php
include "db.php";

$comment = $_GET['comment'];


	$sql = "delete from comment where comment = '$comment';";
	$result = mysql_query($sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>