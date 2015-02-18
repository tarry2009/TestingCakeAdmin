<?php echo $this->Html->addCrumb('Personal Info',''); ?>
<h1>Update Your Personal Data</h1>
<?php echo $this->Form->create('users', array('id'=>'register', 'action'=>'/dashboard') );
//pr($interview);
?>
    <input type="hidden" name="action" value="submit">        
    <table width="100%">
        <tr>
            <td width="20%"><label>Candidate Name : </label></td>
            <td><label class="tleft"><?php echo $record['User']['name']?></label></td>
            <td width="20%"><label>Candidate E-mail : </label></td>
            <td><label class="tleft"><?php echo $record['User']['email']?></label></td>
        </tr>
        <tr>
            <td width="20%"><label>Candidate Mobile # : </label></td>
            <td><label class="tleft"><?php echo $record['User']['phone']?></label></td>
            <td width="20%"><label>Country : </label></td>
            <td><label class="tleft"><?php echo $record['User']['country']?></label></td>           
        </tr>
        <tr>
            <td width="20%"><label>Applied Date : </label></td>
            <td><label class="tleft"><?php 
            //$size = sizeof($interview['JobApplication']);
            echo $interview['JobApplication']['applydate'];
            //echo date('d-M-Y',strtotime($record['User']['register_date']))?></label></td>
            <td width="20%"><label>Applied Position : </label></td>
            <td><label class="tleft"><?php 
            echo $interview['Job']['jobtitle'];
            //echo $record['User']['applied_position']?></label></td>
        </tr>
        <tr>
            <td width="20%"><label>Interview Date/Time: </label></td>
            <td><label class="tleft"><?php 
            echo $interview['JobApplicationInterview']['interviewdate'];
            echo "/".$interview['JobApplicationInterview']['interviewtime'];
            //echo date('d-M-Y H:i:s',strtotime($record['User']['interview_date']))?></label></td>
        </tr>
        <tr><td colspan="4"><hr></td></tr>
        <tr>
            <td width="20%"><label>Date Of Birth : <req>*</req></label></td>
            <td>
                <input type="text" name="date_of_birth" readonly="readonly" value="<?php echo date('d/m/Y',strtotime($record['User']['dob']))?>" id="date_of_birth" class="validate[required]">
            </td>
            <td width="20%"><label>Birth Place : <req>*</req></label></td>
            <td>
                <input style="width:200px !important;"  type="text" value="<?php echo $record['User']['birthplace']?>" name="birthplace" class="validate[required]">
            </td>
        </tr>
        <tr>
            <td width="20%"><label>Current Address : <req>*</req></label></td>
            <td>
                <input type="text" value="<?php echo $record['User']['address']?>" name="address" class="validate[required]">
            </td>
            <td width="20%"><label>City : <req>*</req></label></td>
            <td>
                <input style="width:200px !important;" type="text" value="<?php echo $record['User']['city']?>" name="city" class="validate[required]">
            </td>
        </tr>
        <tr>
            <td width="20%"><label>Gender : </label></td>
            <td>
                <select class="validate[required]" name="gender">
                    <option <?=($record['User']['gender'] == 'male')?'selected="selected"':'';?> value="male">Male</option>
                    <option <?=($record['User']['gender'] == 'female')?'selected="selected"':'';?>value="female">Female</option>
                </select>
            </td>
            <td width="20%"><label>Marital Status : </label></td>
            <td>
                <select class="validate[required]" name="marital">
                    <option <?=($record['User']['marital'] == 'single')?'selected="selected"':'';?> value="single">Single</option>
                    <option <?=($record['User']['marital'] == 'married')?'selected="selected"':'';?>value="married">Married</option>
                    <option <?=($record['User']['marital'] == 'other')?'selected="selected"':'';?>value="other">Other</option>
                </select>
            </td>
        </tr>
         <tr>
            <td width="20%"><label>Religion : <req>*</req></label></td>
            <td>
                <input type="text" name="religion" value="<?php echo strtoupper($record['User']['religion'])?>" class="validate[required]">
            </td>
        </tr>
        <tr>
            <td colspan="3"></td><td><?php echo $this->Form->submit(__('Save & Next', true));?></td>
        </tr>
        
    </table>
<?php echo $this->Form->end();?>
<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>