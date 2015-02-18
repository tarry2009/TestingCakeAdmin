<?php echo $this->Html->addCrumb('Users','/users'); ?>
<?php echo $this->Html->addCrumb('Add Candidate',''); ?>
<!--<h1>Add New Candidate</h1>-->
<?php echo $this->Form->create('users', array('id'=>'register', 'action'=>'/register','enctype'=>'multipart/form-data') ); ?>
    <input type="hidden" name="action" value="submit">        
    <table width="100%">
        <tr>
            <td width="20%"><label>Candidate Name : <req>*</req></label></td>
            <td><input type="text" name="name" class="validate[required]"></td>
            <td width="20%"><label>Candidate E-mail : <req>*</req></label></td>
            <td><input type="text" name="email" class="validate[required,custom[email]]"></td>
        </tr>
        <tr>
            <td width="20%"><label>Candidate Mobile # : <req>*</req></label></td>
            <td><input type="text" name="phone" class="validate[required, number]"></td>
            <td width="20%"><label>Applied Date : <req>*</req></label></td>
            <td><input type="text" name="applied_date" id="applied_date" readonly="readonly" value="<?php echo date('m/d/Y');?>" class="validate[required]"></td>
        </tr>
        <tr>
           <td width="20%"><label>User Group : <req>*</req></label></td>
            <td>
                <select  id="user_group_id" name="user_group_id" onchange="showjob();" class="validate[required]">
                    <?php
                    foreach($userGroup as $uGroup)
                    {
                    ?>
                    <option value="<?php echo $uGroup['Group']['id']?>"><?php echo $uGroup['Group']['name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
            <td width="20%"><label>Country : <req>*</req></label></td>
            <td>
                <select name="country" class="validate[required]">
                    <option value="">Select One</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Sri-Lanka">Sri Lanka</option>
                </select>
            </td>
            
        </tr>
        <tr class="s_hide">
			
            <td width="20%"><label>Attach Resume : </label></td>
            <td>
               <input type="file" name="resume" id="resume"  style="font-size: 90%;!important;">
               
            </td>
            
            <td width="20%"><label class="s_hide">Job Title: <req>*</req></label></td>
            <td >
                
                <select id="applied_position" name="applied_position" class="validate[required] s_hide">
                    <option value="">Select One</option>
                   <?php
                   foreach($jobs as $position)
                   {
                   ?>
                    <option value="<?php echo $position['Job']['id'];?>"><?php echo $position['Job']['id'].' - '.$position['Job']['jobtitle'];?></option>
                   <?php
                   }
                   ?>
                </select>
            
            </td>
        </tr>
        <tr>
            <td colspan="2"><a class="action top15" href="<?php echo $this->html->url('/');?>users">Back</a></td>
            <td colspan="2"><div class="right-align"><?php echo $this->Form->submit(__('Save', true));?></div></td>
        </tr>
    </table>
<?php echo $this->Form->end();?>
<?php echo $this->Html->script('jquery-ui'); ?>
<?php echo $this->Html->css('jquery-ui'); ?>
