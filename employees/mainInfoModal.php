<!--EMPLOYEE İNSERT MODAL -->
  <div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="employeeInsert" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["main_information"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">
						 
						
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="image"><?php echo $dil["image"];?></label>
								<div class="col-sm-6" id="imgAdd">
<!--									<input type="text" class="form-control" id="image" name="image" placeholder="--><?php //echo $dil["image"];?><!--" />-->

                                </div>
							</div>
                        <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="firstname" name="firstname_name" placeholder="<?php echo $dil["firstname"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="lastname" name="lastname_name" placeholder="<?php echo $dil["lastname"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="surname"><?php echo $dil["surname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="surname" name="surname_name" placeholder="<?php echo $dil["surname"];?>" />
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
								<label class="col-sm-4 col-form-label" for="marital_status"><?php echo $dil["marital_status"];?></label>
								<div class="col-sm-6">
								<select   name="marital_status"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["marital_status"];?>" >
									<option value="1">Evli</option>
									<option value="2">Subay</option>
								</select>	 
								</div>
							</div>
			 
						 

								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="birth_date"><?php echo $dil["birth_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="<?php echo $dil["birth_date"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="birth_place"><?php echo $dil["birth_place"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="<?php echo $dil["birth_place"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="citizenship"><?php echo $dil["citizenship"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="<?php echo $dil["citizenship"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="pincode"><?php echo $dil["pincode"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="pincode" name="pincode" placeholder="<?php echo $dil["pincode"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="pass_seria_num"><?php echo $dil["pass_seria_num"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="pass_seria_num" name="pass_seria_num" placeholder="<?php echo $dil["pass_seria_num"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="passport_date"><?php echo $dil["passport_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="passport_date" name="passport_date" placeholder="<?php echo $dil["passport_date"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="passport_end_date"><?php echo $dil["passport_end_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="passport_end_date" name="passport_end_date" placeholder="<?php echo $dil["passport_end_date"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="pass_given_authority"><?php echo $dil["pass_given_authority"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="pass_given_authority" name="pass_given_authority" placeholder="<?php echo $dil["pass_given_authority"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="living_address"><?php echo $dil["living_address"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="living_address" name="living_address" placeholder="<?php echo $dil["living_address"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="reg_address"><?php echo $dil["reg_address"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="reg_address" name="reg_address" placeholder="<?php echo $dil["reg_address"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="mob_tel"><?php echo $dil["mob_tel"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="mob_tel" name="mob_tel" placeholder="<?php echo $dil["mob_tel"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="home_tel"><?php echo $dil["home_tel"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="home_tel" name="home_tel" placeholder="<?php echo $dil["home_tel"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="email"><?php echo $dil["email"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $dil["email"];?>" />
								</div>
							</div>
							  <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="emr_contact"><?php echo $dil["emr_contact"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="emr_contact" name="emr_contact" placeholder="<?php echo $dil["emr_contact"];?>" />
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
  <!--EMPLOYEE EDİT MODAL -->
   <div class="modal fade" id="modalEdit" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="employeeUpdate" method="post" class="form-horizontal" action="">
	
      <!-- Modal content-->
      <div class="modal-content" >
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["main_information"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body"  style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="image"><?php echo $dil["image"];?></label>
                            <div class="col-sm-6" id="imgUpdate">
                                <!--									<input type="text" class="form-control" id="image" name="image" placeholder="--><?php //echo $dil["image"];?><!--" />-->


                            </div>
                        </div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_firstname"><?php echo $dil["firstname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_firstname" name="update_firstnamen" placeholder="<?php echo $dil["firstname"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_lastname"><?php echo $dil["lastname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_lastname" name="update_lastnamen" placeholder="<?php echo $dil["lastname"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_surname"><?php echo $dil["surname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_surname" name="update_surnamen" placeholder="<?php echo $dil["surname"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_sex"><?php echo $dil["sex"];?></label>
								<div class="col-sm-6">
								<select   name="update_sexn" id="update_sex" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sex"];?>" >
									<option value="1">Kişi</option>
									<option value="2">Qadın</option>
								</select>	 
								</div>
							</div>
							
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_marital_status"><?php echo $dil["marital_status"];?></label>
								<div class="col-sm-6">
								<select   name="update_marital_statusn" id="update_marital_status" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["marital_status"];?>" >
									<option value="1">Evli</option>
									<option value="2">Subay</option>
								</select>	 
								</div>
							</div>
			 
						 

								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_birth_date"><?php echo $dil["birth_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_birth_date" name="update_birth_dateu" placeholder="<?php echo $dil["birth_date"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_birth_place"><?php echo $dil["birth_place"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_birth_place" name="update_birth_placen" placeholder="<?php echo $dil["birth_place"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_citizenship"><?php echo $dil["citizenship"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_citizenship" name="update_citizenshipn" placeholder="<?php echo $dil["citizenship"];?>" />
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_pincode"><?php echo $dil["pincode"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_pincode" name="update_pincoden" placeholder="<?php echo $dil["pincode"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_pass_seria_num"><?php echo $dil["pass_seria_num"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_pass_seria_num" name="update_pass_seria_numn" placeholder="<?php echo $dil["pass_seria_num"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_passport_date"><?php echo $dil["passport_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_passport_date" name="update_passport_daten" placeholder="<?php echo $dil["passport_date"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_passport_end_date"><?php echo $dil["passport_end_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_passport_end_date" name="update_passport_end_daten" placeholder="<?php echo $dil["passport_end_date"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_pass_given_authority"><?php echo $dil["pass_given_authority"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_pass_given_authority" name="update_pass_given_authorityn" placeholder="<?php echo $dil["pass_given_authority"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_living_address"><?php echo $dil["living_address"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_living_address" name="update_living_addressn" placeholder="<?php echo $dil["living_address"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_reg_address"><?php echo $dil["reg_address"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_reg_address" name="update_reg_addressn" placeholder="<?php echo $dil["reg_address"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_mob_tel"><?php echo $dil["mob_tel"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_mob_tel" name="update_mob_teln" placeholder="<?php echo $dil["mob_tel"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_home_tel"><?php echo $dil["home_tel"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_home_tel" name="update_home_teln" placeholder="<?php echo $dil["home_tel"];?>" />
								</div>
							</div>
							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_email"><?php echo $dil["email"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_email" name="update_emailn" placeholder="<?php echo $dil["email"];?>" />
								</div>
							</div>
							  <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_emr_contact"><?php echo $dil["emr_contact"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_emr_contact" name="update_emr_contactn" placeholder="<?php echo $dil["emr_contact"];?>" />
								</div>
							</div>

 				
					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_empid" name="update_empidn" value="" /> 						 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
<div id="uploadDiv" style="display: none">
    <form id="uploadForm" action="upload.php" method="post">
        <img class="profile-user-img img-fluid img-circle"
             src="images/users/def.png" alt="User profile picture" id="default">
        <div id="targetLayer"></div>
        <div id="uploadFormLayer">
            <?php
            $result_employees_asc = $db->query($sql_employees_asc);
            if ($result_employees_asc->num_rows > 0) {
                while($row_employees= $result_employees_asc->fetch_assoc()) {

                    ?>
                    <input name="uid" id="uid" type="hidden" class="inputFile"  value="<?php echo $row_employees['id']; ?>"/>
                    <!--                                                    <option  value="--><?php //echo $row_employees['id']; ?><!--" >--><?php //echo $row_employees['firstname']." " .$row_employees['lastname'];  ?><!--</option>-->

                <?php } }?>
            <!--                                            <input name="uid" type="hidden" class="inputFile"  value=""/>-->
            <input name="empno" id="empno" type="hidden" class="inputFile"  value=""/>
            <label for="files" class="btn btn-primary btn-block btn-outlined">Şəkil əlavə et</label>
            <input id="files"  name="userImage" style="display: none" type="file">
            <!--                            <input name="userImage" type="file" class="inputFile" /><br/>-->
            <input type="button" value="Əlavə et" class="btnSubmit" id="addImage" style="display:none;" />
        </div>
    </form>

</div>

  <!-- Nav tabs -->