<div class="container-fluid w3-light-grey">
    <form method="post" action="<?php echo(generate_link('asg', 'add_asg')); ?>" class="inp_form container w3-section">
        <h1 style="text-align:center" class="w3-text-red w3-myfont"><b>Add Assignment</b></h1>
        <label for="asg_name">Assignment Name</label>
        <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" placeholder="Assignment Name" name="asg_name" type="text">
        <label for="start_time">Start Time</label>
        <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="start_time" type="datetime-local">
        <label for="end_time">End Time</label>
        <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="end_time" type="datetime-local">
        <label for="batch">Batch</label>
        <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" placeholder="Batch" name="batch" type="text">
        <input type="submit" value="Add Assignment" class="w3-button w3-red w3-hover-cyan w3-ripple w3-round-large w3-margin-top w3-xlarge" style="width:100%">
    </form>
</div>