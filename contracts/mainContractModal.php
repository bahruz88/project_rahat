<script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.17.9/docxtemplater.js"></script>
<script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
<script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils.js"></script>
<!--
Mandatory in IE 6, 7, 8 and 9.
-->
<style>
    .altxett  {
        border-style: solid;
        border-bottom: thick line #ff0000;
        border-top: none;
        border-left: none;
        border-right: none;
        width: 250px;
    }
    .disabled {
        color: grey;
        opacity: 0.5;
        pointer-events: none;
        cursor: default;
    }
</style>
<!--[if IE]>
<script type="text/javascript" src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils-ie.js"></script>
<![endif]-->
<!--EMPLOYEE İNSERT MODAL -->
  <div class="modal fade" id="myContracts" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
    <form id="employeeInsert" method="post" class="form-horizontal" action="">

      <!-- Modal content-->
      <div class="modal-content" >

        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["contracts_commands"];?></h4>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 350px;overflow-y: scroll; ">
                        <div class="form-group row">
                            <div class="col-sm-5">

                                <fieldset >
                                    <input type="radio" value="1" name="contractSelect">&nbsp; <label for="">Müqavilə</label><br/>
                                    <input type="radio" value="2" name="contractSelect">&nbsp;<label for="">Əmr</label><br/>
                                 </fieldset>
                            </div>

                            <div class="col-sm-5">
                                <div  id="contractsDiv" style="display: none;">
                                    <select   name="contracts" id="contracts"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["contracts"];?>" >
                                        <option value="0">Seçin...</option>
                                        <option value="1">Əmək müqaviləsi</option>
                                        <option value="2">Əmək müqaviləsinə əlavə</option>
                                        <option value="3">Hərbi uçot vərəqəsi</option>
                                    </select>
                                </div>

                                <div  id="commandsDiv" style="display: none;">
                                    <select data-live-search="true"  name="commands" style="display: none;" id="commands"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["commands"];?>" >
                                        <option  value="0" >Seçin...</option>
                                        <?php
                                        if($result_commands->num_rows > 0) {
                                            while($row_commands = $result_commands->fetch_assoc()) {
                                                ?>
                                                <option  value="c<?php echo $row_commands['id']; ?>" ><?php echo $row_commands['title'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>

                             </div>


                        </div>
                        <div class="form-group row" id="contractsDate" style="display: none;">
                            <!--                    <label class="col-sm-4 col-form-label" for="contracts">--><?php //echo $dil["contracts"];?><!--</label>-->
                            <div class="col-sm-12">
                                <label class="col-sm-12 col-form-label" for="contracts">Hansı tarixdəki sənədi çap etmək istəyirsiniz?</label>

                                <fieldset >
                                    <input type="radio" value="1" name="contractDate" class="contractDate">&nbsp; <label for="">İlkin</label><br/>
                                    <input type="radio" value="2" name="contractDate" class="contractDate">&nbsp;<label for="">Son</label><br/>
                                    <input type="radio" value="3" name="contractDate" class="contractDate">&nbsp;<label for="">Digər</label>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-group row" id="commandsDate" style="display: none;">
                            <div class="col-sm-7">

                                <label class="col-form-label" for="contracts">Hansı növ sənədi çap etmək istəyirsiniz?</label>

                                <fieldset >
                                    <input type="radio" value="1" name="commandDate">&nbsp; <label for="">Nömrələnmiş</label><br/>
                                    <input type="radio" value="2" name="commandDate">&nbsp;<label for="">Nömrələnməmiş</label><br/>
                                    <input type="radio" value="3" name="commandDate">&nbsp;<label for="">Hamısı</label>
                                </fieldset>
                            </div>

                            <div class="col-sm-5">
                                <label class="col-form-label" for="contracts">Tarix Aralığı</label>

                                <input type="text" class="form-control" id="sinceBeginDate" name="sinceBeginDate" placeholder="0000-00-00" />
                                <input type="text" class="form-control" id="sinceEndDate" name="sinceEndDate" placeholder="0000-00-00" />


                            </div>


                        </div>
                        <input type="hidden" class="form-control" id="emp_id" name="emp_id"   />
                        <input type="hidden" class="form-control" id="currentDate" name="currentDate"   />
                        <input type="hidden" class="form-control" id="command_no" name="command_no"   />
                        <input type="hidden" class="form-control" id="full_name" name="full_name"   />
                        <input type="hidden" class="form-control" id="citizenship" name="citizenship"   />
                        <input type="hidden" class="form-control" id="passport_seria_number" name="passport_seria_number"   />
                        <input type="hidden" class="form-control" id="pincode" name="pincode"   />
                        <input type="hidden" class="form-control" id="passport_date" name="passport_date"   />
                        <input type="hidden" class="form-control" id="pass_given_authority" name="pass_given_authority"   />
                        <input type="hidden" class="form-control" id="company_name" name="company_name"   />
                        <input type="hidden" class="form-control" id="company_address" name="company_address"   />
                        <input type="hidden" class="form-control" id="company_tel" name="company_tel"   />
                        <input type="hidden" class="form-control" id="voen" name="voen"   />
                        <input type="hidden" class="form-control" id="sun" name="sun"   />
                        <input type="hidden" class="form-control" id="enterprise_head_position" name="enterprise_head_position"   />
                        <input type="hidden" class="form-control" id="enterprise_head_fullname" name="enterprise_head_fullname"   />

                        <input type="hidden" class="form-control" id="qualification" name="qualification"   />
                        <input type="hidden" class="form-control" id="uni_name" name="uni_name"   />
                        <input type="hidden" class="form-control" id="profession" name="profession"   />
                        <input type="hidden" class="form-control" id="create_date" name="create_date"   />
                        <input type="hidden" class="form-control" id="structure1" name="structure1"   />
                        <input type="hidden" class="form-control" id="structure2" name="structure2"   />
                        <input type="hidden" class="form-control" id="structure3" name="structure3"   />
                        <input type="hidden" class="form-control" id="structure4" name="structure4"   />
                        <input type="hidden" class="form-control" id="structure5" name="structure5"   />
                        <input type="hidden" class="form-control" id="lastname" name="lastname"   />
                        <input type="hidden" class="form-control" id="firstname" name="firstname"   />
                        <input type="hidden" class="form-control" id="surname" name="surname"   />
                        <input type="hidden" class="form-control" id="birth_date" name="birth_date"   />
                        <input type="hidden" class="form-control" id="birth_place" name="birth_place"   />
                        <input type="hidden" class="form-control" id="marital_status" name="marital_status"   />
                        <input type="hidden" class="form-control" id="mob_tel" name="mob_tel"   />
                        <input type="hidden" class="form-control" id="living_address" name="living_address"   />

                        <input type="hidden" class="form-control" id="military_reg_group" name="military_reg_group"   />
                        <input type="hidden" class="form-control" id="military_reg_category" name="military_reg_category"   />
                        <input type="hidden" class="form-control" id="military_staff" name="military_staff"   />
                        <input type="hidden" class="form-control" id="military_rank" name="military_rank"   />
                        <input type="hidden" class="form-control" id="military_specialty_acc" name="military_specialty_acc"   />
                        <input type="hidden" class="form-control" id="military_fitness_service" name="military_fitness_service"   />
                        <input type="hidden" class="form-control" id="military_registration_service" name="military_registration_service"   />
                        <input type="hidden" class="form-control" id="military_registration_date" name="military_registration_date"   />
                        <input type="hidden" class="form-control" id="military_general" name="military_general"   />
                        <input type="hidden" class="form-control" id="military_special" name="military_special"   />
                        <input type="hidden" class="form-control" id="military_no_official" name="military_no_official"   />
                        <input type="hidden" class="form-control" id="military_additional_information" name="military_additional_information"   />
                        <input type="hidden" class="form-control" id="military_date_completion" name="military_date_completion"   />

                        <input type="hidden" class="form-control" id="indefinite" name="indefinite"   />
                        <input type="hidden" class="form-control" id="reasons_temporary_closure" name="reasons_temporary_closure"   />
                        <input type="hidden" class="form-control" id="date_contract" name="date_contract"   />
                        <input type="hidden" class="form-control" id="probation" name="probation"   />
                        <input type="hidden" class="form-control" id="dates" name="dates"   />
                        <input type="hidden" class="form-control" id="trial_expiration_date" name="trial_expiration_date"   />
                        <input type="hidden" class="form-control" id="employee_start_date" name="employee_start_date"   />
                        <input type="hidden" class="form-control" id="date_conclusion_contract" name="date_conclusion_contract"   />
                        <input type="hidden" class="form-control" id="regulation_property_relations" name="regulation_property_relations"   />
                        <input type="hidden" class="form-control" id="termination_cases" name="termination_cases"   />
                        <input type="hidden" class="form-control" id="other_condition_wages" name="other_condition_wages"   />
                        <input type="hidden" class="form-control" id="workplace_status" name="workplace_status"   />
                        <input type="hidden" class="form-control" id="working_conditions" name="working_conditions"   />
                        <input type="hidden" class="form-control" id="job_description" name="job_description"   />
                        <input type="hidden" class="form-control" id="kvota" name="kvota"   />
                        <input type="hidden" class="form-control" id="insert_date" name="insert_date"   />

                        <input type="hidden" class="form-control" id="vezife" name="vezife"   />
                        <input type="hidden" class="form-control" id="directorate" name="directorate"   />
                        <input type="hidden" class="form-control" id="department" name="department"   />
                        <input type="hidden" class="form-control" id="depart" name="depart"   />
                        <input type="hidden" class="form-control" id="area_section" name="area_section"   />

                        <input type="hidden" class="form-control" id="exit_date" name="exit_date"   />
                        <input type="hidden" class="form-control" id="main" name="main"   />
                        <input type="hidden" class="form-control" id="guarantees_termination_contract" name="guarantees_termination_contract"   />
                        <input type="hidden" class="form-control" id="type_dismissal" name="type_dismissal"   />
                        <input type="hidden" class="form-control" id="termination_clause" name="termination_clause"   />
                        <input type="hidden" class="form-control" id="note" name="note"   />
                        <input type="hidden" class="form-control" id="prize" name="prize"   />

                        <!--                        <input type="hidden" class="form-control" id="memberType" name="memberType"   />-->
<!--                        <input type="hidden" class="form-control" id="m_firstname" name="m_firstname"   />-->
<!--                        <input type="hidden" class="form-control" id="m_lastname" name="m_lastname"   />-->
<!--                        <input type="hidden" class="form-control" id="m_surname" name="m_surname"   />-->
                        <div id="member">

                        </div>

                        <input type="hidden" id="update_empid" name="update_empidn" value="" />

<!--                        <div id="previewImage"  style="display: none">-->
<!---->
<!--                        </div>-->
<!--                        <button type="button" class="btn btn-primary" id="confirmContract">Axtar</button>-->

                    </div>



            </div>
            <table id="command_table" style="display: none;width:100%;" class="table table-striped  table-bordered table-hover">
                <thead style="font-weight: bold;">
                    <td width="10px;">1</td>
                    <td width="50px;" class="cno">Əmr nömrəsi</td>
                    <td>Ad</td>
                    <td>Soyad</td>
                    <td>Ata adı</td>
                    <td>Əməliyyat</td>
                 </thead>
                <tbody></tbody>

            </table>

		</div>
        <div class="modal-footer">
<!--            <button type="button" class="btn btn-primary" id="confirmContract">Təsdiq</button>-->


            <!--		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up">--><?php //echo $dil["save"];?><!--</button>-->
            <button type="button" class="btn btn-default"  id="closeContract" data-dismiss="modal"><?php echo $dil["close"];?></button>

        </div>
		</form>
      </div>

    </div>
  </div>

<div class="modal fade" id="whichDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <!--                    <label class="col-sm-4 col-form-label" for="contracts">--><?php //echo $dil["contracts"];?><!--</label>-->
                    <div class="col-sm-12">
                        <label class="col-sm-12 col-form-label" for="selectDate">Zəhmət olmasa tarix seçin</label>
                        <input type="text" style="width:120px;" class="form-control" id="selectDate" name="selectDate" placeholder="0000-00-00" />

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary" id="confirmDate">Təsdiq</button>
            </div>
        </div>
    </div>
</div>


<!--word to html-->
<div class="modal fade" id="emek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <?php include("emek.php");?>

            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary" id="confirmContract">Təsdiq</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    var getCanvas; // global variable
    function saveDiv(divId) {
        // generate(divId)
        var imgageData = getCanvas.toDataURL("image/png");
        var doc = new jsPDF('p', 'mm');
        // var width = doc.internal.pageSize.getWidth();
        // var height = doc.internal.pageSize.getHeight();
        // doc.addImage(imgageData, 'PNG', 0, 0, width, height);
        doc.addImage(imgageData, 'PNG', 10, 10);
        doc.save('sample-file.pdf');
    }
    function loadFile(url,callback){
        PizZipUtils.getBinaryContent(url,callback);
    }
    function generate(name) {
        loadFile("senedler/"+name+".docx",function(error,content){
            if (error) { throw error };

            // The error object contains additional information when logged with JSON.stringify (it contains a properties object containing all suberrors).
            function replaceErrors(key, value) {
                if (value instanceof Error) {
                    return Object.getOwnPropertyNames(value).reduce(function(error, key) {
                        error[key] = value[key];
                        return error;
                    }, {});
                }
                return value;
            }

            function errorHandler(error) {
                console.log(JSON.stringify({error: error}, replaceErrors));

                if (error.properties && error.properties.errors instanceof Array) {
                    const errorMessages = error.properties.errors.map(function (error) {
                        return error.properties.explanation;
                    }).join("\n");
                    console.log('errorMessages', errorMessages);
                    // errorMessages is a humanly readable message looking like this :
                    // 'The tag beginning with "foobar" is unopened'
                }
                throw error;
            }

            var zip = new PizZip(content);
            var doc;

            var mem_father='';
            var mem_mother='';
            var mem_boy='';
            var mem_girl='';
            var mem_husband='';
            var mem_wife='';
            var date1=$('#date_contract').val()
            var date2=$('#trial_expiration_date').val()
            // const diffTime = Math.abs(date2 - date1);
            // const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            var a = moment(date1,'D/M/YYYY');
            var b = moment(date2,'D/M/YYYY');
            var diffDays = b.diff(a, 'days');
             var months = Math.floor(diffDays/31);
            var years = Math.floor(months/12);

            var messageDays = '';

            if(years>0){
                messageDays += years + " il";
            }
            if(months>0) {
                messageDays += months + " ay ";
            }
            if(diffDays>0){
                messageDays += diffDays + " gun ";
            }
            var probation_dates = '';
            if($('#dates').val()=="Ay"){
                probation_dates+=$('#dates').val()+"-ı ";
            }else{
                probation_dates+=$('#dates').val()+"-si ";
            }
            try {
                doc=new window.docxtemplater(zip);
                if($('#member').find('.m1').length >0){
                    var father_firstname=$('#member').find('.m1').find('#m_firstname').val()
                    var father_lastname=$('#member').find('.m1').find('#m_lastname').val()
                    var father_birth_date=$('#member').find('.m1').find('#birth_date').val()
                    mem_father=father_firstname+ ' '+father_lastname+' / '+father_birth_date
                }
                if($('#member').find('.m2').length >0){
                    var mother_firstname=$('#member').find('.m2').find('#m_firstname').val()
                    var mother_lastname=$('#member').find('.m2').find('#m_lastname').val()
                    var mother_birth_date=$('#member').find('.m2').find('#birth_date').val()
                    mem_mother=mother_firstname+ ' '+mother_lastname+' / '+mother_birth_date
                }
                if($('#member').find('.m5').length >0){
                    $.each($('#member').find('.m5'), function (i, v) {
                        var boy_firstname=$(this).find('#m_firstname').val()
                        var boy_lastname=$(this).find('#m_lastname').val()
                        var boy_birth_date=$(this).find('#birth_date').val()
                        mem_boy+=boy_firstname+ ' '+boy_lastname+' / '+boy_birth_date+' ';
                    });

                }
                if($('#member').find('.m6').length >0){
                    $.each($('#member').find('.m6'), function (i, v) {
                        var girl_firstname = $(this).find('#m_firstname').val()
                        var girl_lastname = $(this).find('#m_lastname').val()
                        var girl_birth_date = $(this).find('#birth_date').val()
                        mem_girl += girl_firstname + ' ' + girl_lastname + ' / ' + girl_birth_date+' ';
                    });
                }
                if($('#member').find('.m7').length >0){
                    var hus_firstname=$('#member').find('.m7').find('#m_firstname').val()
                    var hus_lastname=$('#member').find('.m7').find('#m_lastname').val()
                    var hus_birth_date=$('#member').find('.m7').find('#birth_date').val()
                    mem_husband=hus_firstname+ ' '+hus_lastname+' / '+hus_birth_date
                }
                if($('#member').find('.m8').length >0){
                    var wife_firstname=$('#member').find('.m8').find('#m_firstname').val()
                    var wife_lastname=$('#member').find('.m8').find('#m_lastname').val()
                    var wife_birth_date=$('#member').find('.m8').find('#birth_date').val()
                    mem_wife=wife_firstname+ ' '+wife_lastname+' / '+wife_birth_date
                }


            } catch(error) {
                // Catch compilation errors (errors caused by the compilation of the template : misplaced tags)
                errorHandler(error);
            }

            doc.setData({
                current_date: $('#currentDate').val(),
                command_no: $('#command_no').val(),
                full_name: $('#full_name').val(),
                citizenship: $('#citizenship').val(),
                passport_seria_number: $('#passport_seria_number').val(),
                pincode: $('#pincode').val(),
                passport_date: $('#passport_date').val(),
                pass_given_authority: $('#pass_given_authority').val(),
                company_name: $('#company_name').val(),
                company_address: $('#company_address').val(),
                company_tel: $('#company_tel').val(),
                voen: $('#voen').val(),
                sun: $('#sun').val(),
                enterprise_head_position: $('#enterprise_head_position').val(),
                enterprise_head_fullname: $('#enterprise_head_fullname').val(),
                qualification: $('#qualification').val(),
                uni_name: $('#uni_name').val(),
                profession: $('#profession').val(),
                create_date: $('#create_date').val(),
                structure1: $('#structure1').val(),
                structure2: $('#structure2').val(),
                structure3: $('#structure3').val(),
                structure4: $('#structure4').val(),
                structure5: $('#structure5').val(),
                lastname: $('#lastname').val(),
                firstname: $('#firstname').val(),
                surname: $('#surname').val(),
                birth_date: $('#birth_date').val(),
                birth_place: $('#birth_place').val(),
                marital_status: $('#marital_status').val(),
                mob_tel: $('#mob_tel').val(),
                living_address: $('#living_address').val(),

                military_reg_group: $('#military_reg_group').val(),
                military_reg_category: $('#military_reg_category').val(),
                military_staff: $('#military_staff').val(),
                military_rank: $('#military_rank').val(),
                military_specialty_acc: $('#military_specialty_acc').val(),
                military_fitness_service: $('#military_fitness_service').val(),
                military_registration_service: $('#military_registration_service').val(),
                military_registration_date: $('#military_registration_date').val(),
                military_general: $('#military_general').val(),
                military_special: $('#military_special').val(),
                military_no_official: $('#military_no_official').val(),
                military_additional_information: $('#military_additional_information').val(),
                military_date_completion: $('#military_date_completion').val(),
                mem_father: mem_father,
                mem_mother: mem_mother,
                mem_boy: mem_boy,
                mem_girl: mem_girl,
                mem_husband: mem_husband,
                mem_wife: mem_wife,
                indefinite: $('#indefinite').val(),
                reasons_temporary_closure: $('#reasons_temporary_closure').val(),
                date_contract: $('#date_contract').val(),
                probation: $('#probation').val(),
                dates:probation_dates,
                trial_expiration_date: $('#trial_expiration_date').val(),
                employee_start_date: $('#employee_start_date').val(),
                date_conclusion_contract: $('#date_conclusion_contract').val(),
                regulation_property_relations: $('#regulation_property_relations').val(),
                termination_cases: $('#termination_cases').val(),
                other_condition_wages: $('#other_condition_wages').val(),
                workplace_status: $('#workplace_status').val(),
                working_conditions: $('#working_conditions').val(),
                job_description: $('#job_description').val(),
                kvota: $('#kvota').val(),
                messageDays: messageDays,

                insert_date: $('#insert_date').val(),
                vezife: $('#vezife').val(),
                directorate: $('#directorate').val(),
                department: $('#department').val(),
                depart: $('#depart').val(),
                area_section: $('#area_section').val(),
                exit_date: $('#exit_date').val(),
                main: $('#main').val(),
                guarantees_termination_contract: $('#guarantees_termination_contract').val(),
                type_dismissal: $('#type_dismissal').val(),
                termination_clause: $('#termination_clause').val(),
                note: $('#note').val(),
                prize: $('#prize').val(),
            });
            try {
                // render the document (replace all occurences of {first_name} by John, {last_name} by Doe, ...)
                doc.render();
                $('#contracts').find('option[value="0"]').prop('selected', true);
                $('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
            }
            catch (error) {
                // Catch rendering errors (errors relating to the rendering of the template : angularParser throws an error)
                errorHandler(error);
            }
            var out=doc.getZip().generate({
                type:"blob",
                mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            }) //Output the document using Data-URI
            saveAs(out,"output.docx")
        })
    }
</script>