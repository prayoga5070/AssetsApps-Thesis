<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <?php 
                    if ($this->session->userdata('logged_in')['level'] == 1) { ?>    
                 <li><a href="<?php echo base_url(); ?>superadmin/manage"> <i class="icon-speedometer menu-icon"></i><span class="nav-text">Portal Page</span></a></li>
             <?php }else{ ?>
                 <li><a href="<?php echo base_url(); ?>portal"> <i class="icon-speedometer menu-icon"></i><span class="nav-text">Portal Page</span></a></li>
             <?php } ?>
            </li> 
            <li>
                 <li><a href="<?php echo base_url(); ?>dashboard"> <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span></a></li>
            </li>            
            <li class="nav-label">Dashboard Power BI</li>
            <?php 
            if ($this->session->userdata('logged_in')['dash_c'] == 1) { ?>    
            <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/ehs_hr"> <i class="icon-graph menu-icon"></i><span class="nav-text">EHS & HR</span></a></li>
            </li>
             <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/production"> <i class="icon-graph menu-icon"></i><span class="nav-text">Production</span></a></li>
            </li>
              <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/purchase"> <i class="icon-graph menu-icon"></i><span class="nav-text">Purchase</span></a></li>
            </li>
            <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/rd"> <i class="icon-graph menu-icon"></i><span class="nav-text">R&D</span></a></li>
            </li>
            <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/sales"> <i class="icon-graph menu-icon"></i><span class="nav-text">Sales</span></a></li>
            </li>
            <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/oa"> <i class="icon-graph menu-icon"></i><span class="nav-text">Ongkos Angkut</span></a></li>
            </li>
             <?php } ?>
            <li class="nav-label">Confidential - Power BI</li>
            <?php 
            if ($this->session->userdata('logged_in')['dash_b'] == 1) { ?>
            <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/finishgoods"> <i class="icon-graph menu-icon"></i><span class="nav-text">Finish Goods</span></a></li>
            </li>
         <?php } ?>
         <?php 
            if ($this->session->userdata('logged_in')['dash_a'] == 1) { ?>
              <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/selling"> <i class="icon-graph menu-icon"></i><span class="nav-text">Selling</span></a></li>
            </li>
            <?php } ?>
        <?php 
            if ($this->session->userdata('logged_in')['dash_d'] == 1) { ?>
              <li>
                 <li><a href="<?php echo base_url(); ?>dashboard/operation"> <i class="icon-graph menu-icon"></i><span class="nav-text">Operation</span></a></li>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->