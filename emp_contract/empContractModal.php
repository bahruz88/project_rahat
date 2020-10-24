 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalEmpContractDelete" aria-hidden="true" style="display: none;">
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
			  <form id="empContractDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="empcontractid" name="empcontractid" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--medical VIEW MODAL -->
  <div class="modal fade" id="modalViewEmpContract" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["employment_contract_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_employee"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_employee" name="view_employee" placeholder="<?php echo $dil["employee"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_employment_contract_indefinite"><?php echo $dil["employment_contract_indefinite"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_employment_contract_indefinite" name="view_employment_contract_indefinite" placeholder="<?php echo $dil["employment_contract_indefinite"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_reasons_contract"><?php echo $dil["reasons_contract"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_reasons_contract" name="view_reasons_contract" placeholder="<?php echo $dil["reasons_contract"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_date_employment_contract"><?php echo $dil["date_employment_contract"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_date_employment_contract" name="view_date_employment_contract" placeholder="<?php echo $dil["date_employment_contract"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_probation"><?php echo $dil["probation"];?></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="view_probation" name="view_probation" placeholder="<?php echo $dil["probation"];?>" readonly/>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="view_dates" name="view_dates" placeholder="<?php echo $dil["probation"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_trial_expiration_date"><?php echo $dil["trial_expiration_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_trial_expiration_date" name="view_trial_expiration_date" placeholder="<?php echo $dil["trial_expiration_date"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_employee_start_date"><?php echo $dil["employee_start_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_employee_start_date" name="view_employee_start_date" placeholder="<?php echo $dil["employee_start_date"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_date_conclusion_employment_contract"><?php echo $dil["date_conclusion_employment_contract"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_date_conclusion_employment_contract" name="view_date_conclusion_employment_contract" placeholder="<?php echo $dil["date_conclusion_employment_contract"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_regulation_property_relations"><?php echo $dil["regulation_property_relations"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_regulation_property_relations" name="view_regulation_property_relations" placeholder="<?php echo $dil["regulation_property_relations"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_termination_cases"><?php echo $dil["termination_cases"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_termination_cases" name="view_termination_cases" placeholder="<?php echo $dil["termination_cases"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_other_conditions_wages"><?php echo $dil["other_conditions_wages"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_other_conditions_wages" name="view_other_conditions_wages" placeholder="<?php echo $dil["other_conditions_wages"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_workplace_status"><?php echo $dil["workplace_status"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_workplace_status" name="view_workplace_status" placeholder="<?php echo $dil["workplace_status"];?>" readonly/>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_working_conditions"><?php echo $dil["working_conditions"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_working_conditions" name="view_working_conditions" placeholder="<?php echo $dil["working_conditions"];?>" readonly/>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_job_descriptions"><?php echo $dil["job_descriptions"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_job_descriptions" name="view_job_descriptions" placeholder="<?php echo $dil["job_descriptions"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_kvota"><?php echo $dil["kvota"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_kvota" name="view_kvota" placeholder="<?php echo $dil["kvota"];?>" readonly/>
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
  
  
  
  
  <!--medical İNSERT MODAL -->
  <div class="modal fade" id="empContractInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="empContractInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["employment_contract_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="company_id" id='company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker company_id"  placeholder="<?php echo $dil["company"];?>"  >
                                    <?php
                                    $result_company = $db->query($sql_employee_company);
                                    if ($result_company->num_rows > 0) {
                                        while($row_company= $result_company->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>
                                        <?php } }?>
                                </select>
                            </div>
                        </div>
 						 <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                                    <div class="col-sm-6 emp" id="emp">
                                        <select data-live-search="true"  name="emplo" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
<!--                                        --><?php
//                                         $result_employees_view = $db->query($sql_employees);
//                                            if ($result_employees_view->num_rows > 0) {
//                                            while($row_employees= $result_employees_view->fetch_assoc()) {
//
//                                            ?>
<!--                                            <option  value="--><?php //echo $row_employees['id']; ?><!--" >--><?php //echo $row_employees['firstname']." " .$row_employees['lastname'];  ?><!--</option>-->
<!---->
<!--                                            --><?php //} }?>
                                    </select>
                                    </div>
							</div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="employment_contract_indefinite"><?php echo $dil["employment_contract_indefinite"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="employment_contract_indefinite"  id="employment_contract_indefinite" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employment_contract_indefinite"];?>">
                                    <?php
                                    $result_yesno_view = $db->query($sql_yesno);
                                    if ($result_yesno_view->num_rows > 0) {
                                        while($row_yesno= $result_yesno_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_yesno['chois_id']; ?>" ><?php echo $row_yesno['chois_desc'];  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row reasons" style="display: none">
                            <label class="col-sm-6 col-form-label" for="reasons_contract"><?php echo $dil["reasons_contract"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="reasons_contract" name="reasons_contract" placeholder="<?php echo $dil["reasons_contract"];?>" />
                            </div>
                        </div>
                        <div class="form-group row reasons" style="display: none">
                            <label class="col-sm-6 col-form-label" for="date_employment_contract"><?php echo $dil["date_employment_contract"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="date_employment_contract" name="date_employment_contract" placeholder="<?php echo $dil["date_employment_contract"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="probation"><?php echo $dil["probation"];?></label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="probation" name="probation" placeholder="<?php echo $dil["probation"];?>" />
                            </div>
                            <div class="col-sm-3">
                                <select data-live-search="true"  name="dates"  id="dates" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker" >
                                    <?php
                                    $result_dates = $db->query($sql_dates);
                                    if ($result_dates->num_rows > 0) {
                                        while($row_dates= $result_dates->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_dates['level_id']; ?>" ><?php echo $row_dates['title'];  ?></option>
                                        <?php } }?>
                                </select>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="trial_expiration_date"><?php echo $dil["trial_expiration_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="trial_expiration_date" name="trial_expiration_date" placeholder="<?php echo $dil["trial_expiration_date"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="employee_start_date"><?php echo $dil["employee_start_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="employee_start_date" name="employee_start_date" placeholder="<?php echo $dil["employee_start_date"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="date_conclusion_employment_contract"><?php echo $dil["date_conclusion_employment_contract"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="date_conclusion_employment_contract" name="date_conclusion_employment_contract" placeholder="<?php echo $dil["date_conclusion_employment_contract"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="regulation_property_relations"><?php echo $dil["regulation_property_relations"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="regulation_property_relations" name="regulation_property_relations" placeholder="<?php echo $dil["regulation_property_relations"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="termination_cases"><?php echo $dil["termination_cases"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="termination_cases" name="termination_cases" placeholder="<?php echo $dil["termination_cases"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="other_conditions_wages"><?php echo $dil["other_conditions_wages"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="other_conditions_wages" name="other_conditions_wages" placeholder="<?php echo $dil["other_conditions_wages"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="workplace_status"><?php echo $dil["workplace_status"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="workplace_status"  id="workplace_status" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["workplace_status"];?>">
                                    <?php
                                    $result_workplace_status_view = $db->query($sql_workplace_status);
                                    if ($result_workplace_status_view->num_rows > 0) {
                                        while($row_workplace_status= $result_workplace_status_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_workplace_status['work_status_id']; ?>" ><?php echo $row_workplace_status['title'];  ?></option>

                                        <?php } }?>
                                </select>
<!--                                <input type="text" class="form-control" id="renew_interval" name="renew_interval" placeholder="--><?php //echo $dil["medical_renew_interval"];?><!--" />-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="working_conditions"><?php echo $dil["working_conditions"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="working_conditions"  id="working_conditions" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["working_conditions"];?>">
                                    <?php
                                    $result_working_conditions_view = $db->query($sql_working_conditions);
                                    if ($result_working_conditions_view->num_rows > 0) {
                                        while($row_working_conditions= $result_working_conditions_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_working_conditions['cond_id']; ?>" ><?php echo $row_working_conditions['title'];  ?></option>

                                        <?php } }?>
                                </select>
<!--                                <input type="text" class="form-control" id="renew_interval" name="renew_interval" placeholder="--><?php //echo $dil["medical_renew_interval"];?><!--" />-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="job_descriptions"><?php echo $dil["job_descriptions"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="job_descriptions" name="job_descriptions" placeholder="<?php echo $dil["job_descriptions"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="kvota"><?php echo $dil["kvota"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kvota" name="kvota" placeholder="<?php echo $dil["kvota"];?>" />
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
  
  <!--medical EDİT MODAL -->
   <div class="modal fade" id="modalEditEmpContract" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="empContractUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["employment_contract_edit_title"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >


                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_employee"><?php echo $dil["employee"];?></label>
                                <div class="col-sm-6" id="">
                                    <select data-live-search="true"  name="update_employee" id="update_employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" disabled="true" >
                                        <?php
                                        $result_update_employees_view = $db->query($sql_employees);
                                        if ($result_update_employees_view->num_rows > 0) {
                                            while($row_update_employees= $result_update_employees_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_update_employees['id']; ?>" ><?php echo $row_update_employees['firstname']." " .$row_update_employees['lastname'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_employment_contract_indefinite"><?php echo $dil["employment_contract_indefinite"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="update_employment_contract_indefinite"  id="update_employment_contract_indefinite" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["date_employment_contract"];?>">
                                        <?php
                                        $result_yesno_view = $db->query($sql_yesno);
                                        if ($result_yesno_view->num_rows > 0) {
                                            while($row_yesno= $result_yesno_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_yesno['chois_id']; ?>" ><?php echo $row_yesno['chois_desc'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row reasons" style="display: none">
                                <label class="col-sm-6 col-form-label" for="update_reasons_contract"><?php echo $dil["reasons_contract"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_reasons_contract" name="update_reasons_contract" placeholder="<?php echo $dil["reasons_contract"];?>" />
                                </div>
                            </div>
                            <div class="form-group row reasons" style="display: none">
                                <label class="col-sm-6 col-form-label" for="update_date_employment_contract"><?php echo $dil["date_employment_contract"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_date_employment_contract" name="update_date_employment_contract" placeholder="<?php echo $dil["date_employment_contract"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_probation"><?php echo $dil["probation"];?></label>

                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="update_probation" name="update_probation" placeholder="<?php echo $dil["probation"];?>" />
                                </div>
                                <div class="col-sm-3">
                                    <select data-live-search="true"  name="update_dates"  id="update_dates" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker" >
                                        <?php
                                        $result_dates = $db->query($sql_dates);
                                        if ($result_dates->num_rows > 0) {
                                            while($row_dates= $result_dates->fetch_assoc()) {
                                                ?>
                                                <option  value="<?php echo $row_dates['level_id']; ?>" ><?php echo $row_dates['title'];  ?></option>
                                            <?php } }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_trial_expiration_date"><?php echo $dil["trial_expiration_date"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_trial_expiration_date" name="update_trial_expiration_date" placeholder="<?php echo $dil["trial_expiration_date"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_employee_start_date"><?php echo $dil["employee_start_date"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_employee_start_date" name="update_employee_start_date" placeholder="<?php echo $dil["employee_start_date"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_date_conclusion_employment_contract"><?php echo $dil["date_conclusion_employment_contract"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_date_conclusion_employment_contract" name="update_date_conclusion_employment_contract" placeholder="<?php echo $dil["date_conclusion_employment_contract"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_regulation_property_relations"><?php echo $dil["regulation_property_relations"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_regulation_property_relations" name="update_regulation_property_relations" placeholder="<?php echo $dil["regulation_property_relations"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_termination_cases"><?php echo $dil["termination_cases"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_termination_cases" name="update_termination_cases" placeholder="<?php echo $dil["termination_cases"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_other_conditions_wages"><?php echo $dil["other_conditions_wages"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_other_conditions_wages" name="update_other_conditions_wages" placeholder="<?php echo $dil["other_conditions_wages"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_workplace_status"><?php echo $dil["workplace_status"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="update_workplace_status"  id="update_workplace_status" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["workplace_status"];?>">
                                        <?php
                                        $result_workplace_status_view = $db->query($sql_workplace_status);
                                        if ($result_workplace_status_view->num_rows > 0) {
                                            while($row_workplace_status= $result_workplace_status_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_workplace_status['work_status_id']; ?>" ><?php echo $row_workplace_status['title'];  ?></option>

                                            <?php } }?>
                                    </select>
                                    <!--                                <input type="text" class="form-control" id="renew_interval" name="renew_interval" placeholder="--><?php //echo $dil["medical_renew_interval"];?><!--" />-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_working_conditions"><?php echo $dil["working_conditions"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="update_working_conditions"  id="update_working_conditions" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["working_conditions"];?>">
                                        <?php
                                        $result_working_conditions_view = $db->query($sql_working_conditions);
                                        if ($result_working_conditions_view->num_rows > 0) {
                                            while($row_working_conditions= $result_working_conditions_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_working_conditions['cond_id']; ?>" ><?php echo $row_working_conditions['title'];  ?></option>

                                            <?php } }?>
                                    </select>
                                    <!--                                <input type="text" class="form-control" id="renew_interval" name="renew_interval" placeholder="--><?php //echo $dil["medical_renew_interval"];?><!--" />-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_job_descriptions"><?php echo $dil["job_descriptions"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_job_descriptions" name="update_job_descriptions" placeholder="<?php echo $dil["job_descriptions"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="update_kvota"><?php echo $dil["kvota"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_kvota" name="update_kvota" placeholder="<?php echo $dil["kvota"];?>" />
                                </div>
                            </div>
				
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="updateempcontid" name="update_empcontractid_name" value="" />
        </div>	
		</form>
      </div>
      
    </div>
  </div>

