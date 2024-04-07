
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_citation_id,edit_driver_fname,edit_driver_lname,edit_vehicle_owner,edit_vehicle_platenum,edit_vehicle_make,edit_amount) {
        // Populate the modal fields with the data
        document.getElementById("edit_citation_id").value = edit_citation_id;
        document.getElementById("edit_driver_fname").value = edit_driver_fname;
        document.getElementById("edit_driver_lname").value = edit_driver_lname;
        document.getElementById("edit_vehicle_owner").value = edit_vehicle_owner;
        document.getElementById("edit_vehicle_platenum").value = edit_vehicle_platenum;
        document.getElementById("edit_vehicle_make").value = edit_vehicle_make;
        document.getElementById("edit_amount").value = edit_amount;
        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
