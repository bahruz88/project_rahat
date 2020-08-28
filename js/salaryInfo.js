 

$(function () {

$('#nav-tabs').on('shown.bs.tab', 'a', function (e) {
    if (e.relatedTarget) {
        $(e.relatedTarget).removeClass('active');
    }
})

 /* EMPLOYEE  İNSERT FORM  VALIDATE */	  
 			$( "#salaryInsert" ).validate( {
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
  			$( "#salaryUpdate" ).validate( {
				
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
var table = $("#salary_table").DataTable({
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
                url: "salaryInfo/get_salary.php",
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
	$('#salary_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("empid").value = data[0];
		$('#modalDelete').modal('show');
    } );
	
  $('#salary_table tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		GetSalaryDetails(data[0],'update');
		document.getElementById("update_empid").value = data[0];
		 
    } );
 
$('#salary_table tbody').on( 'click', '#view', function () {
	console.log('$row_employees[\'image_name\']')
        var data = table.row( $(this).parents('tr') ).data();
		GetSalaryDetails(data[0],'view');
		document.getElementById("update_empid").value = data[0];
		 
    } );
	

 	/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
	 function GetSalaryDetails(id,optype)
	 {
	 	console.log('id='+id)
		 // $('#modalEdit').modal('show');
			$.post("salaryInfo/getSalaryDetail.php", 
				{
					id: id
				},
				function (emp_data, status) 
				{
					// PARSE json data
					var employee = JSON.parse(emp_data);
					// Assing existing values to the modal popup fields
					console.log('employee=',employee)
					
					if  (optype=='update') {

 					$("#uid").val(emp_id)
					// $("#update_company_id").val(employee.company_id).change();
					$("#update_tariffRate").val(employee.tariff_rate).change();
					$("#update_positionStatus").val(employee.position_status_id).change();
					$("#update_wage").val(employee.wage);
					// $("#update_reasonChange").val(employee.wage);
					$("#update_totalMonthlySalary").val(employee.total_monthly_salary);
					$("#update_prizeAmount").val(employee.prize_amount);
					$("#update_rewardPeriod").val(employee.reward_period).change();
					$("#update_placeExpenditure").val(employee.place_expenditure_id).change();
					 $("#update_reasonChange").val(employee.salary_change_reason);
					$("#update_otherCondition1").val(employee.other_conditions);

					$('#modalEdit').modal('show');
					}
					else {
						 // window.location.href='profile.php?empid='+empid;

					}
				}
			);

}
 
 /*ISCHI MELUMATLARI  DAXIL  EDILIR  */
		$("#salaryInsert").submit(function(e)
		{
                    e.preventDefault();
					if($("#salaryInsert").valid())
			{ 
                    $.ajax( {
                        url: "salaryInfo/salaryInsert.php",
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
				//	$( "#salaryInsert" ).get(0).reset();
			}
         table.ajax.reload();
        });
				
/*İSCHİ  MELUMATALRİ SİLİNİR */				
	$("#salaryDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "salaryInfo/salaryDelete.php",
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
	$("#salaryUpdate").submit(function(e)
	{
        e.preventDefault();
		if($("#salaryUpdate").valid())
		{ 
		
            $.ajax( {
                url: "salaryInfo/salaryUpdate.php",
                method: "post",
                data: $("#salaryUpdate").serialize(),
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