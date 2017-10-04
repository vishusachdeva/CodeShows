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
<div id="file_block" style='display:none'>
        <label for = 'language_file'>Select Language</label>
        <select id = 'language_file' name = 'language_file'>
            <?php foreach($map as $key => $value) { ?>
                <option value = '<?php echo($value);?>'><?php echo($key); ?></option>
            <?php } ?>
        </select>
        <br/><br/>
        <input type= 'file' id = 'solution'>
        <br/><br/>
        <?php if ($auth) { ?>
            <button type='button' id = 'submit_solution' onclick="submit('<?php echo(API_PATH.'eval.php'); ?>',
            document.getElementById('language_file').value,
            <?php echo($p_id); ?>, document.getElementById('solution'),<?php echo($time_limit); ?>)">Submit Solution</button>
        <?php } else { ?>
            <span>Please Login to Submit</span>
        <?php } ?>
        <br/><br/>
</div>