 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalDrivingLicenseInfoDelete" aria-hidden="true" style="display: none;">
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
			  <form id="drivingLicenseInfoDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="drivinglicenseinfoid" name="drivinglicenseinfoid" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--Driving VIEW MODAL -->
  <div class="modal fade" id="modalViewDrivingLicense" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["driving_license_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_drivingemp"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_drivingemp" name="view_drivingemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_drivinglic_seria_number"><?php echo $dil["driving_serial_number_card"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_drivinglic_seria_number" name="view_drivinglic_seria_number" placeholder="<?php echo $dil["driving_serial_number_card"];?>" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_drivintcat"><?php echo $dil["driving_category"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_drivintcat" name="view_drivintcat" placeholder="<?php echo $dil["driving_category"];?>" readonly />
                                </div>
                            </div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_drivinglic_issuer"><?php echo $dil["driving_licensing_authority"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_drivinglic_issuer" name="view_drivinglic_issuer" placeholder="<?php echo $dil["driving_licensing_authority"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_drivinglic_issue_date"><?php echo $dil["driving_date_issue_card"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_drivinglic_issue_date" name="view_drivinglic_issue_date" placeholder="<?php echo $dil["driving_date_issue_card"];?>" readonly />
				 				</div>
							</div> 


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_drivingexpire_date"><?php echo $dil["driving_period_validity"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_drivingexpire_date" name="view_drivingexpire_date" placeholder="<?php echo $dil["driving_period_validity"];?>" readonly />
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
  
  
  
  
  <!--driving İNSERT MODAL -->
  <div class="modal fade" id="drivingLicenseInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="drivingLicenseInfoInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["driving_license_information"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >
					
 						 		<div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="employee" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
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
                                    <label class="col-sm-4 col-form-label" for="driving_reg_group"><?php echo $dil["driving_registration_group"];?></label>
                                    <div class="col-sm-6">
                                        <select   name="driving_reg_group"  id="driving_reg_group" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["driving_registration_group"];?>" >
                                            <option value="1">Çağırışçı</option>
                                            <option value="2">Hərbi vəzifəli</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_reg_category"><?php echo $dil["driving_registration_category"];?></label>
                                    <div class="col-sm-6">
                                        <select   name="driving_reg_category"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["driving_registration_category"];?>" >
                                            <option value="1">Kateqoriya 1</option>
                                            <option value="2">Kateqoriya 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_staff"><?php echo $dil["driving_staff"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="driving_staff"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["driving_staff"];?>" >
                                            <?php
                                            if ($result_driving_staff_view->num_rows > 0) {
                                                while($row_driving_staff = $result_driving_staff_view->fetch_assoc()) {

                                                    ?>
                                                    <option  value="<?php echo $row_driving_staff['staff_id']; ?>" ><?php echo $row_driving_staff['staff_desc'];  ?></option>

                                                <?php } }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_rank"><?php echo $dil["driving_rank"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="driving_rank"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["driving_rank"];?>" >
                                        <?php
                                            if ($result_driving_rank_view->num_rows > 0) {
                                            while($row_driving_rank = $result_driving_rank_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_driving_rank['rank_id']; ?>" ><?php echo $row_driving_rank['rank_desc'];  ?></option>

                                            <?php } }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_specialty_acc"><?php echo $dil["driving_specialty_accounting"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_specialty_acc" name="driving_specialty_acc" placeholder="<?php echo $dil["driving_specialty_accounting"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_fitness_service"><?php echo $dil["driving_fitness_service"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_fitness_service" name="driving_fitness_service" placeholder="<?php echo $dil["driving_fitness_service"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_registration_service"><?php echo $dil["driving_registration_service"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_registration_service" name="driving_registration_service" placeholder="<?php echo $dil["driving_registration_service"];?>" />
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_registration_date"><?php echo $dil["driving_registration_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_registration_date" name="driving_registration_date" placeholder="0000-00-00" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_general"><?php echo $dil["driving_general"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_general" name="driving_general" placeholder="<?php echo $dil["driving_general"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_special"><?php echo $dil["driving_special"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_special" name="driving_special" placeholder="<?php echo $dil["driving_special"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_no_official"><?php echo $dil["driving_no_official"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_no_official" name="driving_no_official" placeholder="<?php echo $dil["driving_no_official"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_additional_information"><?php echo $dil["driving_additional_information"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_additional_information" name="driving_additional_information" placeholder="<?php echo $dil["driving_additional_information"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="driving_date_completion"><?php echo $dil["driving_date_completion"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="driving_date_completion" name="driving_date_completion" placeholder="0000-00-00" />
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
  
  <!--driving EDİT MODAL -->
   <div class="modal fade" id="modalEditDrivingLicenseInfo" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="drivingLicenseInfoUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["driving_license_edit_title"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >
					
 						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_drivingempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_drivingemp"  id="update_drivingempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
								 	<?php
                                    $result_employees_s_view = $db->query($sql_employees);
										if ($result_employees_s_view->num_rows > 0) {
										while($row_employees= $result_employees_s_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_drivinglic_seria_number"><?php echo $dil["driving_serial_number_card"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_drivinglic_seria_number" name="update_drivinglic_seria_number" placeholder="<?php echo $dil["driving_serial_number_card"];?>" />
                                </div>
                            </div>

						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_drivintcatId"><?php echo $dil["driving_category"];?></label>
								<div class="col-sm-6">
                                	<select data-live-search="true"  name="update_drivintcat" id="update_drivintcatId" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["driving_category"];?>" >
								 	<?php
										if ($result_driving_category_edit->num_rows > 0) {
										while($row_driving_category= $result_driving_category_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_driving_category['cat_id']; ?>" ><?php echo $row_driving_category['cat_desc'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_drivinglic_issuer"><?php echo $dil["driving_licensing_authority"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_drivinglic_issuer" name="update_drivinglic_issuer" placeholder="<?php echo $dil["driving_licensing_authority"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_drivinglic_issue_date"><?php echo $dil["driving_date_issue_card"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_drivinglic_issue_date" name="update_drivinglic_issue_date" placeholder="<?php echo $dil["driving_date_issue_card"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_drivingexpire_date"><?php echo $dil["driving_period_validity"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_drivingexpire_date" name="update_drivingexpire_date" placeholder="<?php echo $dil["driving_period_validity"];?>" />
                                </div>
                            </div>
				
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="updatedrivinglicenseid" name="update_drivinglicenseid_name" value="" />
        </div>	
		</form>
      </div>
      
    </div>
  </div>

