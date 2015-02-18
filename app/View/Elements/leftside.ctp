<div id="sidebar" class="row-fluid">
				
        <div id="sidebar-shortcuts">
                <div id="sidebar-shortcuts-large">
                        <button class="btn btn-small btn-success"><i class="icon-signal"></i></button>
                         <a href="<?php echo $this->base.'/clipadmin/create-formula'; ?>"><button class="btn btn-small btn-info"><i class="icon-pencil"></i></button></a>
                        <button class="btn btn-small btn-warning"><i class="icon-group"></i></button>
                        <button class="btn btn-small btn-danger"><i class="icon-cogs"></i></button>
                </div>
                <div id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>
                        <span class="btn btn-info"></span>
                        <span class="btn btn-warning"></span>
                        <span class="btn btn-danger"></span>
                </div>
        </div><!-- #sidebar-shortcuts -->

        <ul class="nav nav-list">
                <li>
                  <a href="<?php echo $this->base.'/clipadmin/'; ?>">
                        <i class="icon-dashboard"></i>
                        <span>Dashboard</span>
                        
                  </a>
                </li>
                <li>
                    <a href="<?php echo $this->base.'/clipadmin/participants'; ?>">
                          <i class="icon-list"></i>
                          <span>Participants</span>
                          
                    </a>
                  </li>

        </ul><!--/.nav-list-->
        <div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>

</div><!--/#sidebar-->