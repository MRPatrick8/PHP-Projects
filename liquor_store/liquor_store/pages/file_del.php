<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include("../dist/includes/dbcon.php");
$id=$_REQUEST['id'];
$result=mysqli_query($con,"DELETE FROM t_upload WHERE t_upload_id ='$id'")
	or die(mysqli_error());

?>