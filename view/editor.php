<span onclick = 'submit_mode_switch(1);' onmouseover="this.style.cursor='pointer'">Write Code</span>
<span onclick = 'submit_mode_switch(2);' onmouseover="this.style.cursor='pointer'">Submit File</span>
<div id="editor_block">
    <form>
        <label for="input">Custom Input</label><textarea name="input" id="input"></textarea>
        <br/><br/>
        <label for = 'language'>Select Language</label>
        <select id = 'language'>
            <option value = 'C'>C</option>
            <option value = 'C++'>C++</option>
            <option value = 'Java'>Java</option>
            <option value = 'Python'>Python</option>
        </select>
        <br/><br/>
        <button type="button" onclick="run()">Run Code</button>
        <br/><br/>
        <?php if ($auth) { ?>
            <button type = 'submit' onclick="location.href=''">Submit Solution</button>
        <?php } else { ?>
            <span>Please Login to Submit</span>
        <?php } ?>
        <br/><br/>
    </form>
</div>