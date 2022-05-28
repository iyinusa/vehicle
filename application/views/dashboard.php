    <div class="rightside">
        <div class="page-head">
            <h1>Dashboard  <small>site metrics</small></h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        
        <?php
			$vehicle = 0;
			$driver = 0;
			$location = 0;
			$tracking = 0;
			
			$ins =& get_instance();
			$ins->load->model('mlocation');
			$ins->load->model('mvehicle');
			
			$driver = count($this->user->query_user());
			$vehicle = count($this->mvehicle->query_vehicle());
			$location = count($this->mlocation->query_location());
			
			if($this->session->userdata('itc_log_role') == 'Admin'){
				$tracking = count($this->mschedule->query_schedule());	
			} else {
				$tracking = count($this->mschedule->query_schedule($this->session->userdata('log_user_id')));	
			}
		?>

        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-box palette-alizarin">
                        <h3 class="timer" data-start="0" data-from="0" data-to="<?php echo $vehicle; ?>" data-speed="3000" data-refresh-interval="10"></h3>
                        <p>Vehicles</p>
                        <i class="fa fa-truck"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-box palette-nephritis">
                        <h3 class="timer" data-start="0" data-from="0" data-to="<?php echo $driver; ?>" data-speed="3000" data-refresh-interval="10"></h3>
                        <p>Drivers</p>
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-box palette-peter-river">
                        <h3 class="timer" data-start="0" data-from="0" data-to="<?php echo $location; ?>" data-speed="3000" data-refresh-interval="10"></h3>
                        <p>Locations</p>
                        <i class="fa fa-globe"></i>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-box palette-wet-asphalt">
                        <h3 class="timer" data-start="0" data-from="0" data-to="<?php echo $tracking; ?>" data-speed="3000" data-refresh-interval="10"></h3>
                        <p>Trackings</p>
                        <i class="fa fa-car"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>