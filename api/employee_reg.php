
<?php
	include './include/connection.php';
	$registrationSuccess = false;
	//$LocationID = isset($_POST['location_code']) ? $_POST['location_code'] : '';
	if(isset($_POST['save'])){
	
      $employee_fname=$_POST['employee_fname'];
        $employee_mname=$_POST['employee_mname'];
        $employee_lname=$_POST['employee_lname'];
        $employee_hired=$_POST['employee_hired'];
        $employee_bday=$_POST['employee_bday'];
        $employee_username=$_POST['employee_username'];
        $employee_password=$_POST['employee_password'];
        $employee_email=$_POST['employee_email'];
     
   
	
        $username_check = $mysqli->query("SELECT employee_id FROM employee_list WHERE employee_username = '$employee_username'") or die($mysqli->error);
        $email_check = $mysqli->query("SELECT employee_id FROM employee_list WHERE employee_email = '$employee_email'") or die($mysqli->error);
        if ($username_check->num_rows > 0) {
            
          $error_message = "Error: The username is already registered.";
        } 
        else if ($email_check->num_rows > 0) {
            
          $error_message = "Error: The email is already registered.";
        }else {
           
            $mysqli->query("INSERT INTO employee_list(employee_fname,employee_mname,employee_lname,employee_date_hired,employee_bday,employee_username,employee_password,employee_email) 
            VALUES('$employee_fname','$employee_mname','$employee_lname','$employee_hired','$employee_bday','$employee_username','$employee_password','$employee_email')") or die($mysqli->error);
    
            echo '<script>alert("Employee Successfully Registered");</script>';
            $employee_fname='';
            $employee_mname='';
            $employee_lname='';
            $employee_hired='';
            $employee_bday='';
            $employee_username='';
            $employee_password='';
            $employee_email='';
            $registrationSuccess = true;
        }

  }
  //$location=$mysqli->query("SELECT * FROM location_info ORDER BY location_name ASC")or die ($mysqli->error);
?>
<?php if (isset($error_message)) : ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>
	  
        
				
        <script>
    function resetForm() {
        document.getElementById("employeeForm").reset();
    }
</script>
			
		
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Employee Information Registration</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="index_Admin.php?page=employee_reg" id="employeeForm">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="employee_fname" placeholder="Your Name" required>
                    <label for="floatingName">First Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName"  name="employee_mname" placeholder="Your Name" required>
                    <label for="floatingName">Middle Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="employee_lname"placeholder="Your Name" required>
                    <label for="floatingName">Last Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="floatingName" name="employee_hired" placeholder="Your Name" required>
                    <label for="floatingName">Date Hired</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="floatingName" name="employee_bday" placeholder="Your Name" required>
                    <label for="floatingName">Birthday</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" name="employee_username" placeholder="Your Email" required>
                    <label for="floatingEmail">Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="employee_password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" placeholder="Address"  id="floatingTextarea" name="employee_email" required>
                    <label for="floatingTextarea">Email</label>
                  </div>
                </div>
             
                <div class="text-center">
                  <button name="save" type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
            </div>

  </div>
       