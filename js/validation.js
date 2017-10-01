function isAlphaNumeric(str) {
  var code, i, len;

  for (i = 0, len = str.length; i < len; i++) {
    code = str.charCodeAt(i);
    if (!(code > 47 && code < 58) && // numeric (0-9)
        !(code > 64 && code < 91) && // upper alpha (A-Z)
        !(code > 96 && code < 123)) { // lower alpha (a-z)
      return false;
    }
  }
  return true;
};
function isAlpha(str) {
  var code, i, len;

  for (i = 0, len = str.length; i < len; i++) {
    code = str.charCodeAt(i);
    if (!(code > 64 && code < 91) && // upper alpha (A-Z)
        !(code > 96 && code < 123)) { // lower alpha (a-z)
      return false;
    }
  }
  return true;
};
function isNumeric(str) {
  var code, i, len;

  for (i = 0, len = str.length; i < len; i++) {
    code = str.charCodeAt(i);
    if (!(code > 47 && code < 58)) {
      return false;
    }
  }
  return true;
};
function validate(str) {
    var fname=document.getElementsByName('fname')[0];
    var lname=document.getElementsByName('lname')[0];
    var username=document.getElementsByName('username')[0];
    var email=document.getElementsByName('email')[0];
    var password=document.getElementsByName('password')[0];
    var confirm=document.getElementsByName('confirm')[0];
    var sem=document.getElementsByName('sem')[0];
    var cg=document.getElementsByName('cg')[0];
    var branch=document.getElementsByName('branch')[0];
    var dob=document.getElementsByName('dob')[0];
    var batch=document.getElementsByName('batch')[0];
    var institute_id=document.getElementsByName('institute_id')[0];

    var error = true;

    if (str == 'fname' || str == 'all') {
        if (!isAlpha(fname.value)) {
            er_fname.style.display = 'initial';
            er_fname.innerHTML = 'Enter Only Alphabets<br/>';
            fname.style.borderColor = 'red';
            error = false;
        }
        else if (fname.value.length > 20) {
            er_fname.style.display = 'initial';
            er_fname.innerHTML = 'Length Limit Exceeded<br/>';
            fname.style.borderColor = 'red';
            error = false;
        }
        else {
            er_fname.style.display = 'none';
            fname.style.borderColor = 'inherit';
        }
        if (str == 'fname') return;
    }

    if (str == 'lname' || str == 'all') {
        if (!isAlpha(lname.value)) {
            er_lname.style.display = 'initial';
            er_lname.innerHTML = 'Enter Only Alphabets<br/>';
            lname.style.borderColor = 'red';
            error = false;
        }
        else if (lname.value.length > 20) {
            er_lname.style.display = 'initial';
            er_lname.innerHTML = 'Length Limit Exceeded<br/>';
            lname.style.borderColor = 'red';
            error = false;
        }
        else {
            er_lname.style.display = 'none';
            lname.style.borderColor = 'inherit';
        }
        if (str == 'lname') return;
    }

    if (str == 'username' || str == 'all') {
        if (!isAlphaNumeric(username.value)) {
            er_username.style.display = 'initial';
            er_username.innerHTML = 'Enter Only Alphabets and Numbers<br/>';
            username.style.borderColor = 'red';
            error = false;
        }
        else if (username.value.length > 20) {
            er_username.style.display = 'initial';
            er_username.innerHTML = 'Length Limit Exceeded<br/>';
            username.style.borderColor = 'red';
            error = false;
        }
        else {
            er_username.style.display = 'none';
            username.style.borderColor = 'inherit';
        }
        if (str == 'username') return;
    }

    if (str == 'institute_id' || str == 'all') {
        var patt = new RegExp("2[0-9]{3}[a-zA-Z]{3}[0-9]{4}");
        if (!patt.test(institute_id.value)) {
            er_institute_id.style.display = 'initial';
            er_institute_id.innerHTML = 'eg. 2015UCP1057<br/>';
            institute_id.style.borderColor = 'red';
            error = false;
        }
        else {
            er_institute_id.style.display = 'none';
            institute_id.style.borderColor = 'inherit';
        }
        if (str == 'institute_id') return;
    }

    if (str == 'password' || str == 'all') {
        if (password.value.length < 3) {
            er_password.style.display = 'initial';
            er_password.innerHTML = 'Very Weak Password<br/>';
            password.style.borderColor = 'red';
            error = false;
        }
        else if (password.value.length < 5) {
            er_password.style.display = 'initial';
            er_password.innerHTML = 'Weak Password<br/>';
            password.style.borderColor = 'orange';
            error = false;
        }
        else if (password.value.length < 8) {
            er_password.style.display = 'initial';
            er_password.innerHTML = 'Moderate Password<br/>';
            password.style.borderColor = 'yellow';
            error = false;
        }
        else {
            er_password.style.display = 'none';
            password.style.borderColor = 'inherit';
        }
        if (str == 'password') return;
    }

    if (str == 'confirm' || str == 'all') {
        if (confirm.value !== password.value) {
            er_confirm.style.display = 'initial';
            er_confirm.innerHTML = 'Passwords do not match<br/>';
            confirm.style.borderColor = 'red';
            error = false;
        }
        else {
            er_confirm.style.display = 'none';
            confirm.style.borderColor = 'inherit';
        }
        if (str == 'confirm') return;
    }

    if (str == 'cg' || str == 'all') {
        if (cg.value > 10 || cg.value < 0) {
            er_cg.style.display = 'initial';
            er_cg.innerHTML = 'Enter Valid CGPA<br/>';
            cg.style.borderColor = 'red';
            error = false;
        }
        else {
            er_cg.style.display = 'none';
            cg.style.borderColor = 'inherit';
        }
        if (str == 'cg') return;
    }

    if (str == 'sems' || str == 'all') {
        if (sems.value == "0") {
            er_sems.style.display = 'initial';
            er_sems.innerHTML = 'Select semester<br/>';
            sems.style.borderColor = 'red';
            error = false;
        }
        else {
            sems.removeAttribute('style');
            er_sems.style.display = 'none';
        }
        if (str == 'sems') return;
    }

    if (str == 'branch' || str == 'all') {
        if (branch.value == "0") {
            er_branch.style.display = 'initial';
            er_branch.innerHTML = 'Select Branch<br/>';
            branch.style.borderColor = 'red';
            error = false;
        }
        else {
            branch.removeAttribute('style');
            er_branch.style.display = 'none';
        }
        if (str == 'branch') return;
    }

    if (str == 'all') return error;
}