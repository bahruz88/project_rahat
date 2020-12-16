<!-- DELETE  CONTENT MODAL  -->
<div class="modal fade" id="modalEduDelete" aria-hidden="true" style="display: none;">
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
			  <form id="educationDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="eduid" name="eduid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	 

<!--educationİNSERT MODAL -->
  <div class="modal fade" id="educationInsert" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="educationInsertForm" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["education_informations"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >
						 
						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="eduempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6 emp" id="emp">
									<select data-live-search="true"  name="eduempid" id=""  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
								 	<?php 
									 $result_employees_view = $db->query($sql_employees);
										if ($result_employees_view->num_rows > 0) {
										while($row_employees= $result_employees_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'] ;  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="qualification"><?php echo $dil["qualification"];?></label>
								<div class="col-sm-6">
								 
								<select   name="qualification"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["qualification"];?>" >
								 	<?php 
										if ($result_qua_dic_view->num_rows > 0) {
										while($row_qua_dic = $result_qua_dic_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_qua_dic['id']; ?>" ><?php echo $row_qua_dic['qualification'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="institution_name"><?php echo $dil["institution_name"];?></label>
								<div class="col-sm-6">
								<select data-live-search="true"  name="institution_id"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["institution_name"];?>" >
								 	<?php 
										if ($result_university_view->num_rows > 0) {
										while($row_university = $result_university_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_university['id']; ?>" ><?php echo $row_university['uni_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="faculty"><?php echo $dil["faculty"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="faculty" name="faculty" placeholder="<?php echo $dil["faculty"];?>" />
								</div>
							</div>
 							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="profession"><?php echo $dil["profession"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="profession" name="profession" placeholder="<?php echo $dil["profession"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="diplom_issue_date"><?php echo $dil["diplom_issue_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="diplom_issue_date" name="diplom_issue_date" placeholder="<?php echo $dil["diplom_issue_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="uni_end_date"><?php echo $dil["uni_end_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="uni_end_date" name="uni_end_date" placeholder="<?php echo $dil["uni_end_date"];?>" />
								</div>
							</div>
							
 							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="diplom_seria_num"><?php echo $dil["diplom_seria_num"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="diplom_seria_num" name="diplom_seria_num" placeholder="<?php echo $dil["diplom_seria_num"];?>" />
								</div>
							</div>

					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value=""><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
							 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
  <!--EDUCATİON EDİT MODAL -->
   <div class="modal fade" id="modalEditEducation" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="educationUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["education_informations"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
 			<div class="card-body" >
						 
						 	<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_eduempid"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
									<select data-live-search="true"  name="update_eduempid" id='update_eduempid' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  Disabled="true"  >
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
								<label class="col-sm-4 col-form-label" for="update_qualification"><?php echo $dil["qualification"];?></label>
								<div class="col-sm-6">
								 
								<select   name="update_qualification_name" id="update_qualification" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["qualification"];?>" >
								 	<?php 
										if ($result_qua_dic_s_view->num_rows > 0) {
										while($row_qua_dic = $result_qua_dic_s_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_qua_dic['id']; ?>" ><?php echo $row_qua_dic['qualification'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="institution_name"><?php echo $dil["institution_name"];?></label>
								<div class="col-sm-6">
								<select data-live-search="true"  name="update_institution_id_name" id="update_institution_id"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["institution_name"];?>" >
								 	<?php 
										if ($result_university_s_view->num_rows > 0) {
										while($row_university = $result_university_s_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_university['id']; ?>" ><?php echo $row_university['uni_name'];  ?></option>
											
										<?php } }?>
								</select>	
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_faculty"><?php echo $dil["faculty"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_faculty" name="update_faculty_name" placeholder="<?php echo $dil["faculty"];?>" />
								</div>
							</div>
 							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_profession"><?php echo $dil["profession"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_profession" name="update_profession_name" placeholder="<?php echo $dil["profession"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_diplom_issue_date"><?php echo $dil["diplom_issue_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_diplom_issue_date" name="diplom_issue_date_name" placeholder="<?php echo $dil["diplom_issue_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_uni_end_date"><?php echo $dil["uni_end_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_uni_end_date" name="update_uni_end_date_name" placeholder="<?php echo $dil["uni_end_date"];?>" />
								</div>
							</div>
							
 							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_diplom_seria_num"><?php echo $dil["diplom_seria_num"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_diplom_seria_num" name="update_diplom_seria_num_name" placeholder="<?php echo $dil["diplom_seria_num"];?>" />
								</div>
							</div>

					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_eduid" name="update_eduid_name" value="" /> 						 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
   <!--EDUCATION VIEW MODAL -->
  <div class="modal fade" id="modalViewEducation" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["edu_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
 					<div class="card-body" >
						 
						 		<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="eduempid"><?php echo $dil["employee"];?></label>
				 				<div class="col-sm-6">
									<input type="text" class="form-control" id="view_eduempid" name="view_eduempid" placeholder="<?php echo $dil["employee"];?>" readonly />
				 				</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_qualification"><?php echo $dil["qualification"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_qualification" name="view_qualification" placeholder="<?php echo $dil["qualification"];?>" readonly />
				 				</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_institution_name"><?php echo $dil["institution_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_institution_name" name="view_institution_name" placeholder="<?php echo $dil["institution_name"];?>" readonly />
				 				</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_faculty"><?php echo $dil["faculty"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_faculty" name="view_faculty" placeholder="<?php echo $dil["faculty"];?>" readonly />
								</div>
							</div>
 							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_profession"><?php echo $dil["profession"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_profession" name="view_profession" placeholder="<?php echo $dil["profession"];?>" readonly />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_diplom_issue_date"><?php echo $dil["diplom_issue_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_diplom_issue_date" name="view_diplom_issue_date" placeholder="<?php echo $dil["diplom_issue_date"];?>" readonly />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_uni_end_date"><?php echo $dil["uni_end_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_uni_end_date" name="view_uni_end_date" placeholder="<?php echo $dil["uni_end_date"];?>" readonly />
								</div>
							</div>
							
 							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="view_diplom_seria_num"><?php echo $dil["diplom_seria_num"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_diplom_seria_num" name="view_diplom_seria_num" placeholder="<?php echo $dil["diplom_seria_num"];?>" readonly />
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
<!-- SUCCCES MODAL INSERT -->
<div class="modal fade" id="modalInsertEduSuccess">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo  $dil["edu_input_title"];?></h5>
                <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <p id="successedu"> </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>