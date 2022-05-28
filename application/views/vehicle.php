    <div class="rightside">
        <div class="page-head">
            <h1>Vechicle</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Vechicle</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php echo form_open_multipart('vehicles'); ?>
                        <div class="box">
                            <div class="box-title">
                                <i class="fa fa-trunk"></i>
                                <h3>New Vehicle</h3>
                                <div class="pull-right box-toolbar">
                                    <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                </div>          
                            </div>
                            <div class="box-body">
                                <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                <div class="form-group">
                                    <input type="hidden" name="vehicle_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
                                    <input type="hidden" name="pics" value="<?php if(!empty($e_pics)){echo $e_pics;} ?>" />
                                    <input type="hidden" name="pics_small" value="<?php if(!empty($e_pics_small)){echo $e_pics_small;} ?>" />
                                    <input type="hidden" name="pics_square" value="<?php if(!empty($e_pics_square)){echo $e_pics_square;} ?>" />
                                    <label>Vehicle Name/No</label>
                                    <input type="text" name="name" placeholder="Vehicle Name/No" class="form-control" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required="required" /><br />
                                    <label>Vehicle Plate Number</label>
                                    <input type="text" name="plate" placeholder="Vehicle Plate Number" class="form-control" value="<?php if(!empty($e_plate)){echo $e_plate;} ?>" required="required" />
                                </div> 
                                <div class="form-group">
                                    <label>Select Image</label>
                                    <input type="file" name="up_file" class="btn btn-info file-inputs" title="Select file">
                                    <?php
										if(!empty($e_pics_square)){
											echo '<br /><br /><img alt="" src="'.base_url().$e_pics_square.'" />';	
										}
									?>
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
                            <h3>Vechicle Directory</h3>
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
												<td><img alt="" src="'.base_url($up->pics_square).'" width="75" /></td>
												<td>'.$up->name.'</td>
												<td>'.$up->plate.'</td>
												<td>
													<a href="'.base_url().'vehicles?edit='.$up->id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'vehicles?del='.$up->id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="70">Image</th>
                                        <th>Name</th>
                                        <th>Plate No</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Plate No</th>
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