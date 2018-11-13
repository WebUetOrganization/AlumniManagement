
$('.newbtn').bind("click" , function () {
    $('#pic').click();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
let b1 = document.getElementById('labe');
let b2 = document.getElementById('badge1');

b1.onmouseover = function selectAva() {
    b2.style.display = "block";
}

b1.onmouseout = function unselectAva() {
    b2.style.display = "none";
}

// function openNav() {
//     document.getElementById("sideMenu").style.width = "250px";
// }

function openNav() {
    document.getElementById("sideMenu").style.width = "250px";
    document.getElementsByTagName("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("sideMenu").style.width = "0";
}

function showForm(id) {
    document.getElementById(id).style.display = "block";
}

function hideForm(id) {
    document.getElementById(id).style.display = "none";
}
