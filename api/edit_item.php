<?php


include '../include/connection.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $postData = file_get_contents('php://input');

    // Decode the JSON data into an associative array
    $postDataArray = json_decode($postData, true);

    // Check if 'item_id' and 'item_name' exist in the decoded array
    if (isset($postDataArray['item_id'], $postDataArray['item_name'])) {
        
    // $db_manager=new edit_data();
    // $edit_item_id=$_POST['item_id'];
    // $edit_item_name=$_POST['item_name'];
    $edit_item_id = $postDataArray['item_id'];
    $edit_item_name = $postDataArray['item_name'];
    // echo "console.log(".$edit_item_name.")";
    
    $item_check = $mysqli->query("SELECT item_id FROM items_table WHERE item_name = '$edit_item_name'") or die($mysqli->error);
    if ($item_check->num_rows > 0) {
        // $error_message = "Error: The Item is already registered.";
        echo "Error: The Item is already registered.";
        
        }else{
            $sql = "UPDATE `items_table` SET `item_name`='$edit_item_name' WHERE item_id=  $edit_item_id";
        
            if ($mysqli->query($sql) === TRUE) {
                echo 'Record Updated Successfully';
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        }
    }
}
    
