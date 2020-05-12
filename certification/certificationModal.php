<!-- DELETE  CONTENT MODAL  -->
<div class="modal fade" id="modalCertDelete" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["delete_warning"];?></h4>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo $dil["delete_warning_content"];?></p>
            </div>
            <div class="modal-footer justify-content-between">
			  <form id="certificationDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="certid" name="certid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

 <!--certificationİNSERT MODAL -->
  <div class="modal fade" id="certificationModalInsert" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="certificationInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["certification_info"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >
 							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="certempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="certempid"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
								 	<?php 
									    $result_employees_view = $db->query($sql_employees);
										if ($result_employees_view->num_rows > 0) {
										while($row_employees= $result_employees_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="training_center_name"><?php echo $dil["training_center_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"   name="training_center_name" placeholder="<?php echo $dil["training_center_name"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="training_name"><?php echo $dil["training_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  name="training_name" placeholder="<?php echo $dil["training_name"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="training_date"><?php echo $dil["training_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="training_date"  name="training_date_name" placeholder="<?php echo $dil["training_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="cert_given_date"><?php echo $dil["cert_given_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  id="cert_given_date" name="cert_given_date_name" placeholder="<?php echo $dil["cert_given_date"];?>" />
								</div>
							</div>

					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
							 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
  <!--CERTİFİCATİON EDİT MODAL -->
   <div class="modal fade" id="modalEditCertification" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="certificationUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["cert_edit_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 			<div class="card-body" >
						 
						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_certempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_certempid_name" id='update_certempid' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  Disabled="true"  >
								 	<?php 
									 $result_employees_s_view = $db->query($sql_employees);
										if ($result_employees_s_view->num_rows > 0) {
										while($row_employees= $result_employees_s_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'] ;  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							
							
					 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_training_center_name"><?php echo $dil["training_center_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"   id="update_training_center"  name="update_training_center_name" placeholder="<?php echo $dil["training_center_name"];?>"  />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_training_name"><?php echo $dil["training_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_training_name" name="update_training_name" placeholder="<?php echo $dil["training_name"];?>"   />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_training_date"><?php echo $dil["training_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_training_date"  name="update_training_date_name" placeholder="<?php echo $dil["training_date"];?>"  />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_cert_given_date"><?php echo $dil["cert_given_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  id="update_cert_given_date" name="update_cert_given_date_name" placeholder="<?php echo $dil["cert_given_date"];?>"  />
								</div>
							</div>	
							
				 
					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_certid" name="update_certid_name" value="" /> 						 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
   <!--CERTIFICATION VIEW MODAL -->
  <div class="modal fade" id="modalViewCertification" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["cert_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="certempid"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_certempid" name="view_certempid" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>
							 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_training_center_name"><?php echo $dil["training_center_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"   id="view_training_center"  name="view_training_center_name" placeholder="<?php echo $dil["training_center_name"];?>" readonly />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_training_name"><?php echo $dil["training_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_training_name" name="view_training_name" placeholder="<?php echo $dil["training_name"];?>" readonly  />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_training_date"><?php echo $dil["training_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_training_date"  name="training_date_name" placeholder="<?php echo $dil["training_date"];?>" readonly />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_cert_given_date"><?php echo $dil["cert_given_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  id="view_cert_given_date" name="cert_given_date_name" placeholder="<?php echo $dil["cert_given_date"];?>" readonly />
								</div>
							</div>


					</div>
				</div>
   
		</div>
        <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
        </div>	

      </div>
      
    </div>
  </div>
 