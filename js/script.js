  // Show the modal after 7 seconds
  window.onload = function() {
    setTimeout(function() {
        document.getElementById('popupModal').style.display = 'block';
    }, 7000); // 7 seconds delay
};

// Close the modal
function closeModal() {
    document.getElementById('popupModal').style.display = 'none';
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    var modal = document.getElementById('popupModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}