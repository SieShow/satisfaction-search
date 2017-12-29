var filtro = document.getElementById("filtro-avancado");
var btnfiltro = document.getElementById("openfilters");

window.onclick = function (event) {
    if (!isDescendant(filtro, event.target) && event.target != btnfiltro) {
        filtro.style.display = "none";
    }
}

function displayFilter() {
    if (filtro.style.display == "none") {
        filtro.style.display = "block";
    } else {
        filtro.style.display = "none";
    }
}

function isDescendant(parent, child) {
    var node = child.parentNode;
    while (node != null) {
        if (node == parent) {
            return true;
        }
        node = node.parentNode;
    }
    return false;
}

function search() {

    var sendstart = document.getElementById("send-start");
    var sendend = document.getElementById("send-end");
    var ansstart = document.getElementById("ans-start");
    var ansend = document.getElementById("ans-end");
    var btnsearch = document.getElementById("openfilters");

    if ((sendstart.value == "" && sendend.value == "") && (ansstart.value == "" && ansend.value == "")) {
        sendstart.required = true;
        ansstart.required = true;
        btnsearch.disabled = true;      
    } else {
        btnsearch.disabled = false;
        if (sendstart.value != "" || sendend.value != "") {
            if (sendstart.value == "") {
                sendstart.required = true;
            } else {
                if (sendend.value == "") {
                    sendend.required = true;
                }
            }
        } else if (ansstart.value != "" || ansend.value != "") {
            if (ansstart.value == "") {
                ansstart.required = true;
            } else {
                if (ansend.value == "") {
                    ansend.required = true;
                }
            }
        }
    }
    if (sendstart.value != "" && sendend.value != "") {
        ansstart.required = false;
        ansend.required = false;
    } else if (ansstart.value != "" && ansend.value != "") {
        sendstart.required = false;
        sendend.required = false;
    }
}