 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalMilitaryInfoDelete" aria-hidden="true" style="display: none;">
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
			  <form id="militaryInfoDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="militaryinfoid" name="militaryinfoid" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--Military VIEW MODAL -->
  <div class="modal fade" id="modalViewMilitary" role="dialog">
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
  <div class="modal fade" id="militaryInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="militaryInfoInsertForm" method="post" class="form-horizontal" action="">
	
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
   <div class="modal fade" id="modalEditMilitaryInfo" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="militaryInfoUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["military_edit_title"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >
					
 						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_militaryempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_militaryemp"  id="update_militaryempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
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
								<label class="col-sm-4 col-form-label" for="update_military_reg_group"><?php echo $dil["military_registration_group"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_military_reg_group" id="update_military_reg_group" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_registration_group"];?>" >
                                        <option value="1">Çağırışçı</option>
                                        <option value="2">Hərbi vəzifəli</option>
								</select>	
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_military_reg_category"><?php echo $dil["military_registration_category"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_military_reg_category" id="update_military_reg_category" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_registration_category"];?>" >
                                        <option value="1">Kateqoriya 1</option>
                                        <option value="2">Kateqoriya 2</option>
								</select>
								</div>
							</div>
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_staff_desc_id"><?php echo $dil["military_staff"];?></label>
								<div class="col-sm-6">
                                	<select data-live-search="true"  name="update_staff_desc" id="update_staff_desc_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_staff"];?>" >
								 	<?php
										if ($result_military_staff_edit->num_rows > 0) {
										while($row_military_staff= $result_military_staff_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_military_staff['staff_id']; ?>" ><?php echo $row_military_staff['staff_desc'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_rank_desc_id"><?php echo $dil["military_rank"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_rank_desc" id="update_rank_desc_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["military_rank"];?>" >
								 	<?php 
										if ($result_military_rank_edit->num_rows > 0) {
										while($row_military_rank= $result_military_rank_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_military_rank['rank_id']; ?>" ><?php echo $row_military_rank['rank_desc'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_specialty_acc"><?php echo $dil["military_specialty_accounting"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_specialty_acc" name="update_military_specialty_acc_name" placeholder="<?php echo $dil["military_specialty_accounting"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_fitness_service"><?php echo $dil["military_fitness_service"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_fitness_service" name="update_military_fitness_service_name" placeholder="<?php echo $dil["military_fitness_service"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_registration_service"><?php echo $dil["military_registration_service"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_registration_service" name="update_military_registration_service_name" placeholder="<?php echo $dil["military_registration_service"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_registration_date"><?php echo $dil["military_registration_date"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_registration_date" name="update_military_registration_date_name" placeholder="<?php echo $dil["military_registration_date"];?>" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_general"><?php echo $dil["military_general"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_general" name="update_military_general_name" placeholder="<?php echo $dil["military_general"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_special"><?php echo $dil["military_special"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_special" name="update_military_special_name" placeholder="<?php echo $dil["military_special"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_no_official"><?php echo $dil["military_no_official"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_no_official" name="update_military_no_official_name" placeholder="<?php echo $dil["military_no_official"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_additional_information"><?php echo $dil["military_additional_information"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_additional_information" name="update_military_additional_information_name" placeholder="<?php echo $dil["military_additional_information"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_military_date_completion"><?php echo $dil["military_date_completion"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_military_date_completion" name="update_military_date_completion_name" placeholder="<?php echo $dil["military_date_completion"];?>" />
                                </div>
                            </div>



				
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_militaryid" name="update_militaryid_name" value="" />
        </div>	
		</form>
      </div>
      
    </div>
  </div>

