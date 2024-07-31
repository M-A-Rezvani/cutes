const myImg = document.getElementById("darkimg");
const myButton = document.getElementById("darkmode");

let isFirstImage = true;

myButton.addEventListener("click", function() {
    if (isFirstImage) {
        myImg.src = "";
    } else {
        myImg.src = "";
    }
    isFirstImage = !isFirstImage;
});


function darkmode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}