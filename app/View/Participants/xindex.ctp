 <?php
 //debug($list);
 ?>
 <script>
    function confirmAction() {
        return confirm("<?php echo __('Are you sure to delete'); ?>");
    }
</script>

<div class="row-fluid">
	<h3 class="header smaller lighter blue">Participents</h3>
	<div class="table-header">
		Results for "Latest Participents"
	</div>
	 
		<table id="table_report" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">
						<label>#</label>
					</th>
					<th>Full Name</th>
					<th class="">Email </th>
					<th class=''>Date of Birth</th>
                                        <th class=''>Formula</th>
                                        <th class="hidden-480">Status</th>
					<th class="hidden-phone"><i class="icon-time hidden-phone"></i> Options</th>
					
				</tr>
			</thead>
									
			<tbody>
				<?php
                                    foreach($list as $record){
				       $fid = (!empty($record['Participant']['formula_id'])) ? $record['Participant']['formula_id']: 0;
				       $formulas[0] = 'NONE';
                                ?>
				<tr>
					<td class='center'>
						<label><span class="lbl"><?php echo $record['Participant']['id']; ?></span></label>
					</td>
					<td><?php echo $record['Participant']['full_name']; ?></td>
                                        <td class=''><?php echo $record['Participant']['email']; ?></td>
                                        <td class=''><?php echo $record['Participant']['dob']; ?></td>
					<td class='hidden-480'> <?php echo $formulas[$fid]; ?> </td>
					
					<td class='hidden-480'>
					     <span class='label <?php echo ($record['Participant']['status'] == 'Y' ) ? 'label-warning' : 'label-error' ?>'>
						 
						   <?php echo ($record['Participant']['status'] == 'Y' ) ? 'Confirmed' : 'Not Confirm' ?>
						 
					     </span></td>
					<td>
						<div class='hidden-phone visible-desktop btn-group'>
							
							<?php if($record['Participant']['status'] != 'Y' ) { ?>
							<a href="<?php echo $this->base.'/clipadmin/confirm-participant/'.$record['Participant']['id']; ?>" title="Confirm It" ><button class='btn btn-mini btn-info'><i class='icon-ok'></i></button></a>
							<?php } ?>
							<a href="<?php echo $this->base.'/clipadmin/delete-participant/'.$record['Participant']['id']; ?>" onclick="return confirmAction();" ><button class='btn btn-mini btn-danger'><i class='icon-trash'></i></button></a>
							
						</div>
						 
					</td>
				</tr>
                                
                                <?php } ?>
                        </tbody>
                </table>        
		
</div>