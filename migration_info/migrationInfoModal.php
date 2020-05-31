 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalMigrationInfoDelete" aria-hidden="true" style="display: none;">
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
			  <form id="migrationInfoDelete" method="post" class="form-horizontal" action="">
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
  <div class="modal fade" id="modalViewMigration" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["migration_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_migrationemp"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_migrationemp" name="view_migrationemp" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>
                        <div class="form-group row">
                            <h5><strong><?php echo $dil["migration_temporary_residence_permit"];?></strong></h5>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_trp_seria_number"><?php echo $dil["trp_seria_number"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_trp_seria_number" name="view_trp_seria_number" placeholder="<?php echo $dil["trp_seria_number"];?>" readonly />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_trp_permit_reason"><?php echo $dil["trp_permit_reason"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_trp_permit_reason" name="view_trp_permit_reason" placeholder="<?php echo $dil["trp_permit_reason"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_trp_permit_date"><?php echo $dil["trp_permit_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_trp_permit_date" name="view_trp_permit_date" placeholder="<?php echo $dil["trp_permit_date"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_trp_valid_date"><?php echo $dil["trp_valid_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_trp_valid_date" name="view_trp_valid_date" placeholder="<?php echo $dil["trp_valid_date"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_trp_issuer"><?php echo $dil["trp_issuer"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_trp_issuer" name="view_trp_issuer" placeholder="<?php echo $dil["trp_issuer"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h5><strong><?php echo $dil["migration_permanent_residence_permit"];?></strong></h5>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_prp_seria_number"><?php echo $dil["prp_seria_number"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_prp_seria_number" name="view_prp_seria_number" placeholder="<?php echo $dil["prp_seria_number"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_prp_permit_date"><?php echo $dil["prp_permit_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_prp_permit_date" name="view_prp_permit_date" placeholder="<?php echo $dil["prp_permit_date"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_prp_valid_date"><?php echo $dil["prp_valid_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_prp_valid_date" name="view_prp_valid_date" placeholder="<?php echo $dil["prp_valid_date"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_prp_issuer"><?php echo $dil["prp_issuer"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_prp_issuer" name="view_prp_issuer" placeholder="<?php echo $dil["prp_issuer"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h5><strong><?php echo $dil["migration_work_permit_labor_activity"];?></strong></h5>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_wp_seria_number"><?php echo $dil["wp_seria_number"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_wp_seria_number" name="view_wp_seria_number" placeholder="<?php echo $dil["wp_seria_number"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_wp_permit_date"><?php echo $dil["wp_permit_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_wp_permit_date" name="view_wp_permit_date" placeholder="<?php echo $dil["wp_permit_date"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_wp_valid_date"><?php echo $dil["wp_valid_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_wp_valid_date" name="view_wp_valid_date" placeholder="<?php echo $dil["wp_valid_date"];?>" readonly/>
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
  <div class="modal fade" id="migrationInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="migrationInfoInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["migration_information"];?></h4>
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
                            <h5><strong><?php echo $dil["migration_temporary_residence_permit"];?></strong></h5>
                        </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="trp_seria_number"><?php echo $dil["trp_seria_number"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="trp_seria_number" name="trp_seria_number" placeholder="<?php echo $dil["trp_seria_number"];?>"  />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="trp_permit_reason"><?php echo $dil["trp_permit_reason"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="trp_permit_reason" name="trp_permit_reason" placeholder="<?php echo $dil["trp_permit_reason"];?>"  />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="trp_permit_date"><?php echo $dil["trp_permit_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="trp_permit_date" name="trp_permit_date" placeholder="<?php echo $dil["trp_permit_date"];?>"  />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="trp_valid_date"><?php echo $dil["trp_valid_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="trp_valid_date" name="trp_valid_date" placeholder="<?php echo $dil["trp_valid_date"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="trp_issuer"><?php echo $dil["trp_issuer"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="trp_issuer" name="trp_issuer" placeholder="<?php echo $dil["trp_issuer"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <h5><strong><?php echo $dil["migration_permanent_residence_permit"];?></strong></h5>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="prp_seria_number"><?php echo $dil["prp_seria_number"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="prp_seria_number" name="prp_seria_number" placeholder="<?php echo $dil["prp_seria_number"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="prp_permit_date"><?php echo $dil["prp_permit_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="prp_permit_date" name="prp_permit_date" placeholder="<?php echo $dil["prp_permit_date"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="prp_valid_date"><?php echo $dil["prp_valid_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="prp_valid_date" name="prp_valid_date" placeholder="<?php echo $dil["prp_valid_date"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="prp_issuer"><?php echo $dil["prp_issuer"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="prp_issuer" name="prp_issuer" placeholder="<?php echo $dil["prp_issuer"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <h5><strong><?php echo $dil["migration_work_permit_labor_activity"];?></strong></h5>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="wp_seria_number"><?php echo $dil["wp_seria_number"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="wp_seria_number" name="wp_seria_number" placeholder="<?php echo $dil["wp_seria_number"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="wp_permit_date"><?php echo $dil["wp_permit_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="wp_permit_date" name="wp_permit_date" placeholder="<?php echo $dil["wp_permit_date"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="wp_valid_date"><?php echo $dil["wp_valid_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="wp_valid_date" name="wp_valid_date" placeholder="<?php echo $dil["wp_valid_date"];?>" />
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
   <div class="modal fade" id="modalEditMigrationInfo" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="migrationInfoUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["migration_edit_title"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >
					
 						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_migrationempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_migrationempid"  id="update_migrationempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
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
                                <h5><strong><?php echo $dil["migration_temporary_residence_permit"];?></strong></h5>
                            </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_trp_seria_number"><?php echo $dil["trp_seria_number"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_trp_seria_number" name="update_trp_seria_number" placeholder="<?php echo $dil["trp_seria_number"];?>" />
                                    </div>
                                </div>
    

    
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_trp_permit_reason"><?php echo $dil["trp_permit_reason"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_trp_permit_reason" name="update_trp_permit_reason" placeholder="<?php echo $dil["trp_permit_reason"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_trp_permit_date"><?php echo $dil["trp_permit_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_trp_permit_date" name="update_trp_permit_date" placeholder="<?php echo $dil["trp_permit_date"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_trp_valid_date"><?php echo $dil["trp_valid_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_trp_valid_date" name="update_trp_valid_date" placeholder="<?php echo $dil["trp_valid_date"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_trp_issuer"><?php echo $dil["trp_issuer"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_trp_issuer" name="update_trp_issuer" placeholder="<?php echo $dil["trp_issuer"];?>" />
                                    </div>
                                </div>
                            <div class="form-group row">
                                <h5><strong><?php echo $dil["migration_permanent_residence_permit"];?></strong></h5>
                            </div>


                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_prp_seria_number"><?php echo $dil["prp_seria_number"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_prp_seria_number" name="update_prp_seria_number" placeholder="<?php echo $dil["prp_seria_number"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_prp_permit_date"><?php echo $dil["prp_permit_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_prp_permit_date" name="update_prp_permit_date" placeholder="<?php echo $dil["prp_permit_date"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_prp_valid_date"><?php echo $dil["prp_valid_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_prp_valid_date" name="update_prp_valid_date" placeholder="<?php echo $dil["prp_valid_date"];?>" />
                                    </div>
                                </div>


                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_prp_issuer"><?php echo $dil["prp_issuer"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_prp_issuer" name="update_prp_issuer" placeholder="<?php echo $dil["prp_issuer"];?>" />
                                    </div>
                                </div>
                            <div class="form-group row">
                                <h5><strong><?php echo $dil["migration_work_permit_labor_activity"];?></strong></h5>
                            </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_wp_seria_number"><?php echo $dil["wp_seria_number"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_wp_seria_number" name="update_wp_seria_number" placeholder="<?php echo $dil["wp_seria_number"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_wp_permit_date"><?php echo $dil["wp_permit_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_wp_permit_date" name="update_wp_permit_date" placeholder="<?php echo $dil["wp_permit_date"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="update_wp_valid_date"><?php echo $dil["wp_valid_date"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="update_wp_valid_date" name="update_wp_valid_date" placeholder="<?php echo $dil["wp_valid_date"];?>" />
                                    </div>
                                </div>
					</div>
 				
					
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="updatemigid" name="update_migid_name" value="" />
        </div>	
		</form>
      </div>
      
    </div>
  </div>

