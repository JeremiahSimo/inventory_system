
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_location_code, edit_location_name) {
        // Populate the modal fields with the data
        document.getElementById("edit_location_code").value = edit_location_code;
        document.getElementById("edit_location_name").value = edit_location_name;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
