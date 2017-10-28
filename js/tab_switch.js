function p_tab_switch(evt, dif) {
    var easy = document.getElementById('easy_block');
    var med = document.getElementById('med_block');
    var hard = document.getElementById('hard_block');
    if(dif == 1)
    {
        easy.style.display = 'block';
        med.style.display = 'none';
        hard.style.display = 'none';
    }
    else if(dif==2)
    {
        easy.style.display = 'none';
        med.style.display = 'block';
        hard.style.display = 'none';
    }
    else if(dif==3)
    {
        easy.style.display = 'none';
        med.style.display = 'none';
        hard.style.display = 'block';
    }
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
	}
	evt.currentTarget.className += " w3-red";
}

function c_tab_switch(evt, time) {
    var present = document.getElementById('present_block');
    var past = document.getElementById('past_block');
    var future = document.getElementById('future_block');
    if(time == 1)
    {
        present.style.display = 'block';
        past.style.display = 'none';
        future.style.display = 'none';
    }
    else if(time==2)
    {
        present.style.display = 'none';
        past.style.display = 'none';
        future.style.display = 'block';
    }
    else if(time == 3)
    {
        present.style.display = 'none';
        past.style.display = 'block';
        future.style.display = 'none';
    }
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
	}
	evt.currentTarget.className += " w3-red";
}

function submit_mode_switch(evt, mode) {
    var editor = document.getElementById('editor_block');
    var file = document.getElementById('file_block');
    if(mode == 1) {
        editor.style.display = 'block';
        file.style.display = 'none';
    }
    else if(mode==2) {
        editor.style.display = 'none';
        file.style.display = 'block';
    }
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
	}
	evt.currentTarget.className += " w3-red";
}

function asg_switch(ele, id) {
    var li_arr = document.getElementsByTagName('li');
    var i = 0;
    $.each(li_arr, function(index, li) {
        if (i) li.className = li.className.replace(' w3-light-grey', '');
        if (i) document.getElementById("num_"+(i - 1)).style.display = 'none';
        if (i) document.getElementById("num_"+(i - 1)+"_").style.display = 'none';
        i++;
    });
    ele.className += ' w3-light-grey';
    document.getElementById(id).style.display = 'block';
    document.getElementById(id+"_").style.display = 'block';
}