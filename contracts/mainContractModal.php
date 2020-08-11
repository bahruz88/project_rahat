<script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.17.9/docxtemplater.js"></script>
<script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
<script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils.js"></script>
<!--
Mandatory in IE 6, 7, 8 and 9.
-->

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
						<h4 class="card-title"><?php echo $dil["contracts"];?></h4>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 350px;overflow-y: scroll; ">


							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="contracts"><?php echo $dil["contracts"];?></label>
								<div class="col-sm-6">
								<select   name="contracts" id="contracts"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["contracts"];?>" >
									<option value="0">Seçin...</option>
									<option value="1">Əmək müqaviləsi</option>
									<option value="2">Əmək müqaviləsinə əlavə</option>
									<option value="3">Hərbi uçot vərəqəsi</option>
								</select>
								</div>
							</div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="commands"><?php echo $dil["commands"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="commands" id="commands"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["commands"];?>" >
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
                        <input type="hidden" class="form-control" id="emp_id" name="emp_id"   />
                        <input type="hidden" class="form-control" id="currentDate" name="currentDate"   />
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

                        <input type="hidden" id="update_empid" name="update_empidn" value="" />




                    </div>
				</div>

		</div>
        <div class="modal-footer">

<!--		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up">--><?php //echo $dil["save"];?><!--</button>-->
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>

        </div>
		</form>
      </div>

    </div>
  </div>

<!--EMPLOYEE query MODAL -->
<div class="modal fade" id="whichContracts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                        <label class="col-sm-12 col-form-label" for="contracts">Hansı tarixdəki sənədi çap etmək istəyirsiniz?</label>

                        <fieldset >
                            <input type="radio" value="1" name="contractDate">&nbsp; <label for="">İlkin</label><br/>
                            <input type="radio" value="2" name="contractDate">&nbsp;<label for="">Son</label><br/>
                            <input type="radio" value="3" name="contractDate">&nbsp;<label for="">Digər</label>
                        </fieldset>
                    </div>
                </div>
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


</script>
<script>
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
            try {
                doc=new window.docxtemplater(zip);
            } catch(error) {
                // Catch compilation errors (errors caused by the compilation of the template : misplaced tags)
                errorHandler(error);
            }

            doc.setData({
                current_date: $('#currentDate').val(),
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
                military_date_completion: $('#military_date_completion').val()
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