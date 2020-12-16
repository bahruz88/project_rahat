 <!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalPreviousPositionsDelete" aria-hidden="true" style="display: none;">
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
			  <form id="previousPositionsDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="positionsinfoid" name="positionsinfoid" value="" />
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

     <!--positions VIEW MODAL -->
  <div class="modal fade" id="modalViewPreviousPositions" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["positions_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_positionsemp"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_positionsemp" name="view_positionsemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_prev_employer"><?php echo $dil["prev_employer"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="view_prev_employer" name="view_prev_employer" placeholder="<?php echo $dil["prev_employer"];?>" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="view_start_date"><?php echo $dil["date_range"];?></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="view_start_date" name="view_start_date" placeholder="<?php echo $dil["date_range"];?>" readonly />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="view_end_date" name="view_end_date" placeholder="<?php echo $dil["date_range"];?>" readonly />
                                </div>
                            </div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_leave_reason"><?php echo $dil["leave_reason"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_leave_reason" name="view_leave_reason" placeholder="<?php echo $dil["leave_reason"];?>" readonly />
				 				</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_sector"><?php echo $dil["sector"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_sector" name="view_sector" placeholder="<?php echo $dil["sector"];?>" readonly />
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
  
  
  
  
  <!--positions İNSERT MODAL -->
  <div class="modal fade" id="previousPositionsInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="previousPositionsInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["previous_employer_information"];?></h4>
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
                                    <label class="col-sm-4 col-form-label" for="prev_employer"><?php echo $dil["prev_employer"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="prev_employer" name="prev_employer" placeholder="<?php echo $dil["prev_employer"];?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="start_date"><?php echo $dil["date_range"];?></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="start_date" name="start_date" placeholder="0000-00-00" />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="end_date" name="end_date" placeholder="0000-00-00" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="leave_reason"><?php echo $dil["leave_reason"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="leave_reason" name="leave_reason" placeholder="<?php echo $dil["leave_reason"];?>" />
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="sector"><?php echo $dil["sector"];?></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="sector" name="sector" placeholder="<?php echo $dil["sector"];?>" />
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
  
  <!--positions EDİT MODAL -->
   <div class="modal fade" id="modalEditPreviousPositions" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="previousPositionsUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["positions_edit_title"];?></h4>
                         <span  id="badge_success" class="badge badge-success"></span>
                        <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 						<div class="card-body" >
					
 						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_positionsempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_positionsemp"  id="update_positionsempid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" Disabled="true">
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
                                <label class="col-sm-4 col-form-label" for="update_prev_employer"><?php echo $dil["prev_employer"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_prev_employer" name="update_prev_employer" placeholder="<?php echo $dil["prev_employer"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_start_date"><?php echo $dil["date_range"];?></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="update_start_date" name="update_start_date" placeholder="<?php echo $dil["date_range"];?>" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="update_end_date" name="update_end_date" placeholder="<?php echo $dil["date_range"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_leave_reason"><?php echo $dil["leave_reason"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_leave_reason" name="update_leave_reason" placeholder="<?php echo $dil["leave_reason"];?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_sector"><?php echo $dil["sector"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="update_sector" name="update_sector" placeholder="<?php echo $dil["sector"];?>" />
                                </div>
                            </div>
					</div>
				</div>
   
		</div>
        <div class="modal-footer">			 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="updatepositionsid" name="update_positionsid_name" value="" />
        </div>	
		</form>
      </div>
      
    </div>
  </div>

