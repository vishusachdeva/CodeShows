function submit(path, submit_mode, language, p_id, file) {
    var solution = "";
    var reader = new FileReader();
    if(file.files && file.files[0]) {
        reader.onload = function (e) {
            console.log('sdjfg');
            solution = e.target.result;
            fire(path, submit_moed, language, p_id, solution);
        };
        reader.readAsText(file.files[0]);
    }
}

function fire(path, submit_mode, language, p_id, solution) {
    console.log(solution);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("submit_mode="+submit_mode+"&language="+language+"&p_id="+p_id+"&solution="+solution);
}