
	   
	  <?php
				include './include/connection.php';
        include './class/edit.php';
        include './class/delete.php';


       

        if (isset($_POST['btn_delete'])){
          $db_delete=new soft_delete();
          $delete_item_id=$_POST['delete_item_id'];
          $db_delete->delete_item($delete_item_id);
         
        }
        if (isset($_POST['btn_edit'])){
          $db_manager=new edit_data();
          $edit_item_id=$_POST['edit_item_id'];
          $edit_item_name=$_POST['edit_item_name'];

          $item_check = $mysqli->query("SELECT item_id FROM items_table WHERE item_name = '$edit_item_name'") or die($mysqli->error);

          if ($item_check->num_rows > 0) {
            
            $error_message = "Error: The Item is already registered.";
            }else{
            
             
              $db_manager->edit_item($edit_item_id,$edit_item_name);
         
              
          }
        
      }
			
			$result=$mysqli->query("SELECT * FROM items_table WHERE delete_status=0")or die ($mysqli->error);
			//mo gana ang search pag 4 or multiple fields and iyang e search, below 4 fields dli mo ganah ang multiple field search
      //ang pagination kay dli mo ganah basta subra ra ang special characters in a certain fields
		?>
		


        <h3><i class="fa fa-angle-right"></i> Items Preview</h3>
       
            <div class="col-sm-6">
        <input type="text" class="form-control" id="searchInput" placeholder="Search by for vehicle type...">
    </div>

 <table id="hidden-table-info" class="table datatable">
                <thead>
                  <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Item Total Quantity</th>
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
				          	<td><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['item_create_timestamp'];?></td>
                    <td><?php echo $row['employee_id'];?></td>

					            <td><button type="button" class="btn btn-round btn-success"  onclick="editData(<?php echo $row['item_id']; ?>, 
                      '<?php echo $row['item_name']; ?>')">Edit</button>
					 <form method="post" action="index_admin.php?page=items_prev" onsubmit="return confirmDelete();">
          <input type="hidden" name="delete_item_id" id="delete_item_id" value="<?php echo $row['item_id']; ?>">
						<button type="submit" name="btn_delete" class="btn btn-danger"  >Delete</button>
					</form>
          <button name="btn_show" type="submit" class="btn btn-primary">Details</button>
					</td>
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
        <script>
    function filterTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("hidden-table-info");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Change index to the appropriate column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Attach an event listener to the search input
    document.getElementById("searchInput").addEventListener("input", filterTable);
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
                  <button name="btn_edit" type="submit" class="btn btn-primary">Update</button>
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
<script src="./assets/js/edit_item.js"></script>


 