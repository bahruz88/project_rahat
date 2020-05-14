 

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
					
					if  (optype=='update') {
				
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
					/*$("#view_username").val(user.username);
					$("#view_firstname").val(user.firstname);
					$("#view_lastname").val(user.lastname);
					$("#view_email").val(user.reg_mail);
					$('#view_empno').val(user.empno).change();
					$('#view_deflang').val(user.def_lang).change();
					$('#view_userlevel').val([1,2,3]).change();*/
					//$('#update_userlevel').selectpicker('val', [1,2,3]);
					//	$('#modalView').modal('show');						
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

	  /*Family info table delete click*/
	$('#faminfo_table').on( 'click', '#faminfo_delete', function ()
	{
        var data = faminfo_table.row( $(this).parents('tr') ).data();
		document.getElementById("faminfoid").value = data[0];
		$('#modalFamInfoDelete').modal('show');
    } );


/*
**********************************************************************************************************************
************************************** Herbi INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

var militaryInfo_table ;
    $('#militaryInfotab').click(function() {
	console.log('Tab clikc');
	$('#militaryInfo_table').DataTable().clear().destroy();
		militaryInfo_table = $("#militaryInfo_table").DataTable({
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
							console.log(strMessage);
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalMilitaryInfoDelete').modal('hide');
								$('#modalDeleteSuccess').modal('show');
								 militaryInfo_table.ajax.reload();
							 }
							 else  {
								 console.log(strMessage);
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					militaryInfo_table.ajax.reload();


                });

	  /*military Info  table delete click*/
	$('#militaryInfo_table').on( 'click', '#militaryInfo_delete', function ()
	{
        var data = faminfo_table.row( $(this).parents('tr') ).data();
		document.getElementById("militaryinfoid").value = data[0];
		$('#modalMilitaryInfoDelete').modal('show');
    } );

	$("#militaryInsertForm").submit(function(e)
	{
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
		militaryInfo_table.ajax.reload();
		$( "#langInsertForm" ).get(0).reset();
		/*}*/
	});


	/*GetLangDetails  */
	function GetMilitaryDetails(militaryid,optype)
	{
		$.post("militay_info/getMilitaryDetail.php",
			{
				militaryid: militaryid
			},
			function (military_data, status)
			{
				// PARSE json data
				var militarydata = JSON.parse(military_data);

				if  (optype=='update') {
					console.log('update tikla');

					$("#update_militaryempid").val(militarydata.empid).change();
					$("#update_reading").val(militarydata.rid).change();
					$("#update_writing").val(militarydata.wid).change();
					$("#update_speaking").val(militarydata.sid).change();
					$("#update_understanding").val(militarydata.uid).change();
					$("#update_language").val(militarydata.langid).change();
					$('#modalEditLang').modal('show');
				}
				else {
					$("#view_langemp_id").val(militarydata.full_name);
					$("#view_lang_name_id").val(militarydata.lang_name);
					$("#view_reading_id").val(militarydata.reading);
					$("#view_writing_id").val(militarydata.writting);
					$("#view_speaking_id").val(militarydata.speaking);
					$("#view_understanding_id").val(militarydata.understanding);
					$('#modalViewLang').modal('show');
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
				console.log(strMessage);
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
	$('#military_info_table').on( 'click', '#military_info_delete', function ()
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
		GetLangDetails(data[0],'update');
		document.getElementById("update_militaryid").value = data[0];
		console.log(data[0]);
	} );


$('#birth_date_fam_info').datetimepicker({ format: 'DD/MM/YYYY'  });	
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
  });