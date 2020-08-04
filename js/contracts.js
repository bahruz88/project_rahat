
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
var table = $("#cont_employee_table").DataTable({
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
		url: "contracts/get_cont_employees.php",
		type: "POST"
	},"columnDefs": [ {
		"width": "8%",
		"targets": -1,
		"data": null,
		"defaultContent": " <img  id='print' style='cursor:pointer' src='dist/img/icons/print.png' width='22' height='22'>"
			// "<img  id='delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			// "<img id='edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
	} ],
	dom: 'lBfrtip',

	buttons: [
		// {
		// 	text: 'Add New <i class="fa fa-plus"></i>',
		// 	action: function ( e, dt, node, config ) {
		// 		$("#myModal").modal();
		// 		$('#imgAdd').html($('#uploadDiv').html())
		// 		$('#imgUpdate').html('')
		// 		addImage();
		// 	}
		// },
		// {
		// 	extend: 'excelHtml5',
		// 	exportOptions: {
		// 		columns: ':visible'
		// 	}
		// },
		// {
		// 	extend: 'csvHtml5',
		// 	exportOptions: {
		// 		columns: ':visible'
		// 	}
		// },
		// {
		// 	extend: 'pdfHtml5',
		// 	exportOptions: {
		// 		columns: ':visible'
		// 	}
		// }  ,'copy','print',
		// 'colvis'
	],

	"lengthMenu": [
		[10, 20, 50, -1],
		[10, 20, 50, "All"]
	]

});



$('#cont_employee_table tbody').on( 'click', '#print', function () {
	console.log('$row_employees[\'image_name\']');
	$('#myContracts').modal('show');
	// var data = table.row( $(this).parents('tr') ).data();
	// GetEmpDetails(data[0],'view');
	// document.getElementById("update_empid").value = data[0];

} );



/*İSCHİ  MELUMATALRİ SİLİNİR */
$("#employeeDelete").submit(function(e) {

	e.preventDefault();
	$.ajax( {
		url: "contracts/employeeDelete.php",
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
			url: "contracts/employeeUpdate.php",
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
