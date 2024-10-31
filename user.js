document.body.style.overflow = 'hidden'; 
let deleteButtons = document.querySelectorAll('.deleteBtn');

deleteButtons.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        let borrow = this.dataset.name; // Use 'data-name' instead of 'data-firstname'
        let borrowID = this.dataset.id;

        let response = confirm("Do you want to delete " + borrow + "?");

        if (response) {
            fetch('deleteuser.php?id=' + borrowID, {
                method: 'GET'
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === 'success') {
                    window.location.href = 'user.php'; // Reload the page
                } else {
                    alert('Failed to delete the record.'); // Inform the user
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});
 