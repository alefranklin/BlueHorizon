function toggleHamburger() {
    var x = document.getElementById("menu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function toggleUser(){
    var x = document.getElementById("user-div");
    var y = document.getElementById("body-page");
    if(x.className === "initial"){
        x.className = "exit-animation";
    }
    if(x.className === "enter-animation"){
        y.className = "unfade-body";
        x.className = "exit-animation";
    } else {
        y.className = "fade-body";
        x.className = "enter-animation"
    }
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("scroll-back-btn").style.display = "block";
    } else {
        document.getElementById("scroll-back-btn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 

function snackMessage(msg){
    var div = document.getElementById("snackbar");
    snackbar.innerHTML = msg;
    div.className = "show";
    setTimeout(function(){ div.className = div.className.replace("show", ""); }, 3000);
}
