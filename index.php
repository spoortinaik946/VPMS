<?php
    session_start();
    // Register vehical
    if(isset($_POST['vehical_register'])){
        include('includes/connection.php');
        $query = "insert into vehicals values(null,'$_POST[vehical_no]','$_POST[owner_name]','$_POST[owner_email]','$_POST[vehical_type]',0)";
          $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Vehical registered successfully....');
            window.location.href = 'index.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'index.php';
          </script>";
        }
    }
    // user login
    if(isset($_POST['login'])){
        include('includes/connection.php');
        $query = "select email,password,name from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            $_SESSION['email'] = $_POST['email'];
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['name'] = $row['name'];
            }
            echo "<script type='text/javascript'>
              window.location.href = 'user_dashboard.php';
            </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Please enter correct email and password.');
              window.location.href = 'index.php';
          </script>";
        }
    }
    // Registration code
    if(isset($_POST['register'])){
        include('includes/connection.php');
        $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
          $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('User registered successfully....');
            window.location.href = 'index.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'index.php';
          </script>";
        }
      }
?>
<!DOCTYPE html>
<html>
<head>
    <title>VPMS Project</title>
    <!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap-5/css/bootstrap.min.css">
    <script src="bootstrap-5/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        #header{
            background-color: #400E32;
            color: #F2CD5C;
            text-align: center;
            padding: 1% 1%;
            margin-bottom: 4%;
        }
    </style>
</head>
<body style="background-image: url('images/image112.jpg');">
<!-- Header -->
<div class="row">
    <div class="col-md-9" id="header">
        <h3 class="text-warning center">Vehical Parking Management System</h3>
    </div>
    <div class="col-md-3" id="header">
        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#loginModal">User Login</button>
        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#registerModal">Register here</button>
    </div>
</div>
<!-- Header code ends -->
<!-- Registration form -->
<div class="row">
    <div class="col-md-4 m-auto">
        <!-- <center><h3 class="text-warning py-3">Vehical Registration Form</h3></center> -->
        <form action="" method="POST">
            <div class="form-group">
                <!-- <label><b>Vehical No:</b></label> -->
                <input type="text" class="form-control" name="vehical_no" placeholder="Enter Vehical No" required>
            </div><br>
            <div class="form-group">
                <!-- <label><b>Owner Name:</b></label> -->
                <input type="text" class="form-control" name="owner_name" placeholder="Enter Owner Name" required>
            </div><br>
            <div class="form-group">
                <!-- <label><b>Owner Name:</b></label> -->
                <input type="text" class="form-control" name="owner_email" placeholder="Owner Email ID" required>
            </div><br>
            <div class="form-group">
                <!-- <label><b>Vehical Type:</b></label> -->
                <select class="form-control" name="vehical_type" required>
                    <option>-Select vehical type-</option>
                    <option>Two Wheeler</option>
                    <option>Four Wheeler</option>
                    <option>Heavy Vehical</option>
                </select>
            </div><br>
            <div class="d-grid gap-2">
                <button class="btn btn-warning" type="submit" name="vehical_register">Register Vehical</button>    
            </div> 
        </form>
    </div>
</div>
<!-- Registation form end -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Login Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Your Password" required>
            </div><br>
            <button class="btn btn-danger" type="submit" name="login">Login</button><br>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Enter your Name" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Choose Password" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile No." required>
            </div><br>
            <button class="btn btn-danger" type="submit" name="register">Register</button><br>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>