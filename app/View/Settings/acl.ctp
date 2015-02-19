<?php
		
          
        //print_r($aCtrlClasses);
?>
                            <div class="table-responsive">
								  
								  <table class="table table-striped  table-hover" id="tableDefault">
                                    <thead>
                                        <tr>
											
                                            <th >Module</th>
                                             
                                            <th width="10%" align="center">Admin</th>
                                            <th width="10%" align="center">Register</th>
                                            <th width="10%" align="center">Public</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                         <?php
                                            if(!empty($allRec)){
                                                foreach($allRec as $k=>$v){
									 
                                         ?>
                                        <tr class="gradeU">
									   
                                            <td id="<?php echo $k; ?>" class="details-control" >
											<a aria-expanded="true" class=""> <?php echo str_replace('Controller','',$k); ?> </a>	
											</td>
                                              
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
												 
                                            } //Ending Foreach 
                                        } //Ending If
                                        ?>
                                    </tbody>
                                </table>
<div class="hide">
                                      <?php
                                            if(!empty($allRec)){
                                                foreach($allRec as $k=>$v){
									 
                                      ?>
                                      
                                      <div id="t<?php echo $k; ?>" class=" table-responsive"> 
											<table  class="table table-striped  " >
											
										<?php 
                                        foreach($v as $action){
											
										?>
											
												<tr class="info" >
										  
												<td > <?php echo $action; ?> </td>
												  
												<td width="10%" class="center" align="center" >
													 
														<label>
															<input name="adminacl" type="checkbox" value="Remember Me"> 
														</label>
													 
												</td>
												
												<td width="10%" class="center" align="center">
													 
														<label>
															<input name="registeracl" type="checkbox" value="Remember Me"> 
														</label>
													 
												</td>
												
												<td width="10%" class="center" align="center">
													 
														<label>
															<input name="publicacl" type="checkbox" value="Remember Me"> 
														</label>
													 
												</td>
												 
											</tr>
											
											<?php
													} //Ending Actions process
											?>
											
											</table> </div>
											
											     <?php
												 
                                            } //Ending Foreach 
                                        } //Ending If
                                        ?>
										</div>
											
                            </div>
                           
