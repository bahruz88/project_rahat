
var up_emp;
$(function () {

	$('#nav-tabs').on('shown.bs.tab', 'a', function (e) {
		if (e.relatedTarget) {
			$(e.relatedTarget).removeClass('active');
		}
	})



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
				"previous": "<?php echo $dil['previous'] ; ?> ",
				"next": "<?php echo $dil['next'] ; ?>"
			}
		},
		"ajax": {
			url: "salaryInfo/get_salary.php",
			type: "POST"
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
					$('#company_id').closest('div').removeClass( "is-valid" );
					$('#company_id').closest('div').removeClass( "is-invalid" );
					$('#employee').closest('div').removeClass( "is-valid" );
					$('#employee').closest('div').removeClass( "is-invalid" );

					$('#wage').removeClass( "is-valid" );
					$('#wage').removeClass( "is-invalid" );
					$('#wage_currency').closest('div').removeClass( "is-valid" );
					$('#wage_currency').closest('div').removeClass( "is-invalid" );





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
				text:'Kopyala'
			},
			{
				extend: 'print',
				text:'Çap et'
			},{
				extend: 'colvis',
				text:'Sütunu gizlət'
			},
		],

		"lengthMenu": [
			[10, 20, 50, -1],
			[10, 20, 50, "All"]
		]

	});

	/*Button  click  on grid */
	$('#salary_table tbody').on('click', '#delete', function () {
		var data = table.row($(this).parents('tr')).data();
		document.getElementById("id").value = data[0];
		$('#modalDelete').modal('show');
	});

	$('#salary_table tbody').on('click', '#edit', function () {
		var data = table.row($(this).parents('tr')).data();
		GetSalaryDetails(data[0], 'update');
		document.getElementById("update_empid").value = data[0];

	});

	$('#salary_table tbody').on('click', '#view', function () {
		//console.log('$row_employees[\'image_name\']')
		var data = table.row($(this).parents('tr')).data();
		GetSalaryDetails(data[0], 'view');
		document.getElementById("update_empid").value = data[0];

	});


	/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
	function GetSalaryDetails(id, optype) {
		//console.log('id=' + id)
		// $('#modalEdit').modal('show');
		$.post("salaryInfo/getSalaryDetail.php",
			{
				id: id
			},
			function (emp_data, status) {
				// PARSE json data
				var employee = JSON.parse(emp_data);
				// Assing existing values to the modal popup fields
				//console.log('employee=', employee)
				//console.log('employee.emp_id='+employee.emp_id)
up_emp=employee.emp_id;
				if (optype == 'update') {
					$("#update_company_id").val(employee.company_id).change();
					$("#update_employee").val(employee.emp_id).change();


					$("#update_tariffRate").val(employee.tariff_rate).change();
					$("#update_positionStatus").val(employee.position_status_id).change();
					$("#update_wage").val(employee.wage);
					$("#update_currency").val(employee.wage_currency).change();
					// $("#update_reasonChange").val(employee.wage);
					$("#update_totalMonthlySalary").val(employee.total_monthly_salary);
					$("#update_prizeAmount").val(employee.prize_amount);
					$("#update_prizeCurrency").val(employee.prize_amount_currency).change();
					$("#update_rewardPeriod").val(employee.reward_period).change();
					$("#update_placeExpenditure").val(employee.place_expenditure_id).change();
					$("#update_reasonChange").val(employee.salary_change_reason);
					$("#update_otherCondition1").val(employee.other_conditions1);
					$("#update_otherCondition2").val(employee.other_conditions2);
					$("#update_otherCondition3").val(employee.other_conditions3);

					$('#modalEdit').modal('show');
					//console.log(' update_employee val ='+$("#update_employee").find('option:selected').val())

				} else {
					var wage_currency = '';
					if (employee.wage_currency) {
						wage_currency = employee.wage_currency
					}
					var prize_amount_currency = '';
					if (employee.prize_amount_currency) {
						prize_amount_currency = employee.prize_amount_currency
					}
					$("#view_salaryemp").val(employee.full_name);
					$("#view_tariff_rate").val(employee.tariff_rate);
					$("#view_position_status_id").val(employee.position_status_id);
					$("#view_wage").val(employee.wage + ' ' + employee.wage_currencyText);
					$('#view_total_monthly_salary').val(employee.total_monthly_salary);
					$('#view_prize_amount').val(employee.prize_amount + ' ' + employee.prize_amount_currencytext);
					$("#view_reward_period").val(employee.reward_period);
					$("#view_place_expenditure_id").val(employee.place_expenditure_id);
					$("#view_salary_change_reason").val(employee.salary_change_reason);
					$("#view_other_conditions1").val(employee.other_conditions1);
					$("#view_other_conditions2").val(employee.other_conditions2);
					$("#view_other_conditions3").val(employee.other_conditions3);
					$('#modalViewSalary').modal('show');
				}
			}
		);

	}
	function validUpdate(){
		if($('#update_company_id').val()=='' ){
			$('#update_company_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_company_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if( $('#update_employee').val()=='' ){
			$('#update_employee').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_employee').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if( $('#update_tariffRate').val()=='' || $('#update_tariffRate').val()=='0'){
			$('#update_tariffRate').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_tariffRate').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if(  $('#update_positionStatus').val()==''){
			$('#update_positionStatus').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_positionStatus').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if(   $('#update_wage').val()==''){
			$('#update_wage').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_wage').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if(  $('#update_currency option:selected').val()=='' ||$('#update_currency option:selected').val()=='0' ||$('#update_currency option:selected').val()==null ){
			$('#update_currency').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_currency').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if($('#update_reasonChange').val()==''){
			$('#update_reasonChange').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_reasonChange').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if($('#update_totalMonthlySalary').val()==''){
			$('#update_totalMonthlySalary').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_totalMonthlySalary').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if( $('#update_prizeAmount').val()==''){
			$('#update_prizeAmount').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_prizeAmount').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		//console.log('$(\'#update_prizeCurrency\').val()='+$('#update_prizeCurrency').val())
		if(  $('#update_prizeCurrency').val()==''  ||$('#update_prizeCurrency').val()=='0'||$('#update_prizeCurrency').val()==null ){
			$('#update_prizeCurrency').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_prizeCurrency').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if($('#update_rewardPeriod').val()==''){
			$('#update_rewardPeriod').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_rewardPeriod').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if($('#update_placeExpenditure').val()==''){
			$('#update_placeExpenditure').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_placeExpenditure').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		return true
	}
	function validInsert(){
		if($('#company_id').val()=='' ){
			$('#company_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#company_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if( $('#employee').val()=='' ){
			$('#employee').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#employee').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		// if( $('#tariffRate').val()=='' || $('#tariffRate').val()=='0'){
		// 	$('#tariffRate').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
		// 	return false
		// }else{
		// 	$('#tariffRate').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		//
		// }
		// if(  $('#positionStatus').val()==''){
		// 	$('#positionStatus').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
		// 	return false
		// }else{
		// 	$('#positionStatus').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		//
		// }
		if(   $('#wage').val()==''){
			$('#wage').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#wage').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		if(  $('#wage_currency').val()=='' ||$('#wage_currency').val()=='0' ){
			$('#wage_currency').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#wage_currency').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}

		return true
	}
	/*ISCHI MELUMATLARI  DAXIL  EDILIR  */
	$("#salaryInsert").submit(function (e) {
		e.preventDefault();

		if (validInsert()) {
			$.ajax({
				url: "salaryInfo/salaryInsert.php",
				method: "post",
				data: $("#salaryInsert").serialize(),
				dataType: "text",
				success: function (strMessage) {
					//console.log('$("form").serialize()ddd=' + $("#salaryInsert").serialize())
					$("#badge_success").text('');
					$("#badge_danger").text('');
					if (strMessage.substr(1, 4) === 'error') {
						$("#errorp").text(strMessage);
						$("#modalInsertError").modal('show');
						$("#myModal").modal('hide');
					} else if (strMessage === 'success') {
						$("#successp").text('Məlumat daxil edildi ');
						$("#modalInsertSuccess").modal('show');
						$("#myModal").modal('hide');
					} else {
						$("#errorp").text(strMessage);
						$("#modalInsertError").modal('show');
						$("#myModal").modal('hide');

					}
				}
			});
			$( "#salaryInsert")[0].reset();
			$( "#salaryInsert").get(0).reset();
			$(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")
 				$('#wage').val("0")
				$('#prizeAmount').val("0")

			$(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
			$(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
			$(".selectpicker").selectpicker();
			table.ajax.reload();

		}
		table.ajax.reload();
	});

	/*İSCHİ  MELUMATALRİ SİLİNİR */
	$("#salaryDelete").submit(function (e) {

		e.preventDefault();
		$.ajax({
			url: "salaryInfo/salaryDelete.php",
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
	$("#salaryUpdate").submit(function (e) {
		e.preventDefault();

		if (validUpdate()) {

			$.ajax({
				url: "salaryInfo/salaryUpdate.php",
				method: "post",
				data: $("#salaryUpdate").serialize(),
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

			table.ajax.reload();
		} else {
			alert('Form not valid');
		}
	});


});
	/**** ADDITION TABLE****/


	$(function () {

		$('#nav-tabs').on('shown.bs.tab', 'a', function (e) {
			if (e.relatedTarget) {
				$(e.relatedTarget).removeClass('active');
			}
		})

		/* EMPLOYEE  TABLE LOAD  */
		var addition_table = $("#addition_table").DataTable({
			// "scrollX": true,
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
				url: "additionSalary/get_addition.php",
				type: "POST"
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
						$("#myAdditionModal").modal();
						//console.log('myAdditionModal')
						$('#myAdditionModal #company_id').closest('div').removeClass( "is-valid" );
						$('#myAdditionModal #company_id').closest('div').removeClass( "is-invalid" );
						$('#myAdditionModal #employee').closest('div').removeClass( "is-valid" );
						$('#myAdditionModal #employee').closest('div').removeClass( "is-invalid" );

						$('#myAdditionModal #additionsDeductionsSalary').closest('div').removeClass( "is-valid" );
						$('#myAdditionModal #additionsDeductionsSalary').closest('div').removeClass( "is-invalid" );
						$('#myAdditionModal #additions_salary').removeClass( "is-valid" );
						$('#myAdditionModal #additions_salary').removeClass( "is-invalid" );

						$('#myAdditionModal #additions_currency').closest('div').removeClass( "is-valid" );
						$('#myAdditionModal #additions_currency').closest('div').removeClass( "is-invalid" );
						$('#myAdditionModal #begin_date').removeClass( "is-valid" );
						$('#myAdditionModal #begin_date').removeClass( "is-invalid" );

						$('#myAdditionModal #end_date').removeClass( "is-valid" );
						$('#myAdditionModal #end_date').removeClass( "is-invalid" );




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
					text:'Kopyala'
				},
				{
					extend: 'print',
					text:'Çap et'
				},{
					extend: 'colvis',
					text:'Sütunu gizlət'
				},
			],

			"lengthMenu": [
				[10, 20, 50, -1],
				[10, 20, 50, "All"]
			]

		});

		/*Button  click  on grid */
		$('#addition_table tbody').on('click', '#delete', function () {
			var data = addition_table.row($(this).parents('tr')).data();
			document.getElementById("additionid").value = data[0];
			$('#modalAdditionDelete').modal('show');
		});

		$('#addition_table tbody').on('click', '#edit', function () {
			var data = addition_table.row($(this).parents('tr')).data();
			GetAdditionDetails(data[0], 'update');
			document.getElementById("update_id").value = data[0];

		});

		$('#addition_table tbody').on('click', '#view', function () {
			//console.log('$row_employees[\'image_name\']')
			var data = addition_table.row($(this).parents('tr')).data();
			GetAdditionDetails(data[0], 'view');
			document.getElementById("update_id").value = data[0];

		});


		/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
		function GetAdditionDetails(id, optype) {
			//console.log('id=' + id)
			// $('#modalEdit').modal('show');
			$.post("additionSalary/getAdditionDetail.php",
				{
					id: id
				},
				function (emp_data, status) {
					// PARSE json data
					var employee = JSON.parse(emp_data);
					// Assing existing values to the modal popup fields
					//console.log('employee=', employee);

					if (optype == 'update') {
						//console.log('employee update=', employee);
						var prize_amount_currency='';
						if(employee.prize_amount_currency){
							prize_amount_currency=employee.prize_amount_currency;
						}
						// $("#uid").val(emp_id)
						// $("#update_company_id").val(employee.company_id).change();
						//console.log('employee.emp_id='+employee.emp_id)
						$("#modalAdditionEdit #update_company_id").val(employee.company_id).change();
						$("#modalAdditionEdit #update_employee").val(employee.emp_id).change();
						$("#update_additionsDeductionsSalary").val(employee.add_salary_id).change();
						$("#update_additions_salary").val(employee.salary);
						$("#update_rewardPeriod").val(employee.reward_period).change();
						$("#update_prizeCurrency").val(prize_amount_currency).change();
						$("#update_additions_currency").val(employee.additions_currency).change();
						// $("#update_reasonChange").val(employee.wage);
						$("#update_begin_date").val(employee.begin_date);
						$("#update_end_date").val(employee.end_date);

						$('#modalAdditionEdit').modal('show');
					} else {
						var wage_currency = '';
						if (employee.wage_currency) {
							wage_currency = employee.wage_currency
						}

						$("#view_company_id").val(employee.company_name);
						$("#view_employee").val(employee.full_name);
						$("#view_additionsDeductionsSalary").val(employee.add_salary);
						$("#view_additions_salary").val(employee.salary+' '+employee.additions_currency_text);
						// $('#view_additions_currency').val(employee.additions_currency);
						$('#view_begin_date').val(employee.begin_date);
						$("#view_end_date").val(employee.end_date);

						$('#modalViewAddition').modal('show');
					}
				}
			);

		}
		function validadditionUpdate(){
			if($('#myAdditionModal #update_company_id').val()=='' ){
				$('#myAdditionModal #update_company_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #update_company_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if( $('#myAdditionModal #update_employee').val()=='' ){
				$('#myAdditionModal #update_employee').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #update_employee').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if( $('#update_additionsDeductionsSalary').val()=='' || $('#update_additionsDeductionsSalary').val()=='0'){
				$('#update_additionsDeductionsSalary').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#update_additionsDeductionsSalary').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}

			// if(   $('#update_rewardPeriod').val()==''){
			// 	$('#update_rewardPeriod').addClass( "is-invalid" ).removeClass( "is-valid" );
			// 	return false
			// }else{
			// 	$('#update_rewardPeriod').addClass( "is-valid" ).removeClass( "is-invalid" );
			//
			// }

			if(   $('#update_additions_salary').val()==''){
				$('#update_additions_salary').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#update_additions_salary').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			// if(  $('#update_prizeCurrency').val()=='' ||$('#update_prizeCurrency').val()=='0' ){
			// 	$(' #update_prizeCurrency').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			// 	return false
			// }else{
			// 	$('#update_prizeCurrency').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
			//
			// }
			//console.log('$(\'#update_additions_currency\').val()='+$('#update_additions_currency').val())
			if(  $('#update_additions_currency').val()=='' ||$('#update_additions_currency').val()=='0' ){
				$('#update_additions_currency').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#update_additions_currency').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if($('#update_begin_date').val()==''){
				$('#update_begin_date').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#update_begin_date').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if($('#update_end_date').val()==''){
				$('#update_end_date').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#update_end_date').addClass( "is-valid" ).removeClass( "is-invalid" );

			}

			return true
		}
		function validadditionInsert(){
			//console.log('sss='+$('#myAdditionModal  #company_id').val())
			if($('#myAdditionModal #company_id').val()=='' ){

				$('#myAdditionModal #company_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #company_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if( $('#myAdditionModal #employee').val()=='' ){
				$('#myAdditionModal #employee').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #employee').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if( $('#myAdditionModal #additionsDeductionsSalary').val()=='' || $('#additionsDeductionsSalary').val()=='0'){
				$('#myAdditionModal #additionsDeductionsSalary').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #additionsDeductionsSalary').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}

			if(   $('#myAdditionModal #additions_salary').val()==''){
				$('#myAdditionModal #additions_salary').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #additions_salary').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if(  $('#myAdditionModal #additions_currency').val()=='' ||$('#additions_currency').val()=='0' ){
				$('#myAdditionModal #additions_currency').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #additions_currency').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if($('#myAdditionModal #begin_date').val()==''){
				$('#myAdditionModal #begin_date').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #begin_date').addClass( "is-valid" ).removeClass( "is-invalid" );

			}
			if($('#myAdditionModal #end_date').val()==''){
				$('#myAdditionModal #end_date').addClass( "is-invalid" ).removeClass( "is-valid" );
				return false
			}else{
				$('#myAdditionModal #end_date').addClass( "is-valid" ).removeClass( "is-invalid" );

			}

			return true
		}
		/*ISCHI MELUMATLARI  DAXIL  EDILIR  */
		$("#additionInsert").submit(function (e) {
			e.preventDefault();
			if (validadditionInsert()) {
				$.ajax({
					url: "additionSalary/additionInsert.php",
					method: "post",
					data: $("form").serialize(),
					dataType: "text",
					success: function (strMessage) {
						//console.log('$("form").serialize() additionInsert=' + $("#additionInsert").serialize())
						$("#badge_success").text('');
						$("#badge_danger").text('');
						if (strMessage.substr(1, 4) === 'error') {
							$("#errorp").text(strMessage);
							$("#modalInsertError").modal('show');
							$("#myAdditionModal").modal('hide');
						} else if (strMessage === 'success') {
							$("#successp").text('Məlumat daxil edildi ');
							$("#modalInsertSuccess").modal('show');
							$("#myAdditionModal").modal('hide');
						} else {
							$("#errorp").text(strMessage);
							$("#modalInsertError").modal('show');
							$("#myAdditionModal").modal('hide');

						}
					}
				});
				$(this).closest('form').find("input[type=text],input[type=number], textarea,select").val("")

				$(this).closest('form').find("select option[value='0']").prop('selected', 'selected').change();
				$(this).closest('form').find("select option[value='']").prop('selected', 'selected').change();
				$(".selectpicker").selectpicker();
				addition_table.ajax.reload();
				//	$( "#additionInsert" ).get(0).reset();
			}
			addition_table.ajax.reload();
		});

		/*İSCHİ  MELUMATALRİ SİLİNİR */
		$("#additionDelete").submit(function (e) {

			e.preventDefault();
			$.ajax({
				url: "additionSalary/additionDelete.php",
				method: "post",
				data: $("form").serialize(),
				dataType: "text",
				success: function (strMessage) {
					console.log(strMessage);
					if (strMessage.substr(1, 4) === 'error') {
						// console.log(strMessage);
					} else if (strMessage === 'success') {
						$('#modalAdditionDelete').modal('hide');
						$('#modalDeleteSuccess').modal('show');
						addition_table.ajax.reload();
					} else {
						$("#badge_danger").text(strMessage);
					}
				}
			});
			addition_table.ajax.reload();
		});


		/*İSCHİ MEULMATALRİNİN  YENİLENMESİ */
		$("#additionUpdate").submit(function (e) {
			e.preventDefault();
			if (validadditionUpdate()) {

				$.ajax({
					url: "additionSalary/additionUpdate.php",
					method: "post",
					data: $("#additionUpdate").serialize(),
					dataType: "text",
					success: function (strMessage) {
						//console.log(strMessage);
						$("#badge_danger_update").text("");
						if (strMessage.substr(1, 4) === 'error') {
							//console.log(strMessage);
						} else if (strMessage === 'success') {
							$('#modalAdditionEdit').modal('hide');
							$('#modalUpdateSuccess').modal('show');
							addition_table.ajax.reload();
						} else if (strMessage === 'duplicate') {

							$("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");

						} else {
							$("#badge_danger_update").text(strMessage);
						}
					}
				});
				addition_table.ajax.reload();
			} else {
				alert('Form not valid');
			}
		});


		$('#begin_date').datetimepicker({format: 'DD/MM/YYYY'});
		$('#end_date').datetimepicker({format: 'DD/MM/YYYY'});

		$('#update_begin_date').datetimepicker({format: 'DD/MM/YYYY'});
		$('#update_end_date').datetimepicker({format: 'DD/MM/YYYY'});

		$('#view_begin_date').datetimepicker({format: 'DD/MM/YYYY'});
		$('#view_end_date').datetimepicker({format: 'DD/MM/YYYY'});

	})
$('.wage').on('change', function() {
	console.log('change='+$(this).attr('name'));
	var wage=parseInt($('#wage').val())
	var prizeAmount=parseInt($('#prizeAmount').val())
	$('#totalMonthlySalary').val(wage+prizeAmount)
});
	$('.prizeAmount').on('change', function() {
		var wage=parseInt($('#wage').val())
		var prizeAmount=parseInt($('#prizeAmount').val())
		$('#totalMonthlySalary').val(wage+prizeAmount)
	});
	$('.wage').on('keyup', function() {
	console.log('change='+$(this).attr('name'));
	var wage=parseInt($('#wage').val())
	var prizeAmount=parseInt($('#prizeAmount').val())
	$('#totalMonthlySalary').val(wage+prizeAmount)
});
	$('.prizeAmount').on('keyup', function() {
		var wage=parseInt($('#wage').val())
		var prizeAmount=parseInt($('#prizeAmount').val())
		$('#totalMonthlySalary').val(wage+prizeAmount)
	});


$('.update_wage').on('change', function() {
	console.log('change='+$(this).attr('name'));
	var update_wage=parseInt($('#update_wage').val())
	var update_prizeAmount=parseInt($('#update_prizeAmount').val())
	$('#update_totalMonthlySalary').val(update_wage+update_prizeAmount)
});
	$('.update_prizeAmount').on('change', function() {
		var update_wage=parseInt($('#update_wage').val())
		var update_prizeAmount=parseInt($('#update_prizeAmount').val())
		$('#update_totalMonthlySalary').val(update_wage+update_prizeAmount)
	});
$('.update_wage').on('keyup', function() {
	console.log('change='+$(this).attr('name'));
	var update_wage=parseInt($('#update_wage').val())
	var update_prizeAmount=parseInt($('#update_prizeAmount').val())
	$('#update_totalMonthlySalary').val(update_wage+update_prizeAmount)
});
$('.update_prizeAmount').on('keyup', function() {
	var update_wage=parseInt($('#update_wage').val())
	var update_prizeAmount=parseInt($('#update_prizeAmount').val())
	$('#update_totalMonthlySalary').val(update_wage+update_prizeAmount)
});