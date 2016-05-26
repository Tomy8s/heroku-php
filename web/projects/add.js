function showiframe(){
    document.getElementById('iframe').style.display = 'block';
    document.getElementById('iframe').style.visibility = 'visible';
    document.getElementById('iframe').style.zIndex = 10;
}
function hideiframe(){
    document.getElementById('iframe').style.display = 'none';
    document.getElementById('iframe').style.visibility = 'hidden';
    document.getElementById('iframe').style.zIndex = -10;
}