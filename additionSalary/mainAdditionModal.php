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
  <div class="modal fade" id="myAdditionModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="additionInsert" method="post" class="form-horizontal" action="">

      <!-- Modal content-->
      <div class="modal-content" >

        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["modal_title_additionsDeductionsSalary"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="company_id_add" id='company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker company_id"  placeholder="<?php echo $dil["company"];?>"  >
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
                            <label class="col-sm-6 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
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
                            <label class="col-sm-6 col-form-label" for="additionsDeductionsSalary"><?php echo $dil["additionsDeductionsSalary"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="additionsDeductionsSalary"  id="additionsDeductionsSalary" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["additionsDeductionsSalary"];?>">
                                    <option value="0">Seçin...</option>
                                    <?php
                                    $result_additions_salary = $db->query($sql_additions_salary);
                                    if ($result_additions_salary->num_rows > 0) {
                                        while($row_additions_salary= $result_additions_salary->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_additions_salary['code']; ?>" ><?php echo $row_additions_salary['title'];  ?></option>
                                        <?php } }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="additions_salary"><?php echo $dil["additions_salary"];?></label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="additions_salary" name="additions_salary"  />
                            </div>
                            <div class="col-sm-2">
                                <select name="additions_currency"  class="form-control selectpicker" id="additions_currency">
                                    <option value="0">Seçin...</option>
                                    <option value="1">AZN</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">

                            <label class="col-sm-6 col-form-label" for="begin_date"><?php echo $dil["start_date"];?></label>
                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="begin_date" name="begin_date"  />

                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-sm-6 col-form-label" for="end_date"><?php echo $dil["end_date"];?></label>
                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="end_date" name="end_date"  />

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
   <div class="modal fade" id="modalAdditionEdit" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="additionUpdate" method="post" class="form-horizontal" action="">

      <!-- Modal content-->
      <div class="modal-content" >

        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["modal_title_edit_additionsDeductionsSalary"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body"  style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="update_company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="update_company_id" id='update_company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker update_company_id"  placeholder="<?php echo $dil["company"];?>"  >
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
                            <label class="col-sm-6 col-form-label" for="update_employee"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="update_emplo" id="update_employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
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
                            <label class="col-sm-6 col-form-label" for="update_additionsDeductionsSalary"><?php echo $dil["additionsDeductionsSalary"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="update_additionsDeductionsSalary"  id="update_additionsDeductionsSalary" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["additionsDeductionsSalary"];?>">
                                    <option value="0">Seçin...</option>
                                    <?php
                                    $result_additions_salary = $db->query($sql_additions_salary);
                                    if ($result_additions_salary->num_rows > 0) {
                                        while($row_additions_salary= $result_additions_salary->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_additions_salary['code']; ?>" data-code="<?php echo $row_additions_salary['code']; ?>" ><?php echo $row_additions_salary['title'];  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="update_additions_salary"><?php echo $dil["additions_salary"];?></label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="update_additions_salary" name="update_additions_salary"  />
                            </div>
                            <div class="col-sm-2">
                                <select name="update_additions_currency"  class="form-control selectpicker" id="update_additions_currency">
                                    <option value="0">Seçin...</option>
                                    <option value="1">AZN</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">

                            <label class="col-sm-6 col-form-label" for="update_begin_date"><?php echo $dil["start_date"];?></label>
                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="update_begin_date" name="update_begin_date"  />

                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-sm-6 col-form-label" for="update_end_date"><?php echo $dil["end_date"];?></label>
                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="update_end_date" name="update_end_date"  />

                            </div>
                        </div>


					</div>
				</div>

		</div>
        <div class="modal-footer">

		<button  id ="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_id" name="update_idn" value="" />
        </div>
		</form>
      </div>

    </div>
  </div>

<!-- DELETE  CONTENT MODAL  -->
<div class="modal fade" id="modalAdditionDelete" aria-hidden="true" style="display: none;">
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
                <form id="additionDelete" method="post" class="form-horizontal" action="">
                    <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
                    <input type="hidden" id="additionid" name="additionid" value="" />
                </form>
                <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--EMPLOYEE VIEw MODAL -->
<div class="modal fade" id="modalViewAddition" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-text"><?php echo $dil["modal_title_view_additionsDeductionsSalary"];?></h4>

                        <span  id="badge_danger_update" class="badge badge-danger"></span>
                    </div>
                    <div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_company_id" name="view_company_id" placeholder="<?php echo $dil["company"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_employee"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_employee" name="view_employee" placeholder="<?php echo $dil["employee"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_additionsDeductionsSalary"><?php echo $dil["additionsDeductionsSalary"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_additionsDeductionsSalary" name="view_additionsDeductionsSalary" placeholder="<?php echo $dil["additionsDeductionsSalary"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_additions_salary"><?php echo $dil["additions_salary"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_additions_salary" name="view_additions_salary" placeholder="<?php echo $dil["additions_salary"];?>" readonly />
<!--                                <input type="text" class="form-control" id="view_additions_currency" name="view_additions_currency" placeholder="--><?php //echo $dil["additions_currency"];?><!--" readonly />-->
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_begin_date"><?php echo $dil["start_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_begin_date" name="view_begin_date" placeholder="<?php echo $dil["start_date"];?>" readonly />

                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="view_end_date"><?php echo $dil["end_date"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_end_date" name="view_end_date" placeholder="<?php echo $dil["end_date"];?>" readonly />
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




  <!-- Nav tabs -->