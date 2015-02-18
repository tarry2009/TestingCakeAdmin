<h1 align="center">Personal Information Form</h1>
<style>
    td{padding:0px !important; line-height:15px !important;}
    h4{padding-top:4px; font-weight:bold;}
</style>
<table width="100%" id="all-info">
        <tr>
            <td><h3>Personal Information</h3></td>
            <td colspan="3"></td>
        </tr>
        <tr class="edit">
            <td><a href="<?php echo $this->html->url('/')?>users/dashboard">Edit Information</a></td>
           <td colspan="3"></td>
        </tr>
        <tr>
            <td width="20%"><label>Candidate Name : </label></td>
            <td><label class="tleft"><?php echo $record['User']['name']?></label></td>
            <td width="20%"><label>Candidate E-mail : </label></td>
            <td><label class="tleft"><?php echo $record['User']['email']?></label></td>
        </tr>
        <tr>
            <td width="20%"><label>Applied Date : </label></td>
            <td><label class="tleft"><?php  
           // $size = sizeof($record['JobApplication']);
            echo $interview['JobApplication']['applydate'];
            //echo date('d-M-Y',strtotime($appliedDate['JobApplication']['applydate']))?></label></td>
            <td width="20%"><label>Applied Position : </label></td>
            <td><label class="tleft"><?php echo $interview['Job']['jobtitle'];
            //echo $record['User']['applied_position']?></label></td>
        </tr>
        <tr>
            <td width="20%"><label>Interview Date/Time: </label></td>
            <td><label class="tleft"><?php echo $interview['JobApplicationInterview']['interviewdate'];
            echo "/".$interview['JobApplicationInterview']['interviewtime']
            //echo date('d-M-Y H:i:s',strtotime($record['User']['interview_date']))?></label></td>
            <td width="20%"><label>Candidate Arrival Status : </label></td>
            <td>
                <label class="tleft">On Time</label>
            </td>
        </tr>
        <tr>
            <td width="20%"><label>Country : </label></td>
            <td><label class="tleft"><?php echo $record['User']['country']?></label></td>
            <td width="20%"><label>Date Of Birth : </label></td>
            <td>
                <label class="tleft"><?php echo date('d-M-Y H:i:s',strtotime($record['User']['dob']))?></label>
        </tr>
        <tr>
            <td width="20%"><label>Birth Place : </label></td>
            <td>
                <label class="tleft"><?php echo $record['User']['birthplace']?></label>
            </td>
            <td width="20%"><label>Current Address : </label></td>
            <td>
                <label class="tleft"><?php echo $record['User']['address']?></label>
            </td>
        </tr>
        <tr>
            <td width="20%"><label>City : </label></td>
            <td>
                <label class="tleft"><?php echo $record['User']['city']?>
            </td>
            <td width="20%"><label>Gender : </label></td>
            <td>
                <label class="tleft"><?php echo strtoupper($record['User']['gender'])?></label>
            </td>
        </tr>
        <tr>
            <td width="20%"><label>Marital Status : </label></td>
            <td>
                <label class="tleft"><?php echo strtoupper($record['User']['marital'])?></label>
            </td>
            <td width="20%"><label>Religion : </label></td>
            <td>
                <label class="tleft"><?php echo strtoupper($record['User']['religion'])?></label>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <br><br>
                <h3>Educations</h3>
                <table width="100%">
                    <tr class="edit">
                        <td><a href="<?php echo $this->html->url('/')?>educations/display">Edit Information</a></td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <th align="center">#</th>
                        <th align="center">Degree</th>
                        <th align="center">Institute</th>
                        <th align="center">Majors</th>
                        <th align="center">Start Date</th>
                        <th align="center">Finish Date</th>
                    </tr>
                    <?php
                        $x = 1;
                        foreach($record['Education'] as $e){ ?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $e['degree'];?></td>
                            <td><?php echo $e['institute'];?></td>
                            <td><?php echo $e['major'];?></td>
                            <td><?php echo $e['start_date'];?></td>
                            <td><?php echo $e['finish_date'];?></td>
                        </tr>
                    <?php  $x++;
                    } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <br><br>
                <h3>Experience</h3>
                <table width="100%">
                    <tr class="edit">
                        <td><a href="<?php echo $this->html->url('/')?>experiences/display">Edit Information</a></td>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <th align="center">#</th>
                        <th align="center">Designation</th>
                        <th align="center">Company</th>
                        <th align="center">Duties</th>
                        <th align="center">Start Date</th>
                        <th align="center">Finish Date</th>
                        <th align="center">Salary</th>
                        <th align="center">Reason</th>
                        <th align="center">Reference</th>
                    </tr>
                    <?php
                        $x = 1;
                        foreach($record['Experience'] as $e){ ?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $e['designation'];?></td>
                            <td><?php echo $e['company'];?></td>
                            <td><?php echo $e['duties'];?></td>
                            <td><?php echo $e['start_date'];?></td>
                            <td><?php echo $e['finish_date'];?></td>
                            <td style="text-align:center;"><?php echo str_replace('000.00','k',$e['salary']);?></td>
                            <td><?php echo $e['reason'];?></td>
                            <td><?php echo $e['reference'];?></td>
                        </tr>
                    <?php  $x++;
                    } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
            <br><br>
            <h3>Hobbies</h3>
            <table width="100%">
                <tr class="edit">
                    <td><a href="<?php echo $this->html->url('/')?>hobbies/display">Edit Information</a>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td width="20%">Hobbies</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['hobbies'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Student Achivements</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['student_achievements'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Club Memberships</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['club_memberships'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Organization Member</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['organization_member'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Being Foreign</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['being_foreign'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Joining Date</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['joining_date'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Transferable Locations</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['transferable_locations'] ?></td>
                </tr>
                <tr>
                    <td width="20%">Job Source</td>
                    <td width="30%"><?php echo $record['Hobby'][0]['job_source'] ?></td>
                </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <br><br>
                <h3>Confirmation</h3>
                <p>I hereby declare that all the information furnished above is true.</p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #515151;"><br><br><br><br><br></td>
        </tr>
        <tr>
            <td><?php echo $record['User']['name']?></td>
            <td colspan="2"></td>
            <td></td>
        </tr>
</table>
<a style="cursor: pointer;"  class="edit" id="print">Print Preview</a>
<div id="showhide-box" style="display:none;"></div>
<?php echo $this->Html->script('jquery-1.7.2.min'); ?>
<script>
    $(document).ready(function(){
       $('#print').click(function(){
            $('#header, #footer, .edit, #flashMessage, #navigation').css('display','none').delay(800);
            window.print();
            $('#header, #footer, .edit, #navigation').css('display','block').delay(1500);
        });
    });
</script>
<div class="right edit"><a href="<?php echo $this->html->url('/');?>questions/test">Next</a></div>