function get_details(column, value, display) {
    if (value.length == 0) {
        document.getElementById(display).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(display).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../includes/actions/get_details.php?col="+ column +"&value="+ value , true);
        xmlhttp.send();
    }
}