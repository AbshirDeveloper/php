function prepareeventhandler() {
    document.getElementById("saan").onsubmit = function() {
        if(document.getElementById("user").value == "") {
        document.getElementById("error").innerHTML = "please provide atleast a username!";
        return false;
    } else {
        document.getElementById("error").innerHTML = "";
        return true;
    }
}
}
window.onload = function() {
    prepareeventhandler();
}

function prepareeventhandler() {
    document.getElementById("haa").onsubmit = function() {
        if(document.getElementById("labo").value == "") {
        document.getElementById("error").innerHTML = "You have to provide atleast a product name";
        return false;
    } else {
        document.getElementById("error").innerHTML = "";
        return true;
    }
}
}
window.onload = function() {
    prepareeventhandler();
}


function loading () {
	
 var abshir = document.getElementById("checked");
abshir.onclick = function () {
	if(abshir.checked) {
		document.getElementById("kow").style.display = "block";
	} else {
		document.getElementById("kow").style.display = "none";
	}
}
	document.getElementById("kow").style.display = "none";
};

window.onload = function() {
	loading();
};









	