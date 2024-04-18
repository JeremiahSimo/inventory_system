
<?php
				include './include/connection.php';
        include './class/edit.php';
        include './class/delete.php';

        if (isset($_POST['btn_delete'])){
          $db_delete=new soft_delete();
          $delete_item_id=$_POST['delete_item_id'];
          $db_delete->delete_item($delete_item_id);
        }
      //   if (isset($_POST['btn_edit'])){
      //     $db_manager=new edit_data();
      //     $edit_item_id=$_POST['edit_item_id'];
      //     $edit_item_name=$_POST['edit_item_name'];
          
      //     $item_check = $mysqli->query("SELECT item_id FROM items_table WHERE item_name = '$edit_item_name'") or die($mysqli->error);

      //     if ($item_check->num_rows > 0) {
            
      //       $error_message = "Error: The Item is already registered.";
      //       }else{
            
            
      //         $db_manager->edit_item($edit_item_id,$edit_item_name);
        
              
      //     }
        
      // }
      
      
			
			$result=$mysqli->query("SELECT i.item_id,
      i.item_name,
      el.employee_lname,
      COALESCE(SUM(CASE WHEN ilt.logs_status_id = 1 THEN ilt.item_quantity ELSE 0 END), 0) AS Total_added,
      COALESCE(SUM(CASE WHEN ilt.logs_status_id = 2 THEN ilt.item_quantity ELSE 0 END), 0) AS Total_deleted,
      COALESCE(SUM(CASE WHEN ilt.logs_status_id = 3 THEN ilt.item_quantity ELSE 0 END), 0) AS Total_released,
      (COALESCE(SUM(CASE WHEN ilt.logs_status_id = 1 THEN ilt.item_quantity ELSE 0 END), 0)
       - COALESCE(SUM(CASE WHEN ilt.logs_status_id = 2 THEN ilt.item_quantity ELSE 0 END), 0) 
       - COALESCE(SUM(CASE WHEN ilt.logs_status_id = 3 THEN ilt.item_quantity ELSE 0 END), 0)) AS Total_quantity
      FROM items_table i
      INNER JOIN employee_list el ON i.employee_id = el.employee_id
      LEFT JOIN item_logs_timestamp ilt ON i.item_id = ilt.item_id
      WHERE i.delete_status = 0
      GROUP BY i.item_id, i.item_name, el.employee_lname")or die ($mysqli->error);
			//mo gana ang search pag 4 or multiple fields and iyang e search, below 4 fields dli mo ganah ang multiple field search
      //ang pagination kay dli mo ganah basta subra ra ang special characters in a certain fields
		?>
		


        <h3><i class="fa fa-angle-right"></i> Items Preview</h3>
      
      
<table id="hidden-table-info" class="table datatable">
                <thead>
                  <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Total Added</th>
                    <th>Total Released</th>
                    <th>Total Deleted</th>
                    <th>Total Remaining Quantity</th>
                    <th>Employee ID</th>
                    <th colspan="2">Option</th>					
                  </tr>
                </thead>
                
                <tbody>
                <?php
					while ($row=$result->fetch_assoc()):	
				?>
                  <tr class="gradeA">
                  <td><?php echo $row['item_id'];?></td>
                  <td id="<?php echo $row['item_id'];?>"><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['Total_added'];?></td>
                    <td><?php echo $row['Total_deleted'];?></td>
                    <td><?php echo $row['Total_released'];?></td>
                    <td><?php echo $row['Total_quantity'];?></td>
                    <td><?php echo $row['employee_lname'];?></td>

					            <td><button type="button" class="btn btn-round btn-success" onclick="editData(<?php echo $row['item_id']; ?>, 
                      '<?php echo $row['item_name']; ?>')">Edit</button>
					 <form method="post" action="index_admin.php?page=items_prev" onsubmit="return confirmDelete();">
          <input type="hidden" name="delete_item_id" id="delete_item_id" value="<?php echo $row['item_id']; ?>">
						<button type="submit" name="btn_delete" class="btn btn-danger"  >Delete</button>
            <button type="button" class="btn btn-primary" id="myBtn">
                Details
              </button>
					</form>
        
					</td>
                  </tr>
                  <?php endwhile; ?>
				  			  
                </tbody>
              </table>


       <!-- Modal Dialog Scrollable -->
       
              <div class="modal" id="modalDialogScrollable">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal Dialog Scrollable</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                      This content should appear at the bottom after you scroll.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Modal Dialog Scrollable-->
    <!--script for search -->
    <script>
  // $(document).ready(function() {
  //   $('#hidden-table-info').DataTable();
  // });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


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
            <h2 id="modal_item_info_title">Item Information</h2>
        </div>
        <div class="modal-body">
        <div class="card">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Item Registration</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="index_Admin.php?page=items_prev" id="employeeForm">
              <input type="text" class="form-control" name="edit_item_id" id="edit_item_id" readonly><br>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="edit_item_name" name="edit_item_name" placeholder="Your Name" required>
                    <label for="floatingName">Item Name</label>
                  </div>
                </div>
                <div class="text-center">
                  <!-- <button id="btn_update" name="btn_edit" type="submit" class="btn btn-primary">Update</button> -->
                  <!-- <button id="btn_update" class="btn btn-primary">Update</button> -->
                  <input id="btn_update" class="btn btn-primary" type="button" value="Update">

                  <button type="reset" class="btn btn-secondary">Reset</button>
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
<script src="./assets/js/modal.js"></script>
<script src="./assets/js/edit_item.js" defer></script>

