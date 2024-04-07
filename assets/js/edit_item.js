
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_item_id, edit_item_name) {
        // Populate the modal fields with the data
        document.getElementById("edit_item_id").value = edit_item_id;
        document.getElementById("edit_item_name").value = edit_item_name;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
