<?php
    $map = [
        "C" => 1,
        "CPP" => 2,
        "Java" => 3,
        "C#" => 9,
        "PHP" => 7,
        "Ruby" => 8,
        "Python 2.0" => 5,
        "Perl" => 6,
        "Haskell" => 12,
        "Clojure" => 13,
        "Scala" => 15,
        "Bash" => 14,
        "Mysql" => 10,
        "Oracle" => 11,
        "Erlang" => 16,
        "CLISP" => 17,
        "Lua" => 18,
        "Go" => 21
        ];
?>
<style>
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
#editor_solution {
	height:500px;
}
</style>
<script src="<?php echo JS_PATH.'compiler.js'; ?>" ></script>
<div class="w3-bar w3-black w3-border-top w3-border-bottom">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right w3-red" onclick="submit_mode_switch(event, 1)" style="width:50%"><b>Write Code</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="submit_mode_switch(event, 2)" style="width:50%"><b>Submit File</b></button>
</div>
<div id="editor_block" class="container">
    <form>
        <textarea name="editor_solution" class="w3-input w3-border w3-margin-top" id="editor_solution" cols="40" rows="15"></textarea>
        <label for="input" class="w3-margin-top">Custom Input</label><textarea name="input" id="input" class="w3-input w3-border"></textarea>
        <label for = 'language_editor' class="w3-margin-top">Select Language</label>
        <select id = 'language_editor' name='language_editor' class="w3-select w3-border">
            <?php foreach($map as $key => $value) { ?>
                <option value = '<?php echo($value);?>'><?php echo($key); ?></option>
            <?php } ?>
        </select>
        <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" type="button" id = "run" onclick="run_code('<?php echo(API_PATH.'run.php'); ?>',
            document.getElementById('language_editor').value, <?php echo($p_id); ?>,
            document.getElementById('editor_solution').value, document.getElementById('input').value, <?php echo($time_limit); ?>)">Run Code</button>
        <?php if ($auth) { ?>
            <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" id="editor_submit_solution" type = 'button' onclick="editor_submit('<?php echo(API_PATH.'eval.php'); ?>',
            document.getElementById('language_editor').value,
            <?php echo($p_id); ?>, document.getElementById('editor_solution').value, <?php echo($time_limit); ?>)">Submit Solution</button>
        <?php } else { ?>
            <br/><br/><code class="w3-codespan">Please Login to Submit Code</code>
        <?php } ?>
    </form>
</div>