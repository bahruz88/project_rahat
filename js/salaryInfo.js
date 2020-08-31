 

$(function () {

	$('#nav-tabs').on('shown.bs.tab', 'a', function (e) {
		if (e.relatedTarget) {
			$(e.relatedTarget).removeClass('active');
		}
	})

	/* EMPLOYEE  İNSERT FORM  VALIDATE */
	$("#salaryInsert").validate({
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
		errorPlacement: function (error, element) {
			// Add the `invalid-feedback` class to the error element
			error.addClass("invalid-feedback");

			if (element.prop("type") === "checkbox") {
				error.insertAfter(element.next("label"));
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid").removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).addClass("is-valid").removeClass("is-invalid");
		}
	});

	/*EMPLOYEE  UPDATE VALİDATE*/
	$("#salaryUpdate").validate({

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
		errorPlacement: function (error, element) {
			// Add the `invalid-feedback` class to the error element
			error.addClass("invalid-feedback");

			if (element.prop("type") === "checkbox") {
				error.insertAfter(element.next("label"));
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid").removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).addClass("is-valid").removeClass("is-invalid");
		}
	});


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
				text: 'Add New <i class="fa fa-plus"></i>',
				action: function (e, dt, node, config) {
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
			}, 'copy', 'print',
			'colvis'
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
		console.log('$row_employees[\'image_name\']')
		var data = table.row($(this).parents('tr')).data();
		GetSalaryDetails(data[0], 'view');
		document.getElementById("update_empid").value = data[0];

	});


	/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
	function GetSalaryDetails(id, optype) {
		console.log('id=' + id)
		// $('#modalEdit').modal('show');
		$.post("salaryInfo/getSalaryDetail.php",
			{
				id: id
			},
			function (emp_data, status) {
				// PARSE json data
				var employee = JSON.parse(emp_data);
				// Assing existing values to the modal popup fields
				console.log('employee=', employee)

				if (optype == 'update') {

					$("#uid").val(emp_id)
					// $("#update_company_id").val(employee.company_id).change();
					$("#update_tariffRate").val(employee.tariff_rate).change();
					$("#update_positionStatus").val(employee.position_status_id).change();
					$("#update_wage").val(employee.wage);
					$("#update_wage_currency").val(employee.wage_currency);
					// $("#update_reasonChange").val(employee.wage);
					$("#update_totalMonthlySalary").val(employee.total_monthly_salary);
					$("#update_prizeAmount").val(employee.prize_amount);
					$("#update_prizeCurrency").val(employee.prize_amount_currency);
					$("#update_rewardPeriod").val(employee.reward_period).change();
					$("#update_placeExpenditure").val(employee.place_expenditure_id).change();
					$("#update_reasonChange").val(employee.salary_change_reason);
					$("#update_otherCondition1").val(employee.other_conditions1);
					$("#update_otherCondition2").val(employee.other_conditions2);
					$("#update_otherCondition3").val(employee.other_conditions3);

					$('#modalEdit').modal('show');
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
					$("#view_wage").val(employee.wage + ' ' + wage_currency);
					$('#view_total_monthly_salary').val(employee.total_monthly_salary);
					$('#view_prize_amount').val(employee.prize_amount + ' ' + prize_amount_currency);
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

	/*ISCHI MELUMATLARI  DAXIL  EDILIR  */
	$("#salaryInsert").submit(function (e) {
		e.preventDefault();
		if ($("#salaryInsert").valid()) {
			$.ajax({
				url: "salaryInfo/salaryInsert.php",
				method: "post",
				data: $("form").serialize(),
				dataType: "text",
				success: function (strMessage) {
					console.log('$("form").serialize()=' + $("#salaryInsert").serialize())
					$("#badge_success").text('');
					$("#badge_danger").text('');
					if (strMessage.substr(1, 4) === 'error') {
						$("#errorp").text(strMessage);
						$("#modalInsertError").modal('show');
						$("#myModal").modal('hide');
					} else if (strMessage === 'success') {
						$("#successp").text('Melumat muveffeqiyyetle daxil edildi');
						$("#modalInsertSuccess").modal('show');
						$("#myModal").modal('hide');
					} else {
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
	$("#salaryDelete").submit(function (e) {

		e.preventDefault();
		$.ajax({
			url: "salaryInfo/salaryDelete.php",
			method: "post",
			data: $("form").serialize(),
			dataType: "text",
			success: function (strMessage) {
				if (strMessage.substr(1, 4) === 'error') {
					console.log(strMessage);
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
		if ($("#salaryUpdate").valid()) {

			$.ajax({
				url: "salaryInfo/salaryUpdate.php",
				method: "post",
				data: $("#salaryUpdate").serialize(),
				dataType: "text",
				success: function (strMessage) {
					console.log(strMessage);
					$("#badge_danger_update").text("");
					if (strMessage.substr(1, 4) === 'error') {
						console.log(strMessage);
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

		/* EMPLOYEE  İNSERT FORM  VALIDATE */
		$("#additionInsert").validate({
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
			errorPlacement: function (error, element) {
				// Add the `invalid-feedback` class to the error element
				error.addClass("invalid-feedback");

				if (element.prop("type") === "checkbox") {
					error.insertAfter(element.next("label"));
				} else {
					error.insertAfter(element);
				}
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass("is-invalid").removeClass("is-valid");
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).addClass("is-valid").removeClass("is-invalid");
			}
		});

		/*EMPLOYEE  UPDATE VALİDATE*/
		$("#additionUpdate").validate({

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
			errorPlacement: function (error, element) {
				// Add the `invalid-feedback` class to the error element
				error.addClass("invalid-feedback");

				if (element.prop("type") === "checkbox") {
					error.insertAfter(element.next("label"));
				} else {
					error.insertAfter(element);
				}
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass("is-invalid").removeClass("is-valid");
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).addClass("is-valid").removeClass("is-invalid");
			}
		});


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
					text: 'Add New <i class="fa fa-plus"></i>',
					action: function (e, dt, node, config) {
						$("#myAdditionModal").modal();

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
				}, 'copy', 'print',
				'colvis'
			],

			"lengthMenu": [
				[10, 20, 50, -1],
				[10, 20, 50, "All"]
			]

		});

		/*Button  click  on grid */
		$('#addition_table tbody').on('click', '#delete', function () {
			var data = addition_table.row($(this).parents('tr')).data();
			document.getElementById("id").value = data[0];
			$('#modalAdditionDelete').modal('show');
		});

		$('#addition_table tbody').on('click', '#edit', function () {
			var data = addition_table.row($(this).parents('tr')).data();
			GetAdditionDetails(data[0], 'update');
			document.getElementById("update_id").value = data[0];

		});

		$('#addition_table tbody').on('click', '#view', function () {
			console.log('$row_employees[\'image_name\']')
			var data = addition_table.row($(this).parents('tr')).data();
			GetAdditionDetails(data[0], 'view');
			document.getElementById("update_id").value = data[0];

		});


		/*İSCHİNİN UPDATE VE YA VİEW MELUMATLARINI  GETIRIR*/
		function GetAdditionDetails(id, optype) {
			console.log('id=' + id)
			// $('#modalEdit').modal('show');
			$.post("additionSalary/getAdditionDetail.php",
				{
					id: id
				},
				function (emp_data, status) {
					// PARSE json data
					var employee = JSON.parse(emp_data);
					// Assing existing values to the modal popup fields
					console.log('employee=', employee)

					if (optype == 'update') {

						$("#uid").val(emp_id)
						// $("#update_company_id").val(employee.company_id).change();
						$("#update_company_id").val(employee.company_id).change();
						$("#update_employee").val(employee.emp_id).change();
						$("#update_additionsDeductionsSalary").val(employee.add_salary_id).change();
						$("#update_additions_salary").val(employee.salary);
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

		/*ISCHI MELUMATLARI  DAXIL  EDILIR  */
		$("#additionInsert").submit(function (e) {
			e.preventDefault();
			if ($("#additionInsert").valid()) {
				$.ajax({
					url: "additionSalary/additionInsert.php",
					method: "post",
					data: $("form").serialize(),
					dataType: "text",
					success: function (strMessage) {
						console.log('$("form").serialize()=' + $("#additionInsert").serialize())
						$("#badge_success").text('');
						$("#badge_danger").text('');
						if (strMessage.substr(1, 4) === 'error') {
							$("#errorp").text(strMessage);
							$("#modalInsertError").modal('show');
							$("#myAdditionModal").modal('hide');
						} else if (strMessage === 'success') {
							$("#successp").text('Melumat muveffeqiyyetle daxil edildi');
							$("#modalInsertSuccess").modal('show');
							$("#myAdditionModal").modal('hide');
						} else {
							$("#errorp").text(strMessage);
							$("#modalInsertError").modal('show');
							$("#myAdditionModal").modal('hide');

						}
					}
				});
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
					if (strMessage.substr(1, 4) === 'error') {
						console.log(strMessage);
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
			if ($("#additionUpdate").valid()) {

				$.ajax({
					url: "additionSalary/additionUpdate.php",
					method: "post",
					data: $("#additionUpdate").serialize(),
					dataType: "text",
					success: function (strMessage) {
						console.log(strMessage);
						$("#badge_danger_update").text("");
						if (strMessage.substr(1, 4) === 'error') {
							console.log(strMessage);
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