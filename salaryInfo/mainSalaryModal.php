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
						<h4 class="card-title"><?php echo $dil["payrollInfo"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-8">
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
                            <div class="col-sm-8" id="emp">
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
                                <select name="wage_currency"  class="form-control selectpicker" id="wage_currency">
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
                                <select name="prizeAmount_currency"  class="form-control selectpicker" id="prizeAmount_currency">
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
                                    <?php
                                    $result_reward_period = $db->query($sql_reward_period);
                                    if ($result_reward_period->num_rows > 0) {
                                        while($row_reward_period= $result_reward_period->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_reward_period['id']; ?>"  ><?php echo $row_reward_period['title'];  ?></option>
                                        <?php } }?>
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
						<h4 class="card-title"><?php echo $dil["modal_edit_payrollInfo"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body"  style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="update_company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-8">
                                <select data-live-search="true"  name="update_company_id" id='update_company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
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
                            <label class="col-sm-4 col-form-label" for="update_employee"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-8" id="update_emp">
                                <select data-live-search="true"  name="update_emplo" id="update_employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
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
<div class="modal fade" id="modalViewSalary" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-text"><?php echo $dil["modal_view_payrollInfo"];?></h4>

                        <span  id="badge_danger_update" class="badge badge-danger"></span>
                    </div>
                    <div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_salaryemp"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_salaryemp" name="view_salaryemp_name" placeholder="<?php echo $dil["employee"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_tariff_rate"><?php echo $dil["tariffRate"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_tariff_rate" name="view_tariff_rate" placeholder="<?php echo $dil["tariffRate"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_position_status_id"><?php echo $dil["positionStatus"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_position_status_id" name="view_position_status_id" placeholder="<?php echo $dil["positionStatus"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_wage"><?php echo $dil["wage"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_wage" name="view_wage" placeholder="<?php echo $dil["wage"];?>" readonly />
                                 <input type="text" class="form-control" id="view_salary_change_reason" name="view_salary_change_reason" placeholder="<?php echo $dil["salaryChangeReason"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_total_monthly_salary"><?php echo $dil["totalMonthlySalary"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_total_monthly_salary" name="view_total_monthly_salary" placeholder="<?php echo $dil["totalMonthlySalary"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_prize_amount"><?php echo $dil["prizeAmount"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_prize_amount" name="view_prize_amount" placeholder="<?php echo $dil["prizeAmount"];?>" readonly />

                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_reward_period"><?php echo $dil["rewardPeriod"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_reward_period" name="view_reward_period" placeholder="<?php echo $dil["rewardPeriod"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_place_expenditure_id"><?php echo $dil["placeExpenditure"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_place_expenditure_id" name="view_place_expenditure_id" placeholder="<?php echo $dil["placeExpenditure"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="view_other_conditions1"><?php echo $dil["otherConditions"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_other_conditions1" name="view_other_conditions1" placeholder="<?php echo $dil["otherConditions"];?>" readonly />
                                <input type="text" class="form-control" id="view_other_conditions2" name="view_other_conditions2" placeholder="<?php echo $dil["otherConditions"];?>" readonly />
                                <input type="text" class="form-control" id="view_other_conditions3" name="view_other_conditions3" placeholder="<?php echo $dil["otherConditions"];?>" readonly />

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

  </div>


  <!-- Nav tabs -->