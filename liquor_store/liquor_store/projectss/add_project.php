<?php
session_set_cookie_params(0); 
session_start();    
   include('connection.php');
   //include('header.php');
       
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='shortcut icon' type='image/x-icon' href="../upload/TKAY LOGO.png">

    <title>Projects Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="" width="120">
                <h5></h5>
        
            </div>
            <div class="list-group list-group-flush">
                <a href="../pages/home.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
                <a href="manage_projects.php" class="list-group-item list-group-item-action"><span data-feather="dollar-sign"></span> Manage Projects</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <!-- <a href="#" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a> -->
                <a href="../pages/logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="profile.phcol-mdp">Your Profile</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../pages/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

           <div id="page-wrapper">

            <div class="container-fluid">


             <div class="col-lg-12">
                  <h2>Add new Project</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="transac.php?action=add">
                            
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Project Name" name="project_name" value="">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Client Name" name="client_name" value="">
                            </div> 
                            <div class="form-group">
                              <input type="tel" class="form-control" placeholder="Contact" name="contact" value="">
                            </div> 
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Address" name="address" value="">
                            </div> 
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Amount Paid" name="amount_paid" value="">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Amount Due" name="amount_due" value="">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Assigned to" name="assign" value="">
                            </div>
                            <div class="form-group">
                            <select class="form-select" name="status">
                              <option selected>Select Status</option>
                              <option value="Pending">Pending</option>
                              <option value="Completed">Completed</option>
                              <!-- <option value="3">Three</option> -->
                            </select>
                            </div> 
                            <div class="form-group">
                              <input type="date" class="form-control" placeholder="Due Date" name="due_date" value="<?php echo date("Y-m-d") ?>">
                            </div> 
                            <button type="submit" class="btn btn-info">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>


                      </form>  
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace();
    </script>
    <script>

    </script>
</body>
</html>