
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(driver_id,driver_fname,driver_mname,driver_lname,license_number,driver_address,license_expiry,driver_bday,driver_height,driver_gender,license_typename) {
        // Populate the modal fields with the data
        var licenseExpiryDate = new Date(license_expiry);
        var driverBdayDate = new Date(driver_bday);
        var formattedLicenseExpiry = formatDateForInput(licenseExpiryDate);
        var formattedDriverBday = formatDateForInput(driverBdayDate);
        
        document.getElementById("edit_driver_id").value = driver_id;
        document.getElementById("edit_driver_fname").value = driver_fname;
        document.getElementById("edit_driver_mname").value = driver_mname;
        document.getElementById("edit_driver_lname").value = driver_lname;
        document.getElementById("edit_driver_license").value = license_number;
        document.getElementById("edit_driver_address").value = driver_address;
        document.getElementById("edit_driver_expiry").value = formattedLicenseExpiry;
        document.getElementById("edit_driver_bday").value = formattedDriverBday;
        document.getElementById("edit_driver_height").value = driver_height;
        var genderSelect = document.getElementById("edit_driver_gender");
        for (var i = 0; i < genderSelect.options.length; i++) {
            if (genderSelect.options[i].text === driver_gender) {
                genderSelect.options[i].selected = true;
                break;
            }
        }
        var licenseSelect = document.getElementById("edit_license_code");
        for (var i = 0; i < licenseSelect.options.length; i++) {
            if (licenseSelect.options[i].text === license_typename) {
                licenseSelect.options[i].selected = true;
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

    function formatDateForInput(date) {
        var year = date.getFullYear();
        var month = ('0' + (date.getMonth() + 1)).slice(-2);
        var day = ('0' + date.getDate()).slice(-2);
        return year + '-' + month + '-' + day;
    }