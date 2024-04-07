<?php
    include './include/connection.php';
    include './class/edit.php';
    include './class/delete.php';

    // Check if delete button is clicked
    if (isset($_POST['btn_delete'])) {
        $db_delete = new soft_delete();
        $delete_employee = $_POST['delete_employee_id'];
        $db_delete->delete_employee($delete_employee);
    }

    // Check if edit button is clicked
    if (isset($_POST['btn_edit'])) {
        $db_manager = new edit_data();
        $edit_employee_id = $_POST['edit_employee_id'];
        $edit_employee_fname = $_POST['edit_employee_fname'];
        $edit_employee_mname = $_POST['edit_employee_mname'];
        $edit_employee_lname = $_POST['edit_employee_lname'];
        $edit_Date_hired = $_POST['edit_Date_hired'];
        $edit_email = $_POST['edit_email'];
        $edit_employee_bday = $_POST['edit_employee_bday'];
        $edit_username = $_POST['edit_username'];
        $edit_password = $_POST['edit_password'];

        // Check if the username is already registered
        $username_check = $mysqli->query("SELECT employee_id FROM employee_list WHERE employee_username = '$edit_username' AND employee_id != '$edit_employee_id'") or die($mysqli->error);
        if ($username_check->num_rows > 0) {
            $error_message = "Error: The username is already registered.";
        } else {
            // Update employee information
            $db_manager->edit_employee($edit_employee_id, $edit_employee_fname, $edit_employee_mname, $edit_employee_lname, $edit_Date_hired, $edit_email, $edit_employee_bday, $edit_username, $edit_password);
        }
    }

    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Validate $current_page
    if ($current_page < 1) {
        $current_page = 1;
    }

    // Pagination
    $records_per_page = 10; // Number of records per page
    $offset = ($current_page - 1) * $records_per_page; // Offset for fetching records
    $total_records_query = "SELECT COUNT(*) AS total FROM employee_list WHERE delete_status = 0";
    $total_records_result = $mysqli->query($total_records_query);
    $total_records_row = $total_records_result->fetch_assoc();
    $total_records = $total_records_row['total'];

    // Calculate total pages
    $total_pages = ceil($total_records / $records_per_page);

    // Fetch records for the current page
    
   
    $query = "SELECT * FROM employee_list WHERE delete_status = 0 LIMIT $records_per_page OFFSET $offset";
    $result = $mysqli->query($query);
     //$result=$mysqli->query("SELECT * FROM employee_list WHERE delete_status=0 LIMIT 50")or die ($mysqli->error);
?>


<!-- Pagination links -->
<div class="pagination">
    <?php
    // Display pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = ($i == $current_page) ? "active" : "";
        echo "<a href='index_Admin.php?page=employee_prev&$i' class='$active_class'>$i</a>";
    }
    ?>
</div>

        <h3><i class="fa fa-angle-right"></i> Employee Information Preview</h3>
     
     

        

        
    <div class="col-sm-6">
        <input type="text" class="form-control" id="searchInput" placeholder="Search by employee first name...">
    </div>

   
              <table id="hidden-table-info" class="table datatable">
                <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Date Hired</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Username</th>
                    <th>Password</th>
				        	  <th colspan="2">Option</th>					
                  </tr>
                </thead>
				
                <tbody>
                <?php
					while ($row=$result->fetch_assoc()):	
				?>
                  <tr class="gradeA">
                    <td><?php echo $row['employee_id'];?></td>
				          	<td><?php echo $row['employee_fname'];?></td>
                    <td><?php echo $row['employee_mname'];?></td>
                    <td><?php echo $row['employee_lname'];?></td>
                    <td><?php echo $row['employee_date_hired'];?></td>
                    <td><?php echo $row['employee_email'];?></td>
                    <td><?php echo $row['employee_bday'];?></td>
                    <td><?php echo $row['employee_username'];?></td>
                    <td><?php echo $row['employee_password'];?></td>

                    <td><button type="button" class="btn btn-round btn-success"  onclick="editData(<?php echo $row['employee_id']; ?>, 
                      '<?php echo $row['employee_fname']; ?>',
                      '<?php echo $row['employee_mname']; ?>',
                      '<?php echo $row['employee_lname']; ?>',
                      '<?php echo $row['employee_date_hired']; ?>',
                      '<?php echo $row['employee_email']; ?>',
                      '<?php echo $row['employee_bday']; ?>',
                      '<?php echo $row['employee_username']; ?>',
                      '<?php echo $row['employee_password']; ?>')">Edit</button>
					<form method="post" action="index_Admin.php?page=employee_prev" onsubmit="return confirmDelete();">
          <input type="hidden" name="delete_employee_id" id="delete_employee_id" value="<?php echo $row['employee_id']; ?>">
						<button type="submit" name="btn_delete" class="btn btn-danger"  >Delete</button>
					</form>
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
	<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.js"></script>

        <!-- /row -->
        <script>
  function confirmDelete() {
    return confirm("Are you sure you want to delete this employee?");
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
            <h2>Employee information</h2>
        </div>
        <div class="modal-body">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Employee Information Registration</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="index_Admin.php?page=employee_prev" id="employeeForm">
              <input type="text" class="form-control" name="edit_employee_id" id="edit_employee_id" readonly><br>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="edit_employee_fname" name="edit_employee_fname" placeholder="Your Name" required>
                    <label for="floatingName">First Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="edit_employee_mname"  name="edit_employee_mname" placeholder="Your Name" required>
                    <label for="floatingName">Middle Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="edit_employee_lname" name="edit_employee_lname"placeholder="Your Name" required>
                    <label for="floatingName">Last Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="edit_Date_hired" name="edit_Date_hired" placeholder="Your Name" required>
                    <label for="floatingName">Date Hired</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="edit_employee_bday" name="edit_employee_bday" placeholder="Your Name" required>
                    <label for="floatingName">Birthday</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="edit_username" name="edit_username" placeholder="Your Email" required>
                    <label for="floatingEmail">Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="edit_password" name="edit_password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" placeholder="Address"  id="edit_email" name="edit_email" required>
                    <label for="floatingTextarea">Email</label>
                  </div>
                </div>
             
                <div class="text-center">
                  <button name="btn_edit" type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
            </div>

  </div>
        </div>
       		

        
        <div class="modal-footer">
            <!-- <h3>Modal Footer</h3> -->
            <h3><strong>Road and Ticket Citation</strong>. </h3>
        </div>
    </div>
</div>
<script src="./assets/js/modal.js"></script>
<script src="./assets/js/edit_employee.js"></script>

  