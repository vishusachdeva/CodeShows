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
#input {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
</style>
<script src="<?php echo JS_PATH.'compiler.js'; ?>" ></script>
<div class="w3-bar w3-black w3-border-top w3-border-bottom">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right w3-red" onclick="submit_mode_switch(event, 1)" style="width:50%"><b>Write Code</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="submit_mode_switch(event, 2)" style="width:50%"><b>Submit File</b></button>
</div>
<div id="editor_block" class="container">
    <form>

<!--=================================================================================-->
<link rel="stylesheet" href="<?php echo(IDE_PATH); ?>demo/kitchen-sink/styles.css" type="text/css" media="screen" charset="utf-8">
<br/>
<div id="optionsPanel" style="position:relative;width:70%;margin:auto;">
  <table id="controls">
    <tr type="hidden">
      <td style="width:16.67%;text-align:center;">
        <label for="doc">Language</label>
      </td><td style="width:16.67%;">
        <select id="doc" size="1" class="w3-border w3-select"></select>
      </td>

	  <td style="display:none; visibility:hidden;">
        <label for="mode" style="visibility:hidden;">Mode</label>
      </td><td style="display:none; visibility:hidden;">
        <select id="mode" size="1" style="display:none; visibility:hidden;">
        </select>
      </td>

	<td style="width:16.67%;text-align:center;">
        <label for="theme">Theme</label>
      </td><td style="width:16.67%;">
        <select id="theme" size="1" class="w3-border w3-select">

        </select>
      </td>
	  <td  style="width:16.67%;text-align:center;">
        <label for="fontsize">Font Size</label>
      </td><td style="width:16.67%;">
        <select id="fontsize" size="1" class="w3-border w3-select">
          <option value="10px">10px</option>
          <option value="11px">11px</option>
          <option value="12px">12px</option>
          <option value="13px">13px</option>
          <option value="14px">14px</option>
          <option value="16px" selected="selected">16px</option>
          <option value="18px">18px</option>
          <option value="20px">20px</option>
          <option value="24px">24px</option>
        </select>
      </td>    </tr>
    <tr style="display:none; visibility:hidden;">
      <td style="display:none; visibility:hidden;">
        <label for="keybinding" style="display:none; visibility:hidden;">Key Binding</label>
      </td><td style="display:none; visibility:hidden;">
        <select id="keybinding" size="1" style="display:none; visibility:hidden;">
          <option value="ace">Ace</option>
          <option value="vim">Vim</option>
          <option value="emacs">Emacs</option>
          <option value="custom">Custom</option>
        </select>
      </td>
    </tr>
  </table>
  </div>
  <br>
  <div id="editor-container"></div>
<!-------=================================================================================-------->

  <script src="<?php echo(IDE_PATH); ?>src/ace.js" data-ace-base="src" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo(IDE_PATH); ?>src/keybinding-vim.js"></script>
  <script src="<?php echo(IDE_PATH); ?>src/keybinding-emacs.js"></script>
  <script src="<?php echo(IDE_PATH); ?>demo/kitchen-sink/demo.js"></script>
   <script type="text/javascript" charset="utf-8">
    require("kitchen-sink/demo");
  </script>
  <script>
		function transfer()
		{
			var str=(document.getElementById("editor-container")).innerText;
			var length = 0, i=0;
			for(i = 0; i < str.length; i=i+1)
			{
				var x=str[i].charCodeAt(0);
					if(x==10){length=length+1;}
					else if(x<58 &&x>47)
					{						length=length+1;							}
					else{	break;	}
			}
			String.prototype.truncate = String.prototype.truncate ||
			  function (n){			return this.slice(n,str.length);			  };
			document.getElementById('editor_solution').innerHTML = str.truncate(length);
		}
	</script>




<!--===========================================================-->

        <textarea style="display:none" name="editor_solution" class="w3-input w3-border w3-margin-top" id="editor_solution" cols="40" rows="15"></textarea>
        <label for="input" class="w3-margin-top">Custom Input</label>
        <textarea name="input" id="input" class="w3-input w3-border"></textarea>
        <label for = 'language_editor' class="w3-margin-top">Select Language</label>
        <select id = 'language_editor' name='language_editor' class="w3-select w3-border">
            <?php foreach($map as $key => $value) { ?>
                <option value = '<?php echo($value);?>'><?php echo($key); ?></option>
            <?php } ?>
        </select>
        <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" type="button" id = "run" onclick="transfer();run_code('<?php echo(API_PATH.'run.php'); ?>',
            document.getElementById('language_editor').value, <?php echo($p_id); ?>,
            document.getElementById('editor_solution').value, document.getElementById('input').value, <?php echo($time_limit); ?>)">Run Code</button>
        <?php if ($auth) { ?>
            <button class="w3-button w3-ripple w3-red w3-hover-cyan w3-margin-top" id="editor_submit_solution" type = 'button' onclick="transfer();editor_submit('<?php echo(API_PATH.'eval.php'); ?>',
            document.getElementById('language_editor').value,
            <?php echo($p_id); ?>, document.getElementById('editor_solution').value, <?php echo($time_limit); ?>)">Submit Solution</button>
        <?php } else { ?>
            <br/><br/><code class="w3-codespan">Please Login to Submit Code</code>
        <?php } ?>
    </form>
</div>