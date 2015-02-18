
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="tableDefault">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Key Name</th>
                                            <th>Value</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         
                                         <?php
                                            if(!empty($list)){
                                                foreach($list as $k=>$v){
                                                 
                                         ?>
                                        <tr class="gradeU">
                                            <td><?php echo $v['Setting']['id']; ?></td>
                                            <td><?php echo $v['Setting']['key']; ?></td>
                                            <td><?php echo $v['Setting']['value']; ?></td>
                                            <td class="center">
<?php
$activeLink = $this->Html->url( array(  "controller" => "restapi",
"action" => "setstatus",
$v['Setting']['uuid']));

$idForDiv = $v['Setting']['id'];
?>
						<div id="Setting<?php echo $idForDiv; ?>"> 
					<?php if($v['Setting']['status']=='1') { ?>
						    <a  class="btn btn-success btn-circle" href="<?php echo $activeLink; ?>/Setting" >
						    <i class="fa fa-check"></i>
						    </a>
					<?php }else{ ?>	    
						   <a  class="btn btn-warning btn-circle" href="<?php echo $activeLink; ?>/Setting" >
						    <i class="fa fa-times"></i>
						    </a> 
						    
				       <?php } ?>
						</div>   
					    </td>
                                            <td class="center">
						     
<?php
$updateLink = $this->Html->url( array(  "controller" => "settings",
"action" => "update",
$v['Setting']['uuid']));
?>
						    
                                            <a class="btn btn-default " href="<?php echo $updateLink; ?>">
					    <i class="fa fa-pencil"></i>
						    </a>
			    
<?php
$deleteLink = $this->Html->url( array(  "controller" => "restapi",
"action" => "delete",
$v['Setting']['uuid']));
?>
			     <a  class="btn btn-outline btn-danger" href="<?php echo $deleteLink.'/Setting'; ?>" onclick="return confirm('Are you sure, you wish to delete this recipe?');">
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
                           
