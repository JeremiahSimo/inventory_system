function adding_item() {
    // Display the modal
    document.getElementById("myModal").style.display = "block";
    $(".card-title").text("Item Registration");
    $("#btn_update").hide();
    $("#btn_add").show();
}

document.addEventListener("DOMContentLoaded", () => {
    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        // Close the modal
        document.getElementById("myModal").style.display = "none";
        const div_toRemove = document.getElementsByClassName("alert alert-danger");
        $(div_toRemove).remove();
    });

    // JavaScript for adding an item
    const addItemButton = document.getElementById('btn_add');
    addItemButton.addEventListener('click', () => {
        // Get the value of the item name input
        const itemName = document.getElementById('edit_item_name').value.trim();
        
        // Check if the item name is not empty
        if (!itemName) {
            alert('Please enter an item name.');
            return;
        }
        
        // Prepare the data to be sent
        const postData = { 
            item_name: itemName
          
        };
        
        // Make the POST request using Axios
        axios.post('./api/add_item.php', postData)
            .then(response => {            
                // Handle the response from the server
                if (response.data.includes('Error')) {
                    // If there's an error, display it
                    alert(response.data);
                   
                } else if (response.data === 'Item Successfully Registered') {
                    // If the item is successfully registered, display a success message
                    alert(response.data);
                    window.location.reload();
                    // Optionally, you can perform additional actions like refreshing data or closing the modal
                    $("#myModal").hide();
                }
            })
            .catch(error => {
                // Handle errors in the network request
                console.error(error);
                alert('Failed in the network. Please try again.');
            });
    });
});
