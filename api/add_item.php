<?php
session_start();


include '../include/connection.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $postData = file_get_contents('php://input');

    // Decode the JSON data into an associative array
    $postDataArray = json_decode($postData, true);

    // Check if 'item_id' and 'item_name' exist in the decoded array
    if (isset($postDataArray['item_name'])) {
        
   
        $employee_id = $_SESSION['employee_id'];
    $item_name = $postDataArray['item_name'];
     //echo "console.log(".$item_name.")";
     //echo "<script>const employeeId = '" . $employee_id . "';</script>";
    $item_check = $mysqli->query("SELECT item_id FROM items_table WHERE item_name = '$item_name'") or die($mysqli->error);
    if ($item_check->num_rows > 0) {
        // $error_message = "Error: The Item is already registered.";
        echo "Error: The Item is already registered.";
        
        }else{
            $sql = "INSERT INTO items_table(item_name,employee_id) VALUES('$item_name','$employee_id')";
        
            if ($mysqli->query($sql) === TRUE) {
                echo 'Item Successfully Registered';

            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        }
    }
}
    
