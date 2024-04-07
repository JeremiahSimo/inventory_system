
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_cs_id, edit_cs_status) {
        // Populate the modal fields with the data
        document.getElementById("edit_cs_id").value = edit_cs_id;
        document.getElementById("edit_cs_status").value = edit_cs_status;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
