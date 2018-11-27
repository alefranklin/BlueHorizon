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
    if(x.className === "initial"){
        x.className = "exit-animation";
    }
    if(x.className === "enter-animation"){
        x.className = "exit-animation";
    } else {
        x.className = "enter-animation"
    }
}
