function p_submit(path, language, p_id, solution, time_limit) {
    if (!solution.files[0]) {
        document.getElementById('result').innerHTML = 'Please Select Valid File';
    document.getElementById('result-panel').style.display = 'block';
        return;
    } else if (!path || !language || !p_id || !time_limit) {
        document.getElementById('result').innerHTML = 'Error!! Please Try Later';
    document.getElementById('result-panel').style.display = 'block';
        return;
    }

    var submit_solution = document.getElementById('submit_solution');
    submit_solution.innerHTML = 'Submitting...';
    submit_solution.disabled = true;
    document.getElementById('result').innerHTML = '';
    document.getElementById('result-panel').style.display = 'none';

    var file_reader = new FileReader();
    file_reader.onload = function() {
        fire(path, language, p_id, file_reader.result,time_limit);
    }
    file_reader.readAsText(solution.files[0]);
}

function fire(path, language, p_id, solution, time_limit) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                var submit_solution = document.getElementById('submit_solution');
                submit_solution.innerHTML = 'Submit Solution';
                submit_solution.disabled = false;
                if (this.responseText.startsWith('~~~~~')) {
				    document.getElementById('result-panel').style.borderColor = '';
                    document.getElementById("result").innerHTML = this.responseText.slice(5, this.responseText.length);
                } else {
				    document.getElementById('result-panel').style.borderColor = 'red';
                    document.getElementById("result").innerHTML = this.responseText;
                }
				document.getElementById('result-panel').style.display = 'block';
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("language="+language+"&p_id="+p_id+"&solution="+encodeURIComponent(solution)+'&time_limit='+time_limit);
}

function editor_submit(path, language, p_id, solution,time_limit) {
	if (!solution) {
        document.getElementById('result').innerHTML = 'Please Write Some Code';
		document.getElementById('result-panel').style.display = 'block';
        return;
    } else if (!path || !language || !p_id || !time_limit) {
        document.getElementById('result').innerHTML = 'Error!! Please Try Later';
		document.getElementById('result-panel').style.display = 'block';
        return;
    }
    var editor_submit_solution = document.getElementById('editor_submit_solution');
    editor_submit_solution.innerHTML = 'Submitting...';
    editor_submit_solution.disabled = true;
    document.getElementById('result').innerHTML = '';
	document.getElementById('result-panel').style.display = 'none';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                editor_submit_solution = document.getElementById('editor_submit_solution');
                editor_submit_solution.innerHTML = 'Submit Solution';
                editor_submit_solution.disabled = false;
                if (this.responseText.startsWith('~~~~~')) {
				    document.getElementById('result').style.borderColor = '';
                    document.getElementById("result").innerHTML = this.responseText.slice(5, this.responseText.length);
                } else {
				    document.getElementById('result').style.borderColor = 'red';
                    document.getElementById("result").innerHTML = this.responseText;
                }
				document.getElementById('result-panel').style.display = 'block';
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("language="+language+"&p_id="+p_id+"&solution="+encodeURIComponent(solution)+'&time_limit='+time_limit);
}

function run_code(path, language, p_id, solution, testcase, time_limit) {
    if (!solution) {
        document.getElementById('result').innerHTML = 'Please Write Some Code';
		document.getElementById('result').style.display = 'block';
        return;
    } else if (!path || !language || !p_id || !time_limit) {
        document.getElementById('result').innerHTML = 'Error!! Please Try Later';
		document.getElementById('result').style.display = 'block';
        return;
    }
    var run = document.getElementById('run');
    run.innerHTML = 'Running...';
    run.disabled = true;
    document.getElementById('result').innerHTML = '';
	document.getElementById('result-panel').style.display = 'none';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                var run = document.getElementById('run');
                run.innerHTML = 'Run';
                run.disabled = false;
                if (this.responseText.startsWith('~~~~~')) {
				    document.getElementById('result').style.borderColor = '';
                    document.getElementById("result").innerHTML = this.responseText.slice(5, this.responseText.length);
                } else {
				    document.getElementById('result').style.borderColor = 'red';
                    document.getElementById("result").innerHTML = this.responseText;
                }
				document.getElementById('result-panel').style.display = 'block';
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("language="+language+"&p_id="+p_id+"&solution="+encodeURIComponent(solution)+"&testcase="+testcase+'&time_limit='+time_limit);
}