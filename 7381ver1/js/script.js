/**
MEANINGFUL INTERACTION #1
Users will be helped by clicking on a dot or button to browse different rooms.
It will contributes to the user's engagement with the website's content.
*/
var index = 1;

showSlide(index);
// Increase the number of pages on the slide by controling the next and previous button.
function numSlide(n) {
  showSlide(index += n);
}
// The slide being shown.
function currSlide(n) {
  showSlide(index = n);
}
function showSlide(n) {
  var slides = document.getElementsByClassName("Slides");
  var dots = document.getElementsByClassName("dot");
  if (n < 1) {
    index = slides.length
  }
  // Initialize the number of slides.
  if (n > slides.length) {
    index = 1
  } 
  for (var i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  slides[index - 1].style.display = "block"; 
}

/**
MEANINGFUL INTERACTION #2
Design a button that avoids too much tedious content by letting the user click the button to read more.
*/

function readFunction() {
  var dot = document.getElementById("read-dot");
  var buttonTexts = document.getElementById("read-Btn");
  var moreTexts = document.getElementById("more-information");
  
  // When you click the button, the hidden content is displayed.
  if (dot.style.display === "none") {
    dot.style.display = "inline";
    buttonTexts.innerHTML = "Read more"; 
    moreTexts.style.display = "none";
  } else {
    dot.style.display = "none";
    buttonTexts.innerHTML = "Read less"; 
    moreTexts.style.display = "inline";
  }
}

/**
MEANINGFUL INTERACTION #3
I set up a gallery about the water park for users to browse, users can click 
the button to select classified pictures.
Users can quickly target content and improve the user experience.
*/

// Show all the gallery columns.
filterColumn("all")

// Show filtered images.
function showImages(element, name) {
  var array1, array2, i;
  array1 = element.className.split(" ");
  array2 = name.split(" ");
  for (i = 0; i < array2.length; i++) {
    if (array1.indexOf(array2[i]) == -1) {
      element.className += " " + array2[i];
    }
  }
}
// Hide images that are not filtered.
function hideImages(element, name) {
  var array1, array2, i;
  array1 = element.className.split(" ");
  array2 = name.split(" ");
  for (i = 0; i < array2.length; i++) {
    while (array1.indexOf(array2[i]) > -1) {
      array1.splice(array1.indexOf(array2[i]), 1);     
    }
  }
  element.className = array1.join(" ");
}

function filterColumn(n) {
  var col, i;
  col = document.getElementsByClassName("column");
  if (n == "all") {
    n = ""
  };
  for (i = 0; i < col.length; i++) {
    hideImages(col[i], "show");
    if (col[i].className.indexOf(n) > -1) {
      showImages(col[i], "show");
    }
  }
}

/**
MEANINGFUL INTERACTION #4
Get a detailed picture description by asking the user to click on the image.
It will contributes to the user's engagement with the website's content.
*/

// Get the modal of my image
var myModal = document.getElementById("mymodal");
// Get the image that will be inserted into the moal.
var myImg = document.getElementById("myimage");
var modalImg = document.getElementById("modal-img");
// Use "alt" text as the caption
var captionText = document.getElementById("img-text");
myImg.onclick = function(){
  myModal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
// Get the close-btn
var closeButton = document.getElementsByClassName("close-btn")[0];
//Close the modal by click on the close-btn
closeButton.onclick = function() { 
  myModal.style.display = "none";
}


/**
MEANINGFUL INTERACTION #5
Add a menu button for mobile users to respond to their clicks. 
Avoid reducing the user experience with drop-down menu bars.
*/
window.οnlοad=function(){
  const menuicon = document.querySelector(".menu-icon")
  const navbar = document.querySelector(".navbar")
  menuicon.addEventListener("click", ()=>{
    navbar.classList.toggle("mobile-menu")
  })
}


