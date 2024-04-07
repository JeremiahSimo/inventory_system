
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_penalty_id,edit_violation_name,edit_offense_name,edit_amount) {
        // Populate the modal fields with the data
        document.getElementById("edit_penalty_id").value = edit_penalty_id;

        var violationSelect = document.getElementById("edit_violationdetails");
        for (var i = 0; i < violationSelect.options.length; i++) {
            if (violationSelect.options[i].text === edit_violation_name) {
                violationSelect.options[i].selected = true;
                break;
            }
        }
        var offenseSelect = document.getElementById("edit_offense_name"); // Fixed variable name
        for (var i = 0; i < offenseSelect.options.length; i++) {
            if (offenseSelect.options[i].text === edit_offense_name) {
                offenseSelect.options[i].selected = true;
                break;
            }
        }
        document.getElementById("edit_amount").value = edit_amount;
     

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
