
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="tableDefault">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         
                                         <?php
                                            if(!empty($allRec)){
                                                foreach($allRec as $k=>$v){
                                                 
                                         ?>
                                        <tr class="gradeU">
                                            <td><?php echo $v['User']['name']; ?></td>
                                            <td><?php echo $v['User']['email']; ?></td>
                                            <td><?php echo $v['User']['phone']; ?></td>
                                            <td class="center">
<?php
$activeLink = $this->Html->url( array(  "controller" => "restapi",
"action" => "setstatus",
$v['User']['uuid']));

$idForDiv = $v['User']['id'];
?>
						<div id="User<?php echo $idForDiv; ?>"> 
					<?php if($v['User']['status']=='1') { ?>
						    <a  class="btn btn-success btn-circle" href="<?php echo $activeLink; ?>/User" >
						    <i class="fa fa-check"></i>
						    </a>
					<?php }else{ ?>	    
						   <a  class="btn btn-warning btn-circle" href="<?php echo $activeLink; ?>/User" >
						    <i class="fa fa-times"></i>
						    </a> 
						    
				       <?php } ?>
						</div>   
					    </td>
                                            <td class="center">
						     
<?php
$updateLink = $this->Html->url( array(  "controller" => "users",
"action" => "update",
$v['User']['uuid']));
?>
						    
                                            <a class="btn btn-default " href="<?php echo $updateLink; ?>">
					    <i class="fa fa-pencil"></i>
						    </a>
			    
<?php
$deleteLink = $this->Html->url( array(  "controller" => "restapi",
"action" => "delete",
$v['User']['uuid']));
?>
			     <a  class="btn btn-outline btn-danger" href="<?php echo $deleteLink.'/User'; ?>" onclick="return confirm('Are you sure, you wish to delete this recipe?');">
			     <i class="fa fa-times"></i>
			     </a>
                            
			                   </td>
                                        </tr>
                                        <?php
                                            } //Ending Foreach 
                                        } //Ending If
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                           