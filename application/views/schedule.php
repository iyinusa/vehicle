    <div class="rightside">
        <div class="page-head">
            <h1>Schedules/Tracking</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Schedules/Tracking</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php if($this->session->userdata('itc_user_role') == 'Admin'){ ?>
						<?php echo form_open_multipart('schedule'); ?>
                            <div class="box">
                                <div class="box-title">
                                    <i class="fa fa-car"></i>
                                    <h3>New Schedule</h3>
                                    <div class="pull-right box-toolbar">
                                        <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                    </div>          
                                </div>
                                <div class="box-body" style="overflow:auto;">
                                    <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                    
                                    <?php
                                        $driver_list = '';
                                        $vehicle_list = '';
                                        $source_list = '';
                                        $dest_list = '';
                                        
                                        //get drivers
                                        if(!empty($alluser)){
                                            foreach($alluser as $user){
                                                if($user->role != 'Admin'){
                                                    if(!empty($e_user_id)){
                                                        if($e_user_id == $user->user_id){
                                                            $dsel = 'selected="selected"';
                                                        } else {$dsel = '';}
                                                    } else {$dsel = '';}
                                                    $driver_list .= '<option value="'.$user->user_id.'" '.$dsel.'>'.$user->firstname.' '.$user->lastname.'</option>';
                                                }
                                            }
                                        }
                                        
                                        //get vehicles
                                        if(!empty($allveh)){
                                            foreach($allveh as $veh){
                                                if(!empty($e_vehicle_id)){
                                                    if($e_vehicle_id == $veh->id){
                                                        $vsel = 'selected="selected"';
                                                    } else {$vsel = '';}
                                                } else {$vsel = '';}
                                                $vehicle_list .= '<option value="'.$veh->id.'" '.$vsel.'>'.$veh->name.' ('.$veh->plate.')</option>';
                                            }
                                        }
                                        
                                        //get sources
                                        if(!empty($allloc)){
                                            foreach($allloc as $loc){
                                                if(!empty($e_source_id)){
                                                    if($e_source_id == $loc->id){
                                                        $ssel = 'selected="selected"';
                                                    } else {$ssel = '';}
                                                } else {$ssel = '';}
                                                $source_list .= '<option value="'.$loc->id.'" '.$ssel.'>'.$loc->name.'</option>';
                                            }
                                        }	
                                        
                                        //get destinations
                                        if(!empty($allloc)){
                                            foreach($allloc as $loc){
                                                if(!empty($e_destination_id)){
                                                    if($e_destination_id == $loc->id){
                                                        $desel = 'selected="selected"';
                                                    } else {$desel = '';}
                                                } else {$desel = '';}
                                                $dest_list .= '<option value="'.$loc->id.'" '.$desel.'>'.$loc->name.'</option>';
                                            }
                                        }	
                                    ?>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="sch_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
                                            <label>Schedule Day</label>
                                            <select name="day" class="form-control" placeholder="Select Day" required>
                                                <option value="">Select Day</option>
                                                <?php if(!empty($e_day)){ ?>
                                                <option value="<?php echo $e_day; ?>" selected="selected"><?php echo $e_day; ?></option>
                                                <?php } ?>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Driver</label>
                                            <select name="user_id" class="form-control" placeholder="Select Driver" required>
                                                <option value="">Select Driver</option>
                                                <?php echo $driver_list; ?>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>Vehicle</label>
                                            <select name="vehicle_id" class="form-control" placeholder="Select Vehicle" required>
                                                <option value="">Select Vehicle</option>
                                                <?php echo $vehicle_list; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Source</label>
                                            <select name="source_id" class="form-control" placeholder="Select Source" required>
                                                <option value="">Select Source</option>
                                                <?php echo $source_list; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Departure Time</label>
                                            <input type="text" name="depart_time" class="form-control" placeholder="Departure Time e.g. 10:00" value="<?php if(!empty($e_depart_time)){echo $e_depart_time;} ?>" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <select name="destination_id" class="form-control" placeholder="Select Destination" required>
                                                <option value="">Select Destination</option>
                                                <?php echo $dest_list; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Duration</label>
                                            <input type="text" name="duration" class="form-control" placeholder="Duration in hours e.g. 1" value="<?php if(!empty($e_duration)){echo $e_duration;} ?>" required="required" />
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer clearfix">
                                    <button type="submit" name="submit" class="pull-left btn btn-success">Update Record <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                  	<?php } ?>
                </div>
                
                
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-title">
                            <i class="fa fa-car"></i>
                            <h3>Schedule Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$ins =& get_instance();
								$ins->load->model('user');
								$ins->load->model('mlocation');
								$ins->load->model('mvehicle');
								$dir_list = '';
								if(!empty($allup)){
									foreach($allup as $up){
										//get driver name
										$driver = $this->user->query_user_id($up->user_id);
										if(!empty($driver)){
											foreach($driver as $dr){
												$driver_name = $dr->firstname.' '.$dr->lastname;
											}
										} else {$driver_name = '';}
										
										//get vehicle name
										$vehicle = $this->mvehicle->query_vehicle_id($up->vehicle_id);
										if(!empty($vehicle)){
											foreach($vehicle as $v){
												$vehicle_name = $v->name.' '.$v->plate;
											}
										} else {$vehicle_name = '';}
										
										//get source name
										$sloc = $this->mlocation->query_location_id($up->source_id);
										if(!empty($sloc)){
											foreach($sloc as $sl){
												$source_name = $sl->name;
											}
										} else {$source_name = '';}
										
										//get destination name
										$dloc = $this->mlocation->query_location_id($up->destination_id);
										if(!empty($dloc)){
											foreach($dloc as $dl){
												$dest_name = $dl->name;
											}
										} else {$dest_name = '';}
										
										
										if($up->status == 1){
											$status = '<span class="label label-success">Took off at: '.$up->reg_date.'</span>';	
										} else {
											$status = '<span class="label label-info">On Scheduled</span>';	
										}
										
										if($up->arrive == 1){
											$status_arr = '<span class="label label-primary">Arrived at: '.$up->reg_date.'</span>';	
										} else {
											$status_arr = '';	
										}
										
										if($this->session->userdata('itc_user_role') == 'Admin'){
											$btn = '
												<a href="'.base_url().'schedule?edit='.$up->id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
												<a href="'.base_url().'schedule?del='.$up->id.'" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
											';
											$btn_arr = '';
										} else {
											if($up->status == 0){
												$btn = '
													<a href="'.base_url().'schedule/track?id='.$up->id.'" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Take Off</a>
												';
											} else {$btn = 'Already Took Off';}
											if($up->arrive == 0){
												if($up->status == 1){
													$btn_arr = '
														<a href="'.base_url().'schedule/track?arrive='.$up->id.'" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Arrived</a>
													';
												} else {$btn_arr = '';}
											} else {$btn_arr = '<br />Arrived at Destination';}
										}
										
										$dir_list .= '
											<tr>
												<td>'.$up->day.'</td>
												<td>'.$driver_name.'</td>
												<td>'.$vehicle_name.'</td>
												<td>'.$source_name.' at '.$up->depart_time.'</td>
												<td>'.$dest_name.' at '.$up->arrive_time.'</td>
												<td>'.$status.' '.$status_arr.'</td>
												<td>
													'.$btn.' '.$btn_arr.'
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Driver</th>
                                        <th>Vehicle</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Day</th>
                                        <th>Driver</th>
                                        <th>Vehicle</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>