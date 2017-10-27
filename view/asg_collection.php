<div class='w3-responsive'>
<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Assignment Name</th><th>Start Time</th><th>End Time</th></tr>
<?php
    $i = 0;
    $x = "num_$i";

    while($i < $len) { ?>
			<tr style='cursor:pointer' onclick="location.href='<?php echo(generate_link('asg', '?asg_id='.${$x}['asg_id'])); ?>'">
				<td><?php echo(${$x}['asg_name']); ?></td>
				<td><?php echo(${$x}['start_time']); ?></td>
				<td><?php echo(${$x}['end_time']); ?></td>
			</tr>
		<?php
		$i++;
		$x = "num_$i";
    }
?>
</table>
</div>