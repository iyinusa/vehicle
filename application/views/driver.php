    <div class="rightside">
        <div class="page-head">
            <h1>Drivers</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Drivers</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php echo form_open_multipart('driver'); ?>
                        <div class="box">
                            <div class="box-title">
                                <i class="fa fa-upload"></i>
                                <h3>New Driver</h3>
                                <div class="pull-right box-toolbar">
                                    <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                </div>          
                            </div>
                            <div class="box-body" style="overflow:auto;">
                                <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                <div class="col-md-6">
                                	<div class="form-group">
                                        <input type="hidden" name="user_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
                                        <input type="hidden" name="pics" value="<?php if(!empty($e_pics)){echo $e_pics;} ?>" />
                                        <input type="hidden" name="pics_square" value="<?php if(!empty($e_pics_square)){echo $e_pics_square;} ?>" />
                                        <input type="hidden" name="pics_small" value="<?php if(!empty($e_pics_small)){echo $e_pics_small;} ?>" />
                                        <label>First Name</label>
                                        <input type="text" name="firstname" placeholder="First Name" class="form-control" value="<?php if(!empty($e_firstname)){echo $e_firstname;} ?>" required="required" /><br />
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?php if(!empty($e_lastname)){echo $e_lastname;} ?>" required="required" /><br />
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Email" class="form-control" value="<?php if(!empty($e_email)){echo $e_email;} ?>" required="required" />
                                    </div> 
                                    <div class="form-group">
                                        <label>Select Photo</label>
                                        <input type="file" name="up_file" class="btn btn-info file-inputs" title="Select file">
                                        <?php
                                            if(!empty($e_pics_square)){
                                                echo '<br /><br /><img alt="" src="'.base_url($e_pics_square).'" />';	
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" placeholder="Address" rows="3"><?php if(!empty($e_address)){echo $e_address;} ?></textarea><br />
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="User Name" class="form-control" value="<?php if(!empty($e_username)){echo $e_username;} ?>" required="required" /><br />
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Password" class="form-control" value="<?php if(!empty($e_password)){echo $e_password;} ?>" required="required" />
                                    </div> 
                                </div>
                                
                            </div>
                            <div class="box-footer clearfix">
                                <button type="submit" name="submit" class="pull-left btn btn-success">Update Record <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                
                
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-title">
                            <i class="fa fa-upload"></i>
                            <h3>Drivers Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$dir_list = '';
								if(!empty($allup)){
									foreach($allup as $up){
										if($up->username != 'admin'){
											$dir_list .= '
												<tr>
													<td><img alt="" src="'.base_url($up->pics_square).'" width="75" /></td>
													<td>'.$up->firstname.' '.$up->lastname.'</td>
													<td>'.$up->username.'</td>
													<td>
														<a href="'.base_url().'driver?edit='.$up->user_id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
														<a href="'.base_url().'driver?del='.$up->user_id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
													</td>
												</tr>
											';	
										}
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="80">Photo</th>
                                        <th>Driver Name</th>
                                        <th>Username</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Driver Name</th>
                                        <th>Username</th>
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