<?php
        if (empty($ranklist)) { ?>
            <h1> <?php echo('Ranklist '.$contest_name.'<br>End Time:'.$end_time); ?> </h1>
            <h2>No submissions yet</h2>
        <?php } else {
?>
<table class="w3-table w3-bordered w3-hoverable">
    <h1 > <?php echo('Ranklist '.$contest_name.'<br>End Time:'.$end_time); ?> </h1>
    <tr bgcolor = "F7AE52">
        <th>Rank</th>
        <th>User Name</th>
        <?php
                foreach($p_mapping As $key=>$value)
                {
                    echo('<th>'.$value.'</th>');
                }
        ?>
        <th>Total Score</th>
    </tr>
    <?php
        $i =0;
        $prev_score = 10000000;
        foreach($ranklist As $value)
        {
            if($prev_score !== $value['total_score'])
                $i++;
            ?>
            <tr style = "cursor:pointer" onclick = '#' <?php if($username == $value['username']){echo('bgcolor="#cae5bc"');} ?>>
            <td><?php echo($i); ?></td>
            <td><?php echo($value['username']); ?></td>
            <?php
                foreach($p_mapping As $pid => $pname)
                {
                    echo('<td>'.$value[$pid].'</td>');
                }
            ?>
            <td><?php echo($value['total_score']); ?></td>
            </tr>
            <?php
            $prev_score = $value['total_score'];
        }
    ?>
</table>
<?php } ?>