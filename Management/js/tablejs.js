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

    if ((sendstart.value == "" && sendend.value == "") && (ansstart.value == "" && ansend.value == "")) {
        sendstart.required = true;
        ansstart.required = true;
    } else {
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

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("maintable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByTagName("TR");
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
