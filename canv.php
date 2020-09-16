<div class="form-group row">
    <label class="col-sm-6 col-form-label" for="view_company_id"><?php echo $dil["company"];?></label>
    <div class="col-sm-6">
        <select data-live-search="true"  name="view_company_id" id='view_company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker view_company_id"  placeholder="<?php echo $dil["company"];?>"  >
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
           for="view_employee"><?php echo $dil["employee"]; ?></label>
    <div class="col-sm-6" id="view_emp">
        <select data-live-search="true" name="view_employee" id="view_employee"
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
           for="view_work_experience_before_enterprise"><?php echo $dil["workExperienceBeforeEnterprise"]; ?></label>
    <div class="col-sm-6">
        İl <input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_work_experience_before_enterprise_year"
                  name="view_work_experience_before_enterprise_year" placeholder="00"/>
        Ay <input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_work_experience_before_enterprise_month"
                  name="view_work_experience_before_enterprise_month" placeholder="00"/>
        Gün<input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_work_experience_before_enterprise_day"
                  name="view_work_experience_before_enterprise_day" placeholder="00"/>

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_work_experience_enterprise"><?php echo $dil["workExperienceEnterprise"]; ?></label>
    <div class="col-sm-6">
        İl <input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_work_experience_enterprise_year"
                  name="view_work_experience_enterprise_year" placeholder="00"/>
        Ay <input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_work_experience_enterprise_month"
                  name="view_work_experience_enterprise_month" placeholder="00"/>
        Gün<input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_work_experience_enterprise_day"
                  name="view_work_experience_enterprise_day" placeholder="00"/>

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-6 col-form-label"
           for="view_general_work_experience"><?php echo $dil["generalWorkExperience"]; ?></label>
    <div class="col-sm-6">
        İl <input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_general_work_experience_year"
                  name="view_general_work_experience_year" placeholder="00"/>
        Ay <input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_general_work_experience_month"
                  name="view_view_general_work_experience_month" placeholder="00"/>
        Gün<input type="text" style="width: 50px;display: initial;" class="form-control"
                  id="view_general_work_experience_day"
                  name="view_general_work_experience_day" placeholder="00"/>

    </div>
</div>