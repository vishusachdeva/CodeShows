<div class="w3-container-fluid">
    <div class="w3-container w3-border w3-light-grey" style="width:50%;min-width:200px;margin:auto;">
        <h1 style="text-align:center" class="w3-text-red">Change Password</h1>
        <form method="post" action="<?php echo(generate_link('user', 'forgot_change')); ?>">
            <label for="f_password">New Password</label>
            <div style="display:none"></div>
            <input type="password" class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="f_password" id="f_password" placeholder="New Password">
            <label for="f_confirm_password" class="w3-label">Confirm Password</label>
            <div style="display:none"></div>
            <input type="password" class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="f_confirm_password" id="f_confirm_password" placeholder="Confirm Password">
            <input type="submit" class="w3-xlarge w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" name="f_submit" value="Update Password" style="width:100%">
        </form>
    </div>
</div>