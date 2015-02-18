<?php
		
          
        //print_r($aCtrlClasses);
?>
                            <div class="dataTable_wrapper">
								  
								  <table class="table table-striped table-bordered table-hover" id="tableDefault">
                                    <thead>
                                        <tr>
                                            <th>Module</th>
                                             
                                            <th align="center">Admin</th>
                                            <th align="center">Register</th>
                                            <th align="center">Public</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                         <?php
                                            if(!empty($allRec)){
                                                foreach($allRec as $k=>$v){
													 
									 
                                         ?>
                                        <tr class="gradeU">
									  
                                            <td><?php echo str_replace('Controller','',$k); ?></td>
                                              
											<td class="center" align="center" >
												 
													<label>
														<input name="adminacl" type="checkbox" value="Remember Me"> 
													</label>
												 
											</td>
											
											<td class="center" align="center">
												 
													<label>
														<input name="registeracl" type="checkbox" value="Remember Me"> 
													</label>
												 
											</td>
											
											<td class="center" align="center">
												 
													<label>
														<input name="publicacl" type="checkbox" value="Remember Me"> 
													</label>
												 
											</td>
											 
                                        </tr>
                                        <table class="table table-striped table-bordered table-hover" >
                                        <?php 
                                        foreach($v as $action){
											
										?>
											
											 <tr class="gradeU">
									  
                                            <td> <?php echo $action; ?> </td>
                                              
											<td class="center" align="center" >
												 
													<label>
														<input name="adminacl" type="checkbox" value="Remember Me"> 
													</label>
												 
											</td>
											
											<td class="center" align="center">
												 
													<label>
														<input name="registeracl" type="checkbox" value="Remember Me"> 
													</label>
												 
											</td>
											
											<td class="center" align="center">
												 
													<label>
														<input name="publicacl" type="checkbox" value="Remember Me"> 
													</label>
												 
											</td>
											 
                                        </tr>
                                        
                                        <?php
												} //Ending Actions process
												?>
												</table>
												<?php
                                            } //Ending Foreach 
                                        } //Ending If
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
                                
								  
								  <div id="mainPanel" class="row">
                                  
                                         <?php
                                          
                                            if(!empty($list)){
                                                foreach($list as $k=>$v){
                                                  	                               ?>
                                        
                                        
                                        <div class="col-lg-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?php 
								echo $k; //str_replace("Controller",'', $v); 
							?>
                                             
                        </div>
                        <div class="panel-body">
							
                           <?php 
                           
								 
                           ?>
                           <ul>
                           <?php if(!empty($v)) { foreach($v as $a) { ?>
							   <li><?php echo $a; ?></li>
							   <?php } } ?>
                           </ul>
                           
                        </div>
                        <div class="panel-footer">
                            footer
                        </div>
                    </div>
                </div>
                
                                        <?php
												 
                                            } //Ending Foreach 
                                        } //Ending If
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                           
