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

  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">


    <div class="pageheader">
      <h2><i class="fa fa-th-list"></i> SMS Template List</h2>
    </div>

    
    <div class="contentpanel">
	 <div class="panel panel-default">

        <div class="panel-body">
		
		 <div class="clearfix mb30"></div>

          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Name</th>
					<th>Message</th>
                    <th>ACTION</th>
					

					</tr>
              </thead>
              <tbody>
                
				
				<?php

$ddaa = mysql_query("SELECT id, title, msg FROM template ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {									
 echo "                                 <tr>
                                            <td>$data[0]</td>
                                            <td>$data[1]</td>
											<td>$data[2]</td>
                                            <td>
							<a href=\"templateedit.php?id=$data[0]\" class=\"btn btn-info btn-xs\">Edit</a>
							<a href=\"templatedelete.php?id=$data[0]\" class=\"btn btn-danger btn-xs\">DELETE</a>
											</td>
                                        </tr>
	";
	}
?>
				
				
			
				




				
				 
              </tbody>
           </table>
          </div><!-- table-responsive -->
		  
        </div>
      </div>
                  
      

      
    </div><!-- contentpanel -->
    


  
</section>


<?php
 include ('include/footer.php');
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


