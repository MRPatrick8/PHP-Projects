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



if(isset($_GET["id"])){
$id = $_GET["id"];
	mysql_query("DELETE FROM `hatchery` WHERE id='$id'");

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Hatchery Deleted Successfully!

</div>";


}


 ?>
    <link href="css/style.default.css" rel="stylesheet">
  	<link href="css/jquery.datatables.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hatchery Records</h1>
                <div><a href="hatcheryadd.php" class="btn btn-lg btn-success" style='width:150px; float:right; margin:10px;'>Enter Data</a></div>
    </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			
			
			                 <div class="panel panel-default">
            
                    <div class="panel-body">
                    
                     <div class="clearfix mb30"></div>
            
                      <div class="table-responsive">
                      <table class="table table-striped" id="table2">

                                    <thead>
                                        <tr>
                                            <th>Hatchery #</th>
                                            <th>Chicken Flock</th>
                                            <th>Name</th>
											<th>Received</th>
											<th>Staff</th>
                                            <th>Integerroduction Date</th>
                                            <th>Total</th>
											<th>Hatched</th>
                                            <th>Survived</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     <tbody>
<?php

$ddaa = mysql_query("SELECT * FROM `hatchery` ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
$rname = mysql_fetch_array(mysql_query("SELECT fullname FROM staff WHERE id='".$data[4]."'"));
$rname2 = mysql_fetch_array(mysql_query("SELECT bn.id,bt.breed_type, bn.batch_no FROM batch_no bn join breed_type bt on bn.breed_type = bt.id  where bn.id = $data[1]"));
		
 echo "                                 <tr>
                                            <td>$data[0]</td>
                                            <td>$rname2[1] $rname2[2]</td>
											<td>$data[2]</td>
                                            <td>$data[3]</td>
											<td>$rname[0]</td>
											<td>$data[5]</td>
											<td>$data[6]</td>
											<td>$data[7]</td>
											<td>$data[8]</td>
                                   
                                            
											<td>
<a href=\"hatcheryedit.php?id=$data[0]\" class=\"btn btn-success btn-xs\">Edit</a>
<a href=\"hatcherylist.php?id=$data[0]\"><button type=\"button\" class=\"btn btn-danger btn-xs\">DELETE</button></a>
";

echo "</td></tr>";

}
?>
										
                                    </tbody>
                                </table>
                            </div><!-- table-responsive -->
		  
        </div>
      </div>
                  
      

      
    </div><!-- contentpanel -->
    </div>
        <!-- /#page-wrapper --><?php
 include ('footer.php');
 ?>
 <script src="js/jquery.datatables.min.js"></script>
<script src="js/select2.min.js"></script>

<script>
  jQuery(document).ready(function() {
    
    "use strict";
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Select2
    jQuery('select').select2({
        minimumResultsForSearch: -1
    });
    
    jQuery('select').removeClass('form-control');
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>



</body>
</html>
