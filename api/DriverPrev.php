
	   
	  <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    <?php
				include './include/connection.php';
        include './class/edit.php';
        include './class/delete.php';

        if (isset($_POST['btn_delete'])){
          $db_delete=new soft_delete();
          $delete_driver=$_POST['delete_driver_id'];
          $db_delete->delete_driver($delete_driver);
         
        }
        
        if (isset($_POST['btn_edit'])){
          $db_manager=new edit_data();
          $edit_driver_id=$_POST['edit_driver_id'];
          $edit_driver_fname=$_POST['edit_driver_fname'];
          $edit_driver_mname=$_POST['edit_driver_mname'];
          $edit_driver_lname=$_POST['edit_driver_lname'];
          $edit_driver_license=$_POST['edit_driver_license'];
          $edit_driver_address=$_POST['edit_driver_address'];
          $edit_driver_expiry=$_POST['edit_driver_expiry'];
          $edit_driver_bday=$_POST['edit_driver_bday'];
          $edit_driver_height=$_POST['edit_driver_height'];
          $edit_driver_gender=$_POST['edit_driver_gender'];
          $license_typename=$_POST['edit_license_code'];
         
          $db_manager->edit_driverInfo($edit_driver_id,$edit_driver_fname,$edit_driver_mname,$edit_driver_lname,$edit_driver_license,$edit_driver_address,$edit_driver_expiry,$edit_driver_bday,$edit_driver_height,$edit_driver_gender,$license_typename);
      }

		
		?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <h3><i class="fa fa-angle-right"></i> Driver's Information Preview</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <div class="col-sm-6">
        <input type="text" class="form-control" id="searchInput" placeholder="Search by driver first name...">
    </div>

              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Driver ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>License Number</th>
                    <th>Address</th>
                    <th>License Expiry</th>
                    <th>Birthday</th>
                    <th>Height</th>
                    <th>Gender</th>
                    <th>License Type</th>
					<th colspan="2">Option</th>       					
                  </tr>
                </thead>
				  <?php
          //$start = isset($_GET['start']) ? $_GET['start'] : 0; // Starting index for the query
          //$length = isset($_GET['length']) ? $_GET['length'] : 10; // Number of records per page
          
          $itemsPerPage = 10; 
          $page = isset($_GET['page']) ? intval($_GET['page']) : 1; 
          
         
          $page = max(1, $page);
          
         
          $startIndex = max(0, ($page - 1) * $itemsPerPage);
          
        
          $query = "SELECT
          d.driver_id,
          d.driver_fname,
          d.driver_mname,
          d.driver_lname,
          d.license_number,
          d.driver_address,
          d.license_expiry,
          d.driver_bday,
          d.driver_height,
          d.driver_gender,
          d.license_code,
          l.license_typename
      FROM
          driver_information d
      JOIN
          license_type l ON d.license_code = l.license_code 
          WHERE d.delete_status=0 GROUP BY d.driver_id ASC";
          $result = $mysqli->query($query) or die($mysqli->error);
                    
					while ($row=$result->fetch_assoc()):	
				?>
                <tbody>
                  <tr class="gradeA">
					<td><?php echo $row['driver_id'];?></td>
					<td><?php echo $row['driver_fname'];?></td>
                    <td><?php echo $row['driver_mname'];?></td>
                    <td><?php echo $row['driver_lname'];?></td>
                    <td><?php echo $row['license_number'];?></td>
                    <td><?php echo $row['driver_address'];?></td>
                    <td><?php echo $row['license_expiry'];?></td>
                    <td><?php echo $row['driver_bday'];?></td>
                    <td><?php echo $row['driver_height'];?></td>
                    <td><?php echo $row['driver_gender'];?></td>
                    <td><?php echo $row['license_typename'];?></td>
					
						<td><button type="button" class="btn btn-round btn-success"  onclick="editData(<?php echo $row['driver_id']; ?>, 
                      '<?php echo $row['driver_fname']; ?>',
                      '<?php echo $row['driver_mname']; ?>',
                      '<?php echo $row['driver_lname']; ?>',
                      '<?php echo $row['license_number']; ?>',
                      '<?php echo $row['driver_address']; ?>',
                      '<?php echo $row['license_expiry']; ?>',
                      '<?php echo $row['driver_bday']; ?>',
                      <?php echo $row['driver_height']; ?>,
                      '<?php echo $row['driver_gender']; ?>',
                      '<?php echo $row['license_typename']; ?>')">Edit</button>
						 <form method="post" action="index_Admin.php?page=DriverPrev" onsubmit="return confirmDelete();">
          <input type="hidden" name="delete_driver_id" id="delete_driver_id" value="<?php echo $row['driver_id']; ?>">
						<button type="submit" name="btn_delete" class="btn btn-danger"  >Delete</button>
					</form>
					</td>
                  </tr>
                 
				  			  
                   
                </tbody>
                <?php endwhile; ?>
              </table>
              
      
            </div>
          </div>
          <!-- page end-->
        </div>
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
        <!-- /row -->
        <script>
  function confirmDelete() {
    return confirm("Are you sure you want to delete this Driver?");
  }
</script>

  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content" style="width: 100%;">
        <div class="modal-header">
            <span class="close" id="closeModal">&times;</span>
            <h2>Edit Employee Information</h2>
        </div>
        <div class="modal-body">
            <form id="editForm" action="index_Admin.php?page=DriverPrev" method="post">
                <input type="text" class="form-control" name="edit_driver_id" id="edit_driver_id" readonly><br>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Driver's First Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="edit_driver_fname" id="edit_driver_fname">
                  </div>
                  <label class="col-sm-2 col-sm-2 control-label">Driver's Middle Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="edit_driver_mname" id="edit_driver_mname">
                  </div>
                  <label class="col-sm-2 col-sm-2 control-label">Driver's Last Name: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="edit_driver_lname" id="edit_driver_lname">
                  </div>
                  <label class="col-sm-2 col-sm-2 control-label">Driver's License Number: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="edit_driver_license" id="edit_driver_license">
                  </div>
               
                  <label class="col-sm-2 col-sm-2 control-label">Driver's License Expiry Date: </label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="edit_driver_expiry" id="edit_driver_expiry">
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" readonly>
                  </div>


                  <label class="col-sm-2 col-sm-2 control-label">Driver's Addres: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="edit_driver_address" id="edit_driver_address">
                  </div>
                  <label class="col-sm-2 col-sm-2 control-label">Driver's Birthday: </label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="edit_driver_bday" id="edit_driver_bday">
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" readonly>
                  </div>
                  <label class="col-sm-2 col-sm-2 control-label">Driver's Height: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="edit_driver_height" id="edit_driver_height">
                  </div>
                  <label class="col-sm-2 col-sm-2 control-label">Driver's Gender: </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="edit_driver_gender" id="edit_driver_gender">
                    <option value="Male">Male</option>
                   <option value="Female">Female</option>
                    </select>
                  </div>
                  
                  <?php 
                  $license = $mysqli->query("SELECT * FROM license_type") or die($mysqli->error);
                ?>
               
               <label class="col-sm-2 col-sm-2 control-label">License Type: </label>
                <div class="col-sm-10">
                <select class="form-control select2" name="edit_license_code" id="edit_license_code">
                    <?php while ($row2 = $license->fetch_assoc()) : ?>
                        <option value="<?php echo $row2['license_code']; ?>"><?php echo $row2['license_typename']; ?></option>
                    <?php endwhile; ?>
                </select><br>
                </div>
            
                </div>
                
            
                <center><button type="submit"  name="btn_edit" class="btn btn-theme">Update Driver</button></center>
            </form>
        </div>
        
        <div class="modal-footer">
        <h3><strong>Road and Ticket Citation</strong>. </h3>
        </div>
    </div>
</div>
<script src="./js/modal.js"></script>
<script src="./js/edit_driver2.js"></script>

  