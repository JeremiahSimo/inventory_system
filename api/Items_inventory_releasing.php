
	   
	  <?php
				include './include/connection.php';
        include './class/edit.php';
        include './class/delete.php';


       

        if (isset($_POST['btn_delete'])){
          $db_delete=new soft_delete();
          $delete_item_id=$_POST['delete_item_id'];
          $db_delete->delete_item($delete_item_id);
         
        }
        if (isset($_POST['btn_add'])){
          $employee_id = $_SESSION['employee_id'];
          $add_item_id=$_POST['add_item_id'];
          $add_quantity=$_POST['add_quantity'];

          $mysqli->query("INSERT INTO item_logs_timestamp(item_id,item_quantity,logs_status_id,employee_id) VALUES('$add_item_id','$add_quantity',1,'$employee_id')") or die ($mysqli->error);
          echo '<script>alert("Quantity recorded successfully");</script>';
      }
			
			$result=$mysqli->query("SELECT i.logs_timestamp_id,
      i.logs_timestamp,
        it.item_name,
        ls.log_status_name,
        i.item_quantity,
        el.employee_lname
    FROM item_logs_timestamp i
    INNER JOIN items_table it ON it.item_id=i.item_id
    INNER JOIN employee_list el on el.employee_id=i.employee_id
    INNER JOIN logs_status ls ON ls.log_status_id=i.logs_status_id
    ORDER BY i.logs_timestamp DESC")or die ($mysqli->error);
    
   
			//mo gana ang search pag 4 or multiple fields and iyang e search, below 4 fields dli mo ganah ang multiple field search
      //ang pagination kay dli mo ganah basta subra ra ang special characters in a certain fields
      $item_result=$mysqli->query("SELECT item_id, item_name FROM items_table WHERE delete_status=0")
		?>
		


        <h3><i class="fa fa-angle-right"></i> Items Preview</h3>
       
                      <button type="button" class="btn btn-round btn-success" id="myBtn">Add Quantity
                      </button>   
                    
                      
		

 <table id="hidden-table-info" class="table datatable">
                <thead>
                  <tr>
                    <th>Log ID</th>
                    <th>Item name</th>
                    <th>Total Quantity</th>
                    <th>Log status</th>
                    <th>Log Timestamp</th>
                    <th>Employee Name</th>
				        		
                  </tr>
                </thead>
				
                <tbody>
                <?php
					while ($row=$result->fetch_assoc()):	
				?>
                  <tr class="gradeA">
                   <td><?php echo $row['logs_timestamp_id'];?></td>
				          	<td><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['item_quantity'];?></td>
                    <td><?php echo $row['log_status_name'];?></td>
                    <td><?php echo $row['logs_timestamp'];?></td>
                    <td><?php echo $row['employee_lname'];?></td>

                  
					
                  </tr>
                  <?php endwhile; ?>
				  			  
                </tbody>
              </table>
                    
	

     <!--script for search -->
     <script>
  $(document).ready(function() {
    $('#hidden-table-info').DataTable();
  });
</script>
      
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  function confirmDelete() {
    return confirm("Are you sure you want to delete this ITEM?");
  }
</script>


<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content" style="width: 100%;">
        <div class="modal-header">
            <span class="close" id="closeModal">&times;</span>
            <?php if (isset($error_message)) : ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>
            <h2>Item Information</h2>
        </div>
        <div class="modal-body">
        <div class="card">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adding Quantity</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="index_admin.php?page=items_receiving" id="employeeForm" onsubmit="return confirmAdd();">
             
                <div class="col-md-12">
                  <div class="form-floating">
                            
                              <select class="form-control select2" name="add_item_id" id="add_item_id" required>
                          <option value="">-- Please Select Item Name --</option>
                          
                    <?php
                    while ($item_row=$item_result->fetch_assoc()):	
                    ?>
                        <option value="<?php echo $item_row['item_id'];?>">
                        <?php echo $item_row['item_name'];?></option>
                        <?php endwhile; ?>
						</select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                 
                    <input type="text" class="form-control" id="add_quantity" name="add_quantity" placeholder="Your Name" required>
                    <label for="floatingName">Total Quantity</label>
                  </div>
                </div>
               
             
                <div class="text-center">
                  <button name="btn_add" type="submit" class="btn btn-primary">ADD</button>
                  
                </div>
              </form><!-- End floating Labels Form -->
            </div>

  </div>
			

  </div>
        </div>
       		

        
        <div class="modal-footer">
            <!-- <h3>Modal Footer</h3> -->
            <h3><strong>Inventory System</strong>. </h3>
        </div>
    </div>
</div>

</script>
        <!-- /row -->
        <script>
  function confirmAdd() {
    return confirm("Are you sure you want to add this quantity?");
  }
</script>
<script src="./assets/js/modal.js"></script>
<script src="./assets/js/edit_item.js"></script>



