function darkmode(){
    //var dm = document.getElementsByTagName("darkmode");
}
function login(){
    window.location.href = "login.html";
}

var vueForm = document.getElementById('vueForm');
var jsForm = document.getElementById("jsForm");

function continueWITHvue(){
    vueForm.style.display = 'block';
    jsForm.style.display = "none";
}
function continueWITHjs(){
    jsForm.style.display = "block";
    vueForm.style.display = 'none';
}

// change button bacground
function BGgreen(x){
    x.style.backgroundColor = "#E0D390";
};
function NormalBg(x){
    x.style.backgroundColor = "#ffececc5";
}
function BGWhite(x){
    x.style.backgroundColor = "#E3DAC3";
}
function BGYelow(x){
    x.style.backgroundColor = "#E0DC8F";
}