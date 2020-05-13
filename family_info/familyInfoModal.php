 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalFamInfoDelete" aria-hidden="true" style="display: none;">
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
			  <form id="famInfoDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="faminfoid" name="faminfoid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--LANG VIEW MODAL -->
  <div class="modal fade" id="modalViewLang" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["lang_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="langempid"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_langemp_id" name="view_langemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_lang_name"><?php echo $dil["language"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_lang_name_id" name="view_lang_name" placeholder="<?php echo $dil["language"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_reading"><?php echo $dil["reading"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_reading_id" name="view_reading_name" placeholder="<?php echo $dil["reading"];?>" readonly />
				 				</div>
							</div> 
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_writing"><?php echo $dil["writing"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_writing_id" name="view_writing_name" placeholder="<?php echo $dil["writing"];?>" readonly />
				 				</div>
							</div> 
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_speaking"><?php echo $dil["speaking"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_speaking_id" name="view_speaking_name" placeholder="<?php echo $dil["speaking"];?>" readonly />
				 				</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_understanding"><?php echo $dil["understanding"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_understanding_id" name="view_understanding_name" placeholder="<?php echo $dil["understanding"];?>" readonly />
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
  
  
  
  
  <!--LANG İNSERT MODAL -->
  <div class="modal fade" id="famInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="langInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["family_information"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >
					
 						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
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
								<label class="col-sm-4 col-form-label" for="family_member_type"><?php echo $dil["family_member_type"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="family_member_type"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["family_member_type"];?>" >
								 	<?php 
										if ($result_fam_member_type_view->num_rows > 0) {
										while($row_fam_info = $result_fam_member_type_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_fam_info['type_id']; ?>" ><?php echo $row_fam_info['type_desc'];  ?></option>
											
										<?php } }
										?>
								</select>	
								</div>
							</div>
			 
							 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $dil["firstname"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $dil["lastname"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="surname"><?php echo $dil["surname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="surname" name="surname" placeholder="<?php echo $dil["surname"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="sex"><?php echo $dil["sex"];?></label>
								<div class="col-sm-6">
								<select   name="sex"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sex"];?>" >
									<option value="1">Kişi</option>
									<option value="2">Qadın</option>
								</select>	 
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="birth_date_fam_info"><?php echo $dil["birth_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="birth_date_fam_info" name="birth_date_fam_info" placeholder="<?php echo $dil["birth_date"];?>" />
								</div>
							</div>

							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="contact_number"><?php echo $dil["contact_number"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="<?php echo $dil["contact_number"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="living_address"><?php echo $dil["living_address"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="living_address" name="living_address" placeholder="<?php echo $dil["living_address"];?>" />
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
  
  <!--LANG EDİT MODAL -->
   <div class="modal fade" id="modalEditLang" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="langUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["lang_edit_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					
 					<div class="card-body" >
					
 						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_langempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_langempid"  id="update_langempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
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
								<label class="col-sm-4 col-form-label" for="update_language"><?php echo $dil["language"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="language" id="update_language" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["language"];?>" >
								 	<?php 
										if ($result_emp_lang_edit->num_rows > 0) {
										while($row_emp_lang = $result_emp_lang_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_emp_lang['id']; ?>" ><?php echo $row_emp_lang['lang_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_reading"><?php echo $dil["reading"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="reading" id="update_reading" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reading"];?>" >
								 	<?php 
										if ($result_lang_level_edit->num_rows > 0) {
										while($row_lang_level= $result_lang_level_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_lang_level['level_id']; ?>" ><?php echo $row_lang_level['level_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_writing"><?php echo $dil["writing"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="writing" id="update_writing" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["writing"];?>" >
								 	<?php 
										if ($result_lang_level_w_edit->num_rows > 0) {
										while($row_lang_level= $result_lang_level_w_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_lang_level['level_id']; ?>" ><?php echo $row_lang_level['level_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_speaking"><?php echo $dil["speaking"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="speaking"  id="update_speaking" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["speaking"];?>" >
								 	<?php 
										if ($result_lang_level_s_edit->num_rows > 0) {
										while($row_lang_level= $result_lang_level_s_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_lang_level['level_id']; ?>" ><?php echo $row_lang_level['level_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_understanding"><?php echo $dil["understanding"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="understanding" id="update_understanding" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["understanding"];?>" >
								 	<?php 
										if ($result_lang_level_u_edit->num_rows > 0) {
										while($row_lang_level= $result_lang_level_u_edit->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_lang_level['level_id']; ?>" ><?php echo $row_lang_level['level_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
				
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_langid" name="update_langid_name" value="" /> 						 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
 