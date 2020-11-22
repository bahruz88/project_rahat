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
    /*.custom-select {*/
    /*    position: relative;*/
    /*    font-family: Arial;*/
    /*}*/
    /*.custom-select select {*/
    /*    display: none; !*hide original SELECT element:*!*/

    /*}*/
    /*.select-selected {*/
    /*    !*background-color: #fff;*!*/


    /*}*/
    /*!*style the arrow inside the select element:*!*/
    /*.select-selected:after {*/
    /*    position: absolute;*/
    /*    content: "";*/
    /*    top: 14px;*/
    /*    right: 10px;*/
    /*    width: 0;*/
    /*    height: 0;*/
    /*    border: 6px solid transparent;*/
    /*    border-color: #fff transparent transparent transparent;*/
    /*}*/
    /*!*point the arrow upwards when the select box is open (active):*!*/
    /*.select-selected.select-arrow-active:after {*/
    /*    border-color: transparent transparent #000 transparent;*/
    /*    top: 7px;*/

    /*    !*color: #1f2d3d94;*!*/
    /*    color: #999;*/
    /*    font-size: 14px;*/
    /*}*/
    /*!*style the items (options), including the selected item:*!*/
    /*.select-items div,.select-selected {*/
    /*    padding: 2px 6px;*/
    /*    !*border: 1px solid transparent;*!*/
    /*    !*border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;*!*/
    /*    cursor: pointer;*/
    /*    user-select: none;*/
    /*    font-size: 14px;*/
    /*}*/
    /*!*style items (options):*!*/
    /*.select-items {*/
    /*    !*color: #1f2d3d94;*!*/
    /*    position: absolute;*/
    /*    background-color: #fff;*/
    /*    top: 100%;*/
    /*    left: 0;*/
    /*    right: 0;*/
    /*    z-index: 99;*/
    /*    height:200px;*/
    /*    overflow-y: auto;*/
    /*    !*border:1px solid grey;*!*/
    /*    border: 1px solid transparent;*/
    /*    border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;*/
    /*}*/
    /*!*hide the items when the select box is closed:*!*/
    /*.select-hide {*/
    /*    display: none;*/
    /*}*/
    /*.select-items div:hover, .same-as-selected {*/
    /*    background-color: rgba(0, 0, 0, 0.1);*/
    /*    color: #212529;*/
    /*}*/
    div.dropdown-menu.open { width: 100%; } ul.dropdown-menu.inner>li>a { white-space: initial; }
</style>

<!--EMPLOYEE Exit MODAL -->
<div class="modal fade" id="myModalExit" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" >
        <form id="employeeExit" method="post" class="form-horizontal" action="">

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
                                <div class="col-sm-6 note"   style="width: 300px;">
                                    <select data-live-search="true"  name="notes" id='notes' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["note"];?>"  >
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
<!--									<input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="--><?php //echo $dil["citizenship"];?><!--" />-->
                                    <select data-live-search="true"  name="citizenship" id='citizenship' title="<?php echo $dil["citizenship"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["citizenship"];?>"  >
                                        <?php
                                        //                                        echo $sql_type_dismissal;
                                        $result_country = $db->query($sql_country);
                                        if ($result_country->num_rows > 0) {
                                            while($row_country= $result_country->fetch_assoc()) {
                                                ?>
                                                <option  value="<?php echo $row_country['level_id']; ?>" ><?php echo $row_country['title'];  ?></option>
                                            <?php } }?>
                                    </select>
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="pincode"><?php echo $dil["pincode"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control"  maxlength="7" id="pincode" name="pincode" placeholder="<?php echo $dil["pincode"];?>" />
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
<!--									<input type="text" class="form-control" id="update_citizenship" name="update_citizenshipn" placeholder="--><?php //echo $dil["citizenship"];?><!--" />-->
                                    <select data-live-search="true"  name="update_citizenshipn" id='update_citizenship' title="<?php echo $dil["citizenship"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["citizenship"];?>"  >
                                        <?php
                                        //                                        echo $sql_type_dismissal;
                                        $result_country = $db->query($sql_country);
                                        if ($result_country->num_rows > 0) {
                                            while($row_country= $result_country->fetch_assoc()) {
                                                ?>
                                                <option  value="<?php echo $row_country['level_id']; ?>" ><?php echo $row_country['title'];  ?></option>
                                            <?php } }?>
                                    </select>
								</div>
							</div>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="update_pincode"><?php echo $dil["pincode"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_pincode" maxlength="7" name="update_pincoden" placeholder="<?php echo $dil["pincode"];?>" />
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
                    <input name="uid" id="uid" type="hidden" class="inputFile"  value="<?php echo $row_employees['id']+1; ?>"/>
                    <input name="emp_id" id="emp_id" type="hidden" class="inputFile"  value="<?php echo $row_employees['id']+1; ?>"/>

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
