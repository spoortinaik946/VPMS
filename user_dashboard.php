<?php
	include_once('header.php');
  if(isset($_SESSION['email'])){
    include('includes/connection.php');
    if(isset($_POST['update'])){
      $query = "update users set name = '$_POST[name]',email = '$_POST[email]',mobile = $_POST[mobile] where email = '$_SESSION[email]'";
      $query_run = mysqli_query($connection,$query);
      if($query_run){
        echo "<script type='text/javascript'>
          alert('Profile updated successfully....');
          window.location.href = 'user_dashboard.php';  
        </script>";
      }
      else{
        echo "<script type='text/javascript'>
          alert('Error...Plz try again.');
          window.location.href = 'user_dashboard.php';
        </script>";
      }
    }

    if(isset($_POST['change_password'])){
      $query1 = "select password from users where email = '$_SESSION[email]'";
      $query_run1 = mysqli_query($connection,$query1);
      $current_password = "";
      while($row = mysqli_fetch_assoc($query_run1)){
        $current_password = $row['password'];  
      }
      if(($current_password == $_POST['currPassword']) && ($_POST['newPassword1'] == $_POST['newPassword2'])){
        $query = "update users set password = '$_POST[newPassword1]' where email = '$_SESSION[email]'";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
            alert('Password changed successfully....');
            window.location.href = 'user_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
            alert('Error, Plz try again');
            window.location.href = 'user_dashboard.php';
          </script>";
        }
      }
      else{
          echo "<script type='text/javascript'>
            alert('Password dont match...or wrong current password!!');
            window.location.href = 'user_dashboard.php';
          </script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap-5/css/bootstrap.min.css">
    <script src="bootstrap-5/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
    	#container{
    		background-color: #B99B6B;
    		height: 75vh;
    		padding-top: 2%;
    		margin-top: 1%;
    		padding-left: 25%;
    	}
    	#subButton{
    		margin-left: 17px;
    	}
    </style>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#update_profile").click(function(){
    			$("#container").load('updateProfile.php');
    		});
    	});

    	$(document).ready(function(){
    		$("#change_password").click(function(){
    			$("#container").load('changePassword.php');
    		});
    	});

    	$(document).ready(function(){
    		$("#print_slip").click(function(){
    			$("#container").load('printSlip.php');
    		});
    	});

    	$(document).ready(function(){
    		$("#check_ava").click(function(){
    			$("#container").load('availability.php');
    		});
    	});
    </script>
</head>
<body style="background-color: whitesmoke;">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-9">
    <a href="user_dashboard.php" class="btn btn-secondary">Dashboard</a>
		<button class="btn btn-success subButton" id="update_profile">Update Profile</button>
		<button class="btn btn-dark" id="change_password">Change Password</button>
		<button class="btn btn-danger" id="check_ava">Check Availability</button>
	</div>
</div>
<div class="row">
	<div class="col-md-12" id="container">
  <h4><u>User Dashboard for Vehical Parking Management System</u></h4><br>
   <h4><u>Instructions for Users</u></h4> 
   <ul>
      <li>Every user must register his vehicle before visiting the parking.</li>
      <li>Every users must provide the correct information while registering the vehicle.</li>
      <li>Parking fee is applicable as per the rules.</li>
      <li>Parking fee is calculated on the basis of per hour fee.</li>
      <li>You must pay the parking fee at the time of unparking the vehicle.</li> 
    </ul>
  </div>
	</div>
</div>
<marquee><h5 style="margin-top:10px;">Please contact on 1284 helpline number in case of any problem related to parking management system.</h5></marquee>
</body>
</html>
<?php
}
else{
  header('Location:index.php');
}
?>
