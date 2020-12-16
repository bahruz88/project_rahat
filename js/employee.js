$(function () {

    $('#nav-tabs').on('shown.bs.tab', 'a', function (e) {
        if (e.relatedTarget) {
            $(e.relatedTarget).removeClass('active');
        }
    })

    /* EMPLOYEE  İNSERT FORM  VALIDATE */
    $("#employeeInsert").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            userlevel: "required",
            username: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            langinput: "required"
        },
        messages: {
            firstname: "<?php echo $dil['empty_firstname'];?>",
            lastname: "<?php echo $dil['empty_lastname'];?>",
            userlevel: "Please enter your lastname",
            username: {
                required: "<?php echo $dil['empty_user'];?>",
                minlength: "<?php echo $dil['length_input'];?>"
            },

            email: "<?php echo $dil['wrong_mail'];?>",
            langinput: "<?php echo $dil['wrong_lang'];?>"
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });

    /*EMPLOYEE  UPDATE VALİDATE*/
    $("#employeeUpdate").validate({

        rules: {
            update_firstname: "required",
            update_lastname: "required",
            update_username: {
                required: true,
                minlength: 3
            },

            update_email: {
                required: true,
                email: true
            },
            password: {
                required: false,
                minlength: 5
            },
            confirm_password: {
                required: false,
                minlength: 5,
                equalTo: "#password"
            },
            update_deflang: "required"

        },
        messages: {
            update_firstname: "<?php echo $dil['empty_firstname'];?>",
            update_lastname: "<?php echo $dil['empty_lastname'];?>",

            update_username: {
                required: "<?php echo $dil['empty_user'];?>",
                minlength: "<?php echo $dil['length_input'];?>"
            },
            password: {
                required: "Please provide a password",
                minlength: "<?php echo $dil['length_input'];?>"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "<?php echo $dil['length_input'];?>",
                equalTo: "Please enter the same password as above"
            },

            update_email: "<?php echo $dil['wrong_mail'];?>",
            update_deflang: "<?php echo $dil['wrong_lang'];?>"
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });


    /* EMPLOYEE  TABLE LOAD  */
    var stat=1;
    var table = $("#employee_table").DataTable({
        "scrollX": true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
            "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
            "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "<?php echo $dil['datanotfound'] ; ?>",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
                "previous": "<?php echo $dil['previous'] ; ?> ",
                "next": "<?php echo $dil['next'] ; ?>"
            }
        },
        "ajax": {
            url: "employees/get_employees.php",
            type: "POST",
            data:{stat:function() { return $('#act').find('option:selected').val() }}
        }, "columnDefs": [{
            "width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": " <img  id='view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                "<img  id='delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                "<img id='edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        }],
        dom: 'lBfrtip',

        buttons: [
            {
                text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                action: function (e, dt, node, config) {


                    $("#myModal").modal();
                    $('#imgAdd').html($('#uploadDiv').html())
                    $('#imgUpdate').html('');
                    $("#myModal").find('form').find("input[type=text],input[type=number], textarea,select").val("")

                    $("#myModal").find('form').find("select option[value='0']").prop('selected', 'selected').change();
                    $("#myModal").find('form').find("select option[value='']").prop('selected', 'selected').change();
                    $(".selectpicker").selectpicker();
                    addImage();
                }
            },
            {
                text: 'İşdən çıxart <i class="fa fa-minus"></i>',
                action: function (e, dt, node, config) {

                    $("#myModalExit").modal();
                    $("#myModalExit").find('form').find("input[type=text],input[type=number], textarea,select").val("")

                    $("#myModalExit").find('form').find("select option[value='0']").prop('selected', 'selected').change();
                    $("#myModalExit").find('form').find("select option[value='']").prop('selected', 'selected').change();
                    $(".selectpicker").selectpicker();

                    // addImage();
                }
            },
            {
                text: '<select id="act">' +
                    '<option value="1" selected>Aktiv</option>' +
                    '<option value="0">Passiv</option>' +
                    '<option value="2">Hamısı</option>' +
                    '</select>',
                action: function (e, dt, node, config) {


                    // $("#myModalExit").modal();
                    // addImage();
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                text: 'Kopyala'
            },
            {
                extend: 'print',
                text: 'Çap et'
            }, {
                extend: 'colvis',
                text: 'Sütunu gizlət'
            },
        ],

        "lengthMenu": [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ]

    });
    $('#act').on('change',function(){
        console.log('act='+$('#act').find('option:selected').val())
        stat=$('#act').find('option:selected').val();
        console.log('stat='+stat)
        table.ajax.reload();

    })
    /*Button  click  on grid */
    $('#employee_table tbody').on('click', '#delete', function () {
        var data = table.row($(this).parents('tr')).data();
        document.getElementById("empid").value = data[0];
        $('#modalDelete').modal('show');
    });

    $('#employee_table tbody').on('click', '#edit', function () {
        var data = table.row($(this).parents('tr')).data();
        GetEmpDetails(data[0], 'update');
        document.getElementById("update_empid").value = data[0];

    });

    $('#employee_table tbody').on('click', '#view', function () {
        //console.log('$row_employees[\'image_name\']')
        var data = table.row($(this).parents('tr')).data();
        GetEmpDetails(data[0], 'view');
        document.getElementById("update_empid").value = data[0];

    });


    /*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
    function GetEmpDetails(empid, optype) {
        $.post("employees/getEmployeeDetail.php",
            {
                empid: empid
            },
            function (emp_data, status) {
                // PARSE json data
                var employee = JSON.parse(emp_data);
                // Assing existing values to the modal popup fields
                //console.log('employee=', employee)

                if (optype == 'update') {
                    //console.log('sss=' + $('#uploadDiv').html())
                    $('#imgUpdate').html($('#uploadDiv').html())
                    $('#imgAdd').html('')
                    $('#imgView').html('')
                    addImage();
                    //console.log('employee.image_name=' + employee.image_name)
                    if (employee.image_name) {
                        $("#default").css('display', 'none')

                        $("#targetLayer").html('<img class="profile-user-img img-fluid img-circle image-preview"  class="upload-preview"\n' +
                            '                 src="' + employee.image_name + '"\n' +
                            '                 alt="User profile picture">\n' +
                            '            <input type="hidden" name="imgName" value="' + employee.image_name + '">');
                    } else {
                        $("#default").css('display', 'block');
                        $("#targetLayer").html('');
                    }

                    $("#empno").val(employee.empno)
                    $("#uid").val(empid)
                    $("#update_company_id").val(employee.company_id).change();
                    $("#update_firstname").val(employee.firstname);
                    $("#update_lastname").val(employee.lastname);
                    $("#update_surname").val(employee.surname);
                    $("#update_sex").val(employee.sex).change();
                    $("#update_marital_status").val(employee.marital_status).change();
                    $("#update_birth_date").val(employee.birth_date_u);
                    $("#update_birth_place").val(employee.birth_place);
                    $("#update_citizenship").val(employee.citizenship).change();
                    $("#update_pincode").val(employee.pincode);
                    $("#update_pass_seria_num").val(employee.passport_seria_number);
                    $("#update_passport_date").val(employee.passport_date_u);
                    $("#update_passport_end_date").val(employee.passport_end_date_u);
                    $("#update_pass_given_authority").val(employee.pass_given_authority);
                    $("#update_living_address").val(employee.living_address);
                    $("#update_reg_address").val(employee.reg_address);
                    $("#update_home_tel").val(employee.home_tel);
                    $("#update_mob_tel").val(employee.mob_tel);
                    $("#update_email").val(employee.email);
                    $("#update_emr_contact").val(employee.emr_contact);
                    $('#modalEdit').modal('show');
                } else {
                    window.location.href = 'profile.php?empid=' + empid;

                }
            }
        );

    }

    /*ISCHI MELUMATLARI  DAXIL  EDILIR  */
    $("#employeeInsert").submit(function (e) {
        e.preventDefault();
        // //console.log('$("#employeeInsert").serialize()='+$("#employeeInsert").serialize())
        if ($("#employeeInsert").valid()) {
            $.ajax({
                url: "employees/employeeInsert.php",
                method: "post",
                data: $("#employeeInsert").serialize(),
                dataType: "text",
                success: function (strMessage) {
                    $("#badge_success").text('');
                    $("#badge_danger").text('');
                    if (strMessage.substr(1, 4) === 'error') {


                        $("#errorp").text(strMessage);

                        $("#modalInsertError").modal('show');
                        $("#myModal").modal('hide');
                    } else if (strMessage === 'success') {
                        $("#successp").text('Məlumatlar daxil edildi ');
                        $("#modalInsertSuccess").modal('show');
                        $("#myModal").modal('hide');

                    } else {
                        $("#errorp").text(strMessage);
                        $("#modalInsertError").modal('show');
                        $("#myModal").modal('hide');

                    }
                }
            });
            $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

            $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
            $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
            $(".selectpicker").selectpicker();
            table.ajax.reload();
            //	$( "#employeeInsert" ).get(0).reset();
        }

        table.ajax.reload();
    });
    /*ISCHI ISDEN CIXARILIR  */
    $("#employeeExit").submit(function (e) {
        e.preventDefault();
         if ($("#employeeExit").valid()) {
            $.ajax({
                url: "employees/employeeExit.php",
                method: "post",
                data: $("#employeeExit").serialize(),
                dataType: "text",
                success: function (strMessage) {
                    $("#badge_success").text('');
                    $("#badge_danger").text('');
                    if (strMessage.substr(1, 4) === 'error') {
                        $("#errorp").text(strMessage);
                        $("#modalInsertError").modal('show');
                        $("#myModalExit").modal('hide');
                    } else if (strMessage === 'success') {
                        $("#successExit").text('İşçi müvəffəqiyyətlə işdən azad edildi');
                        $("#modalExitSuccess").modal('show');
                        $("#myModalExit").modal('hide');

                    } else {
                        $("#errorp").text(strMessage);
                        $("#modalExitSuccess").modal('show');
                        $("#myModalExit").modal('hide');

                    }
                }
            });
             $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

             $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
             $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
             $(".selectpicker").selectpicker();
            table.ajax.reload();
            //	$( "#employeeInsert" ).get(0).reset();
        }
        table.ajax.reload();
    });

    /*İSCHİ  MELUMATALRİ SİLİNİR */
    $("#employeeDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "employees/employeeDelete.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function (strMessage) {
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    table.ajax.reload();
                } else {
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        table.ajax.reload();
    });


    /*İSCHİ MEULMATALRİNİN  YENİLENMESİ */
    $("#employeeUpdate").submit(function (e) {
        e.preventDefault();
        if ($("#employeeUpdate").valid()) {

            $.ajax({
                url: "employees/employeeUpdate.php",
                method: "post",
                data: $("#employeeUpdate").serialize(),
                dataType: "text",
                success: function (strMessage) {
                    //console.log(strMessage);
                    $("#badge_danger_update").text("");
                    if (strMessage.substr(1, 4) === 'error') {
                        //console.log(strMessage);
                    } else if (strMessage === 'success') {
                        $('#modalEdit').modal('hide');
                        $('#modalUpdateSuccess').modal('show');
                        table.ajax.reload();
                    } else if (strMessage === 'duplicate') {

                        $("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");

                    } else {
                        $("#badge_danger_update").text(strMessage);
                    }
                }
            });
            $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

            $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
            $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
            $(".selectpicker").selectpicker();
            table.ajax.reload();
        } else {
            alert('Form not valid');
        }
    });


    /*
**********************************************************************************************************************
************************************** TƏHSİL MƏLUMATLARI ************************************************************
**********************************************************************************************************************
*/


    var eduinfo_table;
    var tabtext = $('#qual').text();
    $('#eduinfotab').click(function () {

        $('#qual').text(tabtext + ' / ' + $('#eduinfotab').text());
        $('#eduinfo_table').DataTable().clear().destroy();
        eduinfo_table = $("#eduinfo_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,

            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "<?php echo $dil['datanotfound'] ; ?>",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "education/get_education.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": " <img  id='edu_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='edu_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img id='edu_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {
                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        $("#educationInsert").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },
            ],

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });


    });

    /*TEHSİL  VALİDATE */


    /* TEHSİL  İNSERT FORM  VALIDATE */
    $("#educationInsertForm").validate({
        rules: {eduempid: "required"},
        messages: {eduempid: "İşçini mütləq seçməlisiniz! "},
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });

    /********************* TEHSİL  İNSERT ***************************/

    $("#educationInsertForm").submit(function (e) {
        //console.log('AAAAAA');
        e.preventDefault();
        if ($("#educationInsertForm").valid()) {
            $.ajax({
                url: "education/educationInsert.php",
                method: "post",
                data: $("form").serialize(),
                dataType: "text",
                success: function (strMessage) {
                    //console.log(strMessage);
                    $("#badge_success").text('');
                    $("#badge_danger").text('');
                    if (strMessage.substr(1, 4) === 'error') {


                        $("#errorp").text(strMessage);
                        $("#modalInsertError").modal('show');
                        $("#educationInsert").modal('hide');
                    } else if (strMessage === 'success') {
                        $("#successedu").text('Məlumatlar daxil edildi ');
                        $("#modalInsertEduSuccess").modal('show');
                        $("#educationInsert").modal('hide');

                    } else {
                        $("#errorp").text(strMessage);
                        $("#modalInsertError").modal('show');
                        $("#educationInsert").modal('hide');

                    }
                }
            });
            $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

            $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
            $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
            $(".selectpicker").selectpicker();
            eduinfo_table.ajax.reload();
            $("#educationInsertForm").get(0).reset();
        }
        eduinfo_table.ajax.reload();
    });


    /*TEHSİL MELUMATALRİ SİLİNİR */
    $("#educationDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "education/educationDelete.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function (strMessage) {
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEduDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    eduinfo_table.ajax.reload();
                } else {
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        eduinfo_table.ajax.reload();
    });


    /*Get Education  */
    function GetEduDetails(eduid, optype) {
        $.post("education/getEducationDetail.php",
            {
                eduid: eduid
            },
            function (edu_data, status) {
                // PARSE json data
                var edudata = JSON.parse(edu_data);

                if (optype == 'update') {
                    //console.log('update tikla');

                    $('#update_eduempid').val(edudata.empid).change();
                    $('#update_qualification').val(edudata.qid).change();
                    $('#update_institution_id').val(edudata.uni_id).change();
                    $("#update_faculty").val(edudata.faculty);
                    $("#update_profession").val(edudata.profession);
                    $("#update_diplom_issue_date").val(edudata.diplom_issue_date);
                    $("#update_uni_end_date").val(edudata.end_date);
                    $("#update_diplom_seria_num").val(edudata.diplom_seria_num);
                    $('#modalEditEducation').modal('show');
                } else {
                    $("#view_eduempid").val(edudata.full_name);
                    $("#view_qualification").val(edudata.qualification);
                    $("#view_institution_name").val(edudata.uni_name);
                    $("#view_faculty").val(edudata.faculty);
                    $('#view_profession').val(edudata.profession);
                    $('#view_diplom_issue_date').val(edudata.diplom_issue_date);
                    $('#view_uni_end_date').val(edudata.end_date);
                    $("#view_diplom_seria_num").val(edudata.diplom_seria_num);
                    $('#modalViewEducation').modal('show');
                }
            }
        );

    }

    /*Education Update */
    $("#educationUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
		{ */

        $.ajax({
            url: "education/educationUpdate.php",
            method: "post",
            data: $("#educationUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditEducation').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    eduinfo_table.ajax.reload();
                } else if (strMessage === 'duplicate') {

                    $("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");

                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        table.ajax.reload();
        /*}
		else {
				 alert('not valid') ;
			 }*/
    });

    /*Edu info  table view click  */
    $('#eduinfo_table').on('click', '#edu_view', function () {

        var data = eduinfo_table.row($(this).parents('tr')).data();
        GetEduDetails(data[0], 'view');
        document.getElementById("update_eduid").value = data[0];
        //console.log('Tiklandi');
    });

    /*Edu info  table edit click  */
    $('#eduinfo_table').on('click', '#edu_edit', function () {
        var data = eduinfo_table.row($(this).parents('tr')).data();
        GetEduDetails(data[0], 'update');
        document.getElementById("update_eduid").value = data[0];
        //console.log('Tiklandi');
    });


    /*Edu info  table delete click  */
    $('#eduinfo_table').on('click', '#edu_delete', function () {
        var data = eduinfo_table.row($(this).parents('tr')).data();
        document.getElementById("eduid").value = data[0];
        $('#modalEduDelete').modal('show');
    });


    /*
**********************************************************************************************************************
************************************** TƏLIM TƏDRİS  SERTİFAK MƏLUMATLARI ************************************************************
**********************************************************************************************************************
*/
    var cert_table;
    $('#certtab').click(function () {
        $('#qual').text(tabtext + ' / ' + $('#certtab').text());
        $('#cert_table').DataTable().clear().destroy();
        cert_table = $("#cert_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,

            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "<?php echo $dil['datanotfound'] ; ?>",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "certification/get_certification.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": " <img  id='cert_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='cert_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img id='cert_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        $("#certificationModalInsert").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });


    });


    /*CERTIFIKAT MELUMATALRİ SİLİNİR */
    $("#certificationDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "certification/certificationDelete.php",
            method: "post",
            data: $("#certificationDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalCertDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    cert_table.ajax.reload();
                } else {
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        cert_table.ajax.reload();
    });

    /* CERTIFICATION  İNSERT FORM  VALIDATE */
    $("#certificationInsertForm").validate({
        rules: {employee: "required"},
        messages: {employee: "İşçini mütləq seçməlisiniz! "},
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
    /********************* CERTIFICATION  İNSERT ***************************/

    $("#certificationInsertForm").submit(function (e) {
        e.preventDefault();
        if ($("#certificationInsertForm").valid()) {
            $.ajax({
                url: "certification/certificationInsert.php",
                method: "post",
                data: $("#certificationInsertForm").serialize(),
                dataType: "text",
                success: function (strMessage) {
                    //console.log(strMessage);
                    $("#badge_success").text('');
                    $("#badge_danger").text('');
                    if (strMessage.substr(1, 4) === 'error') {


                        $("#errorp").text(strMessage);
                        $("#modalInsertError").modal('show');
                        $("#certificationModalInsert").modal('hide');
                    } else if (strMessage === 'success') {
                        $("#successp").text('Məlumatlar daxil edildi ');
                        $("#modalInsertSuccess").modal('show');
                        $("#certificationModalInsert").modal('hide');

                    } else {
                        $("#errorp").text(strMessage);
                        $("#modalInsertError").modal('show');
                        $("#certificationModalInsert").modal('hide');

                    }
                }
            });
            $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

            $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
            $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
            $(".selectpicker").selectpicker();
            cert_table.ajax.reload();
            $("#educationInsertForm").get(0).reset();
        }
    });
    /*Cert table view click  */
    $('#cert_table').on('click', '#cert_view', function () {
        var data = cert_table.row($(this).parents('tr')).data();
        GetCertDetails(data[0], 'view');
        //console.log('TiklandiCert');
    });

    /*Cert  table edit click  */
    $('#cert_table').on('click', '#cert_edit', function () {
        var data = cert_table.row($(this).parents('tr')).data();
        GetCertDetails(data[0], 'update');
        document.getElementById("update_certid").value = data[0];
        //console.log('updateTiklandi');
    });

    /*cert table delete click*/
    $('#cert_table').on('click', '#cert_delete', function () {
        var data = cert_table.row($(this).parents('tr')).data();
        //	alert('Certificate click ');
        document.getElementById("certid").value = data[0];
        $('#modalCertDelete').modal('show');
    });


    /*GetCertDetails  */
    function GetCertDetails(certid, optype) {
        $.post("certification/getCertificationDetail.php",
            {
                certid: certid
            },
            function (cert_data, status) {
                // PARSE json data
                var certdata = JSON.parse(cert_data);

                if (optype == 'update') {
                    //console.log('update tikla');

                    $("#update_certempid").val(certdata.empid).change();
                    $("#update_training_center").val(certdata.training_center_name);
                    $("#update_training_name").val(certdata.training_name);
                    $("#update_training_date").val(certdata.training_date);
                    $("#update_cert_given_date").val(certdata.cert_given_date);
                    $('#modalEditCertification').modal('show');
                } else {
                    $("#view_certempid").val(certdata.full_name);
                    $("#view_training_center").val(certdata.training_center_name);
                    $("#view_training_name").val(certdata.training_name);
                    $("#view_training_date").val(certdata.training_date);
                    $('#view_cert_given_date').val(certdata.cert_given_date);
                    /*$('#view_diplom_issue_date').val(certdata.diplom_issue_date);
					$('#view_uni_end_date').val(certdata.end_date);
					$("#view_diplom_seria_num").val(certdata.diplom_seria_num);
					*/
                    $('#modalViewCertification').modal('show');
                }
            }
        );

    }


    /*Education Update */
    $("#certificationUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
		{ */

        $.ajax({
            url: "certification/certificationUpdate.php",
            method: "post",
            data: $("#certificationUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditCertification').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    cert_table.ajax.reload();
                } else if (strMessage === 'duplicate') {

                    $("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");

                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        cert_table.ajax.reload();
        /*}
		else {
				 alert('not valid') ;
			 }*/
    });


    /*
**********************************************************************************************************************
************************************** BACARIQLAR SKILLS ************************************************************
**********************************************************************************************************************
*/
    var skills_table;
    $('#skillstab').click(function () {
        $('#qual').text(tabtext + ' / ' + $('#skillstab').text());
        $('#skills_table').DataTable().clear().destroy();
        skills_table = $("#skills_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,

            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "<?php echo $dil['datanotfound'] ; ?>",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "skills/get_skills.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": " <img  id='skill_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='skill_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img id='skill_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        $("#skillsInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });


    });


    $("#skillsInsertForm").submit(function (e) {
        e.preventDefault();
        /*	if($("#skillsInsertForm").valid())
			{ */
        $.ajax({
            url: "skills/skillsInsert.php",
            method: "post",
            data: $("#skillsInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {


                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#skillsInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#skillsInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#skillsInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        skills_table.ajax.reload();
        $("#skillsInsertForm").get(0).reset();
        /*}*/
    });

    /*BACARIQ MELUMATALRİ SİLİNİR */
    $("#skillDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "skills/skillsDelete.php",
            method: "post",
            data: $("#skillDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalSkillDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    skills_table.ajax.reload();
                } else {
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        skills_table.ajax.reload();


    });

    /*Skills Update */
    $("#skillsUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
		{ */

        $.ajax({
            url: "skills/skillsUpdate.php",
            method: "post",
            data: $("#skillsUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditSkills').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    skills_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        skills_table.ajax.reload();
        /*}
		else {
				 alert('not valid') ;
			 }*/
    });

    /*GetSkillDetails  */
    function GetSkillDetails(skillid, optype) {
        $.post("skills/getSkillDetail.php",
            {
                skillid: skillid
            },
            function (skill_data, status) {
                // PARSE json data
                var skilldata = JSON.parse(skill_data);

                if (optype == 'update') {
                    //console.log('update tikla');

                    $("#update_skillempid").val(skilldata.empid).change();
                    $("#update_skill_name").val(skilldata.skill_name);
                    $("#update_skill_descr").val(skilldata.skill_descr);
                    $('#modalEditSkills').modal('show');
                } else {
                    $("#view_skillemp").val(skilldata.full_name);
                    $("#view_skill_name").val(skilldata.skill_name);
                    $("#view_skill_descr").val(skilldata.skill_descr);
                    $('#modalViewSkills').modal('show');
                }
            }
        );

    }


    /*Skills table view click  */
    $('#skills_table').on('click', '#skill_view', function () {
        var data = skills_table.row($(this).parents('tr')).data();
        GetSkillDetails(data[0], 'view');
        //console.log(data[0]);
    });

    $('#skills_table').on('click', '#skill_edit', function () {
        var data = skills_table.row($(this).parents('tr')).data();
        document.getElementById("update_skillid").value = data[0];
        GetSkillDetails(data[0], 'update');
        //console.log(data[0]);
    });


    /*skils table delete click*/
    $('#skills_table').on('click', '#skill_delete', function () {
        var data = skills_table.row($(this).parents('tr')).data();
        document.getElementById("skillid").value = data[0];
        $('#modalSkillDelete').modal('show');
    });


    /*
**********************************************************************************************************************
************************************** DIL BILIKLERI ************************************************************
**********************************************************************************************************************
*/
    var lang_knowledge_table;
    $('#langtab').click(function () {
        $('#qual').text(tabtext + ' / ' + $('#langtab').text());
        $('#lang_knowledge_table').DataTable().clear().destroy();
        lang_knowledge_table = $("#lang_knowledge_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,

            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "emp_lang/get_lang.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": " <img  id='lang_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='lang_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img id='lang_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        $("#langInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });


    });

    /*DIL MELUMATALRİ SİLİNİR */
    $("#langDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "emp_lang/langDelete.php",
            method: "post",
            data: $("#langDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalLangDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    lang_knowledge_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        lang_knowledge_table.ajax.reload();


    });

    $("#langInsertForm").submit(function (e) {
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
			{ */
        $.ajax({
            url: "emp_lang/langInsert.php",
            method: "post",
            data: $("#langInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#langInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#langInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#langInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        lang_knowledge_table.ajax.reload();
        $("#langInsertForm").get(0).reset();
        /*}*/
    });


    /*GetLangDetails  */
    function GetLangDetails(langid, optype) {
        $.post("emp_lang/getLangDetail.php",
            {
                langid: langid
            },
            function (lang_data, status) {
                // PARSE json data
                var langdata = JSON.parse(lang_data);

                if (optype == 'update') {
                    //console.log('update tikla');

                    $("#update_langempid").val(langdata.empid).change();
                    $("#update_reading").val(langdata.rid).change();
                    $("#update_writing").val(langdata.wid).change();
                    $("#update_speaking").val(langdata.sid).change();
                    $("#update_understanding").val(langdata.uid).change();
                    $("#update_language").val(langdata.langid).change();
                    $('#modalEditLang').modal('show');
                } else {
                    $("#view_langemp_id").val(langdata.full_name);
                    $("#view_lang_name_id").val(langdata.lang_name);
                    $("#view_reading_id").val(langdata.reading);
                    $("#view_writing_id").val(langdata.writting);
                    $("#view_speaking_id").val(langdata.speaking);
                    $("#view_understanding_id").val(langdata.understanding);
                    $('#modalViewLang').modal('show');
                }
            }
        );

    }

    /*Language Update */
    $("#langUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
		{ */

        $.ajax({
            url: "emp_lang/langUpdate.php",
            method: "post",
            data: $("#langUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditLang').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    lang_knowledge_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        lang_knowledge_table.ajax.reload();
        /*}
		else {
				 alert('not valid') ;
			 }*/
    });

    /*lang table delete click*/
    $('#lang_knowledge_table').on('click', '#lang_delete', function () {
        var data = lang_knowledge_table.row($(this).parents('tr')).data();
        document.getElementById("langid").value = data[0];
        $('#modalLangDelete').modal('show');
    });

    /*lang table view click  */
    $('#lang_knowledge_table').on('click', '#lang_view', function () {
        var data = lang_knowledge_table.row($(this).parents('tr')).data();
        GetLangDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*lang table view click  */
    $('#lang_knowledge_table').on('click', '#lang_edit', function () {
        var data = lang_knowledge_table.row($(this).parents('tr')).data();
        GetLangDetails(data[0], 'update');
        document.getElementById("update_langid").value = data[0];
        //console.log(data[0]);
    });


    /*
**********************************************************************************************************************
************************************** AILE INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

    var faminfo_table;
    $('#aileinfotab').click(function () {
        //console.log('Tab clikc');
        $('#faminfo_table').DataTable().clear().destroy();
        faminfo_table = $("#faminfo_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "family_info/get_familyInfo.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='faminfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='faminfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='faminfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        $("#famInfoInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });


    });

    $("#familyInsertForm").submit(function (e) {
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
			{ */
        $.ajax({
            url: "family_info/familyInfoInsert.php",
            method: "post",
            data: $("#familyInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#famInfoInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi');
                    $("#modalInsertSuccess").modal('show');
                    $("#famInfoInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#famInfoInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        faminfo_table.ajax.reload();
        $("#familyInsertForm").get(0).reset();
        /*}*/
    });


    /*AILE MELUMATALRİ SİLİNİR */
    $("#famInfoDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "family_info/familyInfoDelete.php",
            method: "post",
            data: $("#famInfoDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalFamInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    faminfo_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        faminfo_table.ajax.reload();


    });


    /*Familiy Update */
    $("#familiyInfoUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
		{ */

        $.ajax({
            url: "family_info/familyInfoUpdate.php",
            method: "post",
            data: $("#familiyInfoUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log(strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#famInfoEditModal').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    faminfo_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        faminfo_table.ajax.reload();
        /*}
		else {
				 alert('not valid') ;
			 }*/
    });

    /*GetFamilyInfoDetails  */
    function GetFamilyInfoDetails(faminfoid, optype) {
        $.post("family_info/getFamilyDetail.php",
            {
                faminfoid: faminfoid
            },
            function (faminfo_data, status) {
                // PARSE json data
                var faminfodata = JSON.parse(faminfo_data);

                if (optype == 'update') {
                    //console.log('update tikla');

                    $("#edit_famemp_id").val(faminfodata.empid).change();
                    $("#edit_family_member_type_id").val(faminfodata.type_id).change();
                    $("#edit_firstname_id").val(faminfodata.m_firstname);
                    $("#edit_lastname_id").val(faminfodata.m_lastname);
                    $("#edit_surname_id").val(faminfodata.m_surname);
                    $("#edit_gender_id").val(faminfodata.gender).change();
                    $("#edit_birth_date_fam_info_id").val(faminfodata.birth_date);
                    $("#edit_contact_number_id").val(faminfodata.contact_number);
                    $("#edit_living_address_id").val(faminfodata.adress);
                    $('#famInfoEditModal').modal('show');
                } else {

                    $("#view_famemp_id").val(faminfodata.full_name);
                    $("#view_family_member_type_id").val(faminfodata.type_desc);
                    $("#view_firstname_id").val(faminfodata.m_firstname);
                    $("#view_lastname_id").val(faminfodata.m_lastname);
                    $("#view_surname_id").val(faminfodata.m_surname);
                    $("#view_gender_id").val(faminfodata.gender_descr);
                    $("#view_birth_date_fam_info_id").val(faminfodata.birth_date);
                    $("#view_contact_number_id").val(faminfodata.contact_number);
                    $("#view_living_address_id").val(faminfodata.adress);

                    $('#modalViewFamilyInfo').modal('show');
                }
            }
        );

    }


    /*Family info table delete click*/
    $('#faminfo_table').on('click', '#faminfo_delete', function () {
        var data = faminfo_table.row($(this).parents('tr')).data();
        document.getElementById("faminfoid").value = data[0];
        $('#modalFamInfoDelete').modal('show');
    });

    /*Family info view click  */
    $('#faminfo_table').on('click', '#faminfo_view', function () {
        var data = faminfo_table.row($(this).parents('tr')).data();
        GetFamilyInfoDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*Family info view click  */
    $('#faminfo_table').on('click', '#faminfo_edit', function () {
        var data = faminfo_table.row($(this).parents('tr')).data();
        document.getElementById("update_faminfo_id").value = data[0];
        GetFamilyInfoDetails(data[0], 'update');
        //console.log(data[0]);
    });


    /*
**********************************************************************************************************************
************************************** Herbi INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/
    var military_info_table;

    $('#militaryInfotab').click(function () {
        //console.log('Tab clikc militaryInfotab');
        $('#military_info_table').DataTable().clear().destroy();
        military_info_table = $("#military_info_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,

            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "military_info/get_militaryInfo.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": " <img  id='lang_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='lang_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img id='lang_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('militaryInfoInsertModal')

                        $("#militaryInfoInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAAuCAYAAACxkOBzAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OTEzRTdEQkUxM0U1MTFFNTg3REFBQzExQTNBQTE1MTgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OTEzRTdEQkYxM0U1MTFFNTg3REFBQzExQTNBQTE1MTgiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5MTNFN0RCQzEzRTUxMUU1ODdEQUFDMTFBM0FBMTUxOCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5MTNFN0RCRDEzRTUxMUU1ODdEQUFDMTFBM0FBMTUxOCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pmq0p78AAArESURBVHjarFl5bBTnFX9z7L3r9cHa2MY4XLYVLoPAuAQccahqGtREpOVoIa160VyNmvyTVqJpmqopVStVEECU0CRNGqTQUkSShphwJC0t5DDIGAIEbGyDDTZeey/vMVffN/vN8u14LyeM9NPsHJ79fe/93u+9WXOapkGB20rES4gBSZI+b209vMPhcJxYvnwZufYQQkV8jvAjAoiI+QFtFzT4+U4VHLbb5/y3eEjEOeC4/ATEAonWIv6CqCGfOzrOLYxGo41Op3MmHt+P+DtzLyF7A9GH6EdcRnQiei2ivpgYXUgcxrkVQtZKI0qIQlfXVUQX8Dx/N+JPeOrrpvtLKe42P6izD57E3Q/oMy8BB224fwXRfafIvkAlAMPDI9DR0UGIgqqqMGlS9ZOFRqWrT9vz0kG12WaBOeQY094Qj3HfkCSuAT+vvxNkv414inxIJBJw+nQbSJKMRxpUVVXB1KlTUzcePXYMNBXPV1eBb8IEmIBgtgv7j2vnY3HY4nIQpihwVHgwwOPfwINItk6PdJ6Nz3FtLmKHcdDe3q5Hluc5KCoqgubmRRidZFV0d/fAB8c/hEcfexxWr/4mnD17ln2O/EGbtrv1pLbJaU8Gh/xVJMSDLOkRtuPho18msl7Eq3QPnZ2d0NPTCxaLRSd74eJF6O7pgRnTp0FNzWS4dOkSLFiwAE6fOQPTp0+HZcuWpR40OAJ7X35bnSmKUEfWxmF44lhikXCaA2xA/J4W5bjJ7qSRhaGhITh37ryu06TWeHC7XLBt+w5MYwDmzJkNGzds0Beyft1aWLlyReohqIorrx9S23oH4HdFThQPTX8oIABxTIZsGS2858crg6cRuuBjsRjq9AzIspwiqygKVFVWwro1awCtC86f/wxOnjyFEeNgxYrl4PP5jOdop85pu975j/Z9jxNsGpN+KQGZfPXHRiYLJbuSVr9e7e3tZyGA0RMEIe2mWDyuR/SexYv149bDh0EURCgvL0/dEwjBvm1vqndhA5hNqx+LlEOyTPo5iuQ2CfGdQskSH92DsJCDHtTk9evX9SLCjqVHlCzA6Hgk2iTl1VXVUFpaCvPmNbLP7dl1QD0xFIDvkXUScuTPQiMcpBomISkN4oMCLOHHELZ8miUm/TJisnGBWJPX64VwOAyhUAgjHIRIJAzxeAIR1y3MarXAqlX3w7z5jWz64US7tuvoJ9p37VZwGuciYV6PLJt+uW8zcM5GEMp/QtwQaCN5APFmLrIk9SvS2pbVqqOkpCR1jkQ3EonoCAZDaGV+qKubAfX19al7wlE4uHO/6sOIzterHyEhyTCbfsynMnwQlOAR4BJXQShZh0yKDcJPIPaBccRsHKb1R7j/M9yZ7cYLr6q/OfaptgU91WWcHMZhJW4MK0QS0k2Qrz6MofWDKo+AMGETiJVPJ+0iud2HODQmsqdOfdxkwx7o8RRh2ovA5XKDzWZNVf94Nkz99n+f0TZgUelE0SBQRtxtokb6+/8AxXetA0fFV0EKfgbxaABiqoILSTnp+oxk+/v7fobpxXbHtYiiACK6t9vtRtIuXIBH163HQxZg069l2xIyHHqjVS3C3DUb6U9ghwoH+fT0+98Fq8UPnlqMLC+A1V0N8jAGNa3O4J8ZNYsRDCOIZRxHSUwjVe73+/VmkLQcTjd8nF1xAU6dPGm3ZEHEZ8k10nn2HYHD1wf5zQ50VFLxxDVCAV5vArfTj2n374aSOc/qRAGjGY2inbELAvgX4kCuAruG2IjEWnHvNvsqKaykIwSgr69fP0dI2u2YbyTsdJe+v+uADxdqKVZUPI8uEY+K2FbTPVXq/yN4KhaCrXQualVNFmSQY7sZmXE3F9Ju/4fYhPjbmCrkOB2sjonnRiKjqMkIiEM3VrXMKHt+99GaWy6bNkFAsbrFcnAInlRJa4qKKa8B75SHMKAaPk/T5wPTWwKZbdsK7WBvIH5VSDEZ5PUscNbSe+oDq5tnBLfH0KZkzERQugWyJqV0SGYKwYd+KvjwnIrZSrZehijR3W/HOxs8lym6uTYt2fiXfqv5hq3YpbynaQIOMRKEpaG0++QEIagCSVAYiRLCzLaVdL4vMs+StndqPIQlmYeJ3vgja5r7D8YkfgjjDlElpMOIHtlHR3kIoU5jo2npv0LJfqHhO0C97tp4CEclwbtoxsi6xfXD2yJxQZdACOWgqHJKDvqIOMKD6aWajIYjX+ZNoQuBfRBGxyMHjNbSBxYMOCq8iUOSIoCCciCE0wWfdnQS8XrGukB2guU28rWpE4jHxxPdOMqhpiy2adX8gbdx+B4EXQ7BpBwy3E6tSjFfEHC0ioWuwODl1+BW514dhbzdkmmMvNA9U5BLEO+MCcXLZvrXdPS6d3x8xfusw6rp0bXyThA4gZ1QSEEdHZNuNBj/1f1w/cxTEAt26xFOtm/qoZnAbL8w/ZBRQMFxLWsX37CXueV3k3JIIOFB823T6ftXGlE57ofeTzZBItINos2FEnDqyEmWzAOkpaKfkmD8EPFRoWRllYPyosQjDzbdfAe1PABoZyl3SE8EKa6JhkYVKQpd/12LNucHXnSmTYocO4umRQbfDurrG6CpqQlmz56tDzW4gGKcHe7Fy1+hL5TzEOVGyZB5gMwWLBObRf1w66Ha46e7in5ptSgoAxHKbJPNcngYNfoaKdDej34KA5e2oWadYyWWa5IiX0w6FHkLaGm5FxoaGqC6upqdvnBiBrLaBdh+G+12e1NlZWUtkvamXoPUBARGxS2//kfd3NE4/zWel8EpFIPXWq6TRc492CSab13e0x/oew+Gr+0DQXSMsQydLElzbjvS9EGGRJoML+TtgcvwakruwYmMnzVrVi0uZtbSpS0L8d1sUW1tbZ3TBhV7Dw8/d/D8kmfwVadYU6JQbK0Cl90Fw33vPzF4ceuLwf63dOsj2sxavPnImohzzE+k7DuqvgCMpIbvZ6oxN5AxcsqUqT6XyzEL5RZ761Nfhc23ZKPoqZtrEb3TSu0Tu64cWdIYvHkiKNocZArO+ftrIWS5LOBNx2NerokMMCMyLhD9VBNtoiZzFo8q2CsqrGXNDaJgl0Jdfz2JFiBSoplQMFmeISXQzyLdC8w1Pgv5tMTo0DD8mizhQBsnJ3jRgfbPKbQxKPRHaWOfRlrME02DnEh/T7DQ13bjWMxCPhPZ5JdzPMrEiqOXFc0NiHUQSBlgXFONxYp5oipQUnYKkgYH/WylMEgLFFyWmcOIlArpJBO07ZJfxKMM4uOJLM8QJW+rHgYuE2kLE2FWEqwEVCbFCiVpEB2lP92HKHhmgSk5iAVIwEYjWkR9tYQh7KTXrUx0M5HNFFWDKIliGBFkgqcwcjD0y4l5qt8gbKWkCEE3/bXPQ8naGT2LGYpNY8gqDJEETb2NLlKj56KmxadqQCzAtsBU8SwEZi9kiKxBlmMKxYi0+f68jpKPrGqKRJTqS2Sux5lImHWrFSCDUSqDURrphCn9Wi6yWoZCiFLhcwzBCFNgtiyRLcQJjP+LRZh/9hmkFabIspI10icxX6zRL4lR4naT7wo5vFbLEATJRDjKuIJhXQX5LBsFYD7HacqsGYpKMBdEDp9VmGeypA1pJJjGoObzWc2kF5XRmZCloAprt+mey0Zaod9hbrt5mwIwRNk/lE22xmcZcnI9T8tCXMswD6QNM/8XYABHXZABxc4pngAAAABJRU5ErkJggg==" style="position:absolute; top:0; left:0;" />'
                            );

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', military_info_table);
    });

    /*Herbi MELUMATALRİ SİLİNİR */
    $("#militaryInfoDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "military_info/militaryInfoDelete.php",
            method: "post",
            data: $("#militaryInfoDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalMilitaryInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    military_info_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        military_info_table.ajax.reload();


    });

    /*military Info  table delete click*/
    $('#military_info_table').on('click', '#militaryInfo_delete', function () {
        var data = military_info_table.row($(this).parents('tr')).data();
        //console.log('data[0]=' + data[0])
        document.getElementById("militaryinfoid").value = data[0];
        $('#modalMilitaryInfoDelete').modal('show');
    });

    $("#militaryInfoInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax({
            url: "military_info/militaryInfoInsert.php",
            method: "post",
            data: $("#militaryInfoInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#militaryInfoInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#militaryInfoInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#militaryInfoInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#militaryInfoInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        military_info_table.ajax.reload();
        $("#militaryInfoInsertForm").get(0).reset();
        /*}*/
        military_info_table.ajax.reload();
    });


    /*GetMilitaryDetails  */
    function GetMilitaryDetails(militaryid, optype) {
        //console.log('$militaryid=' + militaryid)
        $.post("military_info/getMilitaryDetail.php",
            {
                militaryid: militaryid
            },
            function (military_data, status) {
                // PARSE json data
                var militarydata = JSON.parse(military_data);
                //console.log('militarydata=', militarydata)
                //console.log('militarydata.military_specialty_acc=' + militarydata.military_specialty_acc)

                if (optype == 'update') {
                    //console.log('update=')
                    $("#update_militaryid").val(militarydata.id).change();
                    $("#update_militaryempid").val(militarydata.teId).change();
                    $("#update_military_reg_group").val(militarydata.military_reg_group).change();
                    $("#update_military_reg_category").val(militarydata.military_reg_category).change();
                    $("#update_staff_desc_id").val(militarydata.tmsId).change();
                    $("#update_rank_desc_id").val(militarydata.tmrId).change();
                    $("#update_military_specialty_acc").val(militarydata.military_specialty_acc);
                    $("#update_military_fitness_service").val(militarydata.military_fitness_service);
                    $("#update_military_registration_service").val(militarydata.military_registration_service);
                    $("#update_military_registration_date").val(militarydata.military_registr_date);
                    $("#update_military_general").val(militarydata.military_general);
                    $("#update_military_special").val(militarydata.military_special);
                    $("#update_military_no_official").val(militarydata.military_no_official);
                    $("#update_military_additional_information").val(militarydata.military_additional_information);
                    $("#update_military_date_completion").val(militarydata.military_date_comp);
                    $('#modalEditMilitaryInfo').modal('show');
                    //console.log('modalEditMilitaryInfo ac')
                } else {
                    //console.log('view=')
                    var military_reg_category = '';
                    var military_reg_group = '';
                    if (militarydata.military_reg_category == 1) {
                        military_reg_category = 'Kateqoriya 1';
                    } else {
                        military_reg_category = 'Kateqoriya 2';
                    }
                    if (militarydata.military_reg_group == 1) {
                        military_reg_group = 'Çağırışçı';
                    } else {
                        military_reg_group = 'Hərbi vəzifəli';
                    }
                    $("#view_militaryemp").val(militarydata.full_name);
                    $("#view_military_reg_group").val(military_reg_group);
                    $("#view_military_reg_category").val(military_reg_category);
                    $("#view_staff_desc_id").val(militarydata.tmsStaffDesc);
                    $("#view_rank_desc_id").val(militarydata.tmrRankDesc);
                    $("#view_military_specialty_acc").val(militarydata.military_specialty_acc);
                    $("#view_military_fitness_service").val(militarydata.military_fitness_service);
                    $("#view_military_registration_service").val(militarydata.military_registration_service);
                    $("#view_military_registration_date").val(militarydata.military_registr_date);
                    $("#view_military_general").val(militarydata.military_general);
                    $("#view_military_special").val(militarydata.military_special);
                    $("#view_military_no_official").val(militarydata.military_no_official);
                    $("#view_military_additional_information").val(militarydata.military_additional_information);
                    $("#view_military_date_completion").val(militarydata.military_date_comp);
                    $('#modalViewMilitary').modal('show');
                    //console.log('modalEditMilitaryInfo ac')
                }
            }
        );

    }

    /*Military Update */
    $("#militaryInfoUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "military_info/militaryInfoUpdate.php",
            method: "post",
            data: $("#militaryInfoUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#militaryInfoUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditMilitaryInfo').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    military_info_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        military_info_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*military table delete click*/
    $('#military_info_table').on('click', '#militaryInfo_delete', function () {
        var data = military_info_table.row($(this).parents('tr')).data();

        document.getElementById("militaryinfoid").value = data[0];

        $('#modalMilitaryInfoDelete').modal('show');
    });

    /*military table view click  */
    $('#military_info_table').on('click', '#militaryInfo_view', function () {
        var data = military_info_table.row($(this).parents('tr')).data();
        GetMilitaryDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*military table view click  */
    $('#military_info_table').on('click', '#militaryInfo_edit', function () {

        var data = military_info_table.row($(this).parents('tr')).data();
        GetMilitaryDetails(data[0], 'update');
        document.getElementById("updatemilitaryid").value = data[0];
        //console.log(data[0]);
    });


    /*
    **********************************************************************************************************************
    ************************************** Suruculuk Vesiqesi INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */
    var tabtext2 = $('#qual2').text();
    var driver_license_table;
    $('#drivingLicensetab').click(function () {
        $('#qual2').text(tabtext2 + ' / ' + $('#drivingLicensetab').text());
        //console.log('Tab clikc drivingLicensetab');
        $('#driving_info_table').DataTable().clear().destroy();
        driver_license_table = $("#driving_info_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "driver_license/get_drivingLicenseInfo.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='drivingLicenseInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='drivingLicenseInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='drivingLicenseInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('drivingLicenseInfoInsertModal')

                        $("#drivingLicenseInfoInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', driver_license_table);
    });
    $("#drivingLicenseInfoInsertForm").validate({
        rules: {
            employee: "required",
            drivintcatId: "required",
            drivinglic_seria_number: "required",

        },
        messages: {
            employee: "<?php echo $dil['empty_firstname'];?>",
            drivintcatId: "<?php echo $dil['empty_firstname'];?>",
            drivinglic_seria_number: "<?php echo $dil['empty_firstname'];?>",

        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            console.log('salam='+$(element).attr("name"))
            $(element).addClass("is-invalid").removeClass("is-valid");
            console.log('type='+$(element).prop("type"))
            // if ($(element).prop("type") === "select-one") {
            //
            //     $(element).closest('div').find('button').addClass("btn-outline-danger").removeClass("btn-light");
            // }
        },
        unhighlight: function (element, errorClass, validClass) {
            console.log('sag old='+$(element).attr("name"))
            $(element).addClass("is-valid").removeClass("is-invalid");
            console.log('type='+$(element).prop("type"))
            // if ($(element).prop("type") === "select-one") {
            //     $(element).closest('div').find('button').addClass("btn-outline-success").removeClass("btn-outline-danger");
            // }
        }
    });

    /*Suruculuk MELUMATALRİ SİLİNİR */
    $("#drivingLicenseInfoDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "driver_license/drivingLicenseInfoDelete.php",
            method: "post",
            data: $("#drivingLicenseInfoDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalDrivingLicenseInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    driver_license_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        driver_license_table.ajax.reload();


    });

    /*Driving License Info  table delete click*/
    $('#driving_info_table').on('click', '#drivingLicenseInfo_delete', function () {
        var data = driver_license_table.row($(this).parents('tr')).data();
        //console.log('data[0]=' + data[0])
        document.getElementById("drivinglicenseinfoid").value = data[0];
        $('#modalDrivingLicenseInfoDelete').modal('show');
    });

    $("#drivingLicenseInfoInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
       	if($("#drivingLicenseInfoInsertForm").valid())
    {
        $.ajax({
            url: "driver_license/drivingLicenseInfoInsert.php",
            method: "post",
            data: $("#drivingLicenseInfoInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#drivingLicenseInfoInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#drivingLicenseInfoInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#drivingLicenseInfoInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#drivingLicenseInfoInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        driver_license_table.ajax.reload();
        $("#drivingLicenseInfoInsertForm").get(0).reset();
        driver_license_table.ajax.reload();
        }
    });


    /*GetDrivingDetails  */
    function GetDrivingDetails(drivinglicenseid, optype) {
        //console.log('$drivinglicenseid=' + drivinglicenseid)
        $.post("driver_license/getDrivingLicenseInfoDetail.php",
            {
                drivinglicenseid: drivinglicenseid
            },
            function (drivingLicense_data, status) {
                // PARSE json data
                var drivinglicensedata = JSON.parse(drivingLicense_data);
                //console.log('drivinglicensedata=', drivinglicensedata)
                //console.log('drivinglicensedata id=', drivinglicensedata.id)

                if (optype == 'update') {
                    $("#updatedrivinglicenseid").val(drivinglicensedata.id).change();
                    $("#update_drivingempid").val(drivinglicensedata.emp_id).change();
                    $("#update_drivinglic_seria_number").val(drivinglicensedata.lic_seria_number);
                    $("#update_drivintcatId").val(drivinglicensedata.tcatId).change();
                    $("#update_drivinglic_issuer").val(drivinglicensedata.lic_issuer);
                    $("#update_drivinglic_issue_date").val(drivinglicensedata.lic_issue_date);
                    $("#update_drivingexpire_date").val(drivinglicensedata.expire_date);


                    $('#modalEditDrivingLicenseInfo').modal('show');
                } else {
                    // $("#viewdrivinglicenseid").val(drivinglicensedata.id).change();
                    $("#view_drivingemp").val(drivinglicensedata.full_name);
                    $("#view_drivinglic_seria_number").val(drivinglicensedata.lic_seria_number);
                    $("#view_drivintcat").val(drivinglicensedata.cat_desc);
                    $("#view_drivinglic_issuer").val(drivinglicensedata.lic_issuer);
                    $("#view_drivinglic_issue_date").val(drivinglicensedata.lic_issue_date);
                    $("#view_drivingexpire_date").val(drivinglicensedata.expire_date);

                    $('#modalViewDrivingLicense').modal('show');
                }
            }
        );

    }

    /*Driving License Update */
    $("#drivingLicenseInfoUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "driver_license/drivingLicenseInfoUpdate.php",
            method: "post",
            data: $("#drivingLicenseInfoUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#drivingLicenseInfoUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditDrivingLicenseInfo').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    driver_license_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        driver_license_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });


    /*Driving License table view click  */
    $('#driving_info_table').on('click', '#drivingLicenseInfo_view', function () {
        var data = driver_license_table.row($(this).parents('tr')).data();
        GetDrivingDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*Driving License table edit click  */
    $('#driving_info_table').on('click', '#drivingLicenseInfo_edit', function () {

        var data = driver_license_table.row($(this).parents('tr')).data();
        GetDrivingDetails(data[0], 'update');
        document.getElementById("updatedrivinglicenseid").value = data[0];
        //console.log(data[0]);
    });

    /*
**********************************************************************************************************************
************************************** Tibbi INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

    var medical_info_table;
    $('#medicalInfotab').click(function () {
        //console.log('Tab clikc medicalInfotab');
        $('#qual2').text(tabtext2 + ' / ' + $('#medicalInfotab').text());

        $('#medical_info_table').DataTable().clear().destroy();
        medical_info_table = $("#medical_info_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "medical_info/get_medicalInfo.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='medicalInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='medicalInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='medicalInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('medicalInfoInsertModal')

                        $("#medicalInfoInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', medical_info_table);
    });

    /*Tibbi MELUMATALRİ SİLİNİR */
    $("#medicalInfoDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "medical_info/medicalInfoDelete.php",
            method: "post",
            data: $("#medicalInfoDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalMedicalInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    medical_info_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        medical_info_table.ajax.reload();


    });

    // /*medical Info  table delete click*/
    // $('#medical_info_table').on( 'click', '#migration_medical_information', function ()
    // {
    //     var data = medical_info_table.row( $(this).parents('tr') ).data();
    //     //console.log('data[0]='+data[0])
    //     document.getElementById("medicalinfoid").value = data[0];
    //     $('#modalMedicalInfoDelete').modal('show');
    // } );

    $("#medicalInfoInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax({
            url: "medical_info/medicalInfoInsert.php",
            method: "post",
            data: $("#medicalInfoInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#medicalInfoInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#medicalInfoInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#medicalInfoInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#medicalInfoInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        medical_info_table.ajax.reload();
        $("#medicalInfoInsertForm").get(0).reset();
        /*}*/
    });


    /*GetMedicalDetails  */
    function GetMedicalDetails(medicalid, optype) {
        //console.log('$medicalid=' + medicalid)
        $.post("medical_info/getMedicalInfoDetail.php",
            {
                medicalid: medicalid
            },
            function (medical_data, status) {
                //console.log('medicaldata1=', medical_data)
                // PARSE json data
                var medicaldata = JSON.parse(medical_data);
                //console.log('medicaldata=', medicaldata)
                if (optype == 'update') {
                    $("#update_medicalid").val(medicaldata.id).change();
                    $("#update_medicalempid").val(medicaldata.teId).change();
                    $("#update_medical_app").val(medicaldata.exist_id).change();
                    $("#update_renew_interval").val(medicaldata.renew_interval).change();
                    $("#update_last_renew_date").val(medicaldata.last_renew_date);
                    $("#update_physical_deficiency").val(medicaldata.chois_id).change();
                    $("#update_deficiency_desc").val(medicaldata.deficiency_desc);
                    $('#modalEditMedicalInfo').modal('show');
                } else {
                    $("#view_medicalemp").val(medicaldata.full_name);
                    $("#view_medical_app").val(medicaldata.exist_desc);
                    $("#view_renew_interval").val(medicaldata.renew_interval + ' Ay');
                    $("#view_last_renew_date").val(medicaldata.last_renew_date);
                    $("#view_physical_deficiency").val(medicaldata.chois_desc);
                    $("#view_deficiency_desc").val(medicaldata.deficiency_desc);
                    $('#modalViewMedical').modal('show');
                }
            }
        );

    }

    /*Medical Update */
    $("#medicalInfoUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "medical_info/medicalInfoUpdate.php",
            method: "post",
            data: $("#medicalInfoUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#medicalInfoUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditMedicalInfo').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    medical_info_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        medical_info_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*medical table delete click*/
    $('#medical_info_table').on('click', '#medicalInfo_delete', function () {
        var data = medical_info_table.row($(this).parents('tr')).data();

        document.getElementById("medicalinfoid").value = data[0];

        $('#modalMedicalInfoDelete').modal('show');
    });

    /*medical table view click  */
    $('#medical_info_table').on('click', '#medicalInfo_view', function () {
        var data = medical_info_table.row($(this).parents('tr')).data();
        GetMedicalDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*medical table view click  */
    $('#medical_info_table').on('click', '#medicalInfo_edit', function () {
        //console.log('salam')

        var data = medical_info_table.row($(this).parents('tr')).data();
        //console.log('data=' + data[0])
        GetMedicalDetails(data[0], 'update');
        document.getElementById("updatemedid").value = data[0];
        //console.log(data[0]);

    });

    /*
    **********************************************************************************************************************
    ************************************** Əvvəlki işəgötürən  INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */

    var previous_positions_table;

    $('#previousPositionstab').click(function () {
        $('#qual2').text(tabtext2 + ' / ' + $('#previousPositionstab').text());

        //console.log('Tab clikc previousPositionstab');
        $('#previous_positions_table').DataTable().clear().destroy();
        previous_positions_table = $("#previous_positions_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "previous_positions/get_previousPositions.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='previousPositions_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='previousPositions_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='previousPositions_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('previousPositionsInsertModal')

                        $("#previousPositionsInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', previous_positions_table);
    });

    /*Herbi MELUMATALRİ SİLİNİR */
    $("#previousPositionsDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "previous_positions/previousPositionsDelete.php",
            method: "post",
            data: $("#previousPositionsDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalPreviousPositionsDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    previous_positions_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        previous_positions_table.ajax.reload();


    });

    /*previous Positions Info  table delete click*/
    $('#previous_positions_table').on('click', '#previousPositions_delete', function () {
        var data = previous_positions_table.row($(this).parents('tr')).data();
        //console.log('data[0]=' + data[0])
        document.getElementById("positionsinfoid").value = data[0];
        $('#modalPreviousPositionsDelete').modal('show');
    });

    $("#previousPositionsInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax({
            url: "previous_positions/previousPositionsInsert.php",
            method: "post",
            data: $("#previousPositionsInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#previousPositionsInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#previousPositionsInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#previousPositionsInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#previousPositionsInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        previous_positions_table.ajax.reload();
        $("#previousPositionsInsertForm").get(0).reset();
        /*}*/
    });


    /*GetPreviousPositionsDetails  */
    function GetPreviousPositionsDetails(positionid, optype) {
        //console.log('$previouspositionsid=' + positionid)
        $.post("previous_positions/getPreviousPositionsDetail.php",
            {
                positionid: positionid
            },
            function (previous_positions, status) {
                // PARSE json data
                var previouspositions = JSON.parse(previous_positions);
                //console.log('previouspositions=', previouspositions);
                if (optype == 'update') {
                    $("#update_positionsid").val(previouspositions.id).change();
                    $("#update_positionsempid").val(previouspositions.teId).change();
                    $("#update_prev_employer").val(previouspositions.prev_employer)
                    $("#update_start_date").val(previouspositions.start_date);
                    $("#update_end_date").val(previouspositions.end_date);
                    $("#update_leave_reason").val(previouspositions.leave_reason)
                    $("#update_sector").val(previouspositions.sector)
                    $('#modalEditPreviousPositions').modal('show');
                } else {
                    $("#view_positionsemp").val(previouspositions.full_name);
                    $("#view_prev_employer").val(previouspositions.prev_employer);
                    $("#view_start_date").val(previouspositions.start_date);
                    $("#view_end_date").val(previouspositions.end_date);
                    $("#view_leave_reason").val(previouspositions.leave_reason);
                    $("#view_sector").val(previouspositions.sector);
                    $('#modalViewPreviousPositions').modal('show');
                }
            }
        );

    }

    /*previous Positions Update */
    $("#previousPositionsUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "previous_positions/previousPositionsUpdate.php",
            method: "post",
            data: $("#previousPositionsUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#previousPositionsUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditPreviousPositions').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    previous_positions_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        previous_positions_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });


    /*previous Positions table view click  */
    $('#previous_positions_table').on('click', '#previousPositions_view', function () {
        var data = previous_positions_table.row($(this).parents('tr')).data();
        GetPreviousPositionsDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*previous Positions table view click  */
    $('#previous_positions_table').on('click', '#previousPositions_edit', function () {

        var data = previous_positions_table.row($(this).parents('tr')).data();
        //console.log('data=', data);
        GetPreviousPositionsDetails(data[0], 'update');
        document.getElementById("updatepositionsid").value = data[0];
        //console.log(data[0]);
    });

    /*
    **********************************************************************************************************************
    ************************************** Migrasiya INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */

    var migration_info_table;
    $('#migrationInfotab').click(function () {
        //console.log('Tab clikc migrationInfotab');
        $('#qual2').text(tabtext2 + ' / ' + $('#migrationInfotab').text());

        $('#migration_info_table').DataTable().clear().destroy();
        migration_info_table = $("#migration_info_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "migration_info/get_migrationInfo.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='migrationInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='migrationInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='migrationInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('migrationInfoInsertModal')

                        $("#migrationInfoInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', migration_info_table);
    });

    /*migration MELUMATALRİ SİLİNİR */
    $("#migrationInfoDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "migration_info/migrationInfoDelete.php",
            method: "post",
            data: $("#migrationInfoDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalMigrationInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    migration_info_table.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });

        migration_info_table.ajax.reload();


    });


    $("#migrationInfoInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax({
            url: "migration_info/migrationInfoInsert.php",
            method: "post",
            data: $("#migrationInfoInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#migrationInfoInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#migrationInfoInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#migrationInfoInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#migrationInfoInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        migration_info_table.ajax.reload();
        $("#migrationInfoInsertForm").get(0).reset();
        /*}*/
    });


    /*GetMigrationDetails  */
    function GetMigrationDetails(migrationid, optype) {
        //console.log('$migrationid=' + migrationid)
        $.post("migration_info/getMigrationInfoDetail.php",
            {
                migrationid: migrationid
            },
            function (migration_data, status) {
                //console.log('migrationdata1=', migration_data)
                // PARSE json data
                var migrationdata = JSON.parse(migration_data);
                //console.log('migrationdata=', migrationdata)
                if (optype == 'update') {
                    $("#updatemigid").val(migrationdata.id).change();
                    $("#update_migrationempid").val(migrationdata.teId).change();
                    $("#update_trp_seria_number").val(migrationdata.trp_seria_number)
                    $("#update_trp_permit_reason").val(migrationdata.trp_permit_reason)
                    $("#update_trp_permit_date").val(migrationdata.trp_permit_date);
                    $("#update_trp_valid_date").val(migrationdata.trp_valid_date)
                    $("#update_trp_issuer").val(migrationdata.trp_issuer);
                    $("#update_prp_seria_number").val(migrationdata.prp_seria_number);
                    $("#update_prp_permit_date").val(migrationdata.prp_permit_date);
                    $("#update_prp_valid_date").val(migrationdata.prp_valid_date);
                    $("#update_prp_issuer").val(migrationdata.prp_issuer);
                    $("#update_wp_seria_number").val(migrationdata.wp_seria_number);
                    $("#update_wp_permit_date").val(migrationdata.wp_permit_date);
                    $("#update_wp_valid_date").val(migrationdata.wp_valid_date);
                    $('#modalEditMigrationInfo').modal('show');
                } else {
                    $("#view_migrationemp").val(migrationdata.full_name);
                    $("#view_trp_seria_number").val(migrationdata.trp_seria_number)
                    $("#view_trp_permit_reason").val(migrationdata.trp_permit_reason)
                    $("#view_trp_permit_date").val(migrationdata.trp_permit_date);
                    $("#view_trp_valid_date").val(migrationdata.trp_valid_date)
                    $("#view_trp_issuer").val(migrationdata.trp_issuer);
                    $("#view_prp_seria_number").val(migrationdata.prp_seria_number);
                    $("#view_prp_permit_date").val(migrationdata.prp_permit_date);
                    $("#view_prp_valid_date").val(migrationdata.prp_valid_date);
                    $("#view_prp_issuer").val(migrationdata.prp_issuer);
                    $("#view_wp_seria_number").val(migrationdata.wp_seria_number);
                    $("#view_wp_permit_date").val(migrationdata.wp_permit_date);
                    $("#view_wp_valid_date").val(migrationdata.wp_valid_date);
                    $('#modalViewMigration').modal('show');
                }
            }
        );

    }

    /*migration Update */
    $("#migrationInfoUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "migration_info/migrationInfoUpdate.php",
            method: "post",
            data: $("#migrationInfoUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#migrationInfoUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditMigrationInfo').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    migration_info_table.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        migration_info_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*migration table delete click*/
    $('#migration_info_table').on('click', '#migrationInfo_delete', function () {
        var data = migration_info_table.row($(this).parents('tr')).data();

        document.getElementById("migrationinfoid").value = data[0];

        $('#modalMigrationInfoDelete').modal('show');
    });

    /*migration table view click  */
    $('#migration_info_table').on('click', '#migrationInfo_view', function () {
        var data = migration_info_table.row($(this).parents('tr')).data();
        GetMigrationDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*migration table view click  */
    $('#migration_info_table').on('click', '#migrationInfo_edit', function () {
        //console.log('salam')

        var data = migration_info_table.row($(this).parents('tr')).data();
        //console.log('data=' + data[0])
        GetMigrationDetails(data[0], 'update');
        document.getElementById("updatemigid").value = data[0];
        //console.log(data[0]);

    });
    /*
    **********************************************************************************************************************
    ************************************** Emek muqavilesinin sertleri INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */

    var terms_employment_contract_tab;
    $('#empContractInfotab').click(function () {
            $.ajax({
                url: "emp_contract/get_empContractInfoExcel.php",
                method: "post",
                dataType: "text",
                success: function (data) {
                    console.log('data',jQuery.parseJSON(data).data)
                    var table='';
                     // table+= $('#terms_employment_contract_table').html();
                     // console.log('ggg=0'+$('#terms_employment_contract_table').html())
                    table+='<tbody>';
                    $.each(jQuery.parseJSON(data).data, function(k,v){
                        table+='<tr>' +
                            '<td>'+v[0]+'</td>'+
                            '<td>'+v[1]+'</td>'+
                            '<td>'+v[2]+'</td>'+
                            '<td>'+v[3]+'</td>'+
                            '<td>'+v[4]+'</td>'+
                            '<td>'+v[5]+'</td>' +
                            '<td>'+v[6]+'</td>' +
                            '<td>'+v[7]+'</td>' +
                            '<td>'+v[8]+'</td>' +
                            '<td>'+v[9]+'</td>' +
                            '<td>'+v[10]+'</td>' +
                            '<td>'+v[11]+'</td>' +
                            '<td>'+v[12]+'</td>' +
                            '<td>'+v[13]+'</td>' +
                            '<td>'+v[14]+'</td>' +
                            '<td>'+v[15]+'</td>' +
                            '</tr>';
                    });
                    table+='</tbody>';
                    console.log('table='+table)

                    $('#terms_empl').append(table);
                    // var ColumnHead = "Column Header Text";
                    // var Messages = "\n message1.\n message2.\n message2.\n message2.\n message2.\n message2.";
                    // window.open('data:application/vnd.ms-excel,' + Messages);
                    // // e.preventDefault();


                }
            });
        //console.log('Tab clikc empContractInfotab');
        // $('#qual2').text( tabtext2+' / '+$('#empContractInfotab').text());

        $('#terms_employment_contract_table').DataTable().clear().destroy();
        terms_employment_contract_tab = $("#terms_employment_contract_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "emp_contract/get_empContractInfo.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='empContract_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='empContract_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='empContract_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('empContractInsertModal')

                        $("#empContractInsertModal").modal();
                    }
                },
                // {
                //     extend: 'excelHtml5',
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                //  },
                {
                    text: 'Excel',
                    action: function (e, dt, node, config) {
                        // $("#myModalExit").modal();
                        // addImage();
                        var table = $('#example').DataTable();

                            table.page.len( -1 ).draw();
                            window.open('data:application/vnd.ms-excel,' +
                                encodeURIComponent($('#exam').html()));
                            setTimeout(function(){
                                table.page.len(10).draw();
                            }, 1000)


                    }

                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    // text: 'Custom PDF',
                    extend: 'pdfHtml5',
                    filename: 'dt_custom_pdf',
                    orientation: 'landscape', //portrait
                    pageSize: 'legal', //A3 , A5 , A6 , legal , letter
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', terms_employment_contract_tab);
    });

    /*Emek muqavilesinin sertleri MELUMATALRİ SİLİNİR */
    $("#empContractDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "emp_contract/empContractDelete.php",
            method: "post",
            data: $("#empContractDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEmpContractDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    terms_employment_contract_tab.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        terms_employment_contract_tab.ajax.reload();


    });

    $("#empContractInsertForm").validate({
        rules: {
            company_id: "required",
            emplo: "required",
            employment_contract_indefinite: "required",
            employee_start_date: "required",
            // probation: {
            //     required: true,
            //     minlength: 3
            // },
        },
        messages: {
            company_id: "<?php echo $dil['empty_firstname'];?>",
            emplo: "<?php echo $dil['empty_firstname'];?>",
            employment_contract_indefinite: "<?php echo $dil['empty_employment_contract_indefinite'];?>",
            probation: "<?php echo $dil['empty_probation'];?>",
            dates: "<?php echo $dil['empty_dates'];?>",
            trial_expiration_date: "<?php echo $dil['empty_trial_expiration_date'];?>",
            employee_start_date: "<?php echo $dil['empty_employee_start_date'];?>",
            date_conclusion_employment_contract: "<?php echo $dil['empty_date_conclusion_employment_contract'];?>",
            regulation_property_relations: "<?php echo $dil['empty_regulation_property_relations'];?>",
            termination_cases: "<?php echo $dil['empty_termination_cases'];?>",
            other_conditions_wages: "<?php echo $dil['empty_other_conditions_wages'];?>",
            workplace_status: "<?php echo $dil['empty_workplace_status'];?>",
            working_conditions: "<?php echo $dil['empty_working_conditions'];?>",
            job_descriptions: "<?php echo $dil['empty_job_descriptions'];?>",
            kvota: "<?php echo $dil['empty_kvota'];?>",
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            console.log('salam='+$(element).attr("name"))
            $(element).addClass("is-invalid").removeClass("is-valid");
            console.log('type='+$(element).prop("type"))
            // if ($(element).prop("type") === "select-one") {
            //
            //     $(element).closest('div').find('button').addClass("btn-outline-danger").removeClass("btn-light");
            // }
        },
        unhighlight: function (element, errorClass, validClass) {
            console.log('sag old='+$(element).attr("name"))
            $(element).addClass("is-valid").removeClass("is-invalid");
            console.log('type='+$(element).prop("type"))
            // if ($(element).prop("type") === "select-one") {
            //     $(element).closest('div').find('button').addClass("btn-outline-success").removeClass("btn-outline-danger");
            // }
        }
    });

    $("#empContractInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
       	if($("#empContractInsertForm").valid())
    {
        $.ajax({
            url: "emp_contract/empContractInsert.php",
            method: "post",
            data: $("#empContractInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#empContractInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#empContractInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#empContractInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#empContractInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        terms_employment_contract_tab.ajax.reload();
        $("#empContractInsertForm").get(0).reset();
        }
    });


    /*GetEmpContractDetails  */
    function GetEmpContractDetails(empcontractid, optype) {
        //console.log('$empcontractid=' + empcontractid)
        $.post("emp_contract/getEmpContractDetail.php",
            {
                empcontractid: empcontractid
            },
            function (empcontract_data, status) {
                console.log('empcontractdata1=', empcontract_data)
                // PARSE json data
                var empcontractdata = JSON.parse(empcontract_data);
                //console.log('empcontractdata=', empcontractdata)
                if (optype == 'update') {
                    $("#update_empcontractid").val(empcontractdata.id).change();
                    $("#update_employee").val(empcontractdata.emp_id).change();
                    $("#update_employment_contract_indefinite").val(empcontractdata.chois_id).change();
                    $("#update_reasons_contract").val(empcontractdata.reasons_temporary_closure)
                    $("#update_date_employment_contract").val(empcontractdata.date_contract)
                    $("#update_probation").val(empcontractdata.probation);
                    $("#update_dates").val(empcontractdata.probation_dates).change();
                    $("#update_trial_expiration_date").val(empcontractdata.trial_expiration_date)
                    $("#update_employee_start_date").val(empcontractdata.employee_start_date);
                    $("#update_date_conclusion_employment_contract").val(empcontractdata.date_conclusion_contract);
                    $("#update_regulation_property_relations").val(empcontractdata.regulation_property_relations);
                    $("#update_termination_cases").val(empcontractdata.termination_cases);
                    $("#update_other_conditions_wages").val(empcontractdata.other_condition_wages);
                    $("#update_workplace_status").val(empcontractdata.work_status_id).change();
                    $("#update_working_conditions").val(empcontractdata.working_cond_id).change();
                    $("#update_job_descriptions").val(empcontractdata.job_description);
                    $("#update_kvota").val(empcontractdata.kvota);
                    $('#modalEditEmpContract').modal('show');
                } else {
                    $("#view_empcontractid").val(empcontractdata.id);
                    $("#view_employee").val(empcontractdata.full_name);
                    $("#view_employment_contract_indefinite").val(empcontractdata.indefinite);
                    $("#view_reasons_contract").val(empcontractdata.reasons_temporary_closure)
                    $("#view_date_employment_contract").val(empcontractdata.date_contract)
                    $("#view_probation").val(empcontractdata.probation);
                    $("#view_dates").val(empcontractdata.dates);
                    $("#view_trial_expiration_date").val(empcontractdata.trial_expiration_date)
                    $("#view_employee_start_date").val(empcontractdata.employee_start_date);
                    $("#view_date_conclusion_employment_contract").val(empcontractdata.date_conclusion_contract);
                    $("#view_regulation_property_relations").val(empcontractdata.regulation_property_relations);
                    $("#view_termination_cases").val(empcontractdata.termination_cases);
                    $("#view_other_conditions_wages").val(empcontractdata.other_condition_wages);
                    $("#view_workplace_status").val(empcontractdata.workplace_status);
                    $("#view_working_conditions").val(empcontractdata.working_conditions);
                    $("#view_job_descriptions").val(empcontractdata.job_description);
                    $("#view_kvota").val(empcontractdata.kvota);
                    $('#modalViewEmpContract').modal('show');
                }
            }
        );

    }

    /*empContract Update */
    $("#empContractUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "emp_contract/empContractUpdate.php",
            method: "post",
            data: $("#empContractUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#empContractUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditEmpContract').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    terms_employment_contract_tab.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        terms_employment_contract_tab.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*empContract table delete click*/
    $('#terms_employment_contract_table').on('click', '#empContract_delete', function () {
        var data = terms_employment_contract_tab.row($(this).parents('tr')).data();

        document.getElementById("empcontractid").value = data[0];

        $('#modalEmpContractDelete').modal('show');
    });

    /*empContract table view click  */
    $('#terms_employment_contract_table').on('click', '#empContract_view', function () {
        var data = terms_employment_contract_tab.row($(this).parents('tr')).data();
        GetEmpContractDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*empContract table view click  */
    $('#terms_employment_contract_table').on('click', '#empContract_edit', function () {
        //console.log('salam')

        var data = terms_employment_contract_tab.row($(this).parents('tr')).data();
        //console.log('data=' + data[0])
        GetEmpContractDetails(data[0], 'update');
        document.getElementById("updateempcontid").value = data[0];
        //console.log(data[0]);

    });

    /*
**********************************************************************************************************************
************************************** is staji INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

    var work_experiencetab_tab;
    $('#workExperiencetab').click(function () {
        $('#qual2').text(tabtext2 + ' / ' + $('#workExperiencetab').text());

        //console.log('Tab clikc previousPositionstab');
        $('#work_experiencetab_table').DataTable().clear().destroy();
    // $('#workExperiencetab').click(function () {
        //console.log('Tab clikc work_experiencetab_table');
        // $('#qual2').text( tabtext2+' / '+$('#workExperienceInfotab').text());

        $('#work_experiencetab_table').DataTable().clear().destroy();
        work_experiencetab_tab = $("#work_experiencetab_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "work_experience/get_workExperience.php",
                type: "POST"
            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='workExperience_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='workExperience_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='workExperience_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('workExperienceInsertModal')

                        $("#workExperienceInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', work_experiencetab_tab);
    });

    /*Emek muqavilesinin sertleri MELUMATALRİ SİLİNİR */
    $("#workExperienceDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "work_experience/workExperienceDelete.php",
            method: "post",
            data: $("#workExperienceDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalWorkExperienceDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    work_experiencetab_tab.ajax.reload();
                } else {
                    //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        work_experiencetab_tab.ajax.reload();

    });

// /*workExperience Info  table delete click*/
// $('#work_experiencetab_table').on( 'click', '#migration_workExperience_information', function ()
// {
//     var data = work_experiencetab_tab.row( $(this).parents('tr') ).data();
//     //console.log('data[0]='+data[0])
//     document.getElementById("workExperienceid").value = data[0];
//     $('#modalworkExperienceDelete').modal('show');
// } );

    $("#workExperienceInsertForm").submit(function (e) {
        //console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax({
            url: "work_experience/workExperienceInsert.php",
            method: "post",
            data: $("#workExperienceInsertForm").serialize(),
            dataType: "text",
            success: function (strMessage) {
                //console.log('strMessage=' + $("#workExperienceInsertForm").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#workExperienceInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#workExperienceInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#workExperienceInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        work_experiencetab_tab.ajax.reload();
        $("#workExperienceInsertForm").get(0).reset();
        /*}*/
    });


    /*GetworkExperienceDetails  */
    function GetworkExperienceDetails(workExperienceid, optype) {
        //console.log('$workExperienceid=' + workExperienceid)
        $.post("work_experience/getworkExperienceDetail.php",
            {
                workExperienceid: workExperienceid
            },
            function (workExperience_data, status) {
                //console.log('workExperiencedata1=', workExperience_data)
                // PARSE json data
                var workExperiencedata = JSON.parse(workExperience_data);
                //console.log('workExperiencedata=', workExperiencedata)
                //console.log('workExperiencedata.emp_id=', workExperiencedata.emp_id)
                var result = workExperiencedata.work_experience_before_enterprise.split(',');
                var result2 = workExperiencedata.work_experience_enterprise.split(',');
                var result3 = workExperiencedata.general_work_experience.split(',');
                if (optype == 'update') {
                    $("#update_workExperienceid").val(workExperiencedata.id).change();
                    $("#update_employe").val(workExperiencedata.emp_id).change();
                    $("#update_work_experience_before_enterprise_year").val(result[0]);
                    $("#update_work_experience_before_enterprise_month").val(result[1])
                    $("#update_work_experience_before_enterprise_day").val(result[2]);

                    $("#update_work_experience_enterprise_year").val(result2[0]);
                    $("#update_work_experience_enterprise_month").val(result2[1])
                    $("#update_work_experience_enterprise_day").val(result2[2]);

                    $("#update_general_work_experience_year").val(result3[0]);
                    $("#update_general_work_experience_month").val(result3[1])
                    $("#update_general_work_experience_day").val(result3[2]);

                    $('#modalEditWorkExperience').modal('show');
                } else {
                    $("#view_workExperienceid").val(workExperiencedata.id);
                    $("#view_employe").val(workExperiencedata.full_name);
                    $("#view_work_experience_before_enterprise_year").val(result[0]);
                    $("#view_work_experience_before_enterprise_month").val(result[1])
                    $("#view_work_experience_before_enterprise_day").val(result[2]);

                    $("#view_work_experience_enterprise_year").val(result2[0]);
                    $("#view_work_experience_enterprise_month").val(result2[1])
                    $("#view_work_experience_enterprise_day").val(result2[2]);

                    $("#view_general_work_experience_year").val(result3[0]);
                    $("#view_general_work_experience_month").val(result3[1])
                    $("#view_general_work_experience_day").val(result3[2]);
                    $('#modalViewWorkExperience').modal('show');
                }
            }
        );

    }

    /*workExperience Update */
    $("#workExperienceUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "work_experience/workExperienceUpdate.php",
            method: "post",
            data: $("#workExperienceUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#workExperienceUpdate").serialize());
                //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditWorkExperience').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    work_experiencetab_tab.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        work_experiencetab_tab.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*workExperience table delete click*/
    $('#work_experiencetab_table').on('click', '#workExperience_delete', function () {
        var data = work_experiencetab_tab.row($(this).parents('tr')).data();

        document.getElementById("workExperienceid").value = data[0];

        $('#modalWorkExperienceDelete').modal('show');
    });

    /*workExperience table view click  */
    $('#work_experiencetab_table').on('click', '#workExperience_view', function () {
        var data = work_experiencetab_tab.row($(this).parents('tr')).data();
        GetworkExperienceDetails(data[0], 'view');
        //console.log(data[0]);
    });
    /*workExperience table view click  */
    $('#work_experiencetab_table').on('click', '#workExperience_edit', function () {
        //console.log('salam')

        var data = work_experiencetab_tab.row($(this).parents('tr')).data();
        //console.log('data=' + data[0])
        GetworkExperienceDetails(data[0], 'update');
        document.getElementById("updateworkexpid").value = data[0];
        //console.log(data[0]);

    });
    /*
**********************************************************************************************************************
************************************** is yeri INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/
    var empArray = [];
    var workplace_tab;
    $('#workplaceInformationtab').click(function () {
        //console.log('Tab clikc workplace_table');
        // $('#qual2').text( tabtext2+' / '+$('#workplaceInfoInfotab').text());

        $('#workplace_table').DataTable().clear().destroy();
        workplace_tab = $("#workplace_table").DataTable({
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
                "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": " Heç bir məlumat  tapılmadı",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "<?php echo $dil['previous'] ; ?> ",
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "workplace_info/get_workplaceInfo.php",
                type: "POST",



            }, "columnDefs": [{
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='workplaceInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>" +
                    "<img  id='workplaceInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>" +
                    "<img  id='workplaceInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            }],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                    action: function (e, dt, node, config) {
                        //console.log('workplaceInfoInsertModal')


                        $("#workplaceInfoInsertModal").modal();
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copy',
                    text: 'Kopyala'
                },
                {
                    extend: 'print',
                    text: 'Çap et'
                }, {
                    extend: 'colvis',
                    text: 'Sütunu gizlət'
                },

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        //console.log('Tab clikc oldu', workplace_tab);
    });

    /*Emek muqavilesinin sertleri MELUMATALRİ SİLİNİR */
    $("#workplaceInfoDelete").submit(function (e) {

        e.preventDefault();
        $.ajax({
            url: "workplace_info/workplaceInfoDelete.php",
            method: "post",
            data: $("#workplaceInfoDelete").serialize(),
            dataType: "text",
            success: function (strMessage) {
                // //console.log('strMessage=' + strMessage);
                if (strMessage.substr(1, 4) === 'error') {
                    // //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalWorkplaceInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    workplace_tab.ajax.reload();
                } else {
                    // //console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        workplace_tab.ajax.reload();

    });


    $("#workplaceInfoInsertForm_m").validate({
        rules: {
            company_id: "required",
            employee: "required",
            // directorate: "required",
            // department: "required",
            // depart: "required",
            // area_section: "required",
            // position: "required",
            position_level: "required",
            status: "required",

        },
        messages: {
            company_id: "<?php echo $dil['empty_company'];?>",
            employee: "<?php echo $dil['empty_employee'];?>",
            // directorate: "<?php echo $dil['empty_directorate'];?>",
            // department: "<?php echo $dil['empty_department'];?>",
            // depart: "<?php echo $dil['empty_depart'];?>",
            // area_section: "<?php echo $dil['empty_area_section'];?>",
            // position: "<?php echo $dil['empty_position'];?>",
            position_level: "<?php echo $dil['empty_position_level'];?>",
            status: "<?php echo $dil['empty_status'];?>",
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });

    $("#workplaceInfoInsertForm_m").submit(function (e) {
        // console.log('salam insert='+$("#workplaceInfoInsertForm_m").serialize())
        e.preventDefault();
        	if($("#workplaceInfoInsertForm_m").valid())
    {
        $.ajax({
            url: "workplace_info/workplaceInfoInsert.php",
            method: "post",
            data: $("#workplaceInfoInsertForm_m").serialize(),
            dataType: "text",
            success: function (strMessage) {
                // //console.log('workplaceInfoInsertForm =' + $("#workplaceInfoInsertForm_m").html());
                // //console.log('strMessage=' + $("#workplaceInfoInsertForm_m").serialize());
                // //console.log('strMessage=' + strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4) === 'error') {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#workplaceInfoInsertModal").modal('hide');
                } else if (strMessage === 'success') {
                    $("#successp").text('Məlumatlar daxil edildi ');
                    $("#modalInsertSuccess").modal('show');
                    $("#workplaceInfoInsertModal").modal('hide');

                } else {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#workplaceInfoInsertModal").modal('hide');

                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        workplace_tab.ajax.reload();
        $("#workplaceInfoInsertForm_m").get(0).reset();
        }
    });


    /*GetworkplaceInfoDetails  */
    function GetworkplaceInfoDetails(workplaceInfoid, optype) {
        // //console.log('$workplaceInfoid=' + workplaceInfoid)
        $.post("workplace_info/getWorkplaceInfoDetail.php",
            {
                workplaceInfoid: workplaceInfoid
            },
            function (workplaceInfo_data, status) {
                // //console.log('workplaceInfodata1=', workplaceInfo_data)
                // PARSE json data
                var workplaceInfodata = JSON.parse(workplaceInfo_data);
                var structure_level = workplaceInfodata.structure_level
                var position_level = workplaceInfodata.position_level
                var structures = workplaceInfodata.structures;
                console.log('workplaceInfodata=', workplaceInfodata)
                console.log('workplaceInfodata.emp='+workplaceInfodata.emp)
                // //console.log('workplaceInfodata.emp_id='+workplaceInfodata.emp_id)
                // //console.log('structures=', structures);
                // //console.log('structure_level=', structure_level);
                fillSelect(structures, '');

                $('.selectpicker').selectpicker('refresh');


                if (optype == 'update') {
                    // //console.log('update kecdim')
                    // stlevel('update_')
                     $("#update_workplaceInfoid").val(workplaceInfodata.id).change();
                    $("#update_employee_place").val(workplaceInfodata.emp_id).change();
                    $("#update_emplo").val(workplaceInfodata.emp_id);
                    if(structure_level){
                        $("#update_directorate").val(structure_level.id2).change();
                        $("#update_department").val(structure_level.id3).change();
                        $("#update_depart").val(structure_level.id4).change();
                        $("#update_area_section").val(structure_level.id5).change();
                    }
                    $("#update_position").val(workplaceInfodata.category);
                    $("#update_position_old").val(workplaceInfodata.category);
                    $("#update_company_Id").val(workplaceInfodata.company_id);
                    $("#update_status").val(workplaceInfodata.work_status_id).change();
                    if(position_level){
                        $("#update_direct_guide").val(position_level.position_id1).change();
                        $("#update_second_leader").val(position_level.position_id2).change();
                    }
                    $("#update_position_level").val(workplaceInfodata.posit_level).change();


                    $('.selectpicker').selectpicker('refresh');

                    $('#modalEditWorkPlaceInfo').modal('show');
                } else {
                    $("#view_workplaceInfoid").val(workplaceInfodata.id);
                    $("#view_employee_place").val(workplaceInfodata.emp);
                    $("#view_emplo").val(workplaceInfodata.emp);
                    if(structure_level){
                        $("#view_directorate").val(structure_level.category2);
                        $("#view_department").val(structure_level.category3);
                        $("#view_depart").val(structure_level.category4);
                        $("#view_area_section").val(structure_level.category5);
                    }
                    $("#view_position").val(workplaceInfodata.category);
                    $("#view_position_old").val(workplaceInfodata.category);
                    $("#view_company_Id").val(workplaceInfodata.company_id);
                    $("#view_status").val(workplaceInfodata.work_status);
                    if(position_level){
                        $("#view_direct_guide").val(position_level.position1);
                        $("#view_second_leader").val(position_level.position2);
                    }
                    $("#view_position_level").val(workplaceInfodata.posit_level);


                    $('.selectpicker').selectpicker('refresh');
                    $('#modalViewWorkplaceInfo').modal('show');
                }
            }
        );

    }

    /*workplaceInfo Update */
    $("#workplaceInfoUpdate").submit(function (e) {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax({
            url: "workplace_info/workplaceInfoUpdate.php",
            method: "post",
            data: $("#workplaceInfoUpdate").serialize(),
            dataType: "text",
            success: function (strMessage) {
                ////console.log('serialize='+$("#workplaceInfoUpdate").serialize());
                // //console.log('strMessage=' + strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4) === 'error') {
                    // //console.log(strMessage);
                } else if (strMessage === 'success') {
                    $('#modalEditWorkPlaceInfo').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    workplace_tab.ajax.reload();
                } else {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        $(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

        $(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
        $(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
        $(".selectpicker").selectpicker();
        workplace_tab.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*workplaceInfo table delete click*/
    $('#workplace_table').on('click', '#workplaceInfo_delete', function () {
        var data = workplace_tab.row($(this).parents('tr')).data();

        document.getElementById("workplaceInfoid").value = data[0];

        $('#modalWorkplaceInfoDelete').modal('show');
    });

    /*workplaceInfo table view click  */
    $('#workplace_table').on('click', '#workplaceInfo_view', function () {
        var data = workplace_tab.row($(this).parents('tr')).data();
        GetworkplaceInfoDetails(data[0], 'view');
        // //console.log(data[0]);
    });
    /*workplaceInfo table view click  */
    $('#workplace_table').on('click', '#workplaceInfo_edit', function () {
        //console.log('salam')

        var data = workplace_tab.row($(this).parents('tr')).data();
        // //console.log('data=' + data[0])
        GetworkplaceInfoDetails(data[0], 'update');
        document.getElementById("updateworkplaceid").value = data[0];
        // //console.log(data[0]);

    });
    $('#birth_date_fam_info').datetimepicker({format: 'DD/MM/YYYY'});
    $('#edit_birth_date_fam_info_id').datetimepicker({format: 'DD/MM/YYYY'});
    $('#birth_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_birth_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_uni_end_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_diplom_issue_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#uni_end_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#diplom_issue_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#training_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_training_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#cert_given_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_cert_given_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#passport_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_passport_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#passport_end_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_passport_end_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#view_military_date_completion').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_military_date_completion').datetimepicker({format: 'DD/MM/YYYY'});
    $('#military_date_completion').datetimepicker({format: 'DD/MM/YYYY'});
    $('#view_military_registration_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_military_registration_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#military_registration_date').datetimepicker({format: 'DD/MM/YYYY'});

    $('#view_drivinglic_issue_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_drivinglic_issue_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#view_drivingexpire_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_drivingexpire_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#drivingexpire_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#drivinglic_issue_date').datetimepicker({format: 'DD/MM/YYYY'});

    $('#view_last_renew_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_last_renew_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#medical_last_renew_date').datetimepicker({format: 'DD/MM/YYYY'});

    $('#view_start_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#view_end_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_start_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#update_end_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#start_date').datetimepicker({format: 'DD/MM/YYYY'});
    $('#end_date').datetimepicker({format: 'DD/MM/YYYY'});

    $("#update_trp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_trp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_prp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_prp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_wp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_wp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});

    $("#view_trp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#view_trp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#view_prp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#view_prp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#view_wp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#view_wp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});

    $("#trp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#trp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#prp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#prp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#wp_permit_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#wp_valid_date").datetimepicker({format: 'DD/MM/YYYY'});


    $("#date_employment_contract").datetimepicker({format: 'DD/MM/YYYY'});
    $("#trial_expiration_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#employee_start_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#date_conclusion_employment_contract").datetimepicker({format: 'DD/MM/YYYY'});

    $("#update_date_employment_contract").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_trial_expiration_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_employee_start_date").datetimepicker({format: 'DD/MM/YYYY'});
    $("#update_date_conclusion_employment_contract").datetimepicker({format: 'DD/MM/YYYY'});

    $("#exitDate").datetimepicker({format: 'DD/MM/YYYY'});

});
$(document).ready(function (e) {
    $(document).on('change', '#files', function () {

        // $("#uploadForm").submit();
        $("#addImage").trigger("click");
        //console.log('on change');
    })
    $(document).on('change', '#medical_physical_deficiency', function () {
        //console.log('medical_physical_deficiency=' + $(this).val());
        if ($('#medical_physical_deficiency option:selected').val() == '1') {
            $('#medical_deficiency_descDiv').css('display', 'flex')
        } else {
            $('#medical_deficiency_descDiv').css('display', 'none')
        }
    })
    $(document).on('change', '#update_physical_deficiency', function () {
        //console.log('update_physical_deficiency=' + $(this).val());
        if ($('#update_physical_deficiency option:selected').val() == '1') {
            $('#update_deficiency_descDiv').css('display', 'flex')
        } else {
            $('#update_deficiency_descDiv').css('display', 'none')
        }
    })
});

function addImage() {
    $("#addImage").on('click', (function (e) {
        console.log('addImage')

        //console.log('on submit')
        var formData = new FormData($('#uploadForm')[0]);

        formData.append('userImage', $('input[type=file]')[0].files[0]);
        formData.append('uid', $('input[name=uid]').val());
        formData.append('empno', $('input[name=empno]').val());
        // formData.append('uid', $('input[id=uid]').val());
        console.log('uid='+$('input[name=uid]').val())
        console.log('emp_id='+$('input[name=emp_id]').val())
        console.log('formData=',formData)
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            // data:  $('form#uploadForm').serialize(),
            // data:  new FormData(),
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#default').css('display', 'none')
                $("#targetLayer").html(data);
            },
            error: function () {
            }
        });
    }));
}
$(function () {
// $(".company_id").change(function () {
    var deptid = $('#company_ids').val();
    console.log("deptid=" + deptid);
    $.ajax({
        url: 'employees/getEmployee.php',
        type: 'post',
        data: {company_id: deptid},
        dataType: 'json',
        success: function (response) {
            //console.log('response=', response)
            empArray = response;

            $("#employee").empty();
            var option = '<select data-live-search="true"  name="emplo" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
            option += '<option value="">Seçin..</option>';
            $.each(response, function (k, v) {
                //console.log('v=', v[1]);
                option += '<option value="' + v[0] + '" >' + v[1] + '</option>';
            });
            option += '</select>';
            $(".emp").html(option);
            $(".selectpicker").selectpicker();

            //update

            var option = '<select data-live-search="true"  name="update_emplo" id="update_employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
            option += '<option value="">Seçin..</option>';
            $.each(response, function (k, v) {
                //console.log('v=', v[1])
                option += '<option value="' + v[0] + '" >' + v[1] + '</option>';
            });
            option += '</select>';
            $(".update_emp").html(option);
            $(".selectpicker").selectpicker();

        }
    });

    $.ajax({
        url: 'workplace_info/get_employeesWork.php',
        type: 'post',
        data: {company_id: deptid},
        dataType: 'json',
        success: function (response) {
            console.log('response=', response);
            catArray = response;

            $.each(response, function (k, v) {
                empArray = jQuery.grep(empArray, function (value) {
                    return value[0] != v;
                });
                //console.log('empArray=', empArray)

            })

            $("#employee").empty();
            var option = '<select data-live-search="true"  name="emplo" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
            option += '<option value="">Seçin..</option>';
            $.each(empArray, function (k, v) {
                //console.log('v=', v[1]);
                option += '<option value="' + v[0] + '" >' + v[1] + '</option>';
            });
            option += '</select>';
            $(".emp").html(option);
            $(".selectpicker").selectpicker();
            //console.log('difff', diff(empArray, catArray))
        }
    });


    $.ajax({
        url: 'workplace_info/getStructureInsert.php',
        type: 'post',
        async: false,
        data: {company_id: deptid},
        dataType: 'json',
        success: function (response) {
            console.log('response getStructureInsert=', response)
            if (response) {
                fillSelect(response.structures, '')
                // stlevel()
            }
        }
    });

});
// $(".work_company_id").change(function () {
//     var deptid = $(this).val();
//     var empArray = [];
//     var catArray = [];
//      console.log("deptid work_company_id=" + deptid);
//     $.ajax({
//         url: 'employees/getEmployee.php',
//         type: 'post',
//         data: {company_id: deptid},
//         dataType: 'json',
//         success: function (response) {
//             console.log('response getEmployee =', response)
//             empArray = response;
//         }
//     });
//     $.ajax({
//         url: 'workplace_info/get_employeesWork.php',
//         type: 'post',
//         data: {company_id: deptid},
//         dataType: 'json',
//         success: function (response) {
//             console.log('response=', response);
//             catArray = response;
//
//             $.each(response, function (k, v) {
//                 empArray = jQuery.grep(empArray, function (value) {
//                     return value[0] != v;
//                 });
//                 //console.log('empArray=', empArray)
//
//             })
//
//             $("#employee").empty();
//             var option = '<select data-live-search="true"  name="emplo" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
//             option += '<option value="">Seçin..</option>';
//             $.each(empArray, function (k, v) {
//                 //console.log('v=', v[1]);
//                 option += '<option value="' + v[0] + '" >' + v[1] + '</option>';
//             });
//             option += '</select>';
//             $(".emp").html(option);
//             $(".selectpicker").selectpicker();
//             //console.log('difff', diff(empArray, catArray))
//         }
//     });
//
//
//     $.ajax({
//         url: 'workplace_info/getStructureInsert.php',
//         type: 'post',
//         async: false,
//         data: {company_id: deptid},
//         dataType: 'json',
//         success: function (response) {
//             console.log('response getStructureInsert=', response)
//             if (response) {
//                 fillSelect(response.structures, '')
//                 // stlevel()
//             }
//         }
//     });
// });
$("#employment_contract_indefinite").change(function () {
    var thisid = $(this).val();
    console.log("thisid=" + thisid);
    if(thisid=='2'){
        $(".reasons").css('display','flex')
    }else{
        $(".reasons").css('display','none')

    }

});
$("#update_employment_contract_indefinite").change(function () {
    var thisid = $(this).val();
    console.log("thisid=" + thisid);
    if(thisid=='2'){
        $(".reasons").css('display','flex')
    }else{
        $(".reasons").css('display','none')

    }

});
function diff(a1, a2) {
    return a1.concat(a2).filter(function (val, index, arr) {
        return arr.indexOf(val) === arr.lastIndexOf(val);
    });
}

// $(".update_company_id").change(function () {
//     var deptid = $(this).val();
//     //console.log("deptid=" + deptid);
//     $.ajax({
//         url: 'employees/getEmployee.php',
//         type: 'post',
//         data: {company_id: deptid},
//         dataType: 'json',
//         success: function (response) {
//             //console.log('response=', response)
//             $("#employee").empty();
//             var option = '<select data-live-search="true"  name="update_emplo" id="update_employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
//             option += '<option value="">Seçin..</option>';
//             $.each(response, function (k, v) {
//                 //console.log('v=', v[1])
//                 option += '<option value="' + v[0] + '" >' + v[1] + '</option>';
//             });
//             option += '</select>';
//             $(".update_emp").html(option);
//             $(".selectpicker").selectpicker();
//
//         }
//     });
// });

function fillSelect(structures, stLevelid) {
    console.log('------------------------ structures=' ,structures)
    //console.log('fillSelect structures=', structures)
    var option_directorate = '<option value="">Seçin..</option>';
    var option_department = '<option value="">Seçin..</option>';
    var option_depart = '<option value="">Seçin..</option>';
    var option_area_section = '<option value="">Seçin..</option>';
    var option_position = '<option value="">Seçin..</option>';
    var option_direct_guide = '<option value="">Seçin..</option>';
    var option_second_leader = '<option value="">Seçin..</option>';
    var posArray=[]
    $.each(structures, function (k, v) {
        if (v.structure_level === '0') {
            if(jQuery.inArray( v.category, posArray)==-1){
                option_position += '<option   value="' + v.category + '" data-stLevel="5">' + v.category + '</option>';
                posArray.push(v.category);
            }
            console.log('posArray=',posArray)
        }

        if (v.structure_level === '2') {
            option_directorate += '<option   value="' + v.id + '" data-stLevel="' + v.structure_level + '">' + v.category + '</option>';
        }
        if (v.structure_level === '3') {
            option_department += '<option value="' + v.id + '"  data-stLevel="' + v.structure_level + '">' + v.category + '</option>';
        }
        if (v.structure_level === '4') {
            option_depart += '<option value="' + v.id + '"  data-stLevel="' + v.structure_level + '">' + v.category + '</option>';
        }
        if (v.structure_level === '5') {
            option_area_section += '<option value="' + v.id + '"  data-stLevel="' + v.structure_level + '">' + v.category + '</option>';
        }
        if (v.position_level === '2') {
            option_direct_guide += '<option value="' + v.id + '"  data-stLevel="' + v.position_level + '">' + v.category + '</option>';
        }
        if (v.position_level === '2') {
            option_second_leader += '<option value="' + v.id + '"  data-stLevel="' + v.position_level + '">' + v.category + '</option>';
        }
    });
    //console.log('option_direct_guide' + option_direct_guide)
    //console.log('option_second_leader' + option_second_leader)
    if (stLevelid === '') {

        //console.log('stLevelid =bos isledi')
        $('.up_directorate').find('select').html(option_directorate);
        $('.up_department').find('select').html(option_department);
        $('.up_depart').find('select').html(option_depart);
        $('.up_area_section').find('select').html(option_area_section);
        $('.up_position').find('select').html(option_position);
        $('.up_direct_guide').find('select').html(option_direct_guide);
        $('.up_second_leader').find('select').html(option_second_leader);
    } else if (stLevelid === '2') {
        //console.log('stLevelid =2 isledi')
        $('.up_department').find('select').html(option_department);
        $('.up_depart').find('select').html(option_depart);
        $('.up_area_section').find('select').html(option_area_section);
        $('.up_position').find('select').html(option_position);
        $('.up_direct_guide').find('select').html(option_direct_guide);
        $('.up_second_leader').find('select').html(option_second_leader);
    } else if (stLevelid === '3') {
        //console.log('stLevelid =3 isledi')
        $('.up_depart').find('select').html(option_depart);
        $('.up_area_section').find('select').html(option_area_section);
        $('.up_position').find('select').html(option_position);
        $('.up_direct_guide').find('select').html(option_direct_guide);
        $('.up_second_leader').find('select').html(option_second_leader);
    } else if (stLevelid === '4') {
        //console.log('stLevelid =4 isledi')
        $('.up_area_section').find('select').html(option_area_section);
        $('.up_position').find('select').html(option_position);
        $('.up_direct_guide').find('select').html(option_direct_guide);
        $('.up_second_leader').find('select').html(option_second_leader);
    }else if (stLevelid === '5') {
        //console.log('stLevelid =4 isledi')
        // $('.up_area_section').find('select').html(option_area_section);
        $('.up_position').find('select').html(option_position);
        $('.up_direct_guide').find('select').html(option_direct_guide);
        $('.up_second_leader').find('select').html(option_second_leader);
    } else {
        //console.log('stLevelid =5 isledi=' + $('.up_area_section').find('select').html())
    }


    $('.selectpicker').selectpicker('refresh');
    // stlevel()

}

$(".stlevel").change(function () {

    var stid = $(this).val();
    var stLevelid = $(this).find('option:selected').attr('data-stLevel');
    console.log("stid=" + $(this).html() + "=" + stid);
    if (stid != '' && stLevelid != '5') {
        $.ajax({
            url: 'workplace_info/getStructure.php',
            type: 'post',
            async: false,
            data: {stid: stid},
            dataType: 'json',
            success: function (response) {
               console.log('stlevel response=', response)
                if (response) {
                    // //console.log('fillSelect stlevel optype='+optype)
                    fillSelect(response.structures, stLevelid)
                }
            }
        });
    }

});
$("#type_dismissal").change(function () {
    var type_dismissal_id = $(this).val();
    //console.log("type_dismissal_id=" + type_dismissal_id);
    $.ajax({
        url: 'employees/getTerminationClause.php',
        type: 'post',
        data: {type_dismissal_id: type_dismissal_id},
         dataType: 'json',
        success: function (response) {
            //console.log('response=', response)
            $(".termination_clause").empty();
            var option = '<select data-live-search="true"  name="termination_clause" id="termination_clause"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
             $.each(response, function (k, v) {
                //console.log('v=', v[1]);
                option += '<option value="' + v.level_id + '" >' + v.title + '</option>';
            });
            option += '</select>';
            $(".termination_clause").html(option);
            $(".selectpicker").selectpicker();

            $("#termination_clause").change(function () {
                var termination_id = $(this).val();
                //console.log("termination_id=" + termination_id);
                $.ajax({
                    url: 'employees/getNotes.php',
                    type: 'post',
                    data: {termination_id: termination_id},
                    dataType: 'json',
                    success: function (data) {
                        //console.log('data=', data)
                        $(".note").empty();
                         var options = '<select data-width="100%" data-live-search="true" style="min-width:500px;"  name="notes" id="notes"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';

                        $.each(data, function (key, val) {
                            options += '<option value="' + val.level_id + '" >' + val.title + '</option>';
                        });
                        // options += '</select></div>';
                        options += '</select>';
                        //console.log('options='+options)
                        $(".note").html(options);
                        $('.selectpicker').selectpicker();
                        $("#notes").change(function () {
                            var notes_id = $(this).val();
                            //console.log("notes_id=" + notes_id);
                            if(notes_id=='6' && termination_id=='1'){
                                $('#main').val("Əmək müqaviləsi");
                            }else
                            if(termination_id=='2'){
                                $('#main').val("İşçinin ərizəsi");
                            }else
                            if(termination_id=='4'){
                                $('#main').val("Əmək müqaviləsi");
                            }else
                            if(notes_id=='1' && termination_id=='9'){
                                $('#main').val("Çağırış vərəqəsi");
                            }else
                            if(notes_id=='6' && termination_id=='9'){
                                $('#main').val("Ölüm haqqında şəhadətnamə");
                            }else
                            if(termination_id=='10'||termination_id=='11'){
                                $('#main').val("Əmək müqaviləsi");
                            }else
                                {
                                $('#main').val('');
                            }


                        });
                    }
                });

            });
        }
    });

});

$('.work_experience_year').on('change', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_year=parseInt($('#work_experience_before_enterprise_year').val())
    var work_experience_enterprise_year=parseInt($('#work_experience_enterprise_year').val())
    $('#general_work_experience_year').val(work_experience_before_enterprise_year+work_experience_enterprise_year)
});

$('.work_experience_month').on('change', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_month=parseInt($('#work_experience_before_enterprise_month').val())
    var work_experience_enterprise_month=parseInt($('#work_experience_enterprise_month').val())

    var work_experience_before_enterprise_day=parseInt($('#work_experience_before_enterprise_day').val())
    var work_experience_enterprise_day=parseInt($('#work_experience_enterprise_day').val())
    var general_work_experience_day=work_experience_before_enterprise_day+work_experience_enterprise_day
    var  divisor = Math.floor(general_work_experience_day / 31);
    var general_work_experience_month=divisor+work_experience_before_enterprise_month+work_experience_enterprise_month

    // $('#general_work_experience_month').val(general_work_experience_month)
    var work_experience_before_enterprise_year=parseInt($('#work_experience_before_enterprise_year').val())
    var work_experience_enterprise_year=parseInt($('#work_experience_enterprise_year').val())
    var  divisorMonth = Math.floor(general_work_experience_month / 12);
    var  remainderMonth =general_work_experience_day % 12;
    if(divisorMonth>=1){
        var month =(divisorMonth*general_work_experience_month) % 12;
        console.log('month='+month)
        $('#general_work_experience_year').val(divisorMonth+work_experience_before_enterprise_year+work_experience_enterprise_year);
        $('#general_work_experience_month').val(month)
    }else{
        $('#general_work_experience_month').val(remainderMonth)
    }

});
function divDay(work_experience_before_enterprise_day,work_experience_enterprise_day){
    var general_work_experience_day=work_experience_before_enterprise_day+work_experience_enterprise_day

    var  divisor = Math.floor(general_work_experience_day / 31);
    var  remainder =general_work_experience_day % 31;
    if(divisor>=1) {
        var day = (divisor * general_work_experience_day) % 31;
    }else{
        var day =remainder;
    }
}

$('.work_experience_day').on('change', function() {
    var work_experience_before_enterprise_month=parseInt($('#work_experience_before_enterprise_month').val())
    var work_experience_enterprise_month=parseInt($('#work_experience_enterprise_month').val())

    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_day=parseInt($('#work_experience_before_enterprise_day').val())
    var work_experience_enterprise_day=parseInt($('#work_experience_enterprise_day').val())

    var general_work_experience_day=work_experience_before_enterprise_day+work_experience_enterprise_day
    var  divisor = Math.floor(general_work_experience_day / 31);
    var  remainder =general_work_experience_day % 31;
   console.log('divisor='+divisor)
    console.log('remainder='+remainder)
    if(divisor>=1){
        var day =(divisor*general_work_experience_day) % 31;
        console.log('day='+day)
        $('#general_work_experience_month').val(divisor+work_experience_before_enterprise_month+work_experience_enterprise_month);
        $('#general_work_experience_day').val(day)
    }else{
        $('#general_work_experience_day').val(remainder)
    }

});

$('.work_experience_year').on('keyup', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_year=parseInt($('#work_experience_before_enterprise_year').val())
    var work_experience_enterprise_year=parseInt($('#work_experience_enterprise_year').val())
    $('#general_work_experience_year').val(work_experience_before_enterprise_year+work_experience_enterprise_year)
});

$('.work_experience_month').on('keyup', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_month=parseInt($('#work_experience_before_enterprise_month').val())
    var work_experience_enterprise_month=parseInt($('#work_experience_enterprise_month').val())
    $('#general_work_experience_month').val(work_experience_before_enterprise_month+work_experience_enterprise_month)
});

$('.work_experience_day').on('keyup', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_day=parseInt($('#work_experience_before_enterprise_day').val())
    var work_experience_enterprise_day=parseInt($('#work_experience_enterprise_day').val())
    $('#general_work_experience_day').val(work_experience_before_enterprise_day+work_experience_enterprise_day)
});


$('.update_work_experience_enterprise_year').on('change', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_year=parseInt($('#update_work_experience_before_enterprise_year').val())
    var work_experience_enterprise_year=parseInt($('#update_work_experience_enterprise_year').val())
    $('#update_general_work_experience_year').val(work_experience_before_enterprise_year+work_experience_enterprise_year)
});

$('.update_work_experience_enterprise_month').on('change', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_month=parseInt($('#update_work_experience_before_enterprise_month').val())
    var work_experience_enterprise_month=parseInt($('#update_work_experience_enterprise_month').val())
    $('#update_general_work_experience_month').val(work_experience_before_enterprise_month+work_experience_enterprise_month)
});

$('.update_work_experience_enterprise_day').on('change', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_day=parseInt($('#update_work_experience_before_enterprise_day').val())
    var work_experience_enterprise_day=parseInt($('#update_work_experience_enterprise_day').val())
    $('#update_general_work_experience_day').val(work_experience_before_enterprise_day+work_experience_enterprise_day)
});

$('.update_work_experience_before_enterprise_year').on('keyup', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_year=parseInt($('#update_work_experience_before_enterprise_year').val())
    var work_experience_enterprise_year=parseInt($('#update_work_experience_enterprise_year').val())
    $('#update_general_work_experience_year').val(work_experience_before_enterprise_year+work_experience_enterprise_year)
});

$('.update_work_experience_enterprise_month').on('keyup', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_month=parseInt($('#update_work_experience_before_enterprise_month').val())
    var work_experience_enterprise_month=parseInt($('#update_work_experience_enterprise_month').val())
    $('#update_general_work_experience_month').val(work_experience_before_enterprise_month+work_experience_enterprise_month)
});

$('.update_work_experience_enterprise_day').on('keyup', function() {
    console.log('change='+$(this).attr('name'));
    var work_experience_before_enterprise_day=parseInt($('#update_work_experience_before_enterprise_day').val())
    var work_experience_enterprise_day=parseInt($('#update_work_experience_enterprise_day').val())
    $('#update_general_work_experience_day').val(work_experience_before_enterprise_day+work_experience_enterprise_day)
});
