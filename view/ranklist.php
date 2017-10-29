<table class="w3-table w3-bordered w3-hoverable">
    <h1> <?php echo($contest_name)?> </h1>
    <tr>
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
        $i =1;
        foreach($ranklist As $value)
        {
            ?>
            <tr style = "cursor:pointer" onclick = '#'>
            <td><?php echo($i); ?></td>
            <td><?php echo($value['username']) ?></td>
            <?php
                foreach($p_mapping As $pid => $pname)
                {
                    echo('<td>'.$value[$pid].'</td>');
                }
            ?>
            <td><?php echo($value['total_score']) ?></td>
            </tr>
            <?php
            $i++;
        }
    ?>
</table>