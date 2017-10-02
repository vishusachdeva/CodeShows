<script src="<?php echo JS_PATH.'compiler.js'; ?>" ></script>
<div id="file_block" style='display:none'>
        <label for = 'language'>Select Language</label>
        <select id = 'language' name = 'language'>
            <option value = 'C'>C</option>
            <option value = 'C++'>C++</option>
            <option value = 'Java'>Java</option>
            <option value = 'Python'>Python</option>
        </select>
        <br/><br/>
        <input type= 'file' id = 'solution'>
        <br/><br/>
        <?php if ($auth) { ?>
            <button type='button' onclick="submit('<?php echo(API_PATH.'eval.php'); ?>', 0,
            document.getElementById('language').value, <?php echo($p_id); ?>, document.getElementById('solution').files[0])">Submit Solution</button>
        <?php } else { ?>
            <span>Please Login to Submit</span>
        <?php } ?>
        <br/><br/>
</div>