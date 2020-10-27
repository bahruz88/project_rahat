<!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalWorkExperienceDelete" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $dil["delete_warning"]; ?></h4>
                <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $dil["delete_warning_content"]; ?></p>
            </div>
            <div class="modal-footer justify-content-between">
                <form id="workExperienceDelete" method="post" class="form-horizontal" action="">
                    <button class="btn btn-outline-light" id="itemDelete"
                            type="submit"><?php echo $dil["yes"]; ?></button>
                    <input type="hidden" id="workExperienceid" name="workExperienceid" value=""/>
                </form>
                <button class="btn btn-outline-light" type="button"
                        data-dismiss="modal"><?php echo $dil["no"]; ?></button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--medical VIEW MODAL -->
<div class="modal fade" id="modalViewWorkExperience" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-text"><?php echo $dil["workExperience_view_title"]; ?></h4>

                        <span id="badge_danger_update" class="badge badge-danger"></span>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_employee"><?php echo $dil["employee"]; ?></label>
                            <div class="col-sm-6" id="view_emp">
                                <input type="text"  class="form-control" id="view_employe" name="view_employee" placeholder="<?php echo $dil["employee"]; ?>" readonly/>

                             </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_work_experience_before_enterprise"><?php echo $dil["workExperienceBeforeEnterprise"]; ?></label>
                            <div class="col-sm-6">
                                İl <input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_work_experience_before_enterprise_year"
                                          name="view_work_experience_before_enterprise_year" placeholder="00" readonly/>
                                Ay <input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_work_experience_before_enterprise_month"
                                          name="view_work_experience_before_enterprise_month" placeholder="00" readonly/>
                                Gün<input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_work_experience_before_enterprise_day"
                                          name="view_work_experience_before_enterprise_day" placeholder="00" readonly/>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_work_experience_enterprise"><?php echo $dil["workExperienceEnterprise"]; ?></label>
                            <div class="col-sm-6">
                                İl <input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_work_experience_enterprise_year"
                                          name="view_work_experience_enterprise_year" placeholder="00" readonly/>
                                Ay <input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_work_experience_enterprise_month"
                                          name="view_work_experience_enterprise_month" placeholder="00" readonly/>
                                Gün<input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_work_experience_enterprise_day"
                                          name="view_work_experience_enterprise_day" placeholder="00" readonly/>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_general_work_experience"><?php echo $dil["generalWorkExperience"]; ?></label>
                            <div class="col-sm-6">
                                İl <input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_general_work_experience_year"
                                          name="view_general_work_experience_year" placeholder="00" readonly/>
                                Ay <input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_general_work_experience_month"
                                          name="view_view_general_work_experience_month" placeholder="00" readonly/>
                                Gün<input type="text" style="width: 50px;display: initial;" class="form-control"
                                          id="view_general_work_experience_day"
                                          name="view_general_work_experience_day" placeholder="00" readonly/>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"]; ?></button>
            </div>

        </div>

    </div>
</div>


<!--medical İNSERT MODAL -->
<div class="modal fade" id="workExperienceInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form id="workExperienceInsertForm" method="post" class="form-horizontal" action="">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $dil["workExperience"]; ?></h4>
                            <span id="badge_success" class="badge badge-success"></span>
                            <span id="badge_danger" class="badge badge-danger"></span>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
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
                                <label class="col-sm-6 col-form-label"
                                       for="employee"><?php echo $dil["employee"]; ?></label>
                                <div class="col-sm-6 emp" id="emp">
                                    <select data-live-search="true" name="employee" id="employee"
                                            title="<?php echo $dil["selectone"]; ?>" class="form-control selectpicker"
                                            placeholder="<?php echo $dil["employee"]; ?>">
<!--                                        --><?php
//                                        $result_employees_view = $db->query($sql_employees);
//                                        if ($result_employees_view->num_rows > 0) {
//                                            while ($row_employees = $result_employees_view->fetch_assoc()) {
//
//                                                ?>
<!--                                                <option value="--><?php //echo $row_employees['id']; ?><!--">--><?php //echo $row_employees['firstname'] . " " . $row_employees['lastname']; ?><!--</option>-->
<!---->
<!--                                            --><?php //}
//                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="work_experience_before_enterprise"><?php echo $dil["workExperienceBeforeEnterprise"]; ?></label>
                                <div class="col-sm-6">
                                    İl <input type="number" style="width: 80px;display: initial;" class="form-control work_experience_year"
                                              id="work_experience_before_enterprise_year"
                                              name="work_experience_before_enterprise_year" placeholder="00" value="0"/>
                                    Ay <input type="number" style="width: 80px;display: initial;" class="form-control work_experience_month"
                                              id="work_experience_before_enterprise_month"
                                              name="work_experience_before_enterprise_month" placeholder="00" value="0"/>
                                    Gün<input type="number" style="width: 80px;display: initial;" class="form-control work_experience_day"
                                              id="work_experience_before_enterprise_day"
                                              name="work_experience_before_enterprise_day" placeholder="00" value="0"/>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="work_experience_enterprise"><?php echo $dil["workExperienceEnterprise"]; ?></label>
                                <div class="col-sm-6">
                                    İl <input type="number" style="width: 80px;display: initial;" class="form-control work_experience_year"
                                              id="work_experience_enterprise_year"
                                              name="work_experience_enterprise_year" placeholder="00" value="0"/>
                                    Ay <input type="number" style="width: 80px;display: initial;" class="form-control work_experience_month"
                                              id="work_experience_enterprise_month"
                                              name="work_experience_enterprise_month" placeholder="00" value="0"/>
                                    Gün<input type="number" style="width: 80px;display: initial;" class="form-control work_experience_day"
                                              id="work_experience_enterprise_day"
                                              name="work_experience_enterprise_day" placeholder="00" value="0" />

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="general_work_experience"><?php echo $dil["generalWorkExperience"]; ?></label>
                                <div class="col-sm-6">
                                    İl <input type="number" style="width: 80px;display: initial;" class="form-control work_experience_yearFinal"
                                              id="general_work_experience_year"
                                              name="general_work_experience_year" placeholder="00" value="0" readonly/>
                                    Ay <input type="number" style="width: 80px;display: initial;" class="form-control"
                                              id="general_work_experience_month"
                                              name="general_work_experience_month" placeholder="00" value="0" readonly/>
                                    Gün<input type="number" style="width: 80px;display: initial;" class="form-control"
                                              id="general_work_experience_day"
                                              name="general_work_experience_day" placeholder="00" value="0" readonly/>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button id="add_new_item2" type="submit" class="btn btn-primary" name="signup"
                            value="Sign up"><?php echo $dil["save"]; ?></button>
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo $dil["close"]; ?></button>

                </div>
        </form>
    </div>

</div>
</div>

<!--medical EDİT MODAL -->
<div class="modal fade" id="modalEditWorkExperience" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form id="workExperienceUpdate" method="post" class="form-horizontal" action="">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $dil["workExperience_edit_title"]; ?></h4>
                            <span id="badge_success" class="badge badge-success"></span>
                            <span id="badge_danger" class="badge badge-danger"></span>
                        </div>
                        <div class="card-body">
<!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-6 col-form-label" for="update_company_id">--><?php //echo $dil["company"];?><!--</label>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <select data-live-search="true"  name="update_company_id" id='update_company_id' title="--><?php //echo $dil["selectone"];?><!--" class="form-control selectpicker update_company_id"  placeholder="--><?php //echo $dil["company"];?><!--"  >-->
<!--                                        --><?php
//                                        $result_company = $db->query($sql_employee_company);
//                                        if ($result_company->num_rows > 0) {
//                                            while($row_company= $result_company->fetch_assoc()) {
//                                                ?>
<!--                                                <option  value="--><?php //echo $row_company['id']; ?><!--" >--><?php //echo $row_company['company_name'];  ?><!--</option>-->
<!--                                            --><?php //} }?>
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_employee"><?php echo $dil["employee"]; ?></label>
                                <div class="col-sm-6 update_emp" id="update_emp">

                                    <select data-live-search="true" name="update_employee" id="update_employe"
                                            title="<?php echo $dil["selectone"]; ?>" class="form-control selectpicker"
                                            placeholder="<?php echo $dil["employee"]; ?>" disabled="true">
                                            <?php
                                            $result_employees_view = $db->query($sql_employees);
                                            if ($result_employees_view->num_rows > 0) {
                                                while ($row_employees = $result_employees_view->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row_employees['id']; ?>"><?php echo $row_employees['firstname'] . " " . $row_employees['lastname']; ?></option>
                                                <?php }
                                            } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_work_experience_before_enterprise"><?php echo $dil["workExperienceBeforeEnterprise"]; ?></label>
                                <div class="col-sm-6">
                                    İl <input type="text" style="width: 50px;display: initial;" class="form-control onlyDigit update_work_experience_enterprise_year"
                                              id="update_work_experience_before_enterprise_year"
                                              name="update_work_experience_before_enterprise_year" placeholder="00"/>
                                    Ay <input type="text" style="width: 50px;display: initial;" class="form-control onlyDigit update_work_experience_enterprise_month"
                                              id="update_work_experience_before_enterprise_month"
                                              name="update_work_experience_before_enterprise_month" placeholder="00"/>
                                    Gün<input type="text" style="width: 50px;display: initial;" class="form-control onlyDigit update_work_experience_enterprise_day"
                                              id="update_work_experience_before_enterprise_day"
                                              name="update_work_experience_before_enterprise_day" placeholder="00"/>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_work_experience_enterprise"><?php echo $dil["workExperienceEnterprise"]; ?></label>
                                <div class="col-sm-6">
                                    İl <input type="text" style="width: 50px;display: initial;" class="form-control onlyDigit update_work_experience_enterprise_year"
                                              id="update_work_experience_enterprise_year"
                                              name="update_work_experience_enterprise_year" placeholder="00"/>
                                    Ay <input type="text" style="width: 50px;display: initial;" class="form-control onlyDigit update_work_experience_enterprise_month"
                                              id="update_work_experience_enterprise_month"
                                              name="update_work_experience_enterprise_month" placeholder="00"/>
                                    Gün<input type="text" style="width: 50px;display: initial;" class="form-control onlyDigit update_work_experience_enterprise_day"
                                              id="update_work_experience_enterprise_day"
                                              name="update_work_experience_enterprise_day" placeholder="00"/>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_general_work_experience"><?php echo $dil["generalWorkExperience"]; ?></label>
                                <div class="col-sm-6">
                                    İl <input type="text" style="width: 50px;display: initial;" class="form-control" readonly
                                              id="update_general_work_experience_year"
                                              name="update_general_work_experience_year" placeholder="00"/>
                                    Ay <input type="text" style="width: 50px;display: initial;" class="form-control" readonly
                                              id="update_general_work_experience_month"
                                              name="update_general_work_experience_month" placeholder="00"/>
                                    Gün<input type="text" style="width: 50px;display: initial;" class="form-control" readonly
                                              id="update_general_work_experience_day"
                                              name="update_general_work_experience_day" placeholder="00"/>

                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button id="add_new_item2" typemodalEdit="submit" class="btn btn-primary" name="signup"
                            value="UPDATE"><?php echo $dil["save"]; ?></button>
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo $dil["close"]; ?></button>
                    <input type="hidden" id="updateworkexpid" name="update_workExperienceid_name" value=""/>
                </div>
        </form>
    </div>

</div>
</div>

