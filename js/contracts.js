
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
	////console.log('contractSelect'+$(this).val());
	// $('#myContracts').find("input[name='contractDate']:checked").removeAttr("checked");
	$('#myContracts').find("input[name='contractDate']:checked").prop('checked', false);
	$('#myContracts').find("input[name='commandDate']:checked").prop('checked', false);
	$("table#command_table tbody").html('');
	if($(this).val()=='1'){
		$('#contractsDiv').css('display','block');
		$('#commandsDiv').css('display','none');

		$('#myContracts').find('#commandsDate').css('display','none')
		// $('#myContracts').find('#contractsDate').css('display','block')
		$('#myContracts').find('#commands').find('option[value="0"]').prop('selected', true);
		contName="contracts";
		$('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
		$(".selectpicker").selectpicker();

	}else {
		$('#contractsDiv').css('display','none');
		$('#commandsDiv').css('display','block');
		$('#myContracts').find('#commandsDate').css('display','flex')
		$('#myContracts').find('#contractsDate').css('display','none')
		$('#myContracts').find('#contracts').find('option[value="0"]').prop('selected', true);
		contName="commands";
		$('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
		$(".selectpicker").selectpicker();
	}


});

$('#myContracts').on( 'click', '#closeContract', function () {
	$('#myContracts').find('#contracts').find('option[value="0"]').prop('selected', true);
	$('#myContracts').find('#commands').find('option[value="0"]').prop('selected', true);
	$('#myContracts').find('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
	$("table#command_table tbody").html('');
	$('#myContracts').find("input[name='contractDate']:checked").prop('checked', false);
	$('#myContracts').find("input[name='commandDate']:checked").prop('checked', false);
	$('#myContracts input[name=sinceBeginDate]').val('')
	$('#myContracts input[name=sinceEndDate]').val('')
	$('#myContracts').find('#commandsDate').css('display','none')
	$('#myContracts').find('#contractsDate').css('display','none')
	$('#contractsDiv').css('display','none');
	$('#commandsDiv').css('display','none');
	$('#myContracts').find("input[name='contractSelect']:checked").prop('checked', false);


})

$('#myContracts').on( 'change', '#contracts', function () {
	////console.log("contracts CHANGE")
	if($(this).find('option:selected').val()!="1"){
		$('#contractsDate').css("display",'none')
	}else{
		$('#contractsDate').css("display",'block')
	}
})


$('input:radio[name=commandDate],input:radio[name=contractDate],#confirmContract, #sinceBeginDate, #sinceEndDate, #commands').on('change', function() {
	console.log('change name='+$(this).attr('name'))
	console.log('change id='+$(this).attr('id'))
	console.log('change val='+$(this).val())
	if($(this).val()=='3' && $(this).attr('name')=='contractDate'){
		$('#whichDateContract').modal('show');
	}else{
		changeAttr('')
	}


});
$('#whichDateContract').on( 'click','#confirmDateContract',  function () {
	var confirmDateContract=$('#selectDateContract').val()
	changeAttr(confirmDateContract);
	$('#selectDateContract').val('')
	$('#whichDateContract').modal('hide');
})
function changeAttr(confirmDateContract){
	console.log('changeAttr confirmDateContract='+confirmDateContract)
	$("table#command_table tbody").html('');
	contract='';
	if($('#myContracts').find('#commands').find('option:selected').val()!="0"){
		contract=$('#myContracts').find('#commands option:selected').val();

	}else
	if($('#myContracts').find('#contracts').find('option:selected').val()!="0"){
		contract=$('#myContracts').find('#contracts').find('option:selected').val();

	}

	 var contractDate='';
	var commandDate=''
	if($('#myContracts input[name=contractDate]:checked').val() && contractDate==''){
		contractDate=$('#myContracts input[name=contractDate]:checked').val();
	}
	if($('#myContracts input[name=commandDate]:checked').val()){
		commandDate=$('#myContracts input[name=commandDate]:checked').val();
	}

	var sinceBeginDate=$('#myContracts input[name=sinceBeginDate]').val();
	var sinceEndDate=$('#myContracts input[name=sinceEndDate]').val();
	var companyId=$('#company option:selected').val();
	console.log('contract='+contract);
	console.log('contractDate='+contractDate);
	console.log('commandDate='+commandDate);
	console.log('sinceBeginDate='+sinceBeginDate);
	console.log('sinceEndDate='+sinceEndDate);
	console.log('companyId='+companyId);
	console.log('confirmDateContract='+confirmDateContract);
	var order='';
	if(confirmDateContract!=''){
		order="confirmDateContract";
		contractDate='';
	}
	if((contractDate=='1' || commandDate=='1') && confirmDateContract=='' ){
		order="  ORDER BY tc.id ASC LIMIT 1";
		contractDate='1';
	}
	if((contractDate=='2'|| commandDate=='2')&& confirmDateContract==''){
		order="  ORDER BY tc.id DESC LIMIT 1";
		contractDate='2';
	}
	if(contractDate=='3' && confirmDateContract=='' && confirmDateContract==''){
		order="";
		contractDate='3';
	}
	if(commandDate=='3' && confirmDateContract=='' && confirmDateContract==''){
		order="";
		contractDate='3';
	}
	if((contractDate=='' || commandDate=='') && confirmDateContract==''){
		order="";
		contractDate='';
	}

	GetEmpContractDetails(data,'update',order,contractDate,contName,contract,sinceBeginDate,sinceEndDate,companyId,confirmDateContract);
	document.getElementById("update_empid").value = data[0];
}
var commandArray =[];
/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
function GetEmpContractDetails(empid,optype,order,contractDate,contName,contract,sinceBeginDate,sinceEndDate,companyId,confirmDateContract)
{
	console.log('contractDate='+contractDate)
	console.log('command_id='+contract)
	console.log('contName='+contName)
	console.log('empid='+empid)
	console.log('sinceBeginDate='+sinceBeginDate)
	console.log('companyId='+companyId)
	console.log('confirmDateContract='+confirmDateContract)
	var url="";
	if(contName=="contracts"){
		url="contracts/getEmployeeContractDetail.php"
	}else if(contName=="commands"){
		url="contracts/getEmployeeCommandDetails.php"
	}
	if(sinceBeginDate==''){
		sinceBeginDate = '1900-01-01';
	}
	if(sinceEndDate==''){
		// var d = new Date();
		// sinceEndDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
		sinceEndDate = '9999-12-31';
	}
	////console.log(	"command_id:=="+ contract.substr(1))
	$.post(url,
		{
			empid: empid,
			order: order,
			contractDate:contractDate,
			sinceBeginDate:sinceBeginDate,
			sinceEndDate:sinceEndDate,
			companyId:companyId,
			confirmDateContract:confirmDateContract,
			command_id: contract.substr(1),
			contractDate:contractDate
		},
		function (emp_data, status)
		{
			// PARSE json data
			 console.log('emp_data=',emp_data)
			//console.log('count=',emp_data.length)
			commandArray = emp_data;
			var employee = JSON.parse(emp_data);
			var countEmp=employee.length;
			var employeeMem=[];
			////console.log('count=',employee.length)
			console.log(url+'=url employee=',employee)
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
			}else{
				$(".cno").css("display", "table-cell");
			}
		}
	);

}

var company_id='';
var code='';
var position='';
var empid='';
 // $('#employees').on( 'click','#searchContract',  function () {
$('#employees').on( 'change','#company,#code,#empid,#position_level',  function () {

	company_id=$('#company').find('option:selected').val();
	empid=$('#empid').find('option:selected').val();
	code=$('#code').val();
	position=$('#position_level').find('option:selected').val();
	console.log('$(this).attr(\'name\')='+$(this).attr('name'))
	console.log('empid='+empid)
	console.log('position='+position)
	if($(this).attr('name')=="company"){
		$.ajax({
			url: "employees/getEmployee.php",
			type: "POST",
			data: { company_id:company_id},
			success: function (data) {
				console.log('data getEmployee=',data)
				console.log('$.parseJSON(data) getEmployee=',$.parseJSON(data))
				var option='<select data-live-search="true"  name="empid" id="empid"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
				option += '<option value="">Seçin..</option>';

				// $('#tablePositions').find('tbody').html('');
				$.each($.parseJSON(data), function(k,v) {
					////console.log('v=',v[1])
					option += '<option value="' + v[0] + '" >' + v[1]  + '</option>';

				});
				option+=' </select>';
				////console.log('option='+option)
				// option += '</select>';
				$('#contract_emp').html(option);
				$(".selectpicker").selectpicker();

			}
		})
	}




	$.ajax({
		url: "contracts/get_cont_employees.php",
		type: "POST",
		data: { company_id:company_id,code:code,position:position,empid:empid},
		success: function (data) {
			 console.log('data222=',data)
			var table = '';
			$("table#emp_table tbody").html('');
			// $('#tablePositions').find('tbody').html('');
			$.each($.parseJSON(data), function(k,value) {
				var code="";
				var posit="";
				if(value.code){
					code=value.code;
				}
				if(value.posit){
					posit=value.posit;
				}
				table+='<tr class="typeOfDocument" >' +
					'<td><a href="#" class="contractShow" data-id="'+value.id+'" data-empid="'+value.emp_id+'">Senede bax</a></td>'+
					'<td>'+code  +'</td>'+
					'<td>'+value.firstname+'</td>'+
					'<td>'+value.lastname+'</td>'+
					'<td>'+value.surname+'</td>'+
					'<td>'+posit+'</td>';
			});
			$("table#emp_table tbody").append(table);
		}
	})
});


var data;
$('#emp_table').on( 'click','.contractShow',  function () {
	////console.log('contractShow');
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
	////console.log("create_commmand_no");
	var that=$(this);
	var id=   $(this).attr("data-id");
	var contract =   $(this).attr("data-contract");
	var empid =   $(this).attr("data-empid");
	var company_id =   $(this).attr("data-company_id");
	$.ajax({
		url: 'contracts/commandNumber_update.php',
		type: "POST",
		data: {id: id, contract:  contract.substr(1, 1), empid: empid, company_id: company_id},
		success: function (data) {
			////console.log('DATA=',data);
			$('#command_no').val(data)
			that.closest('tr').find('.cno').html(data)
			that.addClass('disabled');
			////console.log('cno='+that.closest('tr').find('.cno').html())
		}
	})

})


$('#whichDate').on( 'click','#confirmDate',  function () {

	var employee = JSON.parse(commandArray);
	var employeeName = '';
	console.log('download employee=',employee);
	$('#member').html('');
	$.each(employee, function(k,value) {
		var d = new Date();
		var contract=contractDownload;
		var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
		////console.log('employee[0]',value)
		////console.log('value.emp_id='+value.emp_id)
		////console.log('idDownload='+idDownload)

		if(value.emp_id==idDownload){
			if(k==0){
				////console.log('value.pos='+value.pos)
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
				employeeName=value.full_name;
				console.log('employeeName='+employeeName)
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
				$("#indefinite").val(value.indefinite);
				$("#reasons_temporary_closure").val(value.reasons_temporary_closure);
				$("#date_contract").val(value.date_contract);
				$("#probation").val(value.probation);
				$("#dates").val(value.dates);
				$("#trial_expiration_date").val(value.trial_expiration_date);
				$("#employee_start_date").val(value.employee_start_date);
				$("#date_conclusion_contract").val(value.date_conclusion_contract);
				$("#regulation_property_relations").val(value.regulation_property_relations);
				$("#termination_cases").val(value.termination_cases);
				$("#other_condition_wages").val(value.other_condition_wages);
				$("#workplace_status").val(value.workplace_status);
				$("#working_conditions").val(value.working_conditions);
				$("#job_description").val(value.job_description);
				$("#kvota").val(value.kvota);
				$("#insert_date").val(value.insert_date.substr(0,10));

				$("#vezife").val(value.pos);
				$("#directorate").val(value.directorate);
				$("#department").val(value.department);
				$("#depart").val(value.depart);
				$("#area_section").val(value.area_section);

				$("#exit_date").val(value.exit_date);
				$("#main").val(value.main);
				$("#guarantees_termination_contract").val(value.guarantees_termination_contract);
				$("#type_dismissal").val(value.type_dismissal);
				$("#termination_clause").val(value.termination_clause);
				$("#note").val(value.note);
				$("#prize").val(value.prize);
				$("#wage").val(value.wage);
				$("#reward_period").val(value.reward_period);
				$("#bank_name").val(value.bank_name);
				$("#service").val(value.service);
				$("#bank_filial").val(value.bank_filial);
				$("#kod").val(value.kod);
				$("#cor_account").val(value.cor_account);
				$("#swift").val(value.swift);
				$("#bank_voen").val(value.bank_voen);
				$("#azn_account").val(value.azn_account);
				$("#usd_account").val(value.usd_account);
				$("#eur_account").val(value.eur_account);
				$("#country").val(value.country);
				$("#city").val(value.city);
				$("#address").val(value.address);
				$("#tel").val(value.tel);
				$("#enterprise_head_fullname").val(value.enterprise_head_fullname);
				$("#enterprise_head_position").val(value.enterprise_head_position);
				$("#other_conditions1").val(value.other_conditions1);
				$("#other_conditions2").val(value.other_conditions2);
				$("#other_conditions3").val(value.other_conditions3);
				$("#job_description").val(value.job_description);
				$("#totalMonthlySalary").val(value.total_monthly_salary);
				$("#living_address").val(value.living_address);
				$("#living_address").val(value.living_address);
				$("#additions_salary").val(value.additions_salary);

			}
			else{

				if(value.memberType){
					var mem='<div class="m'+value.member_type +'" data_memType="'+value.memberType +'"><input type="hidden" class="form-control" id="memberType" name="memberType" value="'+value.memberType +'"   />\n' +
						'                        <input type="hidden" class="form-control" id="birth_date" value="'+value.birth_date +'" name="birth_date"   />\n' +
						'                        <input type="hidden" class="form-control" id="m_firstname" value="'+value.m_firstname +'" name="m_firstname"   />\n' +
						'                        <input type="hidden" class="form-control" id="m_lastname" value="'+value.m_lastname +'" name="m_lastname"   />\n' +
						'</div>';
					////console.log('value.memberType='+value.memberType)
					////console.log('mem='+mem)
					$('#member').append(mem);

				}
			}

		}
	});
	console.log('employeeName=='+employeeName)
	if(contract=='1'){
		generate("emek_muqavilesi",employeeName)
		//$('#emek').modal('show');
	}else if(contract=='2'){
		generate("emekElave",employeeName)
	}else if(contract=='3'){
		generate("herbi2",employeeName)
	}else if(contract=='c1'){
		generate("avans_emri",employeeName)
	}else if(contract=='c2'){
		generate("evezgun_verilmesi_hq_emr")
	}else if(contract=='c3'){
		generate("ezamiyyet_emri",employeeName)
	}else if(contract=='c4'){
		generate("is_vaxtindan_artiq_is_emri",employeeName)
	}else if(contract=='c5'){
		generate("ishe_qebul_emr",employeeName)
	}else if(contract=='c6'){
		generate("maash_deyisikliyi_emri_",employeeName)
	}else if(contract=='c7'){
		generate("mezuniyyet_qismen_odenisli",employeeName)
	}else if(contract=='c8'){
		generate("mezuniyyet_emri_odenissiz",employeeName)
	}else if(contract=='c9'){
		generate("mezuniyyet_emri_emek",employeeName)
	}else if(contract=='c10'){
		generate("mezuniyyetden_geri_cagrilma_emri",employeeName)
	}else if(contract=='c11'){
		generate("mukafat_emri_",employeeName)
	}else if(contract=='c12'){
		generate("qisaldilmis_is_vaxti_emri",employeeName)
	}else if(contract=='c13'){
		generate("qrafik_deyisikliyi_emri",employeeName)
	}else if(contract=='c14'){
		generate("sosial_mezuniyyet_emri",employeeName)
	}else if(contract=='c15'){
		generate("stat_emri_elave",employeeName)
	}else if(contract=='c16'){
		generate("stat_emri_legv",employeeName)
	}else if(contract=='c17'){
		generate("stat_emri_stat_cedvelinin_tesdiqi",employeeName)
	}else if(contract=='c18'){
		generate("vezife_deyishikliyi",employeeName)
	}else if(contract=='c19'){
		generate("xitam_emri",employeeName)
	}

	$('#whichDate').modal('hide');
	$('#selectDate').val('')
})


$(function () {
	$('#selectDate').datepicker({
		todayHighlight: true,
		format: 'dd/mm/yyyy',
		autoclose: true
		// startDate: new Date()
	});
	$('#selectDateContract').datepicker({
		todayHighlight: true,
		format: 'dd/mm/yyyy',
		autoclose: true
		// startDate: new Date()
	});
	$('#sinceBeginDate').datepicker({
		todayHighlight: true,
		format: 'dd/mm/yyyy',
		autoclose: true
		// startDate: new Date()
	});
	$('#sinceEndDate').datepicker({
		todayHighlight: true,
		format: 'dd/mm/yyyy',
		autoclose: true
		// startDate: new Date()
	});
});
