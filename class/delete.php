<?php 
    class soft_delete{
        public function delete_employee($employee_id){
            include './include/connection.php';
                 
             
            // Check connection
            if ($mysqli->connect_error) {
              die("Connection failed: " . $mysqli->connect_error);
            }
            
            else{

                $sql = "UPDATE `employee_list` SET `delete_status`='1' WHERE employee_id=  $employee_id";

            if ($mysqli->query($sql) === TRUE) {
                echo '<script>alert("record deleted successfully");</script>';
            } else {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
          
          
            }

        }

        public function delete_driver($driver_id){
            include './include/connection.php';
                 
             
            // Check connection
            if ($mysqli->connect_error) {
              die("Connection failed: " . $mysqli->connect_error);
            }
            
            else{

                $sql = "UPDATE `driver_information` SET `delete_status`='1' WHERE driver_id=  $driver_id";

            if ($mysqli->query($sql) === TRUE) {
                echo '<script>alert("record deleted successfully");</script>';
            } else {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
          
          
            }

            
        }
        
        public function delete_vehicle($vehicle_id){
          include './include/connection.php';
               
           
          // Check connection
          if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
          }
          
          else{

              $sql = "UPDATE `vehicle_information` SET `delete_status`='1' WHERE vehicle_id=  $vehicle_id";

          if ($mysqli->query($sql) === TRUE) {
              echo '<script>alert("record deleted successfully");</script>';
          } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
          }
        
        
          }

      }
      public function delete_citation($citation_id){
        include './include/connection.php';
             
         
        // Check connection
        if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
        }
        
        else{

            $sql = "UPDATE `citation_registration` SET `delete_status`='1' WHERE citation_id=  $citation_id";

        if ($mysqli->query($sql) === TRUE) {
            echo '<script>alert("record deleted successfully");</script>';
        } else {
          echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
      
      
        }

    }
    public function delete_penalty($penalty_id){
      include './include/connection.php';
           
       
      // Check connection
      if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }
      
      else{

          $sql = "UPDATE `penalty_info` SET `delete_status`='1' WHERE penalty_id=  $penalty_id";

      if ($mysqli->query($sql) === TRUE) {
          echo '<script>alert("record deleted successfully");</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
    
    
      }

  }
  public function delete_licenseType($license_code){
    include './include/connection.php';
         
     
    // Check connection
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }
    
    else{

        $sql = "UPDATE `license_type` SET `delete_status`='1' WHERE license_code=  $license_code";

    if ($mysqli->query($sql) === TRUE) {
        echo '<script>alert("record deleted successfully");</script>';
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  
  
    }

}

public function delete_location($location_code){
  include './include/connection.php';
       
   
  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `location_info` SET `delete_status`='1' WHERE location_code=  $location_code";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record deleted successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }


}

public function delete_violation($violation_code){
  include './include/connection.php';
       
   
  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `violation_info` SET `delete_status`='1' WHERE violation_code=  $violation_code";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record deleted successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }

}
public function delete_offense($offense_id){
  include './include/connection.php';
       
   
  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `offense_info` SET `delete_status`='1' WHERE offense_id=  $offense_id";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record deleted successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }

}
public function delete_item($item_id){
  include './include/connection.php';
       
   
  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `items_table` SET `delete_status`='1' WHERE item_id=  $item_id";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record deleted successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }

}

    }


?>