<?php
	if($page_act == 'dashboard'){$dashboard_active = 'active';}else{$dashboard_active = '';}
	if($page_act == 'vehicle'){$vehicle_active = 'active';}else{$vehicle_active = '';}
	if($page_act == 'driver'){$driver_active = 'active';}else{$driver_active = '';}
	if($page_act == 'location'){$location_active = 'active';}else{$location_active = '';}
	if($page_act == 'schedule'){$sch_active = 'active';}else{$sch_active = '';}
?>

<!-- wrapper -->
<div class="wrapper">
    <div class="leftside">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li class="title">Navigation</li>
                <li class="<?php echo $dashboard_active; ?>">
                    <a href="<?php echo base_url(); ?>dashboard">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <?php if($this->session->userdata('itc_user_role') == 'Admin'){ ?>
                <li class="<?php echo $vehicle_active; ?>">
                    <a href="<?php echo base_url(); ?>vehicles">
                        <i class="fa fa-truck"></i> <span>Vehicle</span>
                    </a>
                </li>
                <li class="<?php echo $driver_active; ?>">
                    <a href="<?php echo base_url(); ?>driver">
                        <i class="fa fa-users"></i> <span>Driver</span>
                    </a>
                </li>
                <li class="<?php echo $location_active; ?>">
                    <a href="<?php echo base_url(); ?>location">
                        <i class="fa fa-globe"></i> <span>Location</span>
                    </a>
                </li>
                <?php } ?>
                <li class="<?php echo $sch_active; ?>">
                    <a href="<?php echo base_url(); ?>schedule">
                        <i class="fa fa-car"></i> <span>Schedule/Tracking</span>
                    </a>
                </li>
            </ul>
         </div>
    </div>