 

$(function () {

$('#nav-tabs').on('shown.bs.tab', 'a', function (e) {
    if (e.relatedTarget) {
        $(e.relatedTarget).removeClass('active');
    }
})

 /* EMPLOYEE  İNSERT FORM  VALIDATE */	  
 			$( "#employeeInsert" ).validate( {
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
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );
			
/*EMPLOYEE  UPDATE VALİDATE*/
  			$( "#employeeUpdate" ).validate( {
				
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
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );
	
	
/* EMPLOYEE  TABLE LOAD  */
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
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "employees/get_employees.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": " <img  id='view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
			"<img  id='delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [
				{
					 text: 'Add New <i class="fa fa-plus"></i>',
					 action: function ( e, dt, node, config ) {
					 $("#myModal").modal();
						 $('#imgAdd').html($('#uploadDiv').html())
						 $('#imgUpdate').html('')
						 addImage();
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
                    }  ,'copy','print',
                    'colvis'
                ],
				
			 "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });

  /*Button  click  on grid */
	$('#employee_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("empid").value = data[0];
		$('#modalDelete').modal('show');
    } );
	
  $('#employee_table tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		GetEmpDetails(data[0],'update');
		document.getElementById("update_empid").value = data[0];
		 
    } );
 
$('#employee_table tbody').on( 'click', '#view', function () {
	console.log('$row_employees[\'image_name\']')
        var data = table.row( $(this).parents('tr') ).data();
		GetEmpDetails(data[0],'view');
		document.getElementById("update_empid").value = data[0];
		 
    } );
	

 	/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
	 function GetEmpDetails(empid,optype) 
	 {
			$.post("employees/getEmployeeDetail.php", 
				{
					empid: empid
				},
				function (emp_data, status) 
				{
					// PARSE json data
					var employee = JSON.parse(emp_data);
					// Assing existing values to the modal popup fields
					console.log('employee=',employee)
					
					if  (optype=='update') {
						console.log('sss='+$('#uploadDiv').html())
						$('#imgUpdate').html($('#uploadDiv').html())
						$('#imgAdd').html('')
						$('#imgView').html('')
						addImage();
						console.log('employee.image_name='+employee.image_name)
						if(employee.image_name){
							$("#default").css('display','none')

							$("#targetLayer").html('<img class="profile-user-img img-fluid img-circle image-preview"  class="upload-preview"\n' +
								'                 src="'+employee.image_name+'"\n' +
								'                 alt="User profile picture">\n' +
								'            <input type="hidden" name="imgName" value="'+employee.image_name+'">');
						}else{
							$("#default").css('display','block');
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
					$("#update_citizenship").val(employee.citizenship);
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
					}
					else {
						 window.location.href='profile.php?empid='+empid;

					}
				}
			);

}
 
 /*ISCHI MELUMATLARI  DAXIL  EDILIR  */
		$("#employeeInsert").submit(function(e)
		{
                    e.preventDefault();
					if($("#employeeInsert").valid())
					{
                    $.ajax( {
                        url: "employees/employeeInsert.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if (strMessage.substr(1, 4)==='error')
								 {
									  
									 
									 $("#errorp").text(strMessage);
		
							 $("#modalInsertError").modal('show');
									 $("#myModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Melumat muveffeqiyyetle daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#myModal").modal('hide');
							
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#myModal").modal('hide');
									 
								 }
						}
                    });
				    table.ajax.reload();
				//	$( "#employeeInsert" ).get(0).reset();
			}
         table.ajax.reload();
        });
				
/*İSCHİ  MELUMATALRİ SİLİNİR */				
	$("#employeeDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "employees/employeeDelete.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 table.ajax.reload();
							 }
							 else  {
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 table.ajax.reload();	
                });
				
				
	/*İSCHİ MEULMATALRİNİN  YENİLENMESİ */			
	$("#employeeUpdate").submit(function(e)
	{
        e.preventDefault();
		if($("#employeeUpdate").valid())
		{ 
		
            $.ajax( {
                url: "employees/employeeUpdate.php",
                method: "post",
                data: $("#employeeUpdate").serialize(),
                dataType: "text",
                success: function(strMessage) 
				{
					console.log(strMessage);
					$("#badge_danger_update").text("");
					 if (strMessage.substr(1, 4)==='error')
					 {
						console.log(strMessage);
					 }
					 else if (strMessage==='success')
					 { 
						 $('#modalEdit').modal('hide');
						$('#modalUpdateSuccess').modal('show');
						 table.ajax.reload();
					 }
					 else if (strMessage==='duplicate')
					 {
						 
						$("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");
						
					 }
					 else  {
						$("#badge_danger_update").text(strMessage);
					 }
				}
            });
			table.ajax.reload();	
		}
		else {
				 alert('Form not valid') ;
			 }
     });









			
/*
**********************************************************************************************************************
************************************** TƏHSİL MƏLUMATLARI ************************************************************
**********************************************************************************************************************
*/	


var eduinfo_table ;
var  tabtext =$('#qual').text();
    $('#eduinfotab').click(function() {

	$('#qual').text( tabtext+' / '+$('#eduinfotab').text());	
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
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "education/get_education.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": " <img  id='edu_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
			"<img  id='edu_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='edu_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [
					{
						
                   text: 'Add New <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
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
                    }  ,'copy','print',
                    'colvis',
					
                ],
				
			 "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });
	  

    });	
	
	/*TEHSİL  VALİDATE */
	
	
 /* TEHSİL  İNSERT FORM  VALIDATE */	  
 			$( "#educationInsertForm" ).validate( {
				rules: { eduempid: "required" 	},
				messages: { eduempid: "İşçini mütləq seçməlisiniz! " },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );
			
/********************* TEHSİL  İNSERT ***************************/
 
		$("#educationInsertForm").submit(function(e)
		{
			console.log('AAAAAA');
                    e.preventDefault();
					if($("#educationInsertForm").valid())
			{ 
                    $.ajax( {
                        url: "education/educationInsert.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
							console.log(strMessage);
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if (strMessage.substr(1, 4)==='error')
								 {
									  
									 
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#educationInsert").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Melumat muveffeqiyyetle daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#educationInsert").modal('hide');
							
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#educationInsert").modal('hide');
									 
								 }
						}
                    });
				    eduinfo_table.ajax.reload();
					$( "#educationInsertForm" ).get(0).reset();
			}
			eduinfo_table.ajax.reload();
        });
		
		
		
	
	
	
 
 /*TEHSİL MELUMATALRİ SİLİNİR */				
	$("#educationDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "education/educationDelete.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalEduDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 eduinfo_table.ajax.reload();
							 }
							 else  {
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 eduinfo_table.ajax.reload();	
                });
				

	

/*Get Education  */
 function GetEduDetails(eduid,optype) 
	 {
			$.post("education/getEducationDetail.php", 
				{
					eduid: eduid
				},
				function (edu_data, status) 
				{
					// PARSE json data
					var edudata = JSON.parse(edu_data);

					if  (optype=='update') {
						console.log('update tikla');
 
					$('#update_eduempid').val(edudata.empid).change();
					$('#update_qualification').val(edudata.qid).change();
					$('#update_institution_id').val(edudata.uni_id).change();
					$("#update_faculty").val(edudata.faculty);
					$("#update_profession").val(edudata.profession);
					$("#update_diplom_issue_date").val(edudata.diplom_issue_date);
					$("#update_uni_end_date").val(edudata.end_date);
					$("#update_diplom_seria_num").val(edudata.diplom_seria_num);
					$('#modalEditEducation').modal('show');
					}
					else {
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
$("#educationUpdate").submit(function(e)
	{
        e.preventDefault();
		/*if($("#educationUpdate").valid())
		{ */
		
            $.ajax( {
                url: "education/educationUpdate.php",
                method: "post",
                data: $("#educationUpdate").serialize(),
                dataType: "text",
                success: function(strMessage) 
				{
					console.log(strMessage);
					$("#badge_danger_update").text("");
					 if (strMessage.substr(1, 4)==='error')
					 {
						console.log(strMessage);
					 }
					 else if (strMessage==='success')
					 { 
						 $('#modalEditEducation').modal('hide');
						$('#modalUpdateSuccess').modal('show');
						 eduinfo_table.ajax.reload();
					 }
					 else if (strMessage==='duplicate')
					 {
						 
						$("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");
						
					 }
					 else  {
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
	$('#eduinfo_table').on( 'click', '#edu_view', function () 
	{ 

        var data = eduinfo_table.row( $(this).parents('tr') ).data();
		GetEduDetails(data[0],'view');
		document.getElementById("update_eduid").value = data[0];
        console.log('Tiklandi');
    } );	

 /*Edu info  table edit click  */
	$('#eduinfo_table').on( 'click', '#edu_edit', function () 
	{ 
        var data = eduinfo_table.row( $(this).parents('tr') ).data();
		GetEduDetails(data[0],'update');
		document.getElementById("update_eduid").value = data[0];
        console.log('Tiklandi');
    } );
					
				
 /*Edu info  table delete click  */
	$('#eduinfo_table').on( 'click', '#edu_delete', function () 
	{
        var data = eduinfo_table.row( $(this).parents('tr') ).data();
		 document.getElementById("eduid").value = data[0];
		$('#modalEduDelete').modal('show');
    } );

	
/*
**********************************************************************************************************************
************************************** TƏLIM TƏDRİS  SERTİFAK MƏLUMATLARI ************************************************************
**********************************************************************************************************************
*/	 
var cert_table ;
    $('#certtab').click(function() {
	$('#qual').text( tabtext+' / '+$('#certtab').text());		
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
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "certification/get_certification.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": " <img  id='cert_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
			"<img  id='cert_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='cert_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [
					{
						
                   text: 'Add New <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
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
                    }  ,'copy','print',
                    'colvis',
					
                ],
				
			 "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });
	  

    });	
	

	
	

 /*CERTIFIKAT MELUMATALRİ SİLİNİR */				
	$("#certificationDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "certification/certificationDelete.php",
                        method: "post",
                        data: $("#certificationDelete").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalCertDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 cert_table.ajax.reload();
							 }
							 else  {
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 cert_table.ajax.reload();	
                });
				
 /* CERTIFICATION  İNSERT FORM  VALIDATE */	  
 			$( "#certificationInsertForm" ).validate( {
				rules: { certempid: "required" 	},
				messages: { certempid: "İşçini mütləq seçməlisiniz! " },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );
	/********************* CERTIFICATION  İNSERT ***************************/
 
		$("#certificationInsertForm").submit(function(e)
		{
                    e.preventDefault();
					if($("#certificationInsertForm").valid())
			{ 
                    $.ajax( {
                        url: "certification/certificationInsert.php",
                        method: "post",
                        data: $("#certificationInsertForm").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
							console.log(strMessage);
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if (strMessage.substr(1, 4)==='error')
								 {
									  
									 
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#certificationModalInsert").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Melumat muveffeqiyyetle daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#certificationModalInsert").modal('hide');
							
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#certificationModalInsert").modal('hide');
									 
								 }
						}
                    });
				    cert_table.ajax.reload();
					$( "#educationInsertForm" ).get(0).reset();
			}
        });
/*Cert table view click  */
	$('#cert_table').on( 'click', '#cert_view', function () 
	{ 
        var data = cert_table.row( $(this).parents('tr') ).data();
		GetCertDetails(data[0],'view');
        console.log('TiklandiCert');
    } );	
	
 /*Cert  table edit click  */
	$('#cert_table').on( 'click', '#cert_edit', function () 
	{ 
        var data = cert_table.row( $(this).parents('tr') ).data();
		GetCertDetails(data[0],'update');
		document.getElementById("update_certid").value = data[0];
        console.log('updateTiklandi');
    } );

  /*cert table delete click*/
	$('#cert_table').on( 'click', '#cert_delete', function () 
	{
        var data = cert_table.row( $(this).parents('tr') ).data();
	//	alert('Certificate click ');
		 document.getElementById("certid").value = data[0];
		$('#modalCertDelete').modal('show');
    } );
	
	
/*GetCertDetails  */
 function GetCertDetails(certid,optype) 
	 {
			$.post("certification/getCertificationDetail.php", 
				{
					certid: certid
				},
				function (cert_data, status) 
				{
					// PARSE json data
					var certdata = JSON.parse(cert_data);

					if  (optype=='update') {
						console.log('update tikla');
 
					$("#update_certempid").val(certdata.empid).change();
				 	$("#update_training_center").val(certdata.training_center_name);
					$("#update_training_name").val(certdata.training_name);
					$("#update_training_date").val(certdata.training_date);
					$("#update_cert_given_date").val(certdata.cert_given_date);
					$('#modalEditCertification').modal('show');
					}
					else {
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
$("#certificationUpdate").submit(function(e)
	{
        e.preventDefault();
		/*if($("#educationUpdate").valid())
		{ */
		
            $.ajax( {
                url: "certification/certificationUpdate.php",
                method: "post",
                data: $("#certificationUpdate").serialize(),
                dataType: "text",
                success: function(strMessage) 
				{
					console.log(strMessage);
					$("#badge_danger_update").text("");
					 if (strMessage.substr(1, 4)==='error')
					 {
						console.log(strMessage);
					 }
					 else if (strMessage==='success')
					 { 
						 $('#modalEditCertification').modal('hide');
						$('#modalUpdateSuccess').modal('show');
						 cert_table.ajax.reload();
					 }
					 else if (strMessage==='duplicate')
					 {
						 
						$("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");
						
					 }
					 else  {
						$("#badge_danger_update").text(strMessage);
					 }
				}
            });
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
var skills_table ;
    $('#skillstab').click(function() {
	$('#qual').text( tabtext+' / '+$('#skillstab').text());
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
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "skills/get_skills.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": " <img  id='skill_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
			"<img  id='skill_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='skill_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [
					{
						
                   text: 'Add New <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
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
                    }  ,'copy','print',
                    'colvis',
					
                ],
				
			 "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]

        });
	  

    });	
	
	
	$("#skillsInsertForm").submit(function(e)
		{
                    e.preventDefault();
				/*	if($("#skillsInsertForm").valid())
			{ */
                    $.ajax( {
                        url: "skills/skillsInsert.php",
                        method: "post",
                        data: $("#skillsInsertForm").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
							console.log(strMessage);
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if (strMessage.substr(1, 4)==='error')
								 {
									  
									 
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#skillsInsertModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#skillsInsertModal").modal('hide');
							
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#skillsInsertModal").modal('hide');
									 
								 }
						}
                    });
				    skills_table.ajax.reload();
					$( "#skillsInsertForm" ).get(0).reset();
			/*}*/
        });

	 /*BACARIQ MELUMATALRİ SİLİNİR */				
	$("#skillDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "skills/skillsDelete.php",
                        method: "post",
                        data: $("#skillDelete").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalSkillDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 skills_table.ajax.reload();
							 }
							 else  {
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 skills_table.ajax.reload();	


                });

/*Skills Update */
$("#skillsUpdate").submit(function(e)
	{
        e.preventDefault();
		/*if($("#educationUpdate").valid())
		{ */
		
            $.ajax( {
                url: "skills/skillsUpdate.php",
                method: "post",
                data: $("#skillsUpdate").serialize(),
                dataType: "text",
                success: function(strMessage) 
				{
					console.log(strMessage);
					$("#badge_danger_update").text("");
					 if (strMessage.substr(1, 4)==='error')
					 {
						console.log(strMessage);
					 }
					 else if (strMessage==='success')
					 { 
						 $('#modalEditSkills').modal('hide');
						$('#modalUpdateSuccess').modal('show');
						 skills_table.ajax.reload();
					 }

					 else  {
						$("#badge_danger_update").text(strMessage);
					 }
				}
            });
			skills_table.ajax.reload();	
		/*}
		else {
				 alert('not valid') ;
			 }*/
     });

/*GetSkillDetails  */
 function GetSkillDetails(skillid,optype) 
	 {
			$.post("skills/getSkillDetail.php", 
				{
					skillid: skillid
				},
				function (skill_data, status) 
				{
					// PARSE json data
					var skilldata = JSON.parse(skill_data);

					if  (optype=='update') {
						console.log('update tikla');
                     
					$("#update_skillempid").val(skilldata.empid).change();
				 	$("#update_skill_name").val(skilldata.skill_name);
					$("#update_skill_descr").val(skilldata.skill_descr);
					$('#modalEditSkills').modal('show');
					}
					else {
					$("#view_skillemp").val(skilldata.full_name);
					$("#view_skill_name").val(skilldata.skill_name);
					$("#view_skill_descr").val(skilldata.skill_descr);
					$('#modalViewSkills').modal('show');						
					}
				}
			);

}	




/*Skills table view click  */
	$('#skills_table').on( 'click', '#skill_view', function () 
	{ 
        var data = skills_table.row( $(this).parents('tr') ).data();
		GetSkillDetails(data[0],'view');
        console.log(data[0]);
    } );	

	$('#skills_table').on( 'click', '#skill_edit', function () 
	{ 
        var data = skills_table.row( $(this).parents('tr') ).data();
		document.getElementById("update_skillid").value = data[0];
		GetSkillDetails(data[0],'update');
        console.log(data[0]);
    } );	



  /*skils table delete click*/
	$('#skills_table').on( 'click', '#skill_delete', function () 
	{
        var data = skills_table.row( $(this).parents('tr') ).data();
	    document.getElementById("skillid").value = data[0];
		$('#modalSkillDelete').modal('show');
    } );
	



	
/*
**********************************************************************************************************************
************************************** DIL BILIKLERI ************************************************************
**********************************************************************************************************************
*/	 
var lang_knowledge_table ;
    $('#langtab').click(function() {		
	$('#qual').text( tabtext+' / '+$('#langtab').text());
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
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "emp_lang/get_lang.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": " <img  id='lang_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
			"<img  id='lang_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='lang_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [
					{
						
                   text: 'Add New <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
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
                    }  ,'copy','print',
                    'colvis',
					
                ],
				
			 "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });
	  

    });	

	 /*DIL MELUMATALRİ SİLİNİR */				
	$("#langDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "emp_lang/langDelete.php",
                        method: "post",
                        data: $("#langDelete").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							console.log(strMessage);
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalLangDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 lang_knowledge_table.ajax.reload();
							 }
							 else  {
								 console.log(strMessage);
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 lang_knowledge_table.ajax.reload();	


                });

	$("#langInsertForm").submit(function(e)
		{
                    e.preventDefault();
				/*	if($("#langInsertForm").valid())
			{ */
                    $.ajax( {
                        url: "emp_lang/langInsert.php",
                        method: "post",
                        data: $("#langInsertForm").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
							console.log(strMessage);
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if (strMessage.substr(1, 4)==='error')
								 {
									  
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#langInsertModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#langInsertModal").modal('hide');
							
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#langInsertModal").modal('hide');
									 
								 }
						}
                    });
				    lang_knowledge_table.ajax.reload();
					$( "#langInsertForm" ).get(0).reset();
			/*}*/
        });
		
		
/*GetLangDetails  */
 function GetLangDetails(langid,optype) 
	 {
			$.post("emp_lang/getLangDetail.php",
				{
					langid: langid
				},
				function (lang_data, status) 
				{
					// PARSE json data
					var langdata = JSON.parse(lang_data);

					if  (optype=='update') {
						console.log('update tikla');
                     
					$("#update_langempid").val(langdata.empid).change();
				 	$("#update_reading").val(langdata.rid).change();
					$("#update_writing").val(langdata.wid).change();
					$("#update_speaking").val(langdata.sid).change();
					$("#update_understanding").val(langdata.uid).change();
					$("#update_language").val(langdata.langid).change();
					$('#modalEditLang').modal('show');
					}
					else {
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
$("#langUpdate").submit(function(e)
	{
        e.preventDefault();
		/*if($("#educationUpdate").valid())
		{ */
		
            $.ajax( {
                url: "emp_lang/langUpdate.php",
                method: "post",
                data: $("#langUpdate").serialize(),
                dataType: "text",
                success: function(strMessage) 
				{
					console.log(strMessage);
					$("#badge_danger_update").text("");
					 if (strMessage.substr(1, 4)==='error')
					 {
						console.log(strMessage);
					 }
					 else if (strMessage==='success')
					 { 
						 $('#modalEditLang').modal('hide');
						$('#modalUpdateSuccess').modal('show');
						 lang_knowledge_table.ajax.reload();
					 }

					 else  {
						$("#badge_danger_update").text(strMessage);
					 }
				}
            });
			lang_knowledge_table.ajax.reload();	
		/*}
		else {
				 alert('not valid') ;
			 }*/
     });

	  /*lang table delete click*/
	$('#lang_knowledge_table').on( 'click', '#lang_delete', function () 
	{
        var data = lang_knowledge_table.row( $(this).parents('tr') ).data();
		document.getElementById("langid").value = data[0];
		$('#modalLangDelete').modal('show');
    } );
	
	/*lang table view click  */
	$('#lang_knowledge_table').on( 'click', '#lang_view', function () 
	{ 
        var data = lang_knowledge_table.row( $(this).parents('tr') ).data();
		GetLangDetails(data[0],'view');
        console.log(data[0]);
    } );
		/*lang table view click  */
	$('#lang_knowledge_table').on( 'click', '#lang_edit', function () 
	{ 
        var data = lang_knowledge_table.row( $(this).parents('tr') ).data();
		GetLangDetails(data[0],'update');
		document.getElementById("update_langid").value = data[0];
        console.log(data[0]);
    } );
	

/*
**********************************************************************************************************************
************************************** AILE INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/	 

var faminfo_table ;
    $('#aileinfotab').click(function() {	
	console.log('Tab clikc');	
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
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "family_info/get_familyInfo.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": "<img  id='faminfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
			"<img  id='faminfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img  id='faminfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [
					{
						
                   text: 'Add New <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
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
                    }  ,'copy','print',
                    'colvis',
					
                ],
				
			 "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });
	  

    });	
	
		$("#familyInsertForm").submit(function(e)
		{
                    e.preventDefault();
				/*	if($("#langInsertForm").valid())
			{ */
                    $.ajax( {
                        url: "family_info/familyInfoInsert.php",
                        method: "post",
                        data: $("#familyInsertForm").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
							console.log(strMessage);
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if (strMessage.substr(1, 4)==='error')
								 {
									  
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#famInfoInsertModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#famInfoInsertModal").modal('hide');
							
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#famInfoInsertModal").modal('hide');
									 
								 }
						}
                    });
				    faminfo_table.ajax.reload();
					$( "#familyInsertForm" ).get(0).reset();
			/*}*/
        });
		
		
	/*AILE MELUMATALRİ SİLİNİR */				
	$("#famInfoDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "family_info/familyInfoDelete.php",
                        method: "post",
                        data: $("#famInfoDelete").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							console.log(strMessage);
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalFamInfoDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 faminfo_table.ajax.reload();
							 }
							 else  {
								 console.log(strMessage);
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 faminfo_table.ajax.reload();	


                });


/*Familiy Update */
$("#familiyInfoUpdate").submit(function(e)
	{
        e.preventDefault();
		/*if($("#educationUpdate").valid())
		{ */
		
            $.ajax( {
                url: "family_info/familyInfoUpdate.php",
                method: "post",
                data: $("#familiyInfoUpdate").serialize(),
                dataType: "text",
                success: function(strMessage) 
				{
					console.log(strMessage);
					$("#badge_danger_update").text("");
					 if (strMessage.substr(1, 4)==='error')
					 {
						console.log(strMessage);
					 }
					 else if (strMessage==='success')
					 { 
						$('#famInfoEditModal').modal('hide');
						$('#modalUpdateSuccess').modal('show');
						faminfo_table.ajax.reload();
					 }

					 else  {
						$("#badge_danger_update").text(strMessage);
					 }
				}
            });
			faminfo_table.ajax.reload();	
		/*}
		else {
				 alert('not valid') ;
			 }*/
     });				
		
/*GetFamilyInfoDetails  */
 function GetFamilyInfoDetails(faminfoid,optype) 
	 {
			$.post("family_info/getFamilyDetail.php",
				{
					faminfoid: faminfoid
				},
				function (faminfo_data, status) 
				{
					// PARSE json data
					var faminfodata = JSON.parse(faminfo_data);

					if  (optype=='update') {
						console.log('update tikla');
                    
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
					}
					else {
						
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
	$('#faminfo_table').on( 'click', '#faminfo_delete', function ()
	{
        var data = faminfo_table.row( $(this).parents('tr') ).data();
		document.getElementById("faminfoid").value = data[0];
		$('#modalFamInfoDelete').modal('show');
    } );
	
	/*Family info view click  */
	$('#faminfo_table').on( 'click', '#faminfo_view', function () 
	{ 
        var data = faminfo_table.row( $(this).parents('tr') ).data();
		GetFamilyInfoDetails(data[0],'view');
        console.log(data[0]);
    } );
	/*Family info view click  */
	$('#faminfo_table').on( 'click', '#faminfo_edit', function () 
	{ 
        var data = faminfo_table.row( $(this).parents('tr') ).data();
		document.getElementById("update_faminfo_id").value = data[0];
		GetFamilyInfoDetails(data[0],'update');
        console.log(data[0]);
    } );



/*
**********************************************************************************************************************
************************************** Herbi INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/
	var military_info_table ;
	$('#militaryInfotab').click(function() {
		console.log('Tab clikc militaryInfotab');
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
					"previous": "<?php echo $dil['previous'] ; ?> " ,
					"next": "<?php echo $dil['next'] ; ?>"
				}
			},
			"ajax": {
				url: "military_info/get_militaryInfo.php",
				type: "POST"
			},"columnDefs": [ {
				"width": "8%",
				"targets": -1,
				"data": null,
				"defaultContent": "<img  id='militaryInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
					"<img  id='militaryInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
					"<img  id='militaryInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
			} ],
			dom: 'lBfrtip',

			buttons: [
				{

					text: 'Add New <i class="fa fa-plus"></i>',
					action: function ( e, dt, node, config ) {
						console.log('militaryInfoInsertModal')

						$("#militaryInfoInsertModal").modal();
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
				}  ,'copy','print',
				'colvis',

			],

			"lengthMenu": [
				[20, 30, 60, -1],
				[10, 20, 50, "All"]
			]

		});

		console.log('Tab clikc oldu',military_info_table);
	});

	/*Herbi MELUMATALRİ SİLİNİR */
	$("#militaryInfoDelete").submit(function(e) {

		e.preventDefault();
		$.ajax( {
			url: "military_info/militaryInfoDelete.php",
			method: "post",
			data: $("#militaryInfoDelete").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				console.log('strMessage='+strMessage);
				if (strMessage.substr(1, 4)==='error')
				{
					console.log(strMessage);
				}
				else if (strMessage==='success')
				{
					$('#modalMilitaryInfoDelete').modal('hide');
					$('#modalDeleteSuccess').modal('show');
					military_info_table.ajax.reload();
				}
				else  {
					console.log(strMessage);
					$("#badge_danger").text(strMessage);
				}
			}
		});
		military_info_table.ajax.reload();


	});

	/*military Info  table delete click*/
	$('#military_info_table').on( 'click', '#militaryInfo_delete', function ()
	{
		var data = military_info_table.row( $(this).parents('tr') ).data();
		console.log('data[0]='+data[0])
		document.getElementById("militaryinfoid").value = data[0];
		$('#modalMilitaryInfoDelete').modal('show');
	} );

	$("#militaryInfoInsertForm").submit(function(e)
	{
		console.log('salam insert')
		e.preventDefault();
		/*	if($("#langInsertForm").valid())
    { */
		$.ajax( {
			url: "military_info/militaryInfoInsert.php",
			method: "post",
			data: $("#militaryInfoInsertForm").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				console.log('strMessage='+$("#militaryInfoInsertForm").serialize());
				console.log('strMessage='+strMessage);
				$("#badge_success").text('');
				$("#badge_danger").text('');
				if (strMessage.substr(1, 4)==='error')
				{

					$("#errorp").text(strMessage);
					$("#modalInsertError").modal('show');
					$("#militaryInfoInsertModal").modal('hide');
				}
				else if (strMessage==='success')
				{
					$("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
					$("#modalInsertSuccess").modal('show');
					$("#militaryInfoInsertModal").modal('hide');

				}
				else  {
					$("#errorp").text(strMessage);
					$("#modalInsertError").modal('show');
					$("#militaryInfoInsertModal").modal('hide');

				}
			}
		});
		military_info_table.ajax.reload();
		$( "#militaryInfoInsertForm" ).get(0).reset();
		/*}*/
	});


	/*GetMilitaryDetails  */
	function GetMilitaryDetails(militaryid,optype)
	{
		console.log('$militaryid='+militaryid)
		$.post("military_info/getMilitaryDetail.php",
			{
				militaryid: militaryid
			},
			function (military_data, status)
			{
				// PARSE json data
				var militarydata = JSON.parse(military_data);
				console.log('militarydata=',militarydata)
				console.log('militarydata.military_specialty_acc='+militarydata.military_specialty_acc)

				if  (optype=='update') {
					console.log('update=')
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
					console.log('modalEditMilitaryInfo ac')
				}
				else {
					console.log('view=')
					var military_reg_category='';
					var military_reg_group='';
					if(militarydata.military_reg_category==1){
						military_reg_category='Kateqoriya 1';
					}else{
						military_reg_category='Kateqoriya 2';
					}
					if(militarydata.military_reg_group==1){
						military_reg_group='Çağırışçı';
					}else{
						military_reg_group='Hərbi vəzifəli';
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
					console.log('modalEditMilitaryInfo ac')
				}
			}
		);

	}

	/*Military Update */
	$("#militaryInfoUpdate").submit(function(e)
	{
		e.preventDefault();
		/*if($("#educationUpdate").valid())
        { */

		$.ajax( {
			url: "military_info/militaryInfoUpdate.php",
			method: "post",
			data: $("#militaryInfoUpdate").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				//console.log('serialize='+$("#militaryInfoUpdate").serialize());
				console.log('strMessage='+strMessage);
				$("#badge_danger_update").text("");
				if (strMessage.substr(1, 4)==='error')
				{
					console.log(strMessage);
				}
				else if (strMessage==='success')
				{
					$('#modalEditMilitaryInfo').modal('hide');
					$('#modalUpdateSuccess').modal('show');
					military_info_table.ajax.reload();
				}

				else  {
					$("#badge_danger_update").text(strMessage);
				}
			}
		});
		military_info_table.ajax.reload();
		/*}
        else {
                 alert('not valid') ;
             }*/
	});

	/*military table delete click*/
	$('#military_info_table').on( 'click', '#militaryInfo_delete', function ()
	{
		var data = military_info_table.row( $(this).parents('tr') ).data();

		document.getElementById("militaryinfoid").value = data[0];

		$('#modalMilitaryInfoDelete').modal('show');
	} );

	/*military table view click  */
	$('#military_info_table').on( 'click', '#militaryInfo_view', function ()
	{
		var data = military_info_table.row( $(this).parents('tr') ).data();
		GetMilitaryDetails(data[0],'view');
		console.log(data[0]);
	} );
	/*military table view click  */
	$('#military_info_table').on( 'click', '#militaryInfo_edit', function ()
	{

		var data = military_info_table.row( $(this).parents('tr') ).data();
		GetMilitaryDetails(data[0],'update');
		document.getElementById("updatemilitaryid").value = data[0];
		console.log(data[0]);
	} );
	/*
    **********************************************************************************************************************
    ************************************** Ödəniş/Maaş INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */

	// var payment_salary_table ;
	// $('#paymentSalarytab').click(function() {
	// 	console.log('Tab clikc paymentSalarytab');
	// 	$('#payment_salary_table').DataTable().clear().destroy();
	// 	payment_salary_table = $("#payment_salary_table").DataTable({
	// 		"scrollX": true,
	// 		"paging": true,
	// 		"lengthChange": false,
	// 		"searching": true,
	// 		"ordering": true,
	// 		"info": true,
	// 		"autoWidth": true,
	// 		"language": {
	// 			"lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
	// 			"zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
	// 			"info": "Showing page _PAGE_ of _PAGES_",
	// 			"infoEmpty": " Heç bir məlumat  tapılmadı",
	// 			"infoFiltered": "(filtered from _MAX_ total records)",
	// 			"paginate": {
	// 				"previous": "<?php echo $dil['previous'] ; ?> " ,
	// 				"next": "<?php echo $dil['next'] ; ?>"
	// 			}
	// 		},
	// 		"ajax": {
	// 			url: "payment_salary/get_paymentSalary.php",
	// 			type: "POST"
	// 		},"columnDefs": [ {
	// 			"width": "8%",
	// 			"targets": -1,
	// 			"data": null,
	// 			"defaultContent": "<img  id='paymentSalary_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
	// 				"<img  id='paymentSalary_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
	// 				"<img  id='paymentSalary_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
	// 		} ],
	// 		dom: 'lBfrtip',
	//
	// 		buttons: [
	// 			{
	//
	// 				text: 'Add New <i class="fa fa-plus"></i>',
	// 				action: function ( e, dt, node, config ) {
	// 					console.log('paymentSalaryInsertModal')
	//
	// 					$("#paymentSalaryInsertModal").modal();
	// 				}
	// 			},
	// 			{
	// 				extend: 'excelHtml5',
	// 				exportOptions: {
	// 					columns: ':visible'
	// 				}
	// 			},
	// 			{
	// 				extend: 'csvHtml5',
	// 				exportOptions: {
	// 					columns: ':visible'
	// 				}
	// 			},
	// 			{
	// 				extend: 'pdfHtml5',
	// 				exportOptions: {
	// 					columns: ':visible'
	// 				}
	// 			}  ,'copy','print',
	// 			'colvis',
	//
	// 		],
	//
	// 		"lengthMenu": [
	// 			[20, 30, 60, -1],
	// 			[10, 20, 50, "All"]
	// 		]
	//
	// 	});
	//
	// 	console.log('Tab clikc oldu',payment_salary_table);
	// });
	//
	// /*Herbi MELUMATALRİ SİLİNİR */
	// $("#paymentSalaryDelete").submit(function(e) {
	//
	// 	e.preventDefault();
	// 	$.ajax( {
	// 		url: "payment_salary/paymentSalaryDelete.php",
	// 		method: "post",
	// 		data: $("#paymentSalaryDelete").serialize(),
	// 		dataType: "text",
	// 		success: function(strMessage)
	// 		{
	// 			console.log('strMessage='+strMessage);
	// 			if (strMessage.substr(1, 4)==='error')
	// 			{
	// 				console.log(strMessage);
	// 			}
	// 			else if (strMessage==='success')
	// 			{
	// 				$('#modalPaymentSalaryDelete').modal('hide');
	// 				$('#modalDeleteSuccess').modal('show');
	// 				payment_salary_table.ajax.reload();
	// 			}
	// 			else  {
	// 				console.log(strMessage);
	// 				$("#badge_danger").text(strMessage);
	// 			}
	// 		}
	// 	});
	// 	payment_salary_table.ajax.reload();
	//
	//
	// });
	//
	// /*payment Salary  table delete click*/
	// $('#payment_salary_table').on( 'click', '#paymentSalary_delete', function ()
	// {
	// 	var data = payment_salary_table.row( $(this).parents('tr') ).data();
	// 	console.log('data[0]='+data[0])
	// 	document.getElementById("paymentSalaryid").value = data[0];
	// 	$('#modalPaymentSalaryDelete').modal('show');
	// } );
	//
	// $("#paymentSalaryInsertForm").submit(function(e)
	// {
	// 	console.log('salam insert')
	// 	e.preventDefault();
	// 	/*	if($("#langInsertForm").valid())
    // { */
	// 	$.ajax( {
	// 		url: "payment_salary/paymentSalaryInsert.php",
	// 		method: "post",
	// 		data: $("#paymentSalaryInsertForm").serialize(),
	// 		dataType: "text",
	// 		success: function(strMessage)
	// 		{
	// 			console.log('strMessage='+$("#paymentSalaryInsertForm").serialize());
	// 			console.log('strMessage='+strMessage);
	// 			$("#badge_success").text('');
	// 			$("#badge_danger").text('');
	// 			if (strMessage.substr(1, 4)==='error')
	// 			{
	//
	// 				$("#errorp").text(strMessage);
	// 				$("#modalInsertError").modal('show');
	// 				$("#paymentSalaryInsertModal").modal('hide');
	// 			}
	// 			else if (strMessage==='success')
	// 			{
	// 				$("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
	// 				$("#modalInsertSuccess").modal('show');
	// 				$("#paymentSalaryInsertModal").modal('hide');
	//
	// 			}
	// 			else  {
	// 				$("#errorp").text(strMessage);
	// 				$("#modalInsertError").modal('show');
	// 				$("#paymentSalaryInsertModal").modal('hide');
	//
	// 			}
	// 		}
	// 	});
	// 	payment_salary_table.ajax.reload();
	// 	$( "#paymentSalaryInsertForm" ).get(0).reset();
	// 	/*}*/
	// });
	//
	//
	// /*getPaymentSalaryDetails  */
	// function getPaymentSalaryDetails(paymentsalaryid,optype)
	// {
	// 	console.log('$paymentsalaryid='+paymentsalaryid)
	// 	$.post("payment_salary/getPaymentSalaryDetail.php",
	// 		{
	// 			paymentsalaryid: paymentsalaryid
	// 		},
	// 		function (paymentsalary_data, status)
	// 		{
	// 			// PARSE json data
	// 			var paymentsalarydata = JSON.parse(paymentsalary_data);
	// 			console.log('paymentsalarydata=',paymentsalarydata)
	//
	// 			if  (optype=='update') {
	// 				// $("#update_paymentsalaryid").val(paymentsalarydata.id).change();
	// 				// $("#update_militaryempid").val(paymentsalarydata.teId).change();
	// 				// $("#update_military_reg_group").val(paymentsalarydata.military_reg_group).change();
	// 				// $("#update_military_reg_category").val(paymentsalarydata.military_reg_category).change();
	// 				// $("#update_staff_desc_id").val(paymentsalarydata.tmsId).change();
	// 				// $("#update_rank_desc_id").val(paymentsalarydata.tmrId).change();
	// 				// $("#update_military_specialty_acc").val(paymentsalarydata.military_specialty_acc);
	// 				// $("#update_military_fitness_service").val(paymentsalarydata.military_fitness_service);
	// 				// $("#update_military_registration_service").val(paymentsalarydata.military_registration_service);
	// 				// $("#update_military_registration_date").val(paymentsalarydata.military_registr_date);
	// 				// $("#update_military_general").val(paymentsalarydata.military_general);
	// 				// $("#update_military_special").val(paymentsalarydata.military_special);
	// 				// $("#update_military_no_official").val(paymentsalarydata.military_no_official);
	// 				// $("#update_military_additional_information").val(paymentsalarydata.military_additional_information);
	// 				// $("#update_military_date_completion").val(paymentsalarydata.military_date_comp);
	// 				// $('#modalEditPaymentSalary').modal('show');
	// 			}
	// 			else {
	// 				// var military_reg_category=''
	// 				// var military_reg_group=''
	// 				// if(paymentsalarydata.military_reg_category==1){
	// 				// 	military_reg_category='Kateqoriya 1'
	// 				// }else{
	// 				// 	military_reg_category='Kateqoriya 2'
	// 				// }
	// 				// if(paymentsalarydata.military_reg_group==1){
	// 				// 	military_reg_group='Çağırışçı'
	// 				// }else{
	// 				// 	military_reg_group='Hərbi vəzifəli'
	// 				// }
	// 				// $("#view_militaryemp").val(paymentsalarydata.full_name);
	// 				// $("#view_military_reg_group").val(military_reg_group);
	// 				// $("#view_military_reg_category").val(military_reg_category);
	// 				// $("#view_staff_desc_id").val(paymentsalarydata.tmsStaffDesc);
	// 				// $("#view_rank_desc_id").val(paymentsalarydata.tmrRankDesc);
	// 				// $("#view_military_specialty_acc").val(paymentsalarydata.military_specialty_acc);
	// 				// $("#view_military_fitness_service").val(paymentsalarydata.military_fitness_service);
	// 				// $("#view_military_registration_service").val(paymentsalarydata.military_registration_service);
	// 				// $("#view_military_registration_date").val(paymentsalarydata.military_registr_date);
	// 				// $("#view_military_general").val(paymentsalarydata.military_general);
	// 				// $("#view_military_special").val(paymentsalarydata.military_special);
	// 				// $("#view_military_no_official").val(paymentsalarydata.military_no_official);
	// 				// $("#view_military_additional_information").val(paymentsalarydata.military_additional_information);
	// 				// $("#view_military_date_completion").val(paymentsalarydata.military_date_comp);
	// 				// $('#modalViewPaymentSalary').modal('show');
	// 			}
	// 		}
	// 	);
	//
	// }
	//
	// /*payment Salary Update */
	// $("#paymentSalaryUpdate").submit(function(e)
	// {
	// 	e.preventDefault();
	// 	/*if($("#educationUpdate").valid())
    //     { */
	//
	// 	$.ajax( {
	// 		url: "payment_salary/paymentSalaryUpdate.php",
	// 		method: "post",
	// 		data: $("#paymentSalaryUpdate").serialize(),
	// 		dataType: "text",
	// 		success: function(strMessage)
	// 		{
	// 			//console.log('serialize='+$("#paymentSalaryUpdate").serialize());
	// 			console.log('strMessage='+strMessage);
	// 			$("#badge_danger_update").text("");
	// 			if (strMessage.substr(1, 4)==='error')
	// 			{
	// 				console.log(strMessage);
	// 			}
	// 			else if (strMessage==='success')
	// 			{
	// 				$('#modalEditPaymentSalary').modal('hide');
	// 				$('#modalUpdateSuccess').modal('show');
	// 				payment_salary_table.ajax.reload();
	// 			}
	//
	// 			else  {
	// 				$("#badge_danger_update").text(strMessage);
	// 			}
	// 		}
	// 	});
	// 	payment_salary_table.ajax.reload();
	// 	/*}
    //     else {
    //              alert('not valid') ;
    //          }*/
	// });
	//
	// /*payment Salary table delete click*/
	// $('#payment_salary_table').on( 'click', '#paymentSalary_delete', function ()
	// {
	// 	var data = payment_salary_table.row( $(this).parents('tr') ).data();
	//
	// 	document.getElementById("paymentSalaryid").value = data[0];
	//
	// 	$('#modalPaymentSalaryDelete').modal('show');
	// } );
	//
	// /*payment Salary table view click  */
	// $('#payment_salary_table').on( 'click', '#paymentSalary_view', function ()
	// {
	// 	var data = payment_salary_table.row( $(this).parents('tr') ).data();
	// 	getPaymentSalaryDetails(data[0],'view');
	// 	console.log(data[0]);
	// } );
	// /*payment Salary table view click  */
	// $('#payment_salary_table').on( 'click', '#paymentSalary_edit', function ()
	// {
	//
	// 	var data = payment_salary_table.row( $(this).parents('tr') ).data();
	// 	getPaymentSalaryDetails(data[0],'update');
	// 	document.getElementById("updatepaymentsalaryid").value = data[0];
	// 	console.log(data[0]);
	// } );


	/*
    **********************************************************************************************************************
    ************************************** Suruculuk Vesiqesi INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */
    var  tabtext2 =$('#qual2').text();
	var driver_license_table ;
	$('#drivingLicensetab').click(function() {
        $('#qual2').text( tabtext2+' / '+$('#drivingLicensetab').text());
		console.log('Tab clikc drivingLicensetab');
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
					"previous": "<?php echo $dil['previous'] ; ?> " ,
					"next": "<?php echo $dil['next'] ; ?>"
				}
			},
			"ajax": {
				url: "driver_license/get_drivingLicenseInfo.php",
				type: "POST"
			},"columnDefs": [ {
				"width": "8%",
				"targets": -1,
				"data": null,
				"defaultContent": "<img  id='drivingLicenseInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
					"<img  id='drivingLicenseInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
					"<img  id='drivingLicenseInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
			} ],
			dom: 'lBfrtip',

			buttons: [
				{

					text: 'Add New <i class="fa fa-plus"></i>',
					action: function ( e, dt, node, config ) {
						console.log('drivingLicenseInfoInsertModal')

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
				}  ,'copy','print',
				'colvis',

			],

			"lengthMenu": [
				[20, 30, 60, -1],
				[10, 20, 50, "All"]
			]

		});

		console.log('Tab clikc oldu',driver_license_table);
	});

	/*Suruculuk MELUMATALRİ SİLİNİR */
	$("#drivingLicenseInfoDelete").submit(function(e) {

		e.preventDefault();
		$.ajax( {
			url: "driver_license/drivingLicenseInfoDelete.php",
			method: "post",
			data: $("#drivingLicenseInfoDelete").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				console.log('strMessage='+strMessage);
				if (strMessage.substr(1, 4)==='error')
				{
					console.log(strMessage);
				}
				else if (strMessage==='success')
				{
					$('#modalDrivingLicenseInfoDelete').modal('hide');
					$('#modalDeleteSuccess').modal('show');
					driver_license_table.ajax.reload();
				}
				else  {
					console.log(strMessage);
					$("#badge_danger").text(strMessage);
				}
			}
		});
		driver_license_table.ajax.reload();


	});

	/*Driving License Info  table delete click*/
	$('#driving_info_table').on( 'click', '#drivingLicenseInfo_delete', function ()
	{
		var data = driver_license_table.row( $(this).parents('tr') ).data();
		console.log('data[0]='+data[0])
		document.getElementById("drivinglicenseinfoid").value = data[0];
		$('#modalDrivingLicenseInfoDelete').modal('show');
	} );

	$("#drivingLicenseInfoInsertForm").submit(function(e)
	{
		console.log('salam insert')
		e.preventDefault();
		/*	if($("#langInsertForm").valid())
    { */
		$.ajax( {
			url: "driver_license/drivingLicenseInfoInsert.php",
			method: "post",
			data: $("#drivingLicenseInfoInsertForm").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				console.log('strMessage='+$("#drivingLicenseInfoInsertForm").serialize());
				console.log('strMessage='+strMessage);
				$("#badge_success").text('');
				$("#badge_danger").text('');
				if (strMessage.substr(1, 4)==='error')
				{

					$("#errorp").text(strMessage);
					$("#modalInsertError").modal('show');
					$("#drivingLicenseInfoInsertModal").modal('hide');
				}
				else if (strMessage==='success')
				{
					$("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
					$("#modalInsertSuccess").modal('show');
					$("#drivingLicenseInfoInsertModal").modal('hide');

				}
				else  {
					$("#errorp").text(strMessage);
					$("#modalInsertError").modal('show');
					$("#drivingLicenseInfoInsertModal").modal('hide');

				}
			}
		});
		driver_license_table.ajax.reload();
		$( "#drivingLicenseInfoInsertForm" ).get(0).reset();
		/*}*/
	});


	/*GetDrivingDetails  */
	function GetDrivingDetails(drivinglicenseid,optype)
	{
		console.log('$drivinglicenseid='+drivinglicenseid)
		$.post("driver_license/getDrivingLicenseInfoDetail.php",
			{
				drivinglicenseid: drivinglicenseid
			},
			function (drivingLicense_data, status)
			{
				// PARSE json data
				var drivinglicensedata = JSON.parse(drivingLicense_data);
				console.log('drivinglicensedata=',drivinglicensedata)
				console.log('drivinglicensedata id=',drivinglicensedata.id)

				if  (optype=='update') {
					$("#updatedrivinglicenseid").val(drivinglicensedata.id).change();
					$("#update_drivingempid").val(drivinglicensedata.emp_id).change();
					$("#update_drivinglic_seria_number").val(drivinglicensedata.lic_seria_number);
					$("#update_drivintcatId").val(drivinglicensedata.tcatId).change();
					$("#update_drivinglic_issuer").val(drivinglicensedata.lic_issuer);
					$("#update_drivinglic_issue_date").val(drivinglicensedata.lic_issue_date);
					$("#update_drivingexpire_date").val(drivinglicensedata.expire_date);


					$('#modalEditDrivingLicenseInfo').modal('show');
				}
				else {
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
	$("#drivingLicenseInfoUpdate").submit(function(e)
	{
		e.preventDefault();
		/*if($("#educationUpdate").valid())
        { */

		$.ajax( {
			url: "driver_license/drivingLicenseInfoUpdate.php",
			method: "post",
			data: $("#drivingLicenseInfoUpdate").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				//console.log('serialize='+$("#drivingLicenseInfoUpdate").serialize());
				console.log('strMessage='+strMessage);
				$("#badge_danger_update").text("");
				if (strMessage.substr(1, 4)==='error')
				{
					console.log(strMessage);
				}
				else if (strMessage==='success')
				{
					$('#modalEditDrivingLicenseInfo').modal('hide');
					$('#modalUpdateSuccess').modal('show');
					driver_license_table.ajax.reload();
				}

				else  {
					$("#badge_danger_update").text(strMessage);
				}
			}
		});
		driver_license_table.ajax.reload();
		/*}
        else {
                 alert('not valid') ;
             }*/
	});



	/*Driving License table view click  */
	$('#driving_info_table').on( 'click', '#drivingLicenseInfo_view', function ()
	{
		var data = driver_license_table.row( $(this).parents('tr') ).data();
		GetDrivingDetails(data[0],'view');
		console.log(data[0]);
	} );
	/*Driving License table edit click  */
	$('#driving_info_table').on( 'click', '#drivingLicenseInfo_edit', function ()
	{

		var data = driver_license_table.row( $(this).parents('tr') ).data();
		GetDrivingDetails(data[0],'update');
		document.getElementById("updatedrivinglicenseid").value = data[0];
		console.log(data[0]);
	} );

    /*
**********************************************************************************************************************
************************************** Tibbi INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

    var medical_info_table ;
    $('#medicalInfotab').click(function() {
        console.log('Tab clikc medicalInfotab');
        $('#qual2').text( tabtext2+' / '+$('#medicalInfotab').text());

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
                    "previous": "<?php echo $dil['previous'] ; ?> " ,
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "medical_info/get_medicalInfo.php",
                type: "POST"
            },"columnDefs": [ {
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='medicalInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
                    "<img  id='medicalInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
                    "<img  id='medicalInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            } ],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Add New <i class="fa fa-plus"></i>',
                    action: function ( e, dt, node, config ) {
                        console.log('medicalInfoInsertModal')

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
                }  ,'copy','print',
                'colvis',

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        console.log('Tab clikc oldu',medical_info_table);
    });

    /*Herbi MELUMATALRİ SİLİNİR */
    $("#medicalInfoDelete").submit(function(e) {

        e.preventDefault();
        $.ajax( {
            url: "medical_info/medicalInfoDelete.php",
            method: "post",
            data: $("#medicalInfoDelete").serialize(),
            dataType: "text",
            success: function(strMessage)
            {
                console.log('strMessage='+strMessage);
                if (strMessage.substr(1, 4)==='error')
                {
                    console.log(strMessage);
                }
                else if (strMessage==='success')
                {
                    $('#modalMedicalInfoDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    medical_info_table.ajax.reload();
                }
                else  {
                    console.log(strMessage);
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
    //     console.log('data[0]='+data[0])
    //     document.getElementById("medicalinfoid").value = data[0];
    //     $('#modalMedicalInfoDelete').modal('show');
    // } );

    $("#medicalInfoInsertForm").submit(function(e)
    {
        console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax( {
            url: "medical_info/medicalInfoInsert.php",
            method: "post",
            data: $("#medicalInfoInsertForm").serialize(),
            dataType: "text",
            success: function(strMessage)
            {
                console.log('strMessage='+$("#medicalInfoInsertForm").serialize());
                console.log('strMessage='+strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4)==='error')
                {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#medicalInfoInsertModal").modal('hide');
                }
                else if (strMessage==='success')
                {
                    $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
                    $("#modalInsertSuccess").modal('show');
                    $("#medicalInfoInsertModal").modal('hide');

                }
                else  {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#medicalInfoInsertModal").modal('hide');

                }
            }
        });
        medical_info_table.ajax.reload();
        $( "#medicalInfoInsertForm" ).get(0).reset();
        /*}*/
    });


    /*GetMedicalDetails  */
    function GetMedicalDetails(medicalid,optype)
    {
        console.log('$medicalid='+medicalid)
        $.post("medical_info/getMedicalInfoDetail.php",
            {
                medicalid: medicalid
            },
            function (medical_data, status)
            {
                console.log('medicaldata1=',medical_data)
                // PARSE json data
                var medicaldata = JSON.parse(medical_data);
                console.log('medicaldata=',medicaldata)
                if  (optype=='update') {
                    $("#update_medicalid").val(medicaldata.id).change();
                    $("#update_medicalempid").val(medicaldata.teId).change();
                    $("#update_medical_app").val(medicaldata.exist_id).change();
                    $("#update_renew_interval").val(medicaldata.renew_interval).change();
                    $("#update_last_renew_date").val(medicaldata.last_renew_date);
                    $("#update_physical_deficiency").val(medicaldata.chois_id).change();
                    $("#update_deficiency_desc").val(medicaldata.deficiency_desc);
                    $('#modalEditMedicalInfo').modal('show');
                }
                else {
                    $("#view_medicalemp").val(medicaldata.full_name);
                    $("#view_medical_app").val(medicaldata.exist_desc);
                    $("#view_renew_interval").val(medicaldata.renew_interval+' Ay');
                    $("#view_last_renew_date").val(medicaldata.last_renew_date);
                    $("#view_physical_deficiency").val(medicaldata.chois_desc);
                    $("#view_deficiency_desc").val(medicaldata.deficiency_desc);
                   $('#modalViewMedical').modal('show');
                }
            }
        );

    }

    /*Medical Update */
    $("#medicalInfoUpdate").submit(function(e)
    {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax( {
            url: "medical_info/medicalInfoUpdate.php",
            method: "post",
            data: $("#medicalInfoUpdate").serialize(),
            dataType: "text",
            success: function(strMessage)
            {
                //console.log('serialize='+$("#medicalInfoUpdate").serialize());
                console.log('strMessage='+strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4)==='error')
                {
                    console.log(strMessage);
                }
                else if (strMessage==='success')
                {
                    $('#modalEditMedicalInfo').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    medical_info_table.ajax.reload();
                }

                else  {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        medical_info_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });

    /*medical table delete click*/
    $('#medical_info_table').on( 'click', '#medicalInfo_delete', function ()
    {
        var data = medical_info_table.row( $(this).parents('tr') ).data();

        document.getElementById("medicalinfoid").value = data[0];

        $('#modalMedicalInfoDelete').modal('show');
    } );

    /*medical table view click  */
    $('#medical_info_table').on( 'click', '#medicalInfo_view', function ()
    {
        var data = medical_info_table.row( $(this).parents('tr') ).data();
        GetMedicalDetails(data[0],'view');
        console.log(data[0]);
    } );
    /*medical table view click  */
    $('#medical_info_table').on( 'click', '#medicalInfo_edit', function ()
    {
        console.log('salam')

        var data = medical_info_table.row( $(this).parents('tr') ).data();
        console.log('data='+data[0])
        GetMedicalDetails(data[0],'update');
        document.getElementById("updatemedid").value = data[0];
        console.log(data[0]);

    } );

    /*
    **********************************************************************************************************************
    ************************************** Əvvəlki işəgötürən  INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */

    var previous_positions_table ;

    $('#previousPositionstab').click(function() {
        $('#qual2').text( tabtext2+' / '+$('#previousPositionstab').text());

        console.log('Tab clikc previousPositionstab');
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
                    "previous": "<?php echo $dil['previous'] ; ?> " ,
                    "next": "<?php echo $dil['next'] ; ?>"
                }
            },
            "ajax": {
                url: "previous_positions/get_previousPositions.php",
                type: "POST"
            },"columnDefs": [ {
                "width": "8%",
                "targets": -1,
                "data": null,
                "defaultContent": "<img  id='previousPositions_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
                    "<img  id='previousPositions_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
                    "<img  id='previousPositions_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
            } ],
            dom: 'lBfrtip',

            buttons: [
                {

                    text: 'Add New <i class="fa fa-plus"></i>',
                    action: function ( e, dt, node, config ) {
                        console.log('previousPositionsInsertModal')

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
                }  ,'copy','print',
                'colvis',

            ],

            "lengthMenu": [
                [20, 30, 60, -1],
                [10, 20, 50, "All"]
            ]

        });

        console.log('Tab clikc oldu',previous_positions_table);
    });

    /*Herbi MELUMATALRİ SİLİNİR */
    $("#previousPositionsDelete").submit(function(e) {

        e.preventDefault();
        $.ajax( {
            url: "previous_positions/previousPositionsDelete.php",
            method: "post",
            data: $("#previousPositionsDelete").serialize(),
            dataType: "text",
            success: function(strMessage)
            {
                console.log('strMessage='+strMessage);
                if (strMessage.substr(1, 4)==='error')
                {
                    console.log(strMessage);
                }
                else if (strMessage==='success')
                {
                    $('#modalPreviousPositionsDelete').modal('hide');
                    $('#modalDeleteSuccess').modal('show');
                    previous_positions_table.ajax.reload();
                }
                else  {
                    console.log(strMessage);
                    $("#badge_danger").text(strMessage);
                }
            }
        });
        previous_positions_table.ajax.reload();


    });

    /*previous Positions Info  table delete click*/
    $('#previous_positions_table').on( 'click', '#previousPositions_delete', function ()
    {
        var data = previous_positions_table.row( $(this).parents('tr') ).data();
        console.log('data[0]='+data[0])
        document.getElementById("positionsinfoid").value = data[0];
        $('#modalPreviousPositionsDelete').modal('show');
    } );

    $("#previousPositionsInsertForm").submit(function(e)
    {
        console.log('salam insert')
        e.preventDefault();
        /*	if($("#langInsertForm").valid())
    { */
        $.ajax( {
            url: "previous_positions/previousPositionsInsert.php",
            method: "post",
            data: $("#previousPositionsInsertForm").serialize(),
            dataType: "text",
            success: function(strMessage)
            {
                console.log('strMessage='+$("#previousPositionsInsertForm").serialize());
                console.log('strMessage='+strMessage);
                $("#badge_success").text('');
                $("#badge_danger").text('');
                if (strMessage.substr(1, 4)==='error')
                {

                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#previousPositionsInsertModal").modal('hide');
                }
                else if (strMessage==='success')
                {
                    $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
                    $("#modalInsertSuccess").modal('show');
                    $("#previousPositionsInsertModal").modal('hide');

                }
                else  {
                    $("#errorp").text(strMessage);
                    $("#modalInsertError").modal('show');
                    $("#previousPositionsInsertModal").modal('hide');

                }
            }
        });
        previous_positions_table.ajax.reload();
        $( "#previousPositionsInsertForm" ).get(0).reset();
        /*}*/
    });


    /*GetPreviousPositionsDetails  */
    function GetPreviousPositionsDetails(positionid,optype)
    {
        console.log('$previouspositionsid='+positionid)
        $.post("previous_positions/getPreviousPositionsDetail.php",
            {
                positionid: positionid
            },
            function (previous_positions, status)
            {
                // PARSE json data
                var previouspositions = JSON.parse(previous_positions);
                console.log('previouspositions=',previouspositions);
                if  (optype=='update') {
                    $("#update_positionsid").val(previouspositions.id).change();
                    $("#update_positionsempid").val(previouspositions.teId).change();
                    $("#update_prev_employer").val(previouspositions.prev_employer)
                    $("#update_start_date").val(previouspositions.start_date);
                    $("#update_end_date").val(previouspositions.end_date);
                    $("#update_leave_reason").val(previouspositions.leave_reason)
                    $("#update_sector").val(previouspositions.sector)
                    $('#modalEditPreviousPositions').modal('show');
                }
                else {
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
    $("#previousPositionsUpdate").submit(function(e)
    {
        e.preventDefault();
        /*if($("#educationUpdate").valid())
        { */

        $.ajax( {
            url: "previous_positions/previousPositionsUpdate.php",
            method: "post",
            data: $("#previousPositionsUpdate").serialize(),
            dataType: "text",
            success: function(strMessage)
            {
                //console.log('serialize='+$("#previousPositionsUpdate").serialize());
                console.log('strMessage='+strMessage);
                $("#badge_danger_update").text("");
                if (strMessage.substr(1, 4)==='error')
                {
                    console.log(strMessage);
                }
                else if (strMessage==='success')
                {
                    $('#modalEditPreviousPositions').modal('hide');
                    $('#modalUpdateSuccess').modal('show');
                    previous_positions_table.ajax.reload();
                }

                else  {
                    $("#badge_danger_update").text(strMessage);
                }
            }
        });
        previous_positions_table.ajax.reload();
        /*}
        else {
                 alert('not valid') ;
             }*/
    });



    /*previous Positions table view click  */
    $('#previous_positions_table').on( 'click', '#previousPositions_view', function ()
    {
        var data = previous_positions_table.row( $(this).parents('tr') ).data();
        GetPreviousPositionsDetails(data[0],'view');
        console.log(data[0]);
    } );
    /*previous Positions table view click  */
    $('#previous_positions_table').on( 'click', '#previousPositions_edit', function ()
    {

        var data = previous_positions_table.row( $(this).parents('tr') ).data();
        console.log('data=',data);
        GetPreviousPositionsDetails(data[0],'update');
        document.getElementById("updatepositionsid").value = data[0];
        console.log(data[0]);
    } );

	/*
    **********************************************************************************************************************
    ************************************** Migrasiya INFO BILIKLERI ************************************************************
    **********************************************************************************************************************
    */

	var migration_info_table ;
	$('#migrationInfotab').click(function() {
		console.log('Tab clikc migrationInfotab');
		$('#qual2').text( tabtext2+' / '+$('#migrationInfotab').text());

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
					"previous": "<?php echo $dil['previous'] ; ?> " ,
					"next": "<?php echo $dil['next'] ; ?>"
				}
			},
			"ajax": {
				url: "migration_info/get_migrationInfo.php",
				type: "POST"
			},"columnDefs": [ {
				"width": "8%",
				"targets": -1,
				"data": null,
				"defaultContent": "<img  id='migrationInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
					"<img  id='migrationInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
					"<img  id='migrationInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
			} ],
			dom: 'lBfrtip',

			buttons: [
				{

					text: 'Add New <i class="fa fa-plus"></i>',
					action: function ( e, dt, node, config ) {
						console.log('migrationInfoInsertModal')

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
				}  ,'copy','print',
				'colvis',

			],

			"lengthMenu": [
				[20, 30, 60, -1],
				[10, 20, 50, "All"]
			]

		});

		console.log('Tab clikc oldu',migration_info_table);
	});

	/*migration MELUMATALRİ SİLİNİR */
	$("#migrationInfoDelete").submit(function(e) {

		e.preventDefault();
		$.ajax( {
			url: "migration_info/migrationInfoDelete.php",
			method: "post",
			data: $("#migrationInfoDelete").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				console.log('strMessage='+strMessage);
				if (strMessage.substr(1, 4)==='error')
				{
					console.log(strMessage);
				}
				else if (strMessage==='success')
				{
					$('#modalMigrationInfoDelete').modal('hide');
					$('#modalDeleteSuccess').modal('show');
					migration_info_table.ajax.reload();
				}
				else  {
					console.log(strMessage);
					$("#badge_danger").text(strMessage);
				}
			}
		});
		migration_info_table.ajax.reload();


	});



	$("#migrationInfoInsertForm").submit(function(e)
	{
		console.log('salam insert')
		e.preventDefault();
		/*	if($("#langInsertForm").valid())
    { */
		$.ajax( {
			url: "migration_info/migrationInfoInsert.php",
			method: "post",
			data: $("#migrationInfoInsertForm").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				console.log('strMessage='+$("#migrationInfoInsertForm").serialize());
				console.log('strMessage='+strMessage);
				$("#badge_success").text('');
				$("#badge_danger").text('');
				if (strMessage.substr(1, 4)==='error')
				{

					$("#errorp").text(strMessage);
					$("#modalInsertError").modal('show');
					$("#migrationInfoInsertModal").modal('hide');
				}
				else if (strMessage==='success')
				{
					$("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
					$("#modalInsertSuccess").modal('show');
					$("#migrationInfoInsertModal").modal('hide');

				}
				else  {
					$("#errorp").text(strMessage);
					$("#modalInsertError").modal('show');
					$("#migrationInfoInsertModal").modal('hide');

				}
			}
		});
		migration_info_table.ajax.reload();
		$( "#migrationInfoInsertForm" ).get(0).reset();
		/*}*/
	});


	/*GetMigrationDetails  */
	function GetMigrationDetails(migrationid,optype)
	{
		console.log('$migrationid='+migrationid)
		$.post("migration_info/getMigrationInfoDetail.php",
			{
				migrationid: migrationid
			},
			function (migration_data, status)
			{
				console.log('migrationdata1=',migration_data)
				// PARSE json data
				var migrationdata = JSON.parse(migration_data);
				console.log('migrationdata=',migrationdata)
				if  (optype=='update') {
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
				}
				else {
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
	$("#migrationInfoUpdate").submit(function(e)
	{
		e.preventDefault();
		/*if($("#educationUpdate").valid())
        { */

		$.ajax( {
			url: "migration_info/migrationInfoUpdate.php",
			method: "post",
			data: $("#migrationInfoUpdate").serialize(),
			dataType: "text",
			success: function(strMessage)
			{
				//console.log('serialize='+$("#migrationInfoUpdate").serialize());
				console.log('strMessage='+strMessage);
				$("#badge_danger_update").text("");
				if (strMessage.substr(1, 4)==='error')
				{
					console.log(strMessage);
				}
				else if (strMessage==='success')
				{
					$('#modalEditMigrationInfo').modal('hide');
					$('#modalUpdateSuccess').modal('show');
					migration_info_table.ajax.reload();
				}

				else  {
					$("#badge_danger_update").text(strMessage);
				}
			}
		});
		migration_info_table.ajax.reload();
		/*}
        else {
                 alert('not valid') ;
             }*/
	});

	/*migration table delete click*/
	$('#migration_info_table').on( 'click', '#migrationInfo_delete', function ()
	{
		var data = migration_info_table.row( $(this).parents('tr') ).data();

		document.getElementById("migrationinfoid").value = data[0];

		$('#modalMigrationInfoDelete').modal('show');
	} );

	/*migration table view click  */
	$('#migration_info_table').on( 'click', '#migrationInfo_view', function ()
	{
		var data = migration_info_table.row( $(this).parents('tr') ).data();
		GetMigrationDetails(data[0],'view');
		console.log(data[0]);
	} );
	/*migration table view click  */
	$('#migration_info_table').on( 'click', '#migrationInfo_edit', function ()
	{
		console.log('salam')

		var data = migration_info_table.row( $(this).parents('tr') ).data();
		console.log('data='+data[0])
		GetMigrationDetails(data[0],'update');
		document.getElementById("updatemigid").value = data[0];
		console.log(data[0]);

	} );

    
$('#birth_date_fam_info').datetimepicker({ format: 'DD/MM/YYYY'  });	
$('#edit_birth_date_fam_info_id').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#birth_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_birth_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_uni_end_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_diplom_issue_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#uni_end_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#diplom_issue_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#training_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_training_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#cert_given_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_cert_given_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#passport_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_passport_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#passport_end_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_passport_end_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#view_military_date_completion').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_military_date_completion').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#military_date_completion').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#view_military_registration_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_military_registration_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#military_registration_date').datetimepicker({ format: 'DD/MM/YYYY'  });

$('#view_drivinglic_issue_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_drivinglic_issue_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#view_drivingexpire_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#update_drivingexpire_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#drivingexpire_date').datetimepicker({ format: 'DD/MM/YYYY'  });
$('#drivinglic_issue_date').datetimepicker({ format: 'DD/MM/YYYY'  });

    $('#view_last_renew_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#update_last_renew_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#medical_last_renew_date').datetimepicker({ format: 'DD/MM/YYYY'  });

    $('#view_start_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#view_end_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#update_start_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#update_end_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#start_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    $('#end_date').datetimepicker({ format: 'DD/MM/YYYY'  });

	$("#update_trp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#update_trp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });
 	$("#update_prp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#update_prp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });
 	$("#update_wp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#update_wp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });

	$("#view_trp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#view_trp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });
 	$("#view_prp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#view_prp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });
 	$("#view_wp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#view_wp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });

    $("#trp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#trp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });
 	$("#prp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#prp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });
 	$("#wp_permit_date").datetimepicker({ format: 'DD/MM/YYYY'  });
	$("#wp_valid_date").datetimepicker({ format: 'DD/MM/YYYY'  });

});
$(document).ready(function (e) {
	$(document).on('change', '#files', function () {

		// $("#uploadForm").submit();
		 $("#addImage").trigger("click");
		console.log('on change');
	})
	$(document).on('change', '#medical_physical_deficiency', function () {
		console.log('medical_physical_deficiency='+$(this).val());
		if($('#medical_physical_deficiency option:selected').val()=='1'){
			$('#medical_deficiency_descDiv').css('display','flex')
		}else{
			$('#medical_deficiency_descDiv').css('display','none')
		}
	})
	$(document).on('change', '#update_physical_deficiency', function () {
		console.log('update_physical_deficiency='+$(this).val());
		if($('#update_physical_deficiency option:selected').val()=='1'){
			$('#update_deficiency_descDiv').css('display','flex')
		}else{
			$('#update_deficiency_descDiv').css('display','none')
		}
	})
});
function addImage(){
	$("#addImage").on('click',(function(e) {

		console.log('on submit')
		var formData = new FormData($('#uploadForm')[0]);

		formData.append('userImage', $('input[type=file]')[0].files[0]);
		formData.append('uid', $('input[name=uid]').val());
		formData.append('empno', $('input[name=empno]').val());
		// formData.append('uid', $('input[id=uid]').val());
		e.preventDefault();
		$.ajax({
			url: "upload.php",
			type: "POST",
			// data:  $('form#uploadForm').serialize(),
			// data:  new FormData(),
			data : formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data)
			{
				$('#default').css('display','none')
				$("#targetLayer").html(data);

			},
			error: function()
			{
			}
		});
	}));
}