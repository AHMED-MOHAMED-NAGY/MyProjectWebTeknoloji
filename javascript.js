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