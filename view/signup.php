<form action='<?php echo(generate_link('user', 'register')); ?>' method='post'>
    <input type='text' name='fname' placeholder='First Name'><br>
    <input type='text' name='lname' placeholder='Last Name'><br>
    <input type='text' name='username' placeholder='Username'><br>
    <input type='text' name='institute_id' placeholder='Institute Id'><br>
    <input type='email' name='email' placeholder='Email Id'><br>
    <input type='password' name='password' placeholder='Password'><br>
    <input type='password' name='confirm' placeholder='Confirm Password'><br>
    <input type='text' name='sem' placeholder='Semester'><br>
    <input type='text' name='cg' placeholder='CGPA'><br>
    <input type='text' name='branch' placeholder='Branch'><br>
    <label for='dob'>Date of Birth</label><input type='date' name='dob'><br>
    <input type='text' name='batch' placeholder='Batch'><br>
    <textarea name='about_me' placeholder='About Me'></textarea><br>
    <input type='submit' name='signup' value='SignUp'>
</form>