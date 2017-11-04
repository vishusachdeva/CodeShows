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
<div id="file_block" class="container" style='display:none'>
    <form>
        <label for = 'language_file' class="w3-margin-top">Select Language</label>
        <select id = 'language_file' name = 'language_file' class="w3-select w3-border">
            <?php
                foreach($languages As $key => $value)
                {
            ?>
                <option value = '<?php echo($value['language_id']);?>'><?php echo($value['language_name']); ?></option>
            <?php
                }
            ?>
        </select>
        <input type= 'file' id = 'solution' class="w3-input w3-border w3-margin-top">
        <?php if ($auth) { ?>
            <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" type='button' id = 'submit_solution' onclick="p_submit('<?php echo(API_PATH.'eval.php'); ?>',
            document.getElementById('language_file').value,
            <?php echo($p_id); ?>, document.getElementById('solution'),<?php echo($time_limit); ?>)">Submit Solution</button>
        <?php } else { ?>
            <br/><code class="w3-codespan">Please Login to Submit Code</code>
        <?php } ?>
    </form>
</div>