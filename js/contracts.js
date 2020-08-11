
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


var data;
$('#employees').on( 'click', '#print', function () {
	console.log('$row_employees[\'image_name\']');

	 // data = table.row( $(this).parents('tr') ).data();
	if($('#empid').find('option:selected').val()!="0" &&$('#empid').find('option:selected').val()!=""){
		$('#myContracts').modal('show');
		data =   $('#empid').find('option:selected').val()
	}else{
		Swal.fire(
			'',
			'Bu əməliyyat üçün işçi seçilməyib! Zəhmət olmasa işçi seçin.',
			'info'
		)
	}

	 // GetEmpContractDetails(data[0],'update');
	 // document.getElementById("update_empid").value = data[0];

} );
 var contract='';
 var company_id='';
$('#myContracts').on( 'change', '#contracts', function () {

	console.log('ssss');
	$('#whichContracts').modal('show');
	contract=$(this).find('option:selected').val();
});
$('#myContracts').on( 'change', '#commands', function () {

	console.log('commands');
	$('#whichContracts').modal('show');
	contract=$(this).find('option:selected').val();
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

	GetEmpContractDetails(data,'update',order,contractDate);
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
				var d = new Date();
				var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
				console.log('employee[0]',employee[0])
				$("#emp_id").val(employee[0].id)
				$("#currentDate").val(strDate)
				$("#full_name").val(employee[0].full_name)
				// $("#uid").val(empid)
				$("#citizenship").val(employee[0].citizenship);
				$("#passport_seria_number").val(employee[0].passport_seria_number);
				$("#pincode").val(employee[0].pincode);
				$("#passport_date").val(employee[0].passport_date);
				$("#pass_given_authority").val(employee[0].pass_given_authority);
				$("#company_name").val(employee[0].company_name);
				$("#company_address").val(employee[0].company_address);
				$("#company_tel").val(employee[0].company_tel);
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
				}else if(contract=='c1'){
					generate("avans_emr")
				}else if(contract=='c2'){
					generate("evezgun_verilmesi_hq_emr")
				}else if(contract=='c3'){
					generate("ezamiyyet_emri")
				}else if(contract=='c4'){
					generate("is_vaxtindan_artiq_is_emri")
				}else if(contract=='c5'){
					generate("ise_qebul_emri")
				}else if(contract=='c6'){
					generate("maas_deyisikliyi_emri")
				}else if(contract=='c7'){
					generate("mezuniyyet_qismen_odenisli")
				}else if(contract=='c8'){
					generate("mezuniyyet_emri_odenissiz")
				}else if(contract=='c9'){
					generate("mezuniyyet_emri_emek")
				}else if(contract=='c10'){
					generate("mezuniyyetden_geri_cagrilma_emri")
				}else if(contract=='c11'){
					generate("mukafat_emri")
				}else if(contract=='c12'){
					generate("qisaldilmis_is_vaxti_emri")
				}else if(contract=='c13'){
					generate("qrafik_deyisikliyi_emri")
				}else if(contract=='c14'){
					generate("sosial_mezuniyyet_emri")
				}else if(contract=='c15'){
					generate("stat_emri_elave")
				}else if(contract=='c16'){
					generate("stat_emri_legv")
				}else if(contract=='c17'){
					generate("stat_emri_stat_cedvelinin_tesdiqi")
				}else if(contract=='c18'){
					generate("vezife_deyisikliyi_emri")
				}else if(contract=='c19'){
					generate("xitam_emri")
				}
				 $('#whichContracts').modal('hide');
			}

		}
	);

}
$('#employees').on( 'change','#company',  function () {

	console.log('company');
	// $('#whichContracts').modal('show');
	company_id=$(this).find('option:selected').val();
	$.ajax({
		url: "contracts/get_cont_employees.php",
		type: "POST",
		data: { company_id:company_id},
		success: function (data) {
			console.log('data=',data)
			console.log('$.parseJSON(data)=',$.parseJSON(data))
			var option='<select data-live-search="true"  name="empid" id="empid"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
			option += '<option value="0">Seçin..</option>';

			var row = '';
			// $('#tablePositions').find('tbody').html('');
			$.each($.parseJSON(data), function(k,v) {
				console.log('v=',v[1])
					option += '<option value="' + v[0] + '" >' + v[1] + '</option>';

			});
			option+=' </select>';
			console.log('option='+option)
			// option += '</select>';
			$('#contract_emp').html(option);
			$(".selectpicker").selectpicker();

			}
		})
});