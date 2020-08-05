
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

	var data = table.row( $(this).parents('tr') ).data();
	 GetEmpContractDetails(data[0],'update');
	 document.getElementById("update_empid").value = data[0];

} );


/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
function GetEmpContractDetails(empid,optype)
{
	$.post("contracts/getEmployeeContractDetail.php",
		{
			empid: empid
		},
		function (emp_data, status)
		{
			// PARSE json data
			console.log('emp_data=',emp_data)
			var employee = JSON.parse(emp_data);
			// Assing existing values to the modal popup fields
			console.log('employee=',employee)

			if  (optype=='update') {

				if(employee.structure_level==2){
					$("#structure1").val(employee.structure);
				}else if(employee.structure_level==3){
					$("#structure2").val(employee.structure);
				}else if(employee.structure_level==4){
					$("#structure3").val(employee.structure);
				}else if(employee.structure_level==5){
					$("#structure4").val(employee.structure);
				}

				if(employee.marital_status=='1'){
					$("#marital_status").val('Evli');
				}else{
					$("#marital_status").val('Subay');
				}


				$("#full_name").val(employee.full_name)
				// $("#uid").val(empid)
				$("#citizenship").val(employee.citizenship);
				$("#passport_seria_number").val(employee.passport_seria_number);
				$("#pincode").val(employee.pincode);
				$("#passport_date").val(employee.passport_date);
				$("#pass_given_authority").val(employee.pass_given_authority);
				$("#company_name").val(employee.company_name);
				$("#voen").val(employee.voen);
				$("#sun").val(employee.sun);
				$("#enterprise_head_position").val(employee.enterprise_head_position);
				$("#enterprise_head_fullname").val(employee.enterprise_head_fullname);
				$("#qualification").val(employee.qualification);
				$("#uni_name").val(employee.uni_name);
				$("#profession").val(employee.profession);
				$("#create_date").val(employee.create_date);
				$("#firstname").val(employee.firstname);
				$("#lastname").val(employee.lastname);
				$("#surname").val(employee.surname);
				$("#birth_date").val(employee.birth_date);
				$("#birth_place").val(employee.birth_place);
				$("#mob_tel").val(employee.mob_tel);
				$("#living_address").val(employee.living_address);

				// $("#structure").val(employee.structure);
				$('#myContracts').modal('show');
				// $('#modalEdit').modal('show');
			}

		}
	);

}