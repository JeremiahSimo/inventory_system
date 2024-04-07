// Function to open the modal
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  }
  
  // Function to close the modal
  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
  
  // Event listeners
  document.getElementById("myBtn").addEventListener("click", openModal);
  
  var closeBtn = document.getElementsByClassName("close")[0];
  closeBtn.addEventListener("click", closeModal);
  
  window.addEventListener("click", function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
      closeModal();
    }
  });
  