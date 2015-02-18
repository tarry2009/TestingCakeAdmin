
<?php

$extraparams = $this->Session->read('extraparams');
$this->data = $extraparams;
$formulaDetail = $extraparams['formulaDetail'];
$this->Session->delete('extraparams');
?>
<h2>Participent Detail</h2>
<label>Participent Name 	 : <?php echo $this->data['Participant']['full_name']; ?> </label><br>
        
<label>Participent Email	 : <?php echo $this->data['Participant']['email']; ?> </label><br>
<label>Participent Date of Birth : <?php echo $this->data['Participant']['dob']; ?> </label><br>

<h3>Formula Detail:</h3>
<div style="color: green;">
<label>Participent Formula	 : <?php echo $formulaDetail['name']; ?> </label><br>
<label>Formula Start Date	 : <?php echo $formulaDetail['start_date']; ?> </label><br>
<label>Formula End Date	 	 : <?php echo $formulaDetail['end_date']; ?> </label><br>
</div>
						 