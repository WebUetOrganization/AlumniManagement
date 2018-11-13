// Get the modal
let modal = document.getElementById('myPopup');
let modal1 = document.getElementById('myPopup1');
let modal2 = document.getElementById('myPopup2');

// Get the button that opens the modal
let btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal
function openModal() {
    modal.style.display = "block";
}

function openPopup() {
     modal1.style.display = "block";
    // document.write("pop");
}

function openPopAva() {
    modal2.style.display = "block";
    // document.write("pop");
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

function closePopup() {
    modal1.style.display = "none";
}

function closePopAva() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
    if (event.target === modal1){
        modal1.style.display = "none";
    }
    if (event.target === modal2){
        modal2.style.display = "none";
    }
}
