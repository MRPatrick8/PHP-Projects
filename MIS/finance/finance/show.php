<?php
session_set_cookie_params(0);
session_start();
// if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db2.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if (mysqli_query($con,"delete from useraccounts where id = '$_GET[id]'"))
    {
      header("location:mindex.php");
    }
  } ?>
</head>
<body style="background:#ffffff;background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> --><?php echo bankname; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="mindex.php">Accounts <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="maccounts.php">Accounts</a></li> -->
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Account</a></li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">Feedback</a></li> -->
      <!-- <li class="nav-item ">  <a class="nav-link" href="transfer.php">Funds Transfer</a></li> -->
      <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->


    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br>
<?php 
  $array = mysqli_query($con,"select * from useraccounts,brnch where useraccounts.id = '$_GET[id]' AND useraccounts.branch = brnch.branchId");
  $row = mysqli_fetch_assoc($array);
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Account profile for <?php echo $row['name'];echo "<kbd> ";echo $row['accountNo'];echo "</kbd>"; ?>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $row['name'] ?></th>
          <td>Account No</td>
          <th><?php echo $row['accountNo'] ?></th>
        </tr><tr>
          <td>Bank Name</td>
          <th><?php echo $row['branchName'] ?></th>
          <td>Branch Code</td>
          <th><?php echo $row['branchNo'] ?></th>
        </tr><tr>
          <td>Current Balance</td>
          <th><?php echo $row['balance'] ?></th>
          <td>Account Type</td>
          <th><?php echo $row['accountType'] ?></th>
        </tr><tr>
          <td>TIN No</td>
          <th><?php echo $row['cnic'] ?></th>
          <td>City</td>
          <th><?php echo $row['city'] ?></th>
        </tr><tr>
          <td>Contact Number</td>
          <th><?php echo $row['number'] ?></th>
          <td>Address</td>
          <th><?php echo $row['address'] ?></th>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
    <?php echo bankname; ?>
  </div>
</div>

</body>
</html>