<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
        <script src="<?php echo JS_PATH.'validation.js'; ?>" ></script>
        <script src="<?php echo JS_PATH.'tab_switch.js'; ?>" ></script>
        <meta charset="utf-8"/>
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/manifest.json">
        <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
        <h1 onclick="location.href='<?php echo(generate_link('main', 'home')); ?>'" onmouseover="this.style.cursor='pointer'">CODESHOWS</h1>
        <?php
            if(!isset($user_id) and empty($user_id)) { ?>
                <button onclick='login()' type='button' id='login_button'>LogIn</button>
                <button type="button" onclick="location.href='<?php echo(generate_link('user', 'signup')); ?>'">SignUp</button>
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
        <br/>
    </head>
    <?php date_default_timezone_set('Asia/Kolkata'); ?>
    <body>