<div class="w3-bar w3-black w3-border-top w3-border-bottom w3-round-large" style="width:75%;margin:auto;">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right w3-red" onclick="c_tab_switch(event, 1)" style="width:33.3%"><b>Present</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="c_tab_switch(event, 2)" style="width:33.3%"><b>Upcoming</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-left" onclick="c_tab_switch(event, 3)" style="width:33.3%"><b>Archived</b></button>
</div>
<div id='present_block' class='w3-responsive w3-animate-right' style="width:75%;margin:auto;">
<h1 style="width:100%;text-align:center;" class="w3-myfont"><b>Contests</b></h1>
<?php
    $i = 0;
    $x = "num_$i";

    while($i < $len) {
		if (strtotime(${$x}['start_time']) <= strtotime($curr_time) && strtotime(${$x}['end_time']) >= strtotime($curr_time)) {
		?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['contest_name']); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">Start: <?php echo(${$x}['start_time']); ?> End: <?php echo(${$x}['end_time']); ?></small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>
		<?php }
		$i++;
		$x = "num_$i";
    }
?>
</div>
<div id='future_block' class='w3-responsive w3-animate-right' style="display:none;width:75%;margin:auto;">
<h1 style="width:100%;text-align:center;" class="w3-myfont"><b>Contests</b></h1>
<?php
    $i = 0;
    $x = "num_$i";

    while($i < $len) {
		if (strtotime(${$x}['start_time']) > strtotime($curr_time) && strtotime(${$x}['end_time']) > strtotime($curr_time)) {
		?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['contest_name']); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">Start: <?php echo(${$x}['start_time']); ?> End: <?php echo(${$x}['end_time']); ?></small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>
		<?php }
		$i++;
		$x = "num_$i";
    }
?>
</div>
<div id='past_block' class='w3-responsive w3-animate-right' style="display:none;width:75%;margin:auto;">
<h1 style="width:100%;text-align:center;" class="w3-myfont"><b>Contests</b></h1>
<?php
    $i = 0;
    $x = "num_$i";

    while($i < $len) {
		if (strtotime(${$x}['start_time']) < strtotime($curr_time) && strtotime(${$x}['end_time']) < strtotime($curr_time)) {
		?>
<div class="container w3-border w3-light-grey" style="margin:1% auto;width:100%;border-radius:15px;">
    <div class="clearfix"></div>
    <div style="float:left;width:85%;padding-bottom:1%;">
        <h3 style="font-size:150%;line-height:100%;"><b><?php echo(${$x}['contest_name']); ?></b></h3>
        <div style="width:100%">
            <small style="font-size:90%;line-height:100%;">Start: <?php echo(${$x}['start_time']); ?> End: <?php echo(${$x}['end_time']); ?></small>
        </div>
    </div>
    <div style="width:15%;float:right;position:relative;height:10%;">
        <button onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'" class="w3-hover-cyan w3-ripple w3-button w3-red w3-round-large" style="position:absolute;top:20%;height:60%;width:100%;">Solve</button>
    </div>
</div>
		<?php }
		$i++;
		$x = "num_$i";
    }
?>
</div>