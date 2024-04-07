<?php
include './include/connection.php';

$result=$mysqli->query("SELECT * from driver_information ")or die ($mysqli->error);
$num_rows = $result->num_rows;

$vehicle_result=$mysqli->query("SELECT * from vehicle_information ")or die ($mysqli->error);
$vehicle_rows=$vehicle_result->num_rows;

$citation_result=$mysqli->query("SELECT * from citation_registration ")or die ($mysqli->error);
$citation_rows=$citation_result->num_rows;
?>


<div class="cards">
   <a class="card1" href="index_Admin.php?page=DriverPrev">
    <p>Driver Summary</p>
    <p class="small">Number of Driver Registered is = <?php echo $num_rows ?></p>
    <div class="go-corner" href="#">
      <div class="go-arrow">
        →
      </div>
    </div>
  </a>
</div>


<div class="cards">
   <a class="card1" href="index_Admin.php?page=Vehicle_info_prev">
    <p>Vehicle Summary</p>
    <p class="small">Number of Vehicle Registered is = <?php echo $vehicle_rows ?></p>
    <div class="go-corner" href="#">
      <div class="go-arrow">
        →
      </div>
    </div>
  </a>
</div>

<div class="cards">
   <a class="card1" href="index_Admin.php?page=Citation_form">
    <p>Citation Summary</p>
    <p class="small">Number of Citation Registered is = <?php echo $citation_rows ?></p>
    <div class="go-corner" href="#">
      <div class="go-arrow">
        →
      </div>
      
    </div>
    
  </a>
  
</div>
