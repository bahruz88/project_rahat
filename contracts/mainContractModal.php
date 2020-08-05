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
					<div class="card-body" style="position: relative; overflow: auto; height: 200px;overflow-y: scroll; ">


							 <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="contracts"><?php echo $dil["contracts"];?></label>
								<div class="col-sm-6">
								<select   name="contracts" id="contracts"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["contracts"];?>" >
									<option value="1">Əmək müqaviləsi</option>
									<option value="2">Əmək müqaviləsinə əlavə</option>
									<option value="3">Hərbi uçot vərəqəsi</option>
								</select>
								</div>
							</div>
                        <input type="hidden" class="form-control" id="full_name" name="full_name"   />
                        <input type="hidden" class="form-control" id="citizenship" name="citizenship"   />
                        <input type="hidden" class="form-control" id="passport_seria_number" name="passport_seria_number"   />
                        <input type="hidden" class="form-control" id="pincode" name="pincode"   />
                        <input type="hidden" class="form-control" id="passport_date" name="passport_date"   />
                        <input type="hidden" class="form-control" id="pass_given_authority" name="pass_given_authority"   />
                        <input type="hidden" class="form-control" id="company_name" name="company_name"   />
                        <input type="hidden" class="form-control" id="voen" name="voen"   />
                        <input type="hidden" class="form-control" id="sun" name="sun"   />
                        <input type="hidden" class="form-control" id="enterprise_head_position" name="enterprise_head_position"   />
                        <input type="hidden" class="form-control" id="enterprise_head_fullname" name="enterprise_head_fullname"   />

                        <input type="hidden" class="form-control" id="qualification" name="qualification"   />
                        <input type="hidden" class="form-control" id="uni_name" name="uni_name"   />
                        <input type="hidden" class="form-control" id="profession" name="profession"   />
                        <input type="hidden" class="form-control" id="create_date" name="create_date"   />
                        <input type="hidden" class="form-control" id="structure1" name="structure"   />
                        <input type="hidden" class="form-control" id="structure2" name="structure"   />
                        <input type="hidden" class="form-control" id="structure3" name="structure"   />
                        <input type="hidden" class="form-control" id="structure4" name="structure"   />
                        <input type="hidden" class="form-control" id="lastname" name="lastname"   />
                        <input type="hidden" class="form-control" id="firstname" name="firstname"   />
                        <input type="hidden" class="form-control" id="surname" name="surname"   />
                        <input type="hidden" class="form-control" id="birth_date" name="birth_date"   />
                        <input type="hidden" class="form-control" id="birth_place" name="birth_place"   />
                        <input type="hidden" class="form-control" id="marital_status" name="marital_status"   />
                        <input type="hidden" class="form-control" id="mob_tel" name="mob_tel"   />
                        <input type="hidden" class="form-control" id="living_address" name="living_address"   />

                        <input type="hidden" id="update_empid" name="update_empidn" value="" />




                    </div>
				</div>

		</div>
<!--        <div class="modal-footer">-->
<!---->
<!--		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up">--><?php //echo $dil["save"];?><!--</button><button type="button" class="btn btn-default" data-dismiss="modal">--><?php //echo $dil["close"];?><!--</button>-->
<!---->
<!--        </div>-->
		</form>
      </div>

    </div>
  </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $('#myContracts').on( 'change', '#contracts', function () {

        console.log('ssss');
        var thisVal=$(this).find('option:selected').val();
        if(thisVal=='1'){
            generate("emek2")
        }else if(thisVal=='2'){
            generate("emekElave")
        }else if(thisVal=='3'){
            generate("herbi")
        }
    });
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
                full_name: $('#full_name').val(),
                citizenship: $('#citizenship').val(),
                passport_seria_number: $('#passport_seria_number').val(),
                pincode: $('#pincode').val(),
                passport_date: $('#passport_date').val(),
                pass_given_authority: $('#pass_given_authority').val(),
                company_name: $('#company_name').val(),
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
                lastname: $('#lastname').val(),
                firstname: $('#firstname').val(),
                surname: $('#surname').val(),
                birth_date: $('#birth_date').val(),
                birth_place: $('#birth_place').val(),
                marital_status: $('#marital_status').val(),
                mob_tel: $('#mob_tel').val(),
                living_address: $('#living_address').val(),
            });
            try {
                // render the document (replace all occurences of {first_name} by John, {last_name} by Doe, ...)
                doc.render();
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