
// When the close button is clicked 
document.querySelectorAll('.alertclose-btn').forEach(function (button) {
    button.addEventListener('click', function () {
        // Remove the "show" class and add the "hide" class to the element with the "alert" class
        document.querySelectorAll('.alert').forEach(function (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');
        });
    });
});