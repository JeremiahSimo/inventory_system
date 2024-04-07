
    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_employee_id,edit_employee_fname,edit_employee_mname,edit_employee_lname,edit_Date_hired,edit_email,edit_employee_bday,edit_username,edit_password) {
        // Populate the modal fields with the data
        var Date_hired = new Date(edit_Date_hired);
        var EmployeeBdayDate = new Date(edit_employee_bday);
        var formattedDate_hired = formatDateForInput(Date_hired);
        var formattedEmployeeBday = formatDateForInput(EmployeeBdayDate);
        
        document.getElementById("edit_employee_id").value = edit_employee_id;
        document.getElementById("edit_employee_fname").value = edit_employee_fname;
        document.getElementById("edit_employee_mname").value = edit_employee_mname;
        document.getElementById("edit_employee_lname").value = edit_employee_lname;
        document.getElementById("edit_Date_hired").value = formattedDate_hired;
        document.getElementById("edit_email").value = edit_email;
        document.getElementById("edit_employee_bday").value = formattedEmployeeBday;
        document.getElementById("edit_username").value = edit_username;
        document.getElementById("edit_password").value = edit_password;

    
    
       
     

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