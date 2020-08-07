
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


var data;
$('#cont_employee_table tbody').on( 'click', '#print', function () {
	console.log('$row_employees[\'image_name\']');
	$('#myContracts').modal('show');
	 data = table.row( $(this).parents('tr') ).data();
	 // GetEmpContractDetails(data[0],'update');
	 // document.getElementById("update_empid").value = data[0];

} );
 var contract='';
$('#myContracts').on( 'change', '#contracts', function () {

	console.log('ssss');
	$('#whichContracts').modal('show');
	contract=$(this).find('option:selected').val();
	// if(contract=='1'){
	//     generate("emek2")
	// }else if(contract=='2'){
	//     generate("emekElave")
	// }else if(contract=='3'){
	//     generate("herbi")
	// }
	// var data = table.row( $(this).parents('tr') ).data();
	// GetEmpContractDetails(data[0],'update');
	// document.getElementById("update_empid").value = data[0];
});

$('#whichContracts').on( 'click', '#confirmContract', function () {

	console.log('ssss'+$('#whichContracts #contractDate').val());
	console.log('group2='+$('#whichContracts input[name=contractDate]:checked').val());
	var contractDate=$('#whichContracts input[name=contractDate]:checked').val();
	var order='';
	if(contractDate=='1'){
		order="  ORDER BY tc.id ASC LIMIT 1";
		contractDate='1';
	}
	if(contractDate=='2'){
		order="  ORDER BY tc.id DESC LIMIT 1";
		contractDate='2';
	}
	if(contractDate=='3'){
		order="";
		contractDate='3';
	}

	GetEmpContractDetails(data[0],'update',order,contractDate);
	document.getElementById("update_empid").value = data[0];

});

/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
function GetEmpContractDetails(empid,optype,order,contractDate)
{
	$.post("contracts/getEmployeeContractDetail.php",
		{
			empid: empid,
			order: order,
			contractDate: contractDate
		},
		function (emp_data, status)
		{
			// PARSE json data
			console.log('emp_data=',emp_data)
			var employee = JSON.parse(emp_data);
			// Assing existing values to the modal popup fields
			console.log('employee=',employee.structure_level1)

			if  (optype=='update') {

				if(employee.structure_level1){
					$("#structure1").val(employee.category1);
				}
				if(employee.structure_level2){
					$("#structure2").val(employee.category2);
				}
				if(employee.structure_level3){
					$("#structure3").val(employee.category3);
				}
				if(employee.structure_level4){
					$("#structure4").val(employee.category4);
				}
				if(employee.structure_level5){
					$("#structure5").val(employee.category5);
				}

				if(employee.marital_status=='1'){
					$("#marital_status").val('Evli');
				}else{
					$("#marital_status").val('Subay');
				}

				var military_reg_category='';
				var military_reg_group='';
				if(employee.military_reg_category==1){
					military_reg_category='Kateqoriya 1';
				}else{
					military_reg_category='Kateqoriya 2';
				}
				if(employee.military_reg_group==1){
					military_reg_group='Çağırışçı';
				}else{
					military_reg_group='Hərbi vəzifəli';
				}
				console.log('employee[0]',employee[0])
				$("#emp_id").val(employee[0].id)
				$("#full_name").val(employee[0].full_name)
				// $("#uid").val(empid)
				$("#citizenship").val(employee[0].citizenship);
				$("#passport_seria_number").val(employee[0].passport_seria_number);
				$("#pincode").val(employee[0].pincode);
				$("#passport_date").val(employee[0].passport_date);
				$("#pass_given_authority").val(employee[0].pass_given_authority);
				$("#company_name").val(employee[0].company_name);
				$("#voen").val(employee[0].voen);
				$("#sun").val(employee[0].sun);
				$("#enterprise_head_position").val(employee[0].enterprise_head_position);
				$("#enterprise_head_fullname").val(employee[0].enterprise_head_fullname);
				$("#qualification").val(employee[0].qualification);
				$("#uni_name").val(employee[0].uni_name);
				$("#profession").val(employee[0].profession);
				$("#create_date").val(employee[0].create_date);
				$("#firstname").val(employee[0].firstname);
				$("#lastname").val(employee[0].lastname);
				$("#surname").val(employee[0].surname);
				$("#birth_date").val(employee[0].birth_date);
				$("#birth_place").val(employee[0].birth_place);
				$("#mob_tel").val(employee[0].mob_tel);
				$("#living_address").val(employee[0].living_address);
				$("#military_reg_group").val(military_reg_group);
				$("#military_reg_category").val(military_reg_category);
				$("#military_staff").val(employee[0].staff_desc);
				$("#military_rank").val(employee[0].rank_desc);
				$("#military_specialty_acc").val(employee[0].military_specialty_acc);
				$("#military_fitness_service").val(employee[0].military_fitness_service);
				$("#military_registration_service").val(employee[0].military_registration_service);
				$("#military_registration_date").val(employee[0].military_registration_date);
				$("#military_general").val(employee[0].military_general);
				$("#military_special").val(employee[0].military_special);
				$("#military_no_official").val(employee[0].military_no_official);
				$("#military_additional_information").val(employee[0].military_additional_information);
				$("#military_date_completion").val(employee[0].military_date_completion);

				// $("#structure").val(employee.structure);
				$('#myContracts').modal('show');
				if(contract=='1'){
					generate("emek2")
				}else if(contract=='2'){
					generate("emekElave")
				}else if(contract=='3'){
					generate("herbi")
				}
				// $('#modalEdit').modal('show');
			}

		}
	);

}