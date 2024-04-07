
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_vehicle_code, edit_vehicle_type) {
        // Populate the modal fields with the data
        document.getElementById("edit_vehicle_code").value = edit_vehicle_code;
        document.getElementById("edit_vehicle_type").value = edit_vehicle_type;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
