<div id="file_block" style='display:none'>
    <form>
        <label for = 'language'>Select Language</label>
        <select id = 'language'>
            <option value = 'C'>C</option>
            <option value = 'C++'>C++</option>
            <option value = 'Java'>Java</option>
            <option value = 'Python'>Python</option>
        </select>
        <br/><br/>
        <input type= 'file' name = 'solution'>
        <br/><br/>
        <?php if ($auth) { ?>
            <button type = 'submit' onclick="location.href=''">Submit Solution</button>
        <?php } else { ?>
            <span>Please Login to Submit</span>
        <?php } ?>
        <br/><br/>
    </form>
</div>