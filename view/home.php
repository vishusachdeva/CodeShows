<?php

    if(!isset($user_id) and empty($user_id)) { ?>
        <button onclick='login()' type='button' id='login_button'>LogIn</button>
        <a href=<?php echo(generate_link('user', 'signup')); ?>>SignUp</a>
        <div id='login_form' style='display:none'>
            <form method='post' action='<?php echo(generate_link('user', 'login')); ?>'>
                <input type='email' name='email' placeholder='Email Id' required autofocus><br/>
                <input type='password' name='password' placeholder='Password' required><br/>
                <input type='submit' value='SignIn'><br/>
            </form>
        </div>
        <script>
            function login() {
                var elem = document.getElementById('login_form');
                elem.style.display = 'initial';
                document.getElementById('login_button').style.display = 'none';
            }
        </script>
    <?php } else { ?>
        <?php echo($username); ?>
        <button onclick = "location.href = '<?php echo(generate_link('user','logout')); ?>'">LogOut</button>
    <?php }
?>