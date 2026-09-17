<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
        #header{
            background-color: #400E32;
            color: #F2CD5C;
            text-align: center;
            padding: 1% 1%;
            margin-bottom: 1%;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-8" id="header">
        <h3 class="text-warning center">Vehical Parking Management System</h3>
    </div>
    <div class="col-md-2" id="header">
        <b>Name: </b><?php echo $_SESSION['name']; ?>
    </div>
    <div class="col-md-2" id="header">
    	<a class="btn btn-outline-warning" href="logout.php">Logout</a>
    </div>
</div>
</body>
</html>