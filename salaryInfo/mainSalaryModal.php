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
<!--EMPLOYEE İNSERT MODAL -->
  <div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="salaryInsert" method="post" class="form-horizontal" action="">

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
                            <label class="col-sm-4 col-form-label" for="tariffRate"><?php echo $dil["tariffRate"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="tariffRate"  id="tariffRate" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["tariffRate"];?>">
                                    <option value="0">Seçin...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="positionStatus"><?php echo $dil["positionStatus"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="positionStatus"  id="positionStatus" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["positionStatus"];?>">
                                    <?php
                                    $result_position_status = $db->query($sql_position_status);
                                    if ($result_position_status->num_rows > 0) {
                                        while($row_position_status= $result_position_status->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_position_status['id']; ?>"  data-code="<?php echo $row_position_status['code']; ?>" ><?php echo $row_position_status['title'];  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="wage"><?php echo $dil["wage"];?></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="wage" name="wage"  />
                            </div>
                            <div class="col-sm-2">
                                <select name="currency"  class="form-control selectpicker" id="currency">
                                    <option value="0">Seçin...</option>
                                    <option value="1">AZN</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="reasonChange" name="reasonChange"   placeholder="<?php echo $dil["salaryChangeReason"];?>" />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="totalMonthlySalary"><?php echo $dil["totalMonthlySalary"];?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="totalMonthlySalary" name="totalMonthlySalary"   placeholder="<?php echo $dil["totalMonthlySalary"];?>" />


                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="prizeAmount"><?php echo $dil["prizeAmount"];?></label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="prizeAmount" name="prizeAmount"  />
                            </div>
                            <div class="col-sm-2">
                                <select name="prizeCurrency"  class="form-control selectpicker" id="prizeCurrency">
                                    <option value="0">Seçin...</option>
                                    <option value="1">AZN</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="rewardPeriod"><?php echo $dil["rewardPeriod"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="rewardPeriod"  id="rewardPeriod" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["rewardPeriod"];?>">
                                    <option value="0">Seçin...</option>
                                    <option value="1">Aylıq</option>
                                    <option value="2">Rüblük</option>
                                    <option value="3">İllik</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="placeExpenditure"><?php echo $dil["placeExpenditure"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="placeExpenditure"  id="placeExpenditure" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["rewardPeriod"];?>">

                                    <option  value="" >Seçin...</option>

                                    <?php
                                    $result_place_expenditure = $db->query($sql_place_expenditure);
                                    if ($result_place_expenditure->num_rows > 0) {
                                        while($row_place_expenditure= $result_place_expenditure->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_place_expenditure['id']; ?>" data-icon="<?php echo $row_place_expenditure['posit_icon']; ?>"  style="background-image:url(images/icons/man2.png);"  ><?php echo  $row_place_expenditure['title'];  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label class="col-sm-4 col-form-label" for="otherConditions"><?php echo $dil["otherConditions"];?></label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control" id="otherCondition1" name="otherCondition1"  />
                                <input type="text" class="form-control" id="otherCondition2" name="otherCondition2"  />
                                <input type="text" class="form-control" id="otherCondition3" name="otherCondition3"  />

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
    <form id="salaryUpdate" method="post" class="form-horizontal" action="">

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
                            <label class="col-sm-4 col-form-label" for="update_tariffRate"><?php echo $dil["tariffRate"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="update_tariffRate"  id="update_tariffRate" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["tariffRate"];?>">
                                    <option value="0">Seçin...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_positionStatus"><?php echo $dil["positionStatus"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="update_positionStatus"  id="update_positionStatus" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["positionStatus"];?>">
                                    <?php
                                    $result_position_status = $db->query($sql_position_status);
                                    if ($result_position_status->num_rows > 0) {
                                        while($row_position_status= $result_position_status->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_position_status['id']; ?>"  data-code="<?php echo $row_position_status['code']; ?>" ><?php echo $row_position_status['title'];  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_wage"><?php echo $dil["wage"];?></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="update_wage" name="update_wage"  />
                            </div>
                            <div class="col-sm-2">
                                <select name="update_currency"  class="form-control selectpicker" id="update_currency">
                                    <option value="0">Seçin...</option>
                                    <option value="1">AZN</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="update_reasonChange" name="update_reasonChange"   placeholder="<?php echo $dil["salaryChangeReason"];?>" />

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_totalMonthlySalary"><?php echo $dil["totalMonthlySalary"];?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="update_totalMonthlySalary" name="update_totalMonthlySalary"   placeholder="<?php echo $dil["totalMonthlySalary"];?>" />


                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_prizeAmount"><?php echo $dil["prizeAmount"];?></label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="update_prizeAmount" name="update_prizeAmount"  />
                            </div>
                            <div class="col-sm-2">
                                <select name="update_prizeCurrency"  class="form-control selectpicker" id="update_prizeCurrency">
                                    <option value="0">Seçin...</option>
                                    <option value="1">AZN</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_rewardPeriod"><?php echo $dil["rewardPeriod"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="update_rewardPeriod"  id="update_rewardPeriod" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["rewardPeriod"];?>">
                                    <option value="0">Seçin...</option>
                                    <option value="1">Aylıq</option>
                                    <option value="2">Rüblük</option>
                                    <option value="3">İllik</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_placeExpenditure"><?php echo $dil["placeExpenditure"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="update_placeExpenditure"  id="update_placeExpenditure" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["rewardPeriod"];?>">

                                    <option  value="" >Seçin...</option>

                                    <?php
                                    $result_place_expenditure = $db->query($sql_place_expenditure);
                                    if ($result_place_expenditure->num_rows > 0) {
                                        while($row_place_expenditure= $result_place_expenditure->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_place_expenditure['id']; ?>" data-icon="<?php echo $row_place_expenditure['posit_icon']; ?>"  style="background-image:url(images/icons/man2.png);"  ><?php echo  $row_place_expenditure['title'];  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label class="col-sm-4 col-form-label" for="update_otherConditions"><?php echo $dil["otherConditions"];?></label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control" id="update_otherCondition1" name="update_otherCondition1"  />
                                <input type="text" class="form-control" id="update_otherCondition2" name="update_otherCondition2"  />
                                <input type="text" class="form-control" id="update_otherCondition3" name="update_otherCondition3"  />

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