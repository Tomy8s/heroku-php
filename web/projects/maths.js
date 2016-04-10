function check() {
    var errmsg = "";
    if (document.getElementById("+").checked == false && document.getElementById("-").checked == false && document.getElementById("x").checked == false && document.getElementById("÷").checked == false) {
        errmsg += "No operator selected.\n";
    }
    if (parseInt(document.getElementById("ma1").value) < parseInt(document.getElementById("mi1").value)){
        errmsg += "The maximum first number cannot be larger than the minimum.\n";
    }
    if (parseInt(document.getElementById("ma2").value) < parseInt(document.getElementById("mi2").value)){
        errmsg += "The maximum second number cannot be larger than the minimum.\n";
    }
    if (parseInt(document.getElementById("maA").value) < parseInt(document.getElementById("miA").value)){
        errmsg += "The maximum answer cannot be larger than the minimum.\n";
    }
    if (document.getElementById("+").checked == true && (parseInt(document.getElementById("ma1").value) + parseInt(document.getElementById("ma2").value) < parseInt(document.getElementById("miA").value) || parseInt(document.getElementById("mi1").value) + parseInt(document.getElementById("mi2").value) > parseInt(document.getElementById("maA").value))) {
        errmsg += "No additions possible.\n";
    }
    if (document.getElementById("-").checked == true && (parseInt(document.getElementById("ma1").value) - parseInt(document.getElementById("mi2").value) < parseInt(document.getElementById("miA").value) || parseInt(document.getElementById("mi1").value) - parseInt(document.getElementById("ma2").value) > parseInt(document.getElementById("maA").value))) {
        errmsg += "No subtractions possible.\n";
    }
    if (parseInt(document.getElementById("noQ").value) < 1) {
        errmsg += "Why do you want less than one question?";
    }
    if (errmsg != "") {
        errmsg += "Please amend.";
        alert(errmsg);
        return false;
    }
}
function flipCheck() {
    if (document.getElementById("+").checked == false && document.getElementById("x").checked == false && document.getElementById("flip").checked == true) {
        alert("First select addition and/or multiplication.");
        return false;
    }
}
var flip = false;
function flipGrey() {
    if (document.getElementById("+").checked == false && document.getElementById("x").checked == false) {
        document.getElementById("flip").disabled = true;
        if (document.getElementById("flip").checked == true) {
            flip = true;
            document.getElementById("flip").checked = false;
        }
    } else {
        document.getElementById("flip").disabled = false;
        if (flip == true) {
            document.getElementById("flip").checked = true;
            flip = false;
        }
    }
}