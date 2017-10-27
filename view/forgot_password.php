<h2>Forgot Password?</h2>
<p>
    Enter your e-mail and username below. An automatically generated password will be sent to you via an email.
</p>
<form action = '<?php echo(generate_link('user','forgot_password')); ?>' method = 'post'>
    <p>
        <label>E-mail</label><br>
        <input type = 'email' name = 'email' placeholder = 'E-mail'> <br>
        <label>User name</label><br>
        <input type = 'text' name = 'username' placeholder = 'User Name'><br><br>
        <input type = 'submit' name = 'reset_password' value = 'Reset Password'>
    </p>
</form>