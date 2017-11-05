<div class="w3-bar w3-black w3-border-top w3-border-bottom w3-round-large" style="width:75%;margin:auto;">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right w3-red" onclick="p_tab_switch(event, 1)" style="width:33.3%"><b>EASY</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="p_tab_switch(event, 2)" style="width:33.3%"><b>MEDIUM</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-left" onclick="p_tab_switch(event, 3)" style="width:33.3%"><b>HARD</b></button>
</div>
<div id='easy_block' class='w3-responsive w3-animate-right' style="width:75%;margin:auto;">


<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len && ${$x}['difficulty'] == 1) { ?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['p_name']." (".${$x}['p_code'].")"); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">users: <?php echo(${$x}['u_solve']."/".${$x}['u_attempt']); ?> attempts: <?php echo(${$x}['submitted']."/".${$x}['accepted']); ?> accuracy: <?php echo(${$x}['submitted'] / (${$x}['accepted'] ? ${$x}['accepted'] : 1) * 100); ?>%</small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>
	<?php
		$i++;
        $x = "num_$i";
    }
?>

</div>
<div id='med_block' class='w3-responsive w3-animate-right' style="display:none;width:75%;margin:auto;">
<?php
    $x = "num_$i";
    while($i < $len && ${$x}['difficulty'] == 2) { ?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['p_name']." (".${$x}['p_code'].")"); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">users: <?php echo(${$x}['u_solve']."/".${$x}['u_attempt']); ?> attempts: <?php echo(${$x}['submitted']."/".${$x}['accepted']); ?> accuracy: <?php echo(${$x}['submitted'] / (${$x}['accepted'] ? ${$x}['accepted'] : 1) * 100); ?>%</small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>

	<?php
		$i++;
        $x = "num_$i";
    }
?>
</div>
<div id='hard_block' class='w3-responsive w3-animate-right' style="display:none;width:75%;margin:auto;">
<?php
    $x = "num_$i";
    while($i < $len && ${$x}['difficulty'] == 3) { ?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['p_name']." (".${$x}['p_code'].")"); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">users: <?php echo(${$x}['u_solve']."/".${$x}['u_attempt']); ?> attempts: <?php echo(${$x}['submitted']."/".${$x}['accepted']); ?> accuracy: <?php echo(${$x}['submitted'] / (${$x}['accepted'] ? ${$x}['accepted'] : 1) * 100); ?>%</small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>
	<?php
		$i++;
        $x = "num_$i";
    }
?>
</div>