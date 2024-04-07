
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(license_code, license_typename) {
        // Populate the modal fields with the data
        document.getElementById("edit_license_code").value = license_code;
        document.getElementById("edit_license").value = license_typename;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
