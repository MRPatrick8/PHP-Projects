<?php 
	session_start();
	require("config.php");
	
	// if(!isset($_SESSION["login_info"])){
	// 	header("location:index.php");
	// }
	$sql="delete from reg_expenses where ID='{$_GET["id"]}'";
	if($con->query($sql)){
		header("location:add_reminder.php");
	}
?>