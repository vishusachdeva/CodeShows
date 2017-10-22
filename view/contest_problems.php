<table class="w3-table w3-bordered w3-hoverable">
<tr><th>Problem Name</th><th>Problem Code</th><th>Accuracy</th></tr>
<?php
    $i = 0;
    $x = "num_$i";
    while($i < $len) { ?>
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