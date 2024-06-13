// Function to display search bar
function opensearch() {
    document.getElementById("searchoverlay").style.display = "block";
}

// Function to hide search bar
function closesearch() {
    document.getElementById("searchoverlay").style.display = "none";
}

// Selecting all slide containers and setting the initial index value to 0
let slides = document.querySelectorAll('.slide-container');
let index = 0;
// Function to display the next slide
function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active'); //issues!
}
// Function to display the previous slide
function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}
// Looping through all the featured images and setting up a click event listener
document.querySelectorAll('.featured-image-1').forEach(image_1 =>{
    image_1.addEventListener('click', () =>{
        var src = image_1.getAttribute('src');
        document.querySelector('.big-image-1').src = src;
    });
});

// For the draggable carousel
// Selecting the card wrapper, the width to scroll, the previous and next arrow buttons, and the images and links inside the card wrapper
const cardWrapper = document.querySelector('.card-wrapper')
const widthToScroll = cardWrapper.children[0].offsetWidth
const arrowPrev = document.querySelector('.arrow.prev')
const arrowNext = document.querySelector('.arrow.next')
const cardBounding = cardWrapper.getBoundingClientRect()
const cardImageAndLink = cardWrapper.querySelectorAll('img, a')
let currScroll = 0
let initPos = 0
let clicked = false
// Setting the "draggable" attribute of all images and links inside the card wrapper to "false"
cardImageAndLink.forEach(item => {
    item.setAttribute('draggable', false)
})
// Function to move to the previous card when the previous arrow button is clicked
arrowPrev.onclick = function () {
    cardWrapper.scrollLeft -= widthToScroll
}
// Function to move to the next card when the next arrow button is clicked
arrowNext.onclick = function () {
    cardWrapper.scrollLeft += widthToScroll
}
// Function to handle mouse events when the user clicks and drags the card wrapper
cardWrapper.onmousedown = function (e) {
    cardWrapper.classList.add('grab')
    initPos = e.clientX - cardBounding.left
    currScroll = cardWrapper.scrollLeft
    clicked = true
}
// Function to handle mouse events when the user moves the mouse while clicking and dragging the card wrapper
cardWrapper.onmousemove = function (e) {
    if (clicked) {
        const xPos = e.clientX - cardBounding.left
        cardWrapper.scrollLeft = currScroll + -(xPos - initPos)
    }
}
// Function to handle mouse events when the user releases the click or moves the mouse outside the card wrapper
cardWrapper.onmouseup = mouseUpAndLeave
cardWrapper.onmouseleave = mouseUpAndLeave
// Function to handle mouse events when the user releases the click or moves the mouse outside the card wrapper
function mouseUpAndLeave() {
    cardWrapper.classList.remove('grab')
    clicked = false
}

let autoScroll
// Function to handle auto-scrolling of the cards in the card wrapper
cardWrapper.onscroll = function () {
    if (cardWrapper.scrollLeft === 0) {
        cardWrapper.classList.add('no-smooth')
        cardWrapper.scrollLeft = cardWrapper.scrollWidth - (2* cardWrapper.offsetWidth)
        cardWrapper.classList.remove('no-smooth')
    } else if (cardWrapper.scrollLeft === cardWrapper.scrollWidth - cardWrapper.offsetWidth) {
        cardWrapper.classList.add('no-smooth')
        cardWrapper.scrollLeft = cardWrapper.offsetWidth
        cardWrapper.classList.remove('no-smooth')
    }

    if (autoScroll) {
        clearTimeout(autoScroll)
    }

    autoScroll = setTimeout(() => {
        cardWrapper.classList.remove('no-smooth')
        cardWrapper.scrollLeft += widthToScroll
    }, 3000)
}

