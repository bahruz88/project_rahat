 <!-- SKİLL DELETE  CONTENT MODAL  -->
<div class="modal fade" id="modalSkillDelete" aria-hidden="true" style="display: none;">
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
			  <form id="skillDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="skillid" name="skillid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

<!--SKİLL İNSERT MODAL -->
  <div class="modal fade" id="skillsInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
      <!-- Modal content-->
      <div class="modal-content" >
       <form id="skillsInsertForm" method="post" class="form-horizontal" action="">   
        <div class="modal-body">
			 <div class="card card-success">
					<div class="card-header">
					  <h4 class="card-title"><?php echo $dil["skills"];?></h4>
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
											
										<?php }} ?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="skills_name"><?php echo $dil["skills_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="skills_name_id" name="skills_name" placeholder="<?php echo $dil["skills_name"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="skills_descr"><?php echo $dil["skills_descr"];?></label>
								<div class="col-sm-6">
									<textarea type="text" class="form-control" id="skills_descr_id" name="skills_descr" placeholder="<?php echo $dil["skills_descr"];?>" ></textarea>
								</div>
							</div>
				
					</div>
			 </div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo $dil["save"];?></button><button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>				 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
     <!--SKİLL VIEW MODAL -->
  <div class="modal fade" id="modalViewSkills" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["skill_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="skillempid"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_skillemp" name="view_skillempid" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_skill_name"><?php echo $dil["skills_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_skill_name" name="view_skill_name" placeholder="<?php echo $dil["skills_name"];?>" readonly />
				 				</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_skill_descr"><?php echo $dil["skills_descr"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_skill_descr" name="view_skill_descr" placeholder="<?php echo $dil["skills_descr"];?>" readonly />
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
  
 
  <!--SKİLL EDİT MODAL -->
   <div class="modal fade" id="modalEditSkills" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="skillsUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["skill_edit_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_skillempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_skillempid_name" id='update_skillempid' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  Disabled="true"  >
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
								<label class="col-sm-4 col-form-label" for="update_skill_name"><?php echo $dil["skills_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_skill_name" name="update_skill_n_name" placeholder="<?php echo $dil["skills_name"];?>"  />
				 				</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_skill_descr"><?php echo $dil["skills_descr"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_skill_descr" name="update_skill_descr_name" placeholder="<?php echo $dil["skills_descr"];?>"  />
				 				</div>
							</div> 

					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_skillid" name="update_skillid_name" value="" /> 						 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 