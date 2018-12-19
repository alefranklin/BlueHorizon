function toggleHamburger() {
    var menu = document.getElementById("menu");
    if (menu.className === "topnav") {
        menu.className += " responsive";
    } else {
        menu.className = "topnav";
    }
}

function toggleUser() {
    var userDiv = document.getElementById("user-div");
    var bodyPage = document.getElementById("body-page");

    if(userDiv.className === "initial"){
        userDiv.className = "enter-animation";
    } else {
      if(userDiv.className === "enter-animation"){
          bodyPage.className = "unfade-body";
          userDiv.className = "exit-animation";
      } else {
          bodyPage.className = "fade-body";
          userDiv.className = "enter-animation"
      }
    }
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {

    var btn = document.getElementById("scroll-back-btn");

    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function snackMessage(msg){
  var snackDiv = document.getElementById("snack-div")
  var snackMsg = document.getElementById("snack-msg");
  var snackImg = document.getElementById("snack-img");
  var message;
  var message_type;
  var message_content;
  var request = new XMLHttpRequest();
  request.open("GET", "http://localhost/BlueHorizon/js/messages.xml");
  request.send();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  function myFunction(xml) {
    var xmlDoc = xml.responseXML;
    message = xmlDoc.getElementsByTagName('message')[msg-1];
    if(message){
      message_content = message.childNodes[3].textContent;
      message_type = message.childNodes[1].textContent;
      snackImg.className = message_type;
      snackMsg.innerHTML = message_content;
      if(message_type == 'good'){
        snackImg.innerHTML = "<i class=\"fas fa-check\"></i>"
      } else {
        snackImg.innerHTML = "<i class=\"fas fa-times\"></i>"
      }
      snackImg.className = message_type;
      snackClass = message_type + " show"
      snackDiv.className = snackClass;
      console.log(snackClass);
      console.log(message_content);
      setTimeout(function(){ snackDiv.className = snackDiv.className.replace(snackClass, ""); }, 3000);
    }
  }

}
