<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_employee_place"><?php echo $dil["employee"]; ?></label>
    <div class="col-sm-6 ">
        <select data-live-search="true" name="view_employee_place" id="view_employee_place"
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
           for="view_directorate"><?php echo $dil["directorate"]; ?></label>
    <div class="col-sm-6 up_directorate"  >
        <select data-live-search="true" name="view_directorate" id="view_directorate" title="" class="form-control selectpicker stlevel">
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_department"><?php echo $dil["department"]; ?></label>
    <div class="col-sm-6 up_department">
        <select data-live-search="true" name="view_department" id="view_department" title="" class="form-control selectpicker stlevel">
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_department"><?php echo $dil["depart"]; ?></label>
    <div class="col-sm-6 up_depart"  >
        <select data-live-search="true" name="view_depart" id="view_depart" title="" class="form-control selectpicker stlevel">
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_department"><?php echo $dil["area_section"]; ?></label>
    <div class="col-sm-6 up_area_section" >
        <select data-live-search="true" name="view_area_section" id="view_area_section" title="" class="form-control selectpicker stlevel">
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_position"><?php echo $dil["position"]; ?></label>
    <div class="col-sm-6">

        <input type="text" class="form-control" id="view_position" name="view_position" placeholder="<?php echo $dil["position"]; ?>"/>
        <input type="hidden" class="form-control" id="view_position_old" name="view_position_old" />
        <input type="hidden" class="form-control" id="command_code" name="command_code" value="18"/>
        <input type="hidden" class="form-control" id="view_company_Id" name="view_company_Id"/>
        <input type="hidden" class="form-control" id="view_emplo" name="view_emplo"/>
        <!--                                    <input type="hidden" class="form-control" id="view_departmentT" name="view_departmentT"/>-->
        <!--                                    <input type="hidden" class="form-control" id="view_departT" name="view_departT"/>-->
        <!--                                    <input type="hidden" class="form-control" id="view_area_sectionT" name="view_area_sectionT"/>-->
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_position_level"><?php echo $dil["position_level"]; ?></label>
    <div class="col-sm-6">
        <select data-live-search="true" name="view_position_level" id='view_position_level'
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
           for="view_department"><?php echo $dil["status"]; ?></label>
    <div class="col-sm-6">
        <select data-live-search="true" name="view_status" id='view_status'
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
           for="view_direct_guide"><?php echo $dil["direct_guide"]; ?></label>
    <div class="col-sm-6 up_direct_guide">
        <select data-live-search="true" name="view_direct_guide" id="view_direct_guide" title="" class="form-control selectpicker">
        </select>
        <!--                                    <input type="text" class="form-control" id="view_direct_guide" readonly name="view_direct_guide" placeholder="--><?php //echo $dil["direct_guide"]; ?><!--"/>-->
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_second_leader"><?php echo $dil["second_leader"]; ?></label>
    <div class="col-sm-6 up_second_leader">
        <select data-live-search="true" name="view_second_leader" id="view_second_leader" title="" class="form-control selectpicker">
        </select>
        <!--                                    <input type="text" class="form-control" id="view_second_leader" readonly name="view_second_leader" placeholder="--><?php //echo $dil["second_leader"]; ?><!--"/>-->
    </div>
</div>