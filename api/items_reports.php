<?php
  include './include/connection.php';
  include './class/edit.php';
  include './class/delete.php';

  $item_name = '';
  if(isset($_POST['btn_filter'])) {
    // Set $item_name to the selected item from the dropdown
    $item_name = isset($_POST['item_name_dropdown']) ? $_POST['item_name_dropdown'] : '';
  }
  
  $item_name_dropdown_value = $mysqli->query("SELECT * FROM items_table") or die ($mysqli->error);
  $result = null; // Initialize $result variable
  
  if (!empty($item_name)){
    // If an item is selected, apply filtering
    $query = "SELECT i.logs_timestamp_id,
              i.logs_timestamp,
              it.item_name,
              i.item_serial_number,
              ls.log_status_name,
              i.item_quantity,
              el.employee_lname,
              el.employee_fname
            FROM item_logs_timestamp i
            INNER JOIN items_table it ON it.item_id=i.item_id
            INNER JOIN employee_list el ON el.employee_id=i.employee_id
            INNER JOIN logs_status ls ON ls.log_status_id=i.logs_status_id
            WHERE i.logs_timestamp_id>=1 
            AND i.item_id = '$item_name'
            ORDER BY i.logs_timestamp DESC";
    
    $result = $mysqli->query($query) or die ($mysqli->error);
  } else {
    // If no item is selected, fetch all items
    $query = "SELECT i.logs_timestamp_id,
              i.logs_timestamp,
              it.item_name,
              i.item_serial_number,
              ls.log_status_name,
              i.item_quantity,
              el.employee_lname,
              el.employee_fname
            FROM item_logs_timestamp i
            INNER JOIN items_table it ON it.item_id=i.item_id
            INNER JOIN employee_list el ON el.employee_id=i.employee_id
            INNER JOIN logs_status ls ON ls.log_status_id=i.logs_status_id
            WHERE i.logs_timestamp_id>=1 
            ORDER BY i.logs_timestamp DESC";
    
    $result = $mysqli->query($query) or die ($mysqli->error);
  }
?>

<script>
  // Set the value of the dropdown using PHP variable
  document.getElementById('item_name_dropdown').value = '<?php echo $item_name; ?>';
</script>

<h3><i class="fa fa-angle-right"></i> Items Receiving</h3>

<form method="POST" action="index_admin.php?page=items_reports">
  <label for="violationDropdown">Item name:</label>
  <select style="width: 250px;height:30px;margin-right:10px;"  name="item_name_dropdown" id="item_name_dropdown">
    <option value="">ALL</option>
    <?php while ($row_itemName = $item_name_dropdown_value->fetch_assoc()): ?>
      <option value="<?php echo $row_itemName['item_id']; ?>" <?php echo ($row_itemName['item_id'] == $item_name) ? 'selected' : ''; ?>>
        <?php echo $row_itemName['item_name']; ?>
      </option>
    <?php endwhile; ?>
  </select>
  <input type="submit" name="btn_filter" value="Filter">
</form>

<table id="hidden-table-info" class="table datatable" name="btn_filter">
  <thead>
    <tr>
      <th>Log ID</th>
      <th>Item name</th>
      <th>Serial Number</th>
      <th>Total Quantity</th>
      <th>Log status</th>
      <th>Log Timestamp</th>
      <th>Received by</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr class="gradeA">
        <td><?php echo $row['logs_timestamp_id'];?></td>
        <td><?php echo $row['item_name'];?></td>
        <td><?php echo $row['item_serial_number'];?></td>
        <td><?php echo $row['item_quantity'];?></td>
        <td><?php echo $row['log_status_name'];?></td>
        <td><?php echo $row['logs_timestamp'];?></td>
        <td><?php echo $row['employee_lname'].', '. $row['employee_fname'];?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<button onclick="printTable()">Print</button>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
  function printTable() {
    // Create a new window or tab
    var printWindow = window.open('', '_blank');
    
    // Write the HTML content to the new window
    printWindow.document.write('<html><head><title>Inventory System</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('body { font-size: 14px; }');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-top: 10px; }');
    printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    
    printWindow.document.write('<h3>Inventory System</h3>');
    printWindow.document.write(document.getElementById('hidden-table-info').outerHTML);
    
    printWindow.document.write('</body></html>');
    
    // Close the document writing
    printWindow.document.close();
    
    // Print the new window
    printWindow.print();
  }
</script>
