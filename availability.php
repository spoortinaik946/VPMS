<?php  
  session_start();
  if(isset($_SESSION['email'])){
?>
<html>
<body>
<div class="row">
	<div class="col-md-4" style="background-color:whitesmoke;border-radius: 15px;text-align: left;padding: 25px;">
		<?php
          $capacity = 0; 
          include('includes/connection.php');
          $query = "select capacity from parking_slots";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($query_run)){
            $capacity = $capacity + $row['capacity'];
          }
          echo "<b>Parking capacity: </b>" . $capacity . "</br>";
 
          $query = "select * from parking_history";
          $query_run = mysqli_query($connection,$query);
          $total_vehicals_parked = mysqli_num_rows($query_run);
          echo "<b>Total Vehicals Parked: </b>" . $total_vehicals_parked . "</br>";
          echo "<b>Parking available: </b>" . $capacity - $total_vehicals_parked;
        ?>
	</div>
</div>
</body>
</html>
<?php
}
else{
  header('Location:index.php');
}
?>