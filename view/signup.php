<?php
    $branch = [
        "Architecture & Planning" => "AP",
        "Chemical Engineering" => "CHE",
        "Civil Engineering" => "CE",
        "Computer Engineering" => "CSE",
        "Electrical Engineering" => "EE",
        "Electronics & Comm. Engineering" => "ECE",
        "Mechanical Engineering" => "ME",
        "Metallurgical & Material Engineering" => "MET"
        ];
    $sems = [
        "I" => "1",
        "II" => "2",
        "III" => "3",
        "IV" => "4",
        "V" => "5",
        "VI" => "6",
        "VII" => "7",
        "VIII" => "8",
        "IX" => "9",
        "X" => "10"
        ];
?>

<form action='<?php echo(generate_link('user', 'register')); ?>' method='post' onsubmit="return validate('all')">
    <div id="er_fname" style="display:none"></div>
    <input type='text' name='fname' placeholder='First Name' onchange="validate('fname')" required autofocus><br>
    <div id="er_lname" style="display:none"></div>
    <input type='text' name='lname' placeholder='Last Name' onchange="validate('lname')" required><br>
    <div id="er_username" style="display:none"></div>
    <input type='text' name='username' placeholder='Username' onchange="validate('username')" required><br>
    <div id="er_institute_id" style="display:none"></div>
    <input type='text' name='institute_id' placeholder='Institute Id' onchange="validate('institute_id')" required><br>
    <div id="er_email" style="display:none"></div>
    <input type='email' name='email' placeholder='Email Id' onchange="validate('email')" required><br>
    <div id="er_password" style="display:none"></div>
    <input type='password' name='password' placeholder='Password' onchange="validate('password')" required><br>
    <div id="er_confirm" style="display:none"></div>
    <input type='password' name='confirm' placeholder='Confirm Password' onchange="validate('confirm')" required><br>
    <div id="er_sems" style="display:none"></div>
    <label for='sems'>Semester &nbsp</label><select id="sems" name = 'sem' onchange="validate('sems')" required>
        <option value="0" disabled selected>Select Semester</option>
        <?php foreach($sems as $key => $value) { ?>
        <option value = <?php echo($value); ?> > <?php echo($key); ?> </option>
        <?php } ?>
      </select><br/>
    <div id="er_cg" style="display:none"></div>
    <input type='text' name='cg' placeholder='CGPA' onchange="validate('cg')" required><br>
    <div id="er_branch" style="display:none"></div>
    <label for='branch'>Branch &nbsp</label><select id="branch" name = 'branch' onchange="validate('branch')" required>
        <option value="0" disabled selected>Select Branch</option>
        <?php foreach($branch as $key => $value) { ?>
        <option value = <?php echo($value); ?> > <?php echo($key); ?> </option>
        <?php } ?>
      </select><br/>
    <label for='dob'>Date of Birth &nbsp</label><input type='date' name='dob' onchange="validate('dob')" required><br>
    <input type='text' name='batch' placeholder='Batch' onchange="validate('batch')" required><br>
    <textarea name='about_me' placeholder='About Me' rows = "10" cols = "30" ></textarea><br>
    <input type='submit' name='signup' value='SignUp'>
</form>