 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalPaymentSalaryDelete" aria-hidden="true" style="display: none;">
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
			  <form id="paymentSalaryDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="paymentSalaryid" name="paymentSalaryid" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--payment VIEW MODAL -->
  <div class="modal fade" id="modalViewPaymentSalary" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["payment_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_paymentemp"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_paymentemp" name="view_paymentemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_payment_reg_group"><?php echo $dil["payment_registration_group"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_payment_reg_group" name="view_payment_reg_group" placeholder="<?php echo $dil["payment_registration_group"];?>" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_payment_reg_category"><?php echo $dil["payment_registration_category"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_payment_reg_category" name="view_payment_reg_category" placeholder="<?php echo $dil["payment_registration_category"];?>" readonly />
                                </div>
                            </div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_desc"><?php echo $dil["payment_staff"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_desc_id" name="view_payment_desc" placeholder="<?php echo $dil["payment_staff"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_descc"><?php echo $dil["payment_rank"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_descc_id" name="view_payment_descc" placeholder="<?php echo $dil["payment_rank"];?>" readonly />
				 				</div>
							</div> 


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_specialty_acc"><?php echo $dil["payment_specialty_accounting"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_specialty_acc" name="view_payment_specialty_acc" placeholder="<?php echo $dil["payment_specialty_accounting"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_fitness_service"><?php echo $dil["payment_fitness_service"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_fitness_service" name="view_payment_fitness_service" placeholder="<?php echo $dil["payment_fitness_service"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_registration_service"><?php echo $dil["payment_registration_service"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_registration_service" name="view_payment_registration_service" placeholder="<?php echo $dil["payment_registration_service"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_registration_date"><?php echo $dil["payment_registration_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_registration_date" name="view_payment_registration_date" placeholder="<?php echo $dil["payment_registration_date"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_general"><?php echo $dil["payment_general"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_general" name="view_payment_general" placeholder="<?php echo $dil["payment_general"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_special"><?php echo $dil["payment_special"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_special" name="view_payment_special" placeholder="<?php echo $dil["payment_special"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_no_official"><?php echo $dil["payment_no_official"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_no_official" name="view_payment_no_official" placeholder="<?php echo $dil["payment_no_official"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_additional_information"><?php echo $dil["payment_additional_information"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_additional_information" name="view_payment_additional_information" placeholder="<?php echo $dil["payment_additional_information"];?>" readonly />
				 				</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_payment_date_completion"><?php echo $dil["payment_date_completion"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_payment_date_completion" name="view_payment_date_completion" placeholder="<?php echo $dil["payment_date_completion"];?>" readonly />
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
  
  
  
  
  <!--payment İNSERT MODAL -->
  <div class="modal fade" id="paymentSalaryInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="paymentSalaryInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["payment_salary_information"];?></h4>
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
                                    <label class="col-sm-4 col-form-label" for="payment_reg_group"><?php echo $dil["payment_registration_group"];?></label>
                                    <div class="col-sm-6">
                                        <select   name="payment_reg_group"  id="payment_reg_group" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_registration_group"];?>" >
                                            <option value="1">Çağırışçı</option>
                                            <option value="2">Hərbi vəzifəli</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_reg_category"><?php echo $dil["payment_registration_category"];?></label>
                                    <div class="col-sm-6">
                                        <select   name="payment_reg_category"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_registration_category"];?>" >
                                            <option value="1">Kateqoriya 1</option>
                                            <option value="2">Kateqoriya 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_staff"><?php echo $dil["payment_staff"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="payment_staff"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_staff"];?>" >
                                            <?php
                                            if ($result_payment_staff_view->num_rows > 0) {
                                                while($row_payment_staff = $result_payment_staff_view->fetch_assoc()) {

                                                    ?>
                                                    <option  value="<?php echo $row_payment_staff['staff_id']; ?>" ><?php echo $row_payment_staff['payment_desc'];  ?></option>

                                                <?php } }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_rank"><?php echo $dil["payment_rank"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="payment_rank"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_rank"];?>" >
                                        <?php
                                            if ($result_payment_rank_view->num_rows > 0) {
                                            while($row_payment_rank = $result_payment_rank_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_payment_rank['rank_id']; ?>" ><?php echo $row_payment_rank['payment_descc'];  ?></option>

                                            <?php } }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_specialty_acc"><?php echo $dil["payment_specialty_accounting"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_specialty_acc" name="payment_specialty_acc" placeholder="<?php echo $dil["payment_specialty_accounting"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_fitness_service"><?php echo $dil["payment_fitness_service"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_fitness_service" name="payment_fitness_service" placeholder="<?php echo $dil["payment_fitness_service"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_registration_service"><?php echo $dil["payment_registration_service"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_registration_service" name="payment_registration_service" placeholder="<?php echo $dil["payment_registration_service"];?>" />
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_registration_date"><?php echo $dil["payment_registration_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_registration_date" name="payment_registration_date" placeholder="0000-00-00" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_general"><?php echo $dil["payment_general"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_general" name="payment_general" placeholder="<?php echo $dil["payment_general"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_special"><?php echo $dil["payment_special"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_special" name="payment_special" placeholder="<?php echo $dil["payment_special"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_no_official"><?php echo $dil["payment_no_official"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_no_official" name="payment_no_official" placeholder="<?php echo $dil["payment_no_official"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_additional_information"><?php echo $dil["payment_additional_information"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_additional_information" name="payment_additional_information" placeholder="<?php echo $dil["payment_additional_information"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="payment_date_completion"><?php echo $dil["payment_date_completion"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="payment_date_completion" name="payment_date_completion" placeholder="0000-00-00" />
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
  
  <!--payment EDİT MODAL -->
   <div class="modal fade" id="modalEditPaymentSalary" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="paymentSalaryUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["payment_edit_title"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >
					
 						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_paymentempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_paymentemp"  id="update_paymentempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
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
								<label class="col-sm-4 col-form-label" for="update_payment_reg_group"><?php echo $dil["payment_registration_group"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_payment_reg_group" id="update_payment_reg_group" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_registration_group"];?>" >
                                        <option value="1">Çağırışçı</option>
                                        <option value="2">Hərbi vəzifəli</option>
								</select>	
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_payment_reg_category"><?php echo $dil["payment_registration_category"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_payment_reg_category" id="update_payment_reg_category" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_registration_category"];?>" >
                                        <option value="1">Kateqoriya 1</option>
                                        <option value="2">Kateqoriya 2</option>
								</select>
								</div>
							</div>
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_payment_desc_id"><?php echo $dil["payment_staff"];?></label>
								<div class="col-sm-6">
                                	<select data-live-search="true"  name="update_payment_desc" id="update_payment_desc_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_staff"];?>" >
								 	<?php
										if ($result_payment_staff_edit->num_rows > 0) {
										while($row_payment_staff= $result_payment_staff_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_payment_staff['staff_id']; ?>" ><?php echo $row_payment_staff['payment_desc'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_payment_descc_id"><?php echo $dil["payment_rank"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_payment_descc" id="update_payment_descc_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["payment_rank"];?>" >
								 	<?php 
										if ($result_payment_rank_edit->num_rows > 0) {
										while($row_payment_rank= $result_payment_rank_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_payment_rank['rank_id']; ?>" ><?php echo $row_payment_rank['payment_descc'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_specialty_acc"><?php echo $dil["payment_specialty_accounting"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_specialty_acc" name="update_payment_specialty_acc_name" placeholder="<?php echo $dil["payment_specialty_accounting"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_fitness_service"><?php echo $dil["payment_fitness_service"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_fitness_service" name="update_payment_fitness_service_name" placeholder="<?php echo $dil["payment_fitness_service"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_registration_service"><?php echo $dil["payment_registration_service"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_registration_service" name="update_payment_registration_service_name" placeholder="<?php echo $dil["payment_registration_service"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_registration_date"><?php echo $dil["payment_registration_date"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_registration_date" name="update_payment_registration_date_name" placeholder="<?php echo $dil["payment_registration_date"];?>" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_general"><?php echo $dil["payment_general"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_general" name="update_payment_general_name" placeholder="<?php echo $dil["payment_general"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_special"><?php echo $dil["payment_special"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_special" name="update_payment_special_name" placeholder="<?php echo $dil["payment_special"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_no_official"><?php echo $dil["payment_no_official"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_no_official" name="update_payment_no_official_name" placeholder="<?php echo $dil["payment_no_official"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_additional_information"><?php echo $dil["payment_additional_information"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_additional_information" name="update_payment_additional_information_name" placeholder="<?php echo $dil["payment_additional_information"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_payment_date_completion"><?php echo $dil["payment_date_completion"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_payment_date_completion" name="update_payment_date_completion_name" placeholder="<?php echo $dil["payment_date_completion"];?>" />
                                </div>
                            </div>



				
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="updatepaymentsalaryid" name="update_paymentid_name" value="" />
        </div>	
		</form>
      </div>
      </div>
      
    </div>
  </div>

