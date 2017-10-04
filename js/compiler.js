function submit(path, language, p_id, solution,time_limit) {
    if (!solution.files[0]) {
        document.getElementById('result').innerHTML = 'Please Select Valid File';
        return;
    } else if (!path || !language || !p_id) {
        document.getElementById('result').innerHTML = 'Error!! Please Try Later';
        return;
    }
    var submit_solution = document.getElementById('submit_solution');
    submit_solution.innerHTML = 'Submitting...';
    submit_solution.disabled = true;
    document.getElementById('result').innerHTML = '';

    var file_reader = new FileReader();
    file_reader.onload = function() {
        fire(path, language, p_id, file_reader.result,time_limit);
    }
    file_reader.readAsText(solution.files[0]);
}

function fire(path, language, p_id, solution,time_limit) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                var submit_solution = document.getElementById('submit_solution');
                submit_solution.innerHTML = 'Submit Solution';
                submit_solution.disabled = false;
                document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("language="+language+"&p_id="+p_id+"&solution="+encodeURIComponent(solution)+'&time_limit='+time_limit);
}

function editor_submit(path, language, p_id, solution,time_limit) {
    var editor_submit_solution = document.getElementById('editor_submit_solution');
    editor_submit_solution.innerHTML = 'Submitting...';
    editor_submit_solution.disabled = true;
    document.getElementById('result').innerHTML = '';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                editor_submit_solution = document.getElementById('editor_submit_solution');
                editor_submit_solution.innerHTML = 'Submit Solution';
                editor_submit_solution.disabled = false;
                document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("language="+language+"&p_id="+p_id+"&solution="+encodeURIComponent(solution)+'&time_limit='+time_limit);
}

function run_code(path, language, p_id, solution, testcase,time_limit) {
    if (!solution) {
        document.getElementById('result').innerHTML = 'Please Write Some Code';
        return;
    } else if (!path || !language || !p_id) {
        document.getElementById('result').innerHTML = 'Error!! Please Try Later';
        return;
    }
    var run = document.getElementById('run');
    run.innerHTML = 'Running...';
    run.disabled = true;
    document.getElementById('result').innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                var run = document.getElementById('run');
                run.innerHTML = 'Run';
                run.disabled = false;
                document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("language="+language+"&p_id="+p_id+"&solution="+encodeURIComponent(solution)+"&testcase="+testcase+'&time_limit='+time_limit);
}