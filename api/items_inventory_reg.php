
	<?php

	include './include/connection.php';
	
	

	
	$item_name = isset($_POST['item_name']) ? $_POST['item_name'] : '';
	if (isset($_POST['save'])){
	  $employee_id = $_SESSION['employee_id'];
	$Iname=$_POST['item_name'];
	
	$item_check = $mysqli->query("SELECT item_id FROM items_table WHERE item_name = '$Iname'") or die($mysqli->error);

	if ($item_check->num_rows > 0) {
            
		$error_message = "Error: The Item is already registered.";
	  }else{
	$mysqli->query("INSERT INTO items_table(item_name,employee_id) VALUES('$Iname','$employee_id')") or die ($mysqli->error);
  
	echo '<script>alert("Item Successfully Recorded");</script>';
	$item_name='';
			
	}
}
	
?>
 
<?php if (isset($error_message)) : ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>
     	
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Item Registration</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="index_Admin.php?page=items_reg" id="employeeForm" autocomplete="on">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="item_name" placeholder="Your Name" value="<?php echo isset($item_name) ? $item_name : ''; ?>" required>
                    <label for="floatingName">Item Name</label>
                  </div>
                </div>
               
             
                <div class="text-center">
                  <button name="save" type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
            </div>

  </div>
			