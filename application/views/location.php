    <div class="rightside">
        <div class="page-head">
            <h1>Locations</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Locations</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php echo form_open_multipart('location'); ?>
                        <div class="box">
                            <div class="box-title">
                                <i class="fa fa-upload"></i>
                                <h3>New Location</h3>
                                <div class="pull-right box-toolbar">
                                    <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                </div>          
                            </div>
                            <div class="box-body">
                                <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                <div class="form-group">
                                    <input type="hidden" name="location_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
                                    <label>Location/City</label>
                                    <input type="text" name="name" placeholder="Location" class="form-control" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required="required" />
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
                            <h3>Location Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$dir_list = '';
								if(!empty($allup)){
									foreach($allup as $up){
										$dir_list .= '
											<tr>
												<td>'.$up->name.'</td>
												<td>
													<a href="'.base_url().'location?edit='.$up->id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'location?del='.$up->id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Location</th>
                                        <th width="150">Manage</th>
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