<div class="w3-bar w3-black w3-border-top w3-border-bottom" style="width:100%">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right w3-red" onclick="p_tab_switch(event, 1)" style="width:33.3%"><b>EASY</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="p_tab_switch(event, 2)" style="width:33.3%"><b>MEDIUM</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-left" onclick="p_tab_switch(event, 3)" style="width:33.3%"><b>HARD</b></button>
</div>
<div id='easy_block' class='w3-responsive w3-animate-right'>
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Problem Name</th><th>Problem Code</th><th>Accuracy</th></tr>
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len && ${$x}['difficulty'] == 1) { ?>
        <tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'">
			<td><?php echo(${$x}['p_name']); ?></td>
			<td><?php echo(${$x}['p_code']); ?></td>
			<td><?php echo(${$x}['p_code']); ?></td>
		</tr>
	<?php
		$i++;
        $x = "num_$i";
    }
?>
</table>
</div>
<div id='med_block' class='w3-responsive w3-animate-right' style="display:none">
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Problem Name</th><th>Problem Code</th><th>Accuracy</th></tr>
<?php
    $x = "num_$i";
    while($i < $len && ${$x}['difficulty'] == 2) { ?>
        <tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'">
			<td><?php echo(${$x}['p_name']); ?></td>
			<td><?php echo(${$x}['p_code']); ?></td>
			<td><?php echo(${$x}['p_code']); ?></td>
		</tr>
	<?php
		$i++;
        $x = "num_$i";
    }
?>
</table>
</div>
<div id='hard_block' class='w3-responsive w3-animate-right' style="display:none">
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Problem Name</th><th>Problem Code</th><th>Accuracy</th></tr>
<?php
    $x = "num_$i";
    while($i < $len && ${$x}['difficulty'] == 3) { ?>
        <tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('problem', '?p_id='.${$x}['p_id'])); ?>'">
			<td><?php echo(${$x}['p_name']); ?></td>
			<td><?php echo(${$x}['p_code']); ?></td>
			<td><?php echo(${$x}['p_code']); ?></td>
		</tr>
	<?php
		$i++;
        $x = "num_$i";
    }
?>
</table>
</div>