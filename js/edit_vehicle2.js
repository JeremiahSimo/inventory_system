
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(vehicle_id,vehicle_owner,owner_address,vehicle_platenum,vehicle_make,vehicle_color,vehicle_model,vehicle_marking,vehicle_type) {
        // Populate the modal fields with the data
      
        document.getElementById("edit_vehicle_id").value = vehicle_id;
        document.getElementById("edit_vehicle_owner").value = vehicle_owner;
        document.getElementById("edit_owner_address").value = owner_address;
        document.getElementById("edit_vehicle_platenum").value = vehicle_platenum;
        document.getElementById("edit_vehicle_make").value = vehicle_make;
        document.getElementById("edit_vehicle_color").value = vehicle_color;
        document.getElementById("edit_vehicle_model").value = vehicle_model;
        document.getElementById("edit_vehicle_marking").value = vehicle_marking;

        var vehicletype_select = document.getElementById("edit_vehicle_typeID"); // Fixed variable name
        for (var i = 0; i < vehicletype_select.options.length; i++) {
            if (vehicletype_select.options[i].text === vehicle_type) {
                vehicletype_select.options[i].selected = true;
                break;
            }
        }
        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }
  

    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
    });
