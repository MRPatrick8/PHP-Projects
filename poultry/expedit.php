<?php
require_once('function.php');
connectdb();
session_start();

if (!is_user()) {
	redirect('index.php');
}

?>

		

<?php
 $user = $_SESSION['username'];
$usid = mysql_query("SELECT id FROM users WHERE username='".$user."'");
 $uid = $usid[0];
 include ('header.php');
 ?>



 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Expense</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php
$eid = $_GET["id"];

if($_POST)
{

$expcat = $_POST["expcat"];
$desc = $_POST["desc"];
$date = $_POST["date"];
$amount = $_POST["amount"];


///////////////////////-------------------->> Catid  ki 0??

 if($expcat==0)
      {
$err1=1;
}
 if(isset($err1))
 $error = $err1;;


if ($error == 0){
	
$res = mysql_query("UPDATE `expense` SET `expcat`='".$expcat."',`description`='".$desc."',`date`='".$date."',`amount`='".$amount."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	
	</div>";
	}else{
		echo "<div class=\"alert alert-danger alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	Some Problem Occurs, Please Try Again. 
	
	</div>";
	}
} 
}
?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
<?php
$old = mysql_fetch_array(mysql_query("SELECT expcat, description, date, amount FROM expense WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="expedit.php?id=<?php echo $eid ?>" method="post">
		
                    <div class="form-group">
					
					<label>Select Category</label>
					
					<select name="expcat" class="form-control">
                    <?php

					$details = mysql_fetch_array(mysql_query("SELECT title FROM expcat WHERE id='".$old[0]."'"));
					echo ("<option value=\"$old[0]\">$details[0]</option> ");
					?>
					<option value="0">Please Select a Category</option>
					<?php

$ddaa = mysql_query("SELECT id, title FROM expcat ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {									
 echo "<option value=\"$data[0]\">$data[1]</option>";
	}
?>
					
					</select><br/>

</div>
                
                <div class="form-group">
					
					<label>Description</label><br/>
                 	<input type="text" name="desc" style="width:200px; height: 40px;" value="<?php echo($old[1]) ?>" /><br/><br/>
				</div>  
                
                <div class="form-group">
					
					<label>Date</label><br/>
                 	<input type="date" name="date" style="width:200px; height: 40px;" value="<?php echo($old[2]) ?>" /><br/><br/>
				</div>    
                
                <div class="form-group">
					
					<label>Amount</label><br/>
                 	<?php echo($currency);?> <input type="text" name="amount" style="width:200px; height: 40px;" value="<?php echo($old[3]) ?>" /><br/><br/>
				</div>
					<input type="submit" class="btn btn-lg btn-success btn-block" value="Update">
			    	</form>
                </div>
						
						
						
						
						
				
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	    



<script src="js/bootstrap-timepicker.min.js"></script>


<script>
jQuery(document).ready(function(){
    
  
  jQuery("#ssn").mask("999-99-9999");
  
  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});

  
});
</script>







<?php
 include ('footer.php');
 ?>