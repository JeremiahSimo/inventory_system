
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_violation_code, edit_violation_name) {
        // Populate the modal fields with the data
        document.getElementById("edit_violation_code").value = edit_violation_code;
        document.getElementById("edit_violation_name").value = edit_violation_name;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
