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

     <!--medical VIEW MODAL -->
  <div class="modal fade" id="modalViewMedical" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["medical_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_medicalemp"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_medicalemp" name="view_medicalemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_medical_app"><?php echo $dil["medical_app"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_medical_app" name="view_medical_app" placeholder="<?php echo $dil["medical_app"];?>" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_renew_interval"><?php echo $dil["medical_renew_interval"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_renew_interval" name="view_renew_interval" placeholder="<?php echo $dil["medical_renew_interval"];?>" readonly />
                                </div>
                            </div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_last_renew_date"><?php echo $dil["medical_last_renew_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_last_renew_date" name="view_last_renew_date" placeholder="<?php echo $dil["medical_last_renew_date"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_physical_deficiency"><?php echo $dil["medical_physical_deficiency"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_physical_deficiency" name="view_physical_deficiency" placeholder="<?php echo $dil["medical_physical_deficiency"];?>" readonly />
				 				</div>
							</div> 


							<div class="form-group row"   >
								<label class="col-sm-4 col-form-label" for="view_deficiency_desc"><?php echo $dil["medical_deficiency_desc"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_deficiency_desc" name="view_deficiency_desc" placeholder="<?php echo $dil["medical_deficiency_desc"];?>" readonly />
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
  <div class="modal fade" id="medicalInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="medicalInfoInsertForm" method="post" class="form-horizontal" action="">
	
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
                                    <label class="col-sm-4 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                                    <div class="col-sm-6 emp" id="emp">
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
                            <label class="col-sm-4 col-form-label" for="medical_app"><?php echo $dil["medical_app"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="medical_app"  id="medical_app" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["medical_app"];?>">
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
                            <label class="col-sm-4 col-form-label" for="medical_renew_interval"><?php echo $dil["medical_renew_interval"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="medical_renew_interval"  id="medical_renew_interval" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["medical_renew_interval"];?>">

                                <?php
                                for ($i=1;$i<=12;$i++){
                                ?>

                                 <option  value="<?php echo $i; ?>" ><?php echo $i.' Ay';  ?></option>

                                <?php  }?>
                                </select>
<!--                                <input type="text" class="form-control" id="renew_interval" name="renew_interval" placeholder="--><?php //echo $dil["medical_renew_interval"];?><!--" />-->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="medical_last_renew_date"><?php echo $dil["medical_last_renew_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="medical_last_renew_date" name="medical_last_renew_date" placeholder="<?php echo $dil["medical_last_renew_date"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="medical_physical_deficiency"><?php echo $dil["medical_physical_deficiency"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="medical_physical_deficiency"  id="medical_physical_deficiency" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["medical_physical_deficiency"];?>">
                                    <?php
                                    $result_yesno_view = $db->query($sql_yesno);
                                    if ($result_yesno_view->num_rows > 0) {
                                        while($row_yesno= $result_yesno_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_yesno['chois_id']; ?>" ><?php echo $row_yesno['chois_desc'];  ?></option>

                                        <?php } }?>
                                </select>
<!--                                <input type="text" class="form-control" id="medical_physical_deficiency" name="medical_physical_deficiency" placeholder="--><?php //echo $dil["medical_physical_deficiency"];?><!--" />-->
                            </div>
                        </div>

                        <div class="form-group row" id="medical_deficiency_descDiv" style="display:none;">
                            <label class="col-sm-4 col-form-label" for="medical_deficiency_desc"><?php echo $dil["medical_deficiency_desc"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="medical_deficiency_desc" name="medical_deficiency_desc" placeholder="<?php echo $dil["medical_deficiency_desc"];?>" />
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
   <div class="modal fade" id="modalEditMedicalInfo" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="medicalInfoUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["medical_edit_title"];?></h4>
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
                                            $result_exist_not_exist_edit = $db->query($sql_exist_not_exist);
                                            if ($result_exist_not_exist_edit->num_rows > 0) {
                                                while($row_exist_not_exist= $result_exist_not_exist_edit->fetch_assoc()) {
    
                                                    ?>
                                                    <option  value="<?php echo $row_exist_not_exist['exist_id']; ?>" ><?php echo $row_exist_not_exist['exist_desc'];  ?></option>
    
                                                <?php } }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_renew_interval"><?php echo $dil["medical_renew_interval"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="update_renew_interval"  id="update_renew_interval" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["medical_renew_interval"];?>">

                                            <?php
                                            for ($i=1;$i<=12;$i++){
                                                ?>

                                                <option  value="<?php echo $i; ?>" ><?php echo $i.' Ay';  ?></option>

                                            <?php  }?>
                                        </select>
<!--                                        <input type="text" class="form-control" id="update_renew_interval" name="update_renew_interval" placeholder="--><?php //echo $dil["medical_renew_interval"];?><!--" />-->
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_last_renew_date"><?php echo $dil["medical_last_renew_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_last_renew_date" name="update_last_renew_date" placeholder="<?php echo $dil["medical_last_renew_date"];?>" />
                                    </div>
                                </div>
    
                                <div class="form-group row" >
                                    <label class="col-sm-4 col-form-label" for="update_physical_deficiency"><?php echo $dil["medical_physical_deficiency"];?></label>
                                    <div class="col-sm-6">
                                        <select data-live-search="true"  name="update_physical_deficiency"  id="update_physical_deficiency" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["medical_physical_deficiency"];?>">
                                            <?php
                                            $result_yesno_edit = $db->query($sql_yesno);
                                            if ($result_yesno_edit->num_rows > 0) {
                                                while($row_yesno= $result_yesno_edit->fetch_assoc()) {

                                                    ?>
                                                    <option  value="<?php echo $row_yesno['chois_id']; ?>" ><?php echo $row_yesno['chois_desc'];  ?></option>

                                                <?php } }?>
                                        </select>
<!--                                        <input type="text" class="form-control" id="update_physical_deficiency" name="update_physical_deficiency" placeholder="--><?php //echo $dil["medical_physical_deficiency"];?><!--" />-->
                                    </div>
                                </div>
    
                                <div class="form-group row"id="update_deficiency_descDiv" style="display: none;">
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

