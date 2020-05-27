 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalMedicalInfoDelete" aria-hidden="true" style="display: none;">
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
			  <form id="medicalInfoDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="medicalinfoid" name="medicalinfoid" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--Military VIEW MODAL -->
  <div class="modal fade" id="modalViewMedical" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["military_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_militaryemp"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_militaryemp" name="view_militaryemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_military_reg_group"><?php echo $dil["military_registration_group"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_military_reg_group" name="view_military_reg_group" placeholder="<?php echo $dil["military_registration_group"];?>" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_military_reg_category"><?php echo $dil["military_registration_category"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_military_reg_category" name="view_military_reg_category" placeholder="<?php echo $dil["military_registration_category"];?>" readonly />
                                </div>
                            </div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_staff_desc"><?php echo $dil["military_staff"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_staff_desc_id" name="view_staff_desc" placeholder="<?php echo $dil["military_staff"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_rank_desc"><?php echo $dil["military_rank"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_rank_desc_id" name="view_rank_desc" placeholder="<?php echo $dil["military_rank"];?>" readonly />
				 				</div>
							</div> 


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_specialty_acc"><?php echo $dil["military_specialty_accounting"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_specialty_acc" name="view_military_specialty_acc" placeholder="<?php echo $dil["military_specialty_accounting"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_fitness_service"><?php echo $dil["military_fitness_service"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_fitness_service" name="view_military_fitness_service" placeholder="<?php echo $dil["military_fitness_service"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_registration_service"><?php echo $dil["military_registration_service"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_registration_service" name="view_military_registration_service" placeholder="<?php echo $dil["military_registration_service"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_registration_date"><?php echo $dil["military_registration_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_registration_date" name="view_military_registration_date" placeholder="<?php echo $dil["military_registration_date"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_general"><?php echo $dil["military_general"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_general" name="view_military_general" placeholder="<?php echo $dil["military_general"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_special"><?php echo $dil["military_special"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_special" name="view_military_special" placeholder="<?php echo $dil["military_special"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_no_official"><?php echo $dil["military_no_official"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_no_official" name="view_military_no_official" placeholder="<?php echo $dil["military_no_official"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_additional_information"><?php echo $dil["military_additional_information"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_additional_information" name="view_military_additional_information" placeholder="<?php echo $dil["military_additional_information"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_military_date_completion"><?php echo $dil["military_date_completion"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_military_date_completion" name="view_military_date_completion" placeholder="<?php echo $dil["military_date_completion"];?>" readonly />
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
  
  
  
  
  <!--MILITARY İNSERT MODAL -->
  <div class="modal fade" id="medicalInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="medicalInfoInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["military_information"];?></h4>
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
                                    <label class="col-sm-4 col-form-label" for="military_reg_group"><?php echo $dil["military_registration_group"];?></label>
                                    <div class="col-sm-6">
                                        <select   name="military_reg_group"  id="military_reg_group" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_registration_group"];?>" >
                                            <option value="1">Çağırışçı</option>
                                            <option value="2">Hərbi vəzifəli</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_reg_category"><?php echo $dil["military_registration_category"];?></label>
                                    <div class="col-sm-6">
                                        <select   name="military_reg_category"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_registration_category"];?>" >
                                            <option value="1">Kateqoriya 1</option>
                                            <option value="2">Kateqoriya 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_staff"><?php echo $dil["military_staff"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="military_staff"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_staff"];?>" >
                                            <?php
                                            if ($result_military_staff_view->num_rows > 0) {
                                                while($row_military_staff = $result_military_staff_view->fetch_assoc()) {

                                                    ?>
                                                    <option  value="<?php echo $row_military_staff['staff_id']; ?>" ><?php echo $row_military_staff['staff_desc'];  ?></option>

                                                <?php } }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_rank"><?php echo $dil["military_rank"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="military_rank"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_rank"];?>" >
                                        <?php
                                            if ($result_military_rank_view->num_rows > 0) {
                                            while($row_military_rank = $result_military_rank_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_military_rank['rank_id']; ?>" ><?php echo $row_military_rank['rank_desc'];  ?></option>

                                            <?php } }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_specialty_acc"><?php echo $dil["military_specialty_accounting"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_specialty_acc" name="military_specialty_acc" placeholder="<?php echo $dil["military_specialty_accounting"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_fitness_service"><?php echo $dil["military_fitness_service"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_fitness_service" name="military_fitness_service" placeholder="<?php echo $dil["military_fitness_service"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_registration_service"><?php echo $dil["military_registration_service"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_registration_service" name="military_registration_service" placeholder="<?php echo $dil["military_registration_service"];?>" />
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_registration_date"><?php echo $dil["military_registration_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_registration_date" name="military_registration_date" placeholder="0000-00-00" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_general"><?php echo $dil["military_general"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_general" name="military_general" placeholder="<?php echo $dil["military_general"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_special"><?php echo $dil["military_special"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_special" name="military_special" placeholder="<?php echo $dil["military_special"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_no_official"><?php echo $dil["military_no_official"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_no_official" name="military_no_official" placeholder="<?php echo $dil["military_no_official"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_additional_information"><?php echo $dil["military_additional_information"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_additional_information" name="military_additional_information" placeholder="<?php echo $dil["military_additional_information"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="military_date_completion"><?php echo $dil["military_date_completion"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="military_date_completion" name="military_date_completion" placeholder="0000-00-00" />
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
  
  <!--MILITARY EDİT MODAL -->
   <div class="modal fade" id="modalEditMedicalInfo" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="medicalInfoUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["migration_medical_information"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >
					
 						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_medicalempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_medicalemp"  id="update_medicalempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
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
								<label class="col-sm-4 col-form-label" for="update_medical_app"><?php echo $dil["medical_app"];?></label>
								<div class="col-sm-6">
                                    <select data-live-search="true"  name="update_medical_app"  id="update_medical_app" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>">
                                        <?php
                                        $result_exist_not_exist_view = $db->query($sql_exist_not_exist);
                                        if ($result_exist_not_exist_view->num_rows > 0) {
                                            while($row_exist_not_exist= $result_exist_not_exist_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_exist_not_exist['exist_id']; ?>" ><?php echo $row_exist_not_exist['exist_desc'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>
							</div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_renew_interval"><?php echo $dil["medical_renew_interval"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_renew_interval" name="update_renew_interval" placeholder="<?php echo $dil["medical_renew_interval"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_last_renew_date"><?php echo $dil["medical_last_renew_date"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_last_renew_date" name="update_last_renew_date" placeholder="<?php echo $dil["medical_last_renew_date"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_physical_deficiency"><?php echo $dil["medical_physical_deficiency"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_physical_deficiency" name="update_physical_deficiency" placeholder="<?php echo $dil["medical_physical_deficiency"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_deficiency_desc"><?php echo $dil["medical_deficiency_desc"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_deficiency_desc" name="update_deficiency_desc" placeholder="<?php echo $dil["medical_deficiency_desc"];?>" />
                                </div>
                            </div>

				
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="updatemedid" name="update_medicalid_name" value="" />
        </div>	
		</form>
      </div>
      
    </div>
  </div>

