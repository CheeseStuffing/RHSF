window.onload = startup;

/* Gør det muligt at bruge piletaster til at trykke frem og tilbage */ 
document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
        scrollLeft();
        break;
        case 39:
        scrollRight();
        break;
    }
};

/* Lytter til om der trykkes på ID'erne left og right */
function startup(){
    document.getElementById("left").onclick = scrollLeft;
    document.getElementById("right").onclick = scrollRight;
}

/* Scroll til højre */
function scrollRight(){
    document.getElementById("gameBox").scrollLeft += 20;
}
/* Scroll til venstre */ 
function scrollLeft(){
    document.getElementById("gameBox").scrollLeft += -20;
}

/* Vis indhold */
function showUIcont(index) {
    exitUIcont();
    var boxes = ['login-content', 'reg-content'];
    if(index >= 0 && index < boxes.length){
        document.getElementById(boxes[index]).setAttribute('style', 'display: block;');
        var temp1 = boxes[index].split("-");
        document.getElementById(temp1[0]).setAttribute("onclick", "exitUIcont()");
    }
}

/* Skjul indhold */ 
function exitUIcont() {
    document.getElementById('login-content').style.display = "none";
    document.getElementById('login').setAttribute("onclick", "showUIcont(" + 0 + ")");            
    document.getElementById('reg-content').style.display = "none";
    document.getElementById('reg').setAttribute("onclick", "showUIcont(" + 1 + ")");
}

/* Vis tale */
function showSpeech(index) {
    exitSpeech();
    var speech = ['speech-bubble1', 'speech-bubble2', 'speech-bubble3'];
    if(index >= 0 && index < speech.length){
        document.getElementById(speech[index]).style.display = "block";
        var temp2 = speech[index].split("-");
        document.getElementById(temp2[0]).setAttribute("onclick", "exitSpeech()");
    }
}

/* Skjul tale */ 
function exitSpeech() {
    document.getElementById('speech-bubble1').style.display = "none";
    document.getElementById('character').setAttribute("onclick", "showSpeech(" + 0 + ")");
    document.getElementById('speech-bubble2').style.display = "none";
    document.getElementById('interaction2').setAttribute("onclick", "showSpeech(" + 1 + ")");
    document.getElementById('speech-bubble3').style.display = "none";
    document.getElementById('interaction3').setAttribute("onclick", "showSpeech(" + 2 + ")");               
}

/* Vis sommerfugle */
function showButterflies(index) {
    var butterflies = ['butterfly1-popup', 'butterfly2-popup', 'butterfly3-popup'];
    if(index >= 0 && index < butterflies.length){
        document.getElementById(butterflies[index]).style.display = "block";
        var temp3 = butterflies[index].split("-");
        document.getElementById(temp3[0]).setAttribute("onclick", "exitButterflies()");
    }
}

/* Skjul sommerfugle */
function exitButterflies() {
    document.getElementById('butterfly1-popup').style.display = "none";
    document.getElementById('butterfly1').setAttribute("onclick", "showButterflies(" + 0 + ")");     
    document.getElementById('butterfly2-popup').style.display = "none";
    document.getElementById('butterfly2').setAttribute("onclick", "showButterflies(" + 1 + ")"); 
    document.getElementById('butterfly3-popup').style.display = "none";
    document.getElementById('butterfly3').setAttribute("onclick", "showButterflies(" + 2 + ")");    
}

function exitNot() {
    document.getElementById('notifications-box').style.display = "none";
}