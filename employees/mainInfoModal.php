<style>
    .control-label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 700;
    }
    .profile-user-img{
        width:100px;
        height:100px;
    }

</style>
<style>
    /*the container must be positioned relative:*/
    .custom-select {
        position: relative;
        font-family: Arial;
    }
    .custom-select select {
        display: none; /*hide original SELECT element:*/

    }
    .select-selected {
        /*background-color: #fff;*/


    }
    /*style the arrow inside the select element:*/
    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
    }
    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
        border-color: transparent transparent #000 transparent;
        top: 7px;

        /*color: #1f2d3d94;*/
        color: #999;
        font-size: 14px;
    }
    /*style the items (options), including the selected item:*/
    .select-items div,.select-selected {
        padding: 2px 6px;
        /*border: 1px solid transparent;*/
        /*border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;*/
        cursor: pointer;
        user-select: none;
        font-size: 14px;
    }
    /*style items (options):*/
    .select-items {
        /*color: #1f2d3d94;*/
        position: absolute;
        background-color: #fff;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
        height:200px;
        overflow-y: auto;
        /*border:1px solid grey;*/
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
    }
    /*hide the items when the select box is closed:*/
    .select-hide {
        display: none;
    }
    .select-items div:hover, .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
        color: #212529;
    }
</style>

<!--EMPLOYEE Exit MODAL -->
<div class="modal fade" id="myModalExit" role="dialog" data-keyboard="false" data-backdrop="static">
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
                                <label class="col-sm-4 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
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
                                <label class="col-sm-4 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                                <div class="col-sm-6 emp">
                                    <select data-live-search="true"  name="emplo" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
                                        <!--                                    --><?php
                                        //                                    $result_employees_view = $db->query($sql_employees);
                                        //                                    if ($result_employees_view->num_rows > 0) {
                                        //                                        while($row_employees= $result_employees_view->fetch_assoc()) {
                                        //
                                        //                                            ?>
                                        <!--                                            <option  value="--><?php //echo $row_employees['id']; ?><!--" >--><?php //echo $row_employees['firstname']." " .$row_employees['lastname'];  ?><!--</option>-->
                                        <!---->
                                        <!--                                        --><?php //} }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="exitDate"><?php echo $dil["exitDate"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="exitDate" name="exitDate" placeholder="00.00.0000" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="type_dismissal"><?php echo $dil["type_dismissal"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="type_dismissal" id='type_dismissal' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["type_dismissal"];?>"  >
                                        <?php
//                                        echo $sql_type_dismissal;
                                        $result_type_dismissal = $db->query($sql_type_dismissal);
                                        if ($result_type_dismissal->num_rows > 0) {
                                            while($row_type_dismissal= $result_type_dismissal->fetch_assoc()) {
                                                ?>
                                                <option  value="<?php echo $row_type_dismissal['level_id']; ?>" ><?php echo $row_type_dismissal['title'];  ?></option>
                                            <?php } }?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="termination_clause"><?php echo $dil["termination_clause"];?></label>
                                <div class="col-sm-6 termination_clause">
                                    <select data-live-search="true"  name="termination_clause" id='termination_clause' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["termination_clause"];?>"  >
<!--                                        --><?php
//                                        $result_type_dismissal = $db->query($sql_type_dismissal);
//                                        if ($result_type_dismissal->num_rows > 0) {
//                                            while($row_type_dismissal= $result_type_dismissal->fetch_assoc()) {
//                                                ?>
<!--                                                <option  value="--><?php //echo $row_type_dismissal['level_id']; ?><!--" >--><?php //echo $row_type_dismissal['title'];  ?><!--</option>-->
<!--                                            --><?php //} }?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="note"><?php echo $dil["note"];?></label>
                                <div class="col-sm-6 note">
                                    <div class="custom-select" style="width:350px;background-color: #99999912;">
                                        <select >
                                            <option value="0" >Birini seçin</option>
                                            <option value="1" >a) bəndinə əsasən (müəssisə ləğv edildikdə)</option>
                                            <option value="2" >b) bəndinə əsasən (işçilərin sayı və ya ştatları ixtisar edildikdə)</option>
                                            <option value="3" >a) bəndinə əsasən (müəssisə ləğv edildikdə)</option>
                                            <option value="4" >b) bəndinə əsasən (işçilərin sayı və ya ştatları ixtisar edildikdə)</option>
                                            <option value="5" >c) bəndinə əsasən (peşəkarlıq səviyyəsinin, ixtisasının (peşəsinin) kifayət dərəcədə olmadığına görə işçinin tutduğu vəzifəyə uyğun gəlmədiyi barədə səlahiyyətli orqan tərəfindən müvafiq qərar qəbul edildikdə)</option>
                                            <option value="6" >ç) bəndinə əsasən ( işçi özünün əmək funksiyasını və ya əmək müqaviləsi üzrə öhdəliklərini yerinə yetirmədikdə)</option>
                                            <option value="7" >ç) bəndinə əsasən ( AR - nin ƏM  - nin 72-ci maddəsində sadalanan hallarda əmək vəzifələrini kobud şəkildə pozduqda)</option>
                                            <option value="8" >d) bəndinə əsasən ( sınaq müddəti ərzində işçi özünü doğrultmadıqda)</option>
                                        </select>
                                    </div>
<!--                                    <select data-live-search="true"   name="notes" id="notes"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >-->

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="main"><?php echo $dil["main"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="main" name="main" placeholder="<?php echo $dil["main"];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="guarantees_termination_contract"><?php echo $dil["guarantees_termination_contract"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="guarantees_termination_contract" name="guarantees_termination_contract" placeholder="<?php echo $dil["guarantees_termination_contract"];?>" />
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
                            <label class="col-sm-4 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="company_id" id='company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
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
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="update_company_id"><?php echo $dil["company"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="update_company_id" id='update_company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"   >
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


<!--EMPLOYEE VIEw MODAL -->
   <div class="modal fade" id="modalView" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="employeeView" method="post" class="form-horizontal" action="">

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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row-fluid">
                                    <div  class="col-xs-12" style="text-align: center;" id="imgView">


                                    </div>
<!--                                    <div class="col-xs-12" style="text-align: center;">-->
<!--                                        <img id="profile_image_1" src="http://apps.gamonoid.com/icehrm-open-core/web/images/user_male.png" class="img-polaroid img-thumbnail" style="max-width: 140px;max-height: 140px;">-->
<!--                                    </div>-->

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row-fluid">
                                    <div class="col-md-12">
                                        <h2 id="view_name">IceHrm Employee</h2></div>
                                </div>
                                <div class="row-fluid">
                                    <div class="col-md-12">
                                        <p>
                                            <i class="fa fa-phone"></i> <span id="view_phone">440-953-4578</span>&nbsp;&nbsp;
                                            <i class="fa fa-envelope"></i> <span id="view_email">icehrm+admin@web-stalk.com</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="col-xs-12" style="font-size:18px;border-bottom: 1px solid #DDD;margin-bottom: 10px;padding-bottom: 10px;">
                                        <button id="employeeProfileEditInfo" class="btn btn-small btn-success" onclick="modJs.edit(1);" style="margin-right:10px;"><i class="fa fa-edit"></i> Edit Info</button>
<!--                                        <button id="employeeUploadProfileImage" onclick="showUploadDialog('profile_image_1','Upload Profile Image','profile_image',1,'profile_image_1','src','url','image');return false;" class="btn btn-small btn-primary" type="button" style="margin-right:10px;"><i class="fa fa-upload"></i> Upload Profile Image</button>-->
                                        <button id="employeeDeleteProfileImage" onclick="modJs.deleteProfileImage(1);return false;" class="btn btn-small btn-warning" type="button" style="margin-right:10px;"><i class="fa fa-times"></i> Delete Profile Image</button>
                                    </div>
                                </div>

                                <div class="row" style="border-top: 1px;">
                                    <div class="col-md-4" style="font-size:16px;">
                                        <label class="control-label col-xs-12" style="font-size:15px;"><?php echo $dil["emp_no"];?></label><br/>
                                        <label class="control-label col-xs-12 iceLabel" style="font-size:13px;font-weight: bold;" id="view_empno">EMP001</label>
                                    </div>
                                    <div class="col-md-4" style="font-size:16px;">
                                        <label class="control-label col-xs-12" style="font-size:15px;"><?php echo $dil["home_tel"];?></label><br/>
                                        <label class="control-label col-xs-12 iceLabel" style="font-size:13px;font-weight: bold;" id="view_home_tel">294-38-3535</label>
                                    </div>
                                    <div class="col-md-4" style="font-size:16px;">
                                        <label class="control-label col-xs-12" style="font-size:15px;"><?php echo $dil["emr_contact"];?></label><br/>
                                        <label class="control-label col-xs-12 iceLabel" style="font-size:13px;font-weight: bold;" id="view_emr_contact"></label>
                                    </div>
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
                    <input name="emp_id" id="emp_id" type="hidden" class="inputFile"  value="<?php echo $row_employees['id']; ?>"/>

                    <!--                                                    <option  value="--><?php //echo $row_employees['id']; ?><!--" >--><?php //echo $row_employees['firstname']." " .$row_employees['lastname'];  ?><!--</option>-->

                <?php } }?>
            <!--                                            <input name="uid" type="hidden" class="inputFile"  value=""/>-->
            <label for="files" class="btn btn-primary btn-block btn-outlined">Şəkil əlavə et</label>
            <input id="files"  name="imgName" style="display: none" type="file">
            <!--                            <input name="userImage" type="file" class="inputFile" /><br/>-->
            <input type="button" value="Əlavə et" class="btnSubmit" id="addImage" style="display:none;" />
        </div>
    </form>

</div>

  <!-- Nav tabs -->
<script>
    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 0; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>