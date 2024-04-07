<?php
    class edit_data{

            public function edit_licenseType($license_code,$License_type){
                include './include/connection.php';
                 
             
                // Check connection
                if ($mysqli->connect_error) {
                  die("Connection failed: " . $mysqli->connect_error);
                }
                
                else{
  
                    $sql = "UPDATE `license_type` SET `license_typename`='$License_type' WHERE license_code=  $license_code";
  
                if ($mysqli->query($sql) === TRUE) {
                    echo '<script>alert("record updated successfully");</script>';
                } else {
                  echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
              
              
                }




            }
            
            public function edit_LocationName($edit_location_code,$edit_location_name){
              include './include/connection.php';
               
           
              // Check connection
              if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
              }
              
              else{

                  $sql = "UPDATE `location_info` SET `location_name`='$edit_location_name' WHERE location_code=  $edit_location_code";

              if ($mysqli->query($sql) === TRUE) {
                  echo '<script>alert("record updated successfully");</script>';
              } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
              }
            
            
              }




          }

          public function edit_OffenseName($edit_offense_id,$edit_offense_name){
            include './include/connection.php';
             
         
            // Check connection
            if ($mysqli->connect_error) {
              die("Connection failed: " . $mysqli->connect_error);
            }
            
            else{

                $sql = "UPDATE `Offense_info` SET `offense_name`='$edit_offense_name' WHERE offense_id=  $edit_offense_id";

            if ($mysqli->query($sql) === TRUE) {
                echo '<script>alert("record updated successfully");</script>';
            } else {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
          
          
            }




        }

        public function edit_ViolationName($edit_violation_code,$edit_violation_name){
          include './include/connection.php';
           
       
          // Check connection
          if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
          }
          
          else{

              $sql = "UPDATE `violation_info` SET `violation_name`='$edit_violation_name' WHERE violation_code=  $edit_violation_code";

          if ($mysqli->query($sql) === TRUE) {
              echo '<script>alert("record updated successfully");</script>';
          } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
          }
        
        
          }




      }
      public function edit_CsStatus($edit_cs_id,$edit_cs_status){
        include './include/connection.php';
         
     
        // Check connection
        if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
        }
        
        else{

            $sql = "UPDATE `cs_status` SET `cs_status`='$edit_cs_status' WHERE cs_id=  $edit_cs_id";

        if ($mysqli->query($sql) === TRUE) {
            echo '<script>alert("record updated successfully");</script>';
        } else {
          echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
      
      
        }




    }

    public function edit_Penalty($edit_penalty_id,$edit_violation_name,$edit_offense_name,$amount){
      include './include/connection.php';
       
   
      // Check connection
      if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }
      
      else{

          $sql = "UPDATE `penalty_info` SET `violation_code`=$edit_violation_name,`offense_id`=$edit_offense_name,`amount`=$amount
           WHERE penalty_id=  $edit_penalty_id";

      if ($mysqli->query($sql) === TRUE) {
          echo '<script>alert("record updated successfully");</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
    
    
      }




  }
  public function edit_item($edit_item_id,$edit_item_name){
    include './include/connection.php';
     
 
    // Check connection
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }
    
    else{

        $sql = "UPDATE `items_table` SET `item_name`='$edit_item_name' WHERE item_id=  $edit_item_id";

    if ($mysqli->query($sql) === TRUE) {
        echo '<script>alert("record updated successfully");</script>';
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  
  
    }




}
public function edit_driverInfo($edit_driver_id,$edit_driver_fname,$edit_driver_mname,$edit_driver_lname,$edit_driver_license,$edit_driver_address,$edit_driver_expiry,$edit_driver_bday,$edit_driver_height,$edit_driver_gender,$license_code){
  include './include/connection.php';
   

  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `driver_information` SET `driver_fname`='$edit_driver_fname', `driver_mname`='$edit_driver_mname',
                                              `driver_lname`='$edit_driver_lname', `license_number`='$edit_driver_license',
                                              `driver_address`='$edit_driver_address', `license_expiry`='$edit_driver_expiry',
                                              `driver_bday`='$edit_driver_bday', `driver_height`='$edit_driver_height',
                                              `driver_gender`='$edit_driver_gender', `license_code`='$license_code'
                                              WHERE driver_id=  $edit_driver_id";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record updated successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }




}
public function edit_vehicleInfo($edit_vehicle_id,$edit_vehicle_owner,$edit_owner_address,$edit_vehicle_platenum,$edit_vehicle_make,$edit_vehicle_color,$edit_vehicle_model,$edit_vehicle_marking,$vehicle_code){
  include './include/connection.php';
   

  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `vehicle_information` SET `vehicle_owner`='$edit_vehicle_owner', `owner_address`='$edit_owner_address',
                                              `vehicle_platenum`='$edit_vehicle_platenum', `vehicle_make`='$edit_vehicle_make',
                                              `vehicle_model`='$edit_vehicle_model', `vehicle_color`='$edit_vehicle_color',
                                              `vehicle_marking`='$edit_vehicle_marking' , `vehicle_code`='$vehicle_code' WHERE vehicle_id=  $edit_vehicle_id";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record updated successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }




}

public function edit_employee($edit_employee_id,$edit_employee_fname,$edit_employee_mname,$edit_employee_lname,$edit_Date_hired,$edit_email,$edit_employee_bday,$edit_username,$edit_password){
  include './include/connection.php';
   

  // Check connection
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  
  else{

      $sql = "UPDATE `employee_list` SET `employee_password`='$edit_password', `employee_fname`='$edit_employee_fname',
                                              `employee_mname`='$edit_employee_mname', `employee_lname`='$edit_employee_lname',
                                              `employee_date_hired`='$edit_Date_hired', `employee_email`='$edit_email',
                                              `employee_bday`='$edit_employee_bday' , `employee_username`='$edit_username' 
                                               WHERE employee_id=$edit_employee_id";

  if ($mysqli->query($sql) === TRUE) {
      echo '<script>alert("record updated successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }


  }




}

            
        }
           


?>
