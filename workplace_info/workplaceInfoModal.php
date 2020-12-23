<!-- LANG CONTENT MODAL  -->
<div class="modal fade" id="modalWorkplaceInfoDelete" aria-hidden="true" style="display: none;">
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
                <form id="workplaceInfoDelete" method="post" class="form-horizontal" action="">
                    <button class="btn btn-outline-light" id="itemDelete"
                            type="submit"><?php echo $dil["yes"]; ?></button>
                    <input type="hidden" id="workplaceInfoid" name="workplaceInfoid" value=""/>
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
<div class="modal fade" id="modalViewWorkplaceInfo" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-text"><?php echo $dil["workplace_information_view_title"]; ?></h4>

                        <span id="badge_danger_update" class="badge badge-danger"></span>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_employee"><?php echo $dil["employee"]; ?></label>
                            <div class="col-sm-6 emp" id="view_emp">
                                <input readonly type="text" class="form-control" id="view_emplo" name="view_emplo" placeholder="<?php echo $dil["employee"]; ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_directorate"><?php echo $dil["directorate"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_directorate" name="view_directorate" placeholder="<?php echo $dil["directorate"]; ?>"/>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_department"><?php echo $dil["department"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_department" name="view_department" placeholder="<?php echo $dil["department"]; ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_department"><?php echo $dil["depart"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_depart" name="view_depart" placeholder="<?php echo $dil["depart"]; ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_area_section"><?php echo $dil["area_section"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_area_section" name="view_area_section" placeholder="<?php echo $dil["area_section"]; ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_department"><?php echo $dil["position"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_position" name="view_position" placeholder="<?php echo $dil["position"]; ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_department"><?php echo $dil["status"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_status" name="view_status" placeholder="<?php echo $dil["status"]; ?>"/>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_department"><?php echo $dil["direct_guide"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_direct_guide" name="view_direct_guide" placeholder="<?php echo $dil["direct_guide"]; ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label"
                                   for="view_second_leader"><?php echo $dil["second_leader"]; ?></label>
                            <div class="col-sm-6">
                                <input readonly type="text" class="form-control" id="view_second_leader" name="view_second_leader" placeholder="<?php echo $dil["second_leader"]; ?>"/>
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
<div class="modal fade" id="workplaceInfoInsertModal" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form id="workplaceInfoInsertForm_m" method="post" class="form-horizontal" action="">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $dil["workplace_information"]; ?></h4>
                            <span id="badge_success" class="badge badge-success"></span>
                            <span id="badge_danger" class="badge badge-danger"></span>
                        </div>
                        <div class="card-body">
                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['CompanyId']?>"  name="company_id" id='company_ids' placeholder="salam" />

                            <!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-6 col-form-label"-->
<!--                                       for="work_company_id">--><?php //echo $dil["company"]; ?><!--</label>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <select data-live-search="true" name="company_id" id='work_company_id'-->
<!--                                            title="--><?php //echo $dil["selectone"]; ?><!--"-->
<!--                                            class="form-control selectpicker work_company_id"-->
<!--                                            placeholder="--><?php //echo $dil["company"]; ?><!--">-->
<!--                                        --><?php
//                                        $result_company = $db->query($sql_employee_company);
//                                        if ($result_company->num_rows > 0) {
//                                            while ($row_company = $result_company->fetch_assoc()) {
//                                                ?>
<!--                                                <option value="--><?php //echo $row_company['id']; ?><!--">--><?php //echo $row_company['company_name']; ?><!--</option>-->
<!--                                            --><?php //}
//                                        } ?>
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
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
                                        <!--                                                <option value="-->
                                        <?php //echo $row_employees['id']; ?><!--">-->
                                        <?php //echo $row_employees['firstname'] . " " . $row_employees['lastname']; ?><!--</option>-->
                                        <!---->
                                        <!--                                            --><?php //}
                                        //                                        } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="directorate"><?php echo $dil["directorate"]; ?></label>
                                <div class="col-sm-6 up_directorate"  >
                                    <select data-live-search="true" name="directorate" id="directorate" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="department"><?php echo $dil["department"]; ?></label>
                                <div class="col-sm-6 up_department">
                                    <select data-live-search="true" name="department" id="department" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="department"><?php echo $dil["depart"]; ?></label>
                                <div class="col-sm-6 up_depart"  >
                                    <select data-live-search="true" name="depart" id="depart" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="department"><?php echo $dil["area_section"]; ?></label>
                                <div class="col-sm-6 up_area_section" >
                                    <select data-live-search="true" name="area_section" id="area_section" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="position"><?php echo $dil["position"]; ?></label>
                                <div class="col-sm-6  up_position">
                                    <select data-live-search="true" name="position" id="position" title="" class="form-control selectpicker stlevel">
                                    </select>
<!--                                    <input type="text" class="form-control" id="position" name="position" placeholder="--><?php //echo $dil["position"]; ?><!--"/>-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="position_level"><?php echo $dil["position_level"]; ?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true" name="position_level" id='position_level'
                                            title="<?php echo $dil["selectone"]; ?>"
                                            class="form-control selectpicker "
                                            placeholder="<?php echo $dil["position_level"]; ?>">
                                        <?php
                                        $result_position_level = $db->query($sql_position_level);
                                        if ($result_position_level->num_rows > 0) {
                                            while ($row_position_level = $result_position_level->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row_position_level['posit_id']; ?>"><?php echo $row_position_level['title']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                 </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="status"><?php echo $dil["status"]; ?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true" name="status" id='status'
                                            title="<?php echo $dil["selectone"]; ?>"
                                            class="form-control selectpicker "
                                            placeholder="<?php echo $dil["status"]; ?>">
                                        <?php
                                        $result_work_status = $db->query($sql_work_status);
                                        if ($result_work_status->num_rows > 0) {
                                            while ($row_work_status = $result_work_status->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row_work_status['id']; ?>"><?php echo $row_work_status['title']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>

<!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-6 col-form-label"-->
<!--                                       for="direct_guide">--><?php //echo $dil["direct_guide"]; ?><!--</label>-->
<!--                                <div class="col-sm-6 up_direct_guide">-->
<!--                                    <select data-live-search="true" name="direct_guide" id="direct_guide" title="" class="form-control selectpicker">-->
<!--                                    </select>-->
 <!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-6 col-form-label"-->
<!--                                       for="second_leader">--><?php //echo $dil["second_leader"]; ?><!--</label>-->
<!--                                <div class="col-sm-6 up_second_leader">-->
<!--                                    <select data-live-search="true" name="second_leader" id="second_leader" title="" class="form-control selectpicker">-->
<!--                                    </select>-->
 <!--                                </div>-->
<!--                            </div>-->


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
<div class="modal fade" id="modalEditWorkPlaceInfo" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form id="workplaceInfoUpdate" method="post" class="form-horizontal" action="">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $dil["workplace_information_edit_title"]; ?></h4>
                            <span id="badge_success" class="badge badge-success"></span>
                            <span id="badge_danger" class="badge badge-danger"></span>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_employee_place"><?php echo $dil["employee"]; ?></label>
                                <div class="col-sm-6 ">
                                    <select data-live-search="true" name="update_employee_place" id="update_employee_place"
                                            title="<?php echo $dil["selectone"]; ?>" class="form-control selectpicker"
                                            placeholder="<?php echo $dil["employee"]; ?>" disabled="true">
                                        <?php
                                        $result_employees_view = $db->query($sql_employees);
                                        if ($result_employees_view->num_rows > 0) {
                                            while ($row_employees = $result_employees_view->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row_employees['id']; ?>">
                                                    <?php echo $row_employees['firstname'] . " " . $row_employees['lastname']; ?>
                                                </option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_directorate"><?php echo $dil["directorate"]; ?></label>
                                <div class="col-sm-6 up_directorate"  >
                                    <select data-live-search="true" name="update_directorate" id="update_directorate" title="" class="form-control selectpicker stlevel">
                                    </select>
                                 </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_department"><?php echo $dil["department"]; ?></label>
                                <div class="col-sm-6 up_department">
                                    <select data-live-search="true" name="update_department" id="update_department" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_department"><?php echo $dil["depart"]; ?></label>
                                <div class="col-sm-6 up_depart"  >
                                    <select data-live-search="true" name="update_depart" id="update_depart" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_department"><?php echo $dil["area_section"]; ?></label>
                                <div class="col-sm-6 up_area_section" >
                                    <select data-live-search="true" name="update_area_section" id="update_area_section" title="" class="form-control selectpicker stlevel">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_position"><?php echo $dil["position"]; ?></label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="update_position" name="update_position" placeholder="<?php echo $dil["position"]; ?>"/>
                                    <input type="hidden" class="form-control" id="update_position_old" name="update_position_old" />
                                    <input type="hidden" class="form-control" id="command_code" name="command_code" value="18"/>
                                    <input type="hidden" class="form-control" id="update_company_Id" name="update_company_Id"/>
                                    <input type="hidden" class="form-control" id="update_emplo" name="update_emplo"/>
<!--                                    <input type="hidden" class="form-control" id="update_departmentT" name="update_departmentT"/>-->
<!--                                    <input type="hidden" class="form-control" id="update_departT" name="update_departT"/>-->
<!--                                    <input type="hidden" class="form-control" id="update_area_sectionT" name="update_area_sectionT"/>-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_position_level"><?php echo $dil["position_level"]; ?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true" name="update_position_level" id='update_position_level'
                                            title="<?php echo $dil["selectone"]; ?>"
                                            class="form-control selectpicker "
                                            placeholder="<?php echo $dil["position_level"]; ?>">
                                        <?php
                                        $result_position_level = $db->query($sql_position_level);
                                        if ($result_position_level->num_rows > 0) {
                                            while ($row_position_level = $result_position_level->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row_position_level['posit_id']; ?>"><?php echo $row_position_level['title']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_department"><?php echo $dil["status"]; ?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true" name="update_status" id='update_status'
                                            title="<?php echo $dil["selectone"]; ?>"
                                            class="form-control selectpicker"
                                            placeholder="<?php echo $dil["status"]; ?>">
                                        <?php
                                        $result_work_status = $db->query($sql_work_status);
                                        if ($result_work_status->num_rows > 0) {
                                            while ($row_work_status = $result_work_status->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row_work_status['id']; ?>"><?php echo $row_work_status['title']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_direct_guide"><?php echo $dil["direct_guide"]; ?></label>
                                <div class="col-sm-6 up_direct_guide">
                                    <select data-live-search="true" name="update_direct_guide" id="update_direct_guide" title="" class="form-control selectpicker">
                                    </select>
<!--                                    <input type="text" class="form-control" id="update_direct_guide" readonly name="update_direct_guide" placeholder="--><?php //echo $dil["direct_guide"]; ?><!--"/>-->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label"
                                       for="update_second_leader"><?php echo $dil["second_leader"]; ?></label>
                                <div class="col-sm-6 up_second_leader">
                                    <select data-live-search="true" name="update_second_leader" id="update_second_leader" title="" class="form-control selectpicker">
                                    </select>
<!--                                    <input type="text" class="form-control" id="update_second_leader" readonly name="update_second_leader" placeholder="--><?php //echo $dil["second_leader"]; ?><!--"/>-->
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
                    <input type="hidden" id="updateworkplaceid" name="update_workplaceInfoid_name" value=""/>
                </div>
        </form>
    </div>

</div>
</div>

