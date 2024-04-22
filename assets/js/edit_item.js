
let error = false;

document.getElementById('btn_add').style.display = 'none';
document.getElementById('btn_update').style.display = 'block';

const edit_item_id = document.getElementById('edit_item_id');
const edit_item_name = document.getElementById('edit_item_name');

    // JavaScript to handle opening the modal when an "EDIT" button is clicked
    function editData(edit_item_id, edit_item_name) {
        // Populate the modal fields with the data
        this.edit_item_id.value = edit_item_id;
        this.edit_item_name.value = edit_item_name;
        
        error = true;

        // Open the modal
        document.getElementById("myModal").style.display = "block";
    }   


    // JavaScript to close the modal
    const closeModalButton = document.getElementById("closeModal");
    closeModalButton.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "none";
        const div_toRemove = document.getElementsByClassName("alert alert-danger");
                    $(div_toRemove).remove();
    });


document.getElementById("myModal")
    const updateButton = document.getElementById('btn_update');
    updateButton.addEventListener('click', () => {
        // const editItemId = document.getElementById('edit_item_id').value;
        // const editItemName = document.getElementById('edit_item_name').value;
    
        const postData = {
            item_id: edit_item_id.value,
            item_name: edit_item_name.value
        };
        console.log(postData);
        axios.post('./api/edit_item.php', postData)
            .then(success => {            
                if (success.data.includes('Error') && error) {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger';
                    alertDiv.textContent = success.data;

                    const closeModalButton = document.getElementById('closeModal');
                    $(alertDiv).insertAfter('#closeModal');
                    // document.body.appendChild(alertDiv);
                    error = false;
                }
                else if (success.data === 'Record Updated Successfully') {
                    alert(success.data);
                    window.location.reload();
                    // Optionally perform additional actions (e.g., refresh data, close modal)
                    $("#myModal").hide();
                    const div_toRemove = document.getElementsByClassName("alert alert-danger");
                    $(div_toRemove).remove();
                    $("#" + edit_item_id.value).html(edit_item_name.value);
                    document.querySelectorAll('.gradeA td').forEach(td => {
                        const itemId = td.dataset.id;
                        const itemName = td.dataset.itemName;
                        console.log(`Item ID: ${itemId}, Item Name: ${itemName}`);
                       
                        
                    });
                }
            })
            .catch(error => {
                console.error(error);
                alert('Failed to update record. Please try again.');
            });
    });

    document.addEventListener("DOMContentLoaded", () => {
        
    })
    
    