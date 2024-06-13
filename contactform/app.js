// Select all the elements with the class "input"
const inputs = document.querySelectorAll(".input");

// Define function to add focus class to parent element
function focusFunc() {
let parent = this.parentNode;
parent.classList.add("focus");
}

// Define function to remove focus class from parent element if input value is empty
function blurFunc() {
let parent = this.parentNode;
if (this.value == "") {
parent.classList.remove("focus");
}
}

// Loop through all input elements and add event listeners for focus and blur events
inputs.forEach((input) => {
input.addEventListener("focus", focusFunc);
input.addEventListener("blur", blurFunc);
});