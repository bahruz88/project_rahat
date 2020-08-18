
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



 var contract='';
 var contName='';


$('#myContracts').on( 'click', 'input[name=contractSelect]', function () {
	console.log('contractSelect'+$(this).val());
 	// $('#myContracts').find("input[name='contractDate']:checked").removeAttr("checked");
 	$('#myContracts').find("input[name='contractDate']:checked").prop('checked', false);
 	$('#myContracts').find("input[name='commandDate']:checked").prop('checked', false);

	if($(this).val()=='1'){
		$('#contractsDiv').css('display','block');
		$('#commandsDiv').css('display','none');

		$('#myContracts').find('#commandsDate').css('display','none')
		// $('#myContracts').find('#contractsDate').css('display','block')
		$('#myContracts').find('#commands').find('option[value="0"]').prop('selected', true);
		contName="contracts"

	}else {
		$('#contractsDiv').css('display','none');
		$('#commandsDiv').css('display','block');
		$('#myContracts').find('#commandsDate').css('display','flex')
		$('#myContracts').find('#contractsDate').css('display','none')
		$('#myContracts').find('#contracts').find('option[value="0"]').prop('selected', true);
		contName="commands"
	}


});

$('#myContracts').on( 'click', '#closeContract', function () {
	$('#myContracts').find('#contracts').find('option[value="0"]').prop('selected', true);
	$('#myContracts').find('#commands').find('option[value="0"]').prop('selected', true);
	$('#myContracts').find('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
	$("table#command_table tbody").html('');
	$('#myContracts').find("input[name='contractDate']:checked").prop('checked', false);
	$('#myContracts').find("input[name='commandDate']:checked").prop('checked', false);
	$('#myContracts input[name=sinceDate]').val('')
	$('#myContracts').find('#commandsDate').css('display','none')
	$('#myContracts').find('#contractsDate').css('display','none')
	$('#contractsDiv').css('display','none');
	$('#commandsDiv').css('display','none');
	$('#myContracts').find("input[name='contractSelect']:checked").prop('checked', false);


})
$('#myContracts').on( 'change', '#contracts', function () {
	console.log("contracts CHANGE")
	if($(this).find('option:selected').val()!="1"){
		$('#contractsDate').css("display",'none')
	}else{
		$('#contractsDate').css("display",'block')
	}
})
$('#myContracts').on( 'click', '#confirmContract', function () {
	var contractDate='';
	$("table#command_table tbody").html('');
	contract='';
 	if($('#myContracts').find('#commands').find('option:selected').val()!="0"){
		contract=$('#myContracts').find('#commands option:selected').val();

	}else
	if($('#myContracts').find('#contracts').find('option:selected').val()!="0"){
		contract=$('#myContracts').find('#contracts').find('option:selected').val();

	}

	console.log('contract='+contract);
	$('#myContracts').find('#contracts').find('option[value="0"]').prop('selected', true);
	$('#myContracts').find('#commands').find('option[value="0"]').prop('selected', true);

 	 contractDate=$('#myContracts input[name=contractDate]:checked').val();
 	var commandDate=$('#myContracts input[name=commandDate]:checked').val();
 	var sinceDate=$('#myContracts input[name=sinceDate]').val();
	var order='';
	if(contractDate=='1' || commandDate=='1' ){
		order="  ORDER BY tc.id ASC LIMIT 1";
		contractDate='1';
	}
	if(contractDate=='2'|| commandDate=='2'){
		order="  ORDER BY tc.id DESC LIMIT 1";
		contractDate='2';
	}
	if(contractDate=='3'){
		order="";
		contractDate='3';
	}
	if(commandDate=='3'){
		order="";
		contractDate='3';
	}
	if(contractDate==''){
		order="";
		contractDate='';
	}

	GetEmpContractDetails(data,'update',order,contractDate,contName,contract,sinceDate);
	document.getElementById("update_empid").value = data[0];

});
var commandArray =[];
/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
function GetEmpContractDetails(empid,optype,order,contractDate,contName,contract,sinceDate)
{
	console.log('contractDate='+contractDate)
	console.log('command_id='+contract)
	console.log('contName='+contName)
	console.log('sinceDate='+sinceDate)
	var url="";
	if(contName=="contracts"){
		url="contracts/getEmployeeContractDetail.php"
	}else if(contName=="commands"){
		url="contracts/getEmployeeCommandDetail.php"
	}
	if(sinceDate==''){
		var d = new Date();
		sinceDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
	}
	$.post(url,
		{
			empid: empid,
			order: order,
			contractDate:contractDate,
			sinceDate:sinceDate,
			command_id: contract.substr(1, 1),
			contractDate:contractDate
		},
		function (emp_data, status)
		{
			// PARSE json data
			console.log('emp_data=',emp_data)
			// console.log('count=',emp_data.length)
			 commandArray = emp_data;
			var employee = JSON.parse(emp_data);
			var countEmp=employee.length;
			var employeeMem=[]
			console.log('count=',employee.length)
			console.log('employee=',employee)
			var table = '';
			$.each(employee, function(k,value) {
				console.log('value=',value)
				console.log('value.command_no=',value.command_no)
				if(k==0){
					var dis="";
					if(value.command_no!=''){
						dis="disabled";
					}
					$("table#command_table tbody").html('');
					table+='<tr class="typeOfDocument" >' +
						'<td>'+value.id+'</td>'+
						'<td class="cno">'+value.command_no+'</td>'+
						'<td>'+value.firstname+'</td>'+
						'<td>'+value.lastname+'</td>'+
						'<td>'+value.surname+'</td>'+
						'<td>' +
						// '<a href="#" class="print" data-id="'+value[0]+'">Çap et</a><br/>' +
						'<a href="#" class="download" data-id="'+value.id+'" data-empid="'+value.emp_id+'" data-contract="'+contract+'" >Yüklə</a><br/>' +
						'<a href="#" class="create_commmand_no '+dis+'"   data-company_id="'+value.company_id+'" data-id="'+value.id+'" data-empid="'+value.emp_id+'" data-contract="'+contract+'">Əmr nömrəsi ver</a>' +
						// '<button type="button" class="btn btn-primary" id="print">Çap et</button>' +
						// '<button type="button" class="btn btn-primary" id="download">Yüklə</button>' +
						// '<button type="button" class="btn btn-primary" id="create_commmand_no">Əmr nömrəsi ver</button>' +
						'</td>';
				}
			});

			$("table#command_table tbody").append(table);
			$("table#command_table").css("display","inline-table");
			if(contName=="contracts") {
				$(".cno").css("display", "none");
			}






		}
	);

}

$('#employees').on( 'change','#company',  function () {

	console.log('company');
	// $('#whichContracts').modal('show');
	company_id=$(this).find('option:selected').val();
	$.ajax({
		url: "contracts/get_employees.php",
		type: "POST",
		data: { company_id:company_id},
		success: function (data) {
			console.log('data=',data)
			console.log('$.parseJSON(data)=',$.parseJSON(data))
			var option='<select data-live-search="true"  name="empid" id="empid"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
			option += '<option value="">Seçin..</option>';

			var row = '';
			// $('#tablePositions').find('tbody').html('');
			$.each($.parseJSON(data), function(k,v) {
				console.log('v=',v[1])
					option += '<option value="' + v[0] + '" >' + v[1] + ' '+v[2] + ' '+v[3] + '</option>';

			});
			option+=' </select>';
			console.log('option='+option)
			// option += '</select>';
			$('#contract_emp').html(option);
			$(".selectpicker").selectpicker();

			}
		})
});
var company_id='';
var code='';
var position='';
var empid='';
$('#employees').on( 'click','#searchContract',  function () {
	console.log('company');
	// $('#whichContracts').modal('show');
	company_id=$('#company').find('option:selected').val();
	position=$('#position_level').find('option:selected').val();
	empid=$('#empid').find('option:selected').val();
	code=$('#code').val();
	position=$('#position_level').find('option:selected').val();
	$.ajax({
		url: "contracts/get_cont_employees.php",
		type: "POST",
		data: { company_id:company_id,code:code,position:position,empid:empid},
		success: function (data) {
			console.log('data=',data)
			console.log('dataparseJSON=',$.parseJSON(data))

			var table = '';
			$("table#emp_table tbody").html('');
			// $('#tablePositions').find('tbody').html('');
			$.each($.parseJSON(data), function(k,value) {



				table+='<tr class="typeOfDocument" >' +
					'<td><a href="#" class="contractShow" data-id="'+value.id+'" data-empid="'+value.emp_id+'">Senede bax</a></td>'+
					'<td>'+value.code+'</td>'+
					'<td>'+value.firstname+'</td>'+
					'<td>'+value.lastname+'</td>'+
					'<td>'+value.surname+'</td>'+
					'<td>'+value.position_level+'</td>';



			});
			$("table#emp_table tbody").append(table);
			// $('#company').find('option[value=""]').prop('selected', true);
			// $('#position_level').find('option[value=""]').prop('selected', true);
			// $('#empid').find('option[value=""]').prop('selected', true);
			// $('#code').val('');
			// $(".selectpicker").selectpicker();


		}
	})
});


var data;
$('#emp_table').on( 'click','.contractShow',  function () {
	console.log('contractShow');
		$('#myContracts').modal('show');
		data =   $(this).attr("data-empid")
		// data =   $('#empid').find('option:selected').val()

});

var idDownload = '';
var contractDownload ='';
$('#command_table').on( 'click','.download',  function () {


		 idDownload =   $(this).attr("data-empid");
		 contractDownload =   $(this).attr("data-contract");
		$('#whichDate').modal('show');



});
$('#command_table').on( 'click','.create_commmand_no',  function () {
	console.log("create_commmand_no");
	var id=   $(this).attr("data-id");
	var contract =   $(this).attr("data-contract");
	var empid =   $(this).attr("data-empid");
	var company_id =   $(this).attr("data-company_id");
	$.ajax({
		url: 'contracts/commandNumber_update.php',
		type: "POST",
		data: {id: id, contract:  contract.substr(1, 1), empid: empid, company_id: company_id},
		success: function (data) {
			console.log('DATA=',data)
		}
		})

})


$('#whichDate').on( 'click','#confirmDate',  function () {


	var employee = JSON.parse(commandArray);
	console.log('download employee=',employee);
	$('#member').html('');
	$.each(employee, function(k,value) {
		var d = new Date();
		var contract=contractDownload;
		var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
		console.log('employee[0]',value)
		if(value.emp_id==idDownload){
			if(k==0){
				$("#structure1").val(value.structure1);
				$("#structure2").val(value.structure2);
				$("#structure3").val(value.structure3);
				$("#structure4").val(value.structure4);
				$("#structure5").val(value.structure5);

				if(value.marital_status=='1'){
					$("#marital_status").val('Evli');
				}else{
					$("#marital_status").val('Subay');
				}

				var military_reg_category='';
				var military_reg_group='';
				if(value.military_reg_category==1){
					military_reg_category='Kateqoriya 1';
				}else{
					military_reg_category='Kateqoriya 2';
				}
				if(value.military_reg_group==1){
					military_reg_group='Çağırışçı';
				}else{
					military_reg_group='Hərbi vəzifəli';
				}


				$("#emp_id").val(value.id)
				$("#currentDate").val($('#selectDate').val())
				$("#command_no").val(value.command_no)
				$("#full_name").val(value.full_name)
				// $("#uid").val(empid)
				$("#citizenship").val(value.citizenship);
				$("#passport_seria_number").val(value.passport_seria_number);
				$("#pincode").val(value.pincode);
				$("#passport_date").val(value.passport_date);
				$("#pass_given_authority").val(value.pass_given_authority);
				$("#company_name").val(value.company_name);
				$("#company_address").val(value.company_address);
				$("#company_tel").val(value.company_tel);
				$("#voen").val(value.voen);
				$("#sun").val(value.sun);
				$("#enterprise_head_position").val(value.enterprise_head_position);
				$("#enterprise_head_fullname").val(value.enterprise_head_fullname);
				$("#qualification").val(value.qualification);
				$("#uni_name").val(value.uni_name);
				$("#profession").val(value.profession);
				$("#create_date").val(value.create_date);
				$("#firstname").val(value.firstname);
				$("#lastname").val(value.lastname);
				$("#surname").val(value.surname);
				$("#birth_date").val(value.birth_date);
				$("#birth_place").val(value.birth_place);
				$("#mob_tel").val(value.mob_tel);
				$("#living_address").val(value.living_address);
				$("#military_reg_group").val(military_reg_group);
				$("#military_reg_category").val(military_reg_category);
				$("#military_staff").val(value.staff_desc);
				$("#military_rank").val(value.rank_desc);
				$("#military_specialty_acc").val(value.military_specialty_acc);
				$("#military_fitness_service").val(value.military_fitness_service);
				$("#military_registration_service").val(value.military_registration_service);
				$("#military_registration_date").val(value.military_registration_date);
				$("#military_general").val(value.military_general);
				$("#military_special").val(value.military_special);
				$("#military_no_official").val(value.military_no_official);
				$("#military_additional_information").val(value.military_additional_information);
				$("#military_date_completion").val(value.military_date_completion);

			}
			 else{

				if(value.memberType){
					var mem='<div class="m'+value.member_type +'" data_memType="'+value.memberType +'"><input type="hidden" class="form-control" id="memberType" name="memberType" value="'+value.memberType +'"   />\n' +
						'                        <input type="hidden" class="form-control" id="birth_date" value="'+value.birth_date +'" name="birth_date"   />\n' +
						'                        <input type="hidden" class="form-control" id="m_firstname" value="'+value.m_firstname +'" name="m_firstname"   />\n' +
						'                        <input type="hidden" class="form-control" id="m_lastname" value="'+value.m_lastname +'" name="m_lastname"   />\n' +
						'</div>';
					console.log('value.memberType='+value.memberType)
					console.log('mem='+mem)
					$('#member').append(mem);

				 }
			 }

			}
	});
	if(contract=='1'){
		generate("emek2")
		//$('#emek').modal('show');
	}else if(contract=='2'){
		generate("emekElave")
	}else if(contract=='3'){
		generate("herbi2")
	}else if(contract=='c1'){
		generate("avans_emr")
	}else if(contract=='c2'){
		generate("evezgun_verilmesi_hq_emr")
	}else if(contract=='c3'){
		generate("ezamiyyet_emri")
	}else if(contract=='c4'){
		generate("is_vaxtindan_artiq_is_emri")
	}else if(contract=='c5'){
		generate("ise_qebul_emr")
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

	$('#whichDate').modal('hide');
	$('#selectDate').val('')
})

$(function () {
	$('#selectDate').datepicker({
		todayHighlight: true,
		format: 'dd/mm/yyyy',
		// startDate: new Date()
	});
	$('#sinceDate').datepicker({
		todayHighlight: true,
		format: 'dd/mm/yyyy',
		// startDate: new Date()
	});
});
