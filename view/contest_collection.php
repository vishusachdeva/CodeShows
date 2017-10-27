<div class="w3-bar w3-black w3-border-top w3-border-bottom">
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-right w3-red" onclick="c_tab_switch(event, 1)" style="width:33.3%"><b>Present</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple" onclick="c_tab_switch(event, 2)" style="width:33.3%"><b>Upcoming</b></button>
    <button class="w3-bar-item w3-button w3-hover-cyan tablink w3-ripple w3-border-left" onclick="c_tab_switch(event, 3)" style="width:33.3%"><b>Archived</b></button>
</div>
<div id='present_block' class='w3-responsive w3-animate-right'>
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Contest Name</th><th>Start Time</th><th>End Time</th></tr>
<?php
    $i = 0;
    $x = "num_$i";

    while($i < $len) {
		if (strtotime(${$x}['start_time']) <= strtotime($curr_time) && strtotime(${$x}['end_time']) >= strtotime($curr_time)) {
		?>
			<tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'">
				<td><?php echo(${$x}['contest_name']); ?></td>
				<td><?php echo(${$x}['start_time']); ?></td>
				<td><?php echo(${$x}['end_time']); ?></td>
			</tr>
		<?php }
		$i++;
		$x = "num_$i";
    }
?>
</table>
</div>
<div id='future_block' class='w3-responsive w3-animate-right' style="display:none">
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Contest Name</th><th>Start Time</th><th>End Time</th></tr>
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) {
        if (strtotime(${$x}['start_time']) > strtotime($curr_time) && strtotime(${$x}['end_time']) > strtotime($curr_time)) {
		?>
			<tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'">
				<td><?php echo(${$x}['contest_name']); ?></td>
				<td><?php echo(${$x}['start_time']); ?></td>
				<td><?php echo(${$x}['end_time']); ?></td>
			</tr>
		<?php }
		$i++;
		$x = "num_$i";
    }
?>
</table>
</div>
<div id='past_block' class='w3-responsive w3-animate-right' style="display:none">
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Contest Name</th><th>Start Time</th><th>End Time</th></tr>
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) {
        if (strtotime(${$x}['start_time']) < strtotime($curr_time) && strtotime(${$x}['end_time']) < strtotime($curr_time)) {
		?>
			<tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'">
				<td><?php echo(${$x}['contest_name']); ?></td>
				<td><?php echo(${$x}['start_time']); ?></td>
				<td><?php echo(${$x}['end_time']); ?></td>
			</tr>
		<?php }
		$i++;
		$x = "num_$i";
    }
?>
</table>
</div>