/*
**********************************************************************************************************************
************************************** Emek muqavilesinin sertleri INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

var work_experiencetab_tab ;
$('#workExperiencetab').click(function() {
    console.log('Tab clikc work_experiencetab_table');
    // $('#qual2').text( tabtext2+' / '+$('#workExperienceInfotab').text());

    $('#work_experiencetab_table').DataTable().clear().destroy();
    work_experiencetab_tab = $("#work_experiencetab_table").DataTable({
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
            url: "work_experience/get_workExperience.php",
            type: "POST"
        },"columnDefs": [ {
            "width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": "<img  id='workExperience_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
                "<img  id='workExperience_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
                "<img  id='workExperience_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
        dom: 'lBfrtip',

        buttons: [
            {

                text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
                    console.log('workExperienceInsertModal')

                    $("#workExperienceInsertModal").modal();
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
            }  ,
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
            [20, 30, 60, -1],
            [10, 20, 50, "All"]
        ]

    });

    console.log('Tab clikc oldu',work_experiencetab_tab);
});

/*Emek muqavilesinin sertleri MELUMATALRİ SİLİNİR */
$("#workExperienceDelete").submit(function(e) {

    e.preventDefault();
    $.ajax( {
        url: "work_experience/workExperienceDelete.php",
        method: "post",
        data: $("#workExperienceDelete").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            console.log('strMessage='+strMessage);
            if (strMessage.substr(1, 4)==='error')
            {
                console.log(strMessage);
            }
            else if (strMessage==='success')
            {
                $('#modalworkExperienceDelete').modal('hide');
                $('#modalDeleteSuccess').modal('show');
                work_experiencetab_tab.ajax.reload();
            }
            else  {
                console.log(strMessage);
                $("#badge_danger").text(strMessage);
            }
        }
    });
    work_experiencetab_tab.ajax.reload();


});

// /*workExperience Info  table delete click*/
// $('#work_experiencetab_table').on( 'click', '#migration_workExperience_information', function ()
// {
//     var data = work_experiencetab_tab.row( $(this).parents('tr') ).data();
//     console.log('data[0]='+data[0])
//     document.getElementById("workExperienceid").value = data[0];
//     $('#modalworkExperienceDelete').modal('show');
// } );

$("#workExperienceInsertForm").submit(function(e)
{
    console.log('salam insert')
    e.preventDefault();
    /*	if($("#langInsertForm").valid())
{ */
    $.ajax( {
        url: "work_experience/workExperienceInsert.php",
        method: "post",
        data: $("#workExperienceInsertForm").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            console.log('strMessage='+$("#workExperienceInsertForm").serialize());
            console.log('strMessage='+strMessage);
            $("#badge_success").text('');
            $("#badge_danger").text('');
            if (strMessage.substr(1, 4)==='error')
            {

                $("#errorp").text(strMessage);
                $("#modalInsertError").modal('show');
                $("#workExperienceInsertModal").modal('hide');
            }
            else if (strMessage==='success')
            {
                $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
                $("#modalInsertSuccess").modal('show');
                $("#workExperienceInsertModal").modal('hide');

            }
            else  {
                $("#errorp").text(strMessage);
                $("#modalInsertError").modal('show');
                $("#workExperienceInsertModal").modal('hide');

            }
        }
    });
    work_experiencetab_tab.ajax.reload();
    $( "#workExperienceInsertForm" ).get(0).reset();
    /*}*/
});


/*GetworkExperienceDetails  */
function GetworkExperienceDetails(workExperienceid,optype)
{
    console.log('$workExperienceid='+workExperienceid)
    $.post("work_experience/getworkExperienceDetail.php",
        {
            workExperienceid: workExperienceid
        },
        function (workExperience_data, status)
        {
            console.log('workExperiencedata1=',workExperience_data)
            // PARSE json data
            var workExperiencedata = JSON.parse(workExperience_data);
            console.log('workExperiencedata=',workExperiencedata)
            if  (optype=='update') {
                $("#update_workExperienceid").val(workExperiencedata.id).change();
                $("#update_employee").val(workExperiencedata.emp_id).change();
                $("#update_employment_contract_indefinite").val(workExperiencedata.chois_id).change();
                $("#update_reasons_contract").val(workExperiencedata.reasons_temporary_closure)
                $("#update_date_employment_contract").val(workExperiencedata.date_contract)
                $("#update_probation").val(workExperiencedata.probation);
                $("#update_trial_expiration_date").val(workExperiencedata.trial_expiration_date)
                $("#update_employee_start_date").val(workExperiencedata.employee_start_date);
                $("#update_date_conclusion_employment_contract").val(workExperiencedata.date_conclusion_contract);
                $("#update_regulation_property_relations").val(workExperiencedata.regulation_property_relations);
                $("#update_termination_cases").val(workExperiencedata.termination_cases);
                $("#update_other_conditions_wages").val(workExperiencedata.other_condition_wages);
                $("#update_workplace_status").val(workExperiencedata.work_status_id).change();
                $("#update_working_conditions").val(workExperiencedata.working_cond_id).change();
                $("#update_job_descriptions").val(workExperiencedata.job_description);
                $("#update_kvota").val(workExperiencedata.kvota);
                $('#modalEditworkExperience').modal('show');
            }
            else {
                $("#view_workExperienceid").val(workExperiencedata.id);
                $("#view_employee").val(workExperiencedata.full_name);
                $("#view_employment_contract_indefinite").val(workExperiencedata.indefinite);
                $("#view_reasons_contract").val(workExperiencedata.reasons_temporary_closure)
                $("#view_date_employment_contract").val(workExperiencedata.date_contract)
                $("#view_probation").val(workExperiencedata.probation);
                $("#view_trial_expiration_date").val(workExperiencedata.trial_expiration_date)
                $("#view_employee_start_date").val(workExperiencedata.employee_start_date);
                $("#view_date_conclusion_employment_contract").val(workExperiencedata.date_conclusion_contract);
                $("#view_regulation_property_relations").val(workExperiencedata.regulation_property_relations);
                $("#view_termination_cases").val(workExperiencedata.termination_cases);
                $("#view_other_conditions_wages").val(workExperiencedata.other_condition_wages);
                $("#view_workplace_status").val(workExperiencedata.workplace_status);
                $("#view_working_conditions").val(workExperiencedata.working_conditions);
                $("#view_job_descriptions").val(workExperiencedata.job_description);
                $("#view_kvota").val(workExperiencedata.kvota);
                $('#modalViewworkExperience').modal('show');
            }
        }
    );

}

/*workExperience Update */
$("#workExperienceUpdate").submit(function(e)
{
    e.preventDefault();
    /*if($("#educationUpdate").valid())
    { */

    $.ajax( {
        url: "work_experience/workExperienceUpdate.php",
        method: "post",
        data: $("#workExperienceUpdate").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            //console.log('serialize='+$("#workExperienceUpdate").serialize());
            console.log('strMessage='+strMessage);
            $("#badge_danger_update").text("");
            if (strMessage.substr(1, 4)==='error')
            {
                console.log(strMessage);
            }
            else if (strMessage==='success')
            {
                $('#modalEditworkExperience').modal('hide');
                $('#modalUpdateSuccess').modal('show');
                work_experiencetab_tab.ajax.reload();
            }

            else  {
                $("#badge_danger_update").text(strMessage);
            }
        }
    });
    work_experiencetab_tab.ajax.reload();
    /*}
    else {
             alert('not valid') ;
         }*/
});

/*workExperience table delete click*/
$('#work_experiencetab_table').on( 'click', '#workExperience_delete', function ()
{
    var data = work_experiencetab_tab.row( $(this).parents('tr') ).data();

    document.getElementById("workExperienceid").value = data[0];

    $('#modalworkExperienceDelete').modal('show');
} );

/*workExperience table view click  */
$('#work_experiencetab_table').on( 'click', '#workExperience_view', function ()
{
    var data = work_experiencetab_tab.row( $(this).parents('tr') ).data();
    GetworkExperienceDetails(data[0],'view');
    console.log(data[0]);
} );
/*workExperience table view click  */
$('#work_experiencetab_table').on( 'click', '#workExperience_edit', function ()
{
    console.log('salam')

    var data = work_experiencetab_tab.row( $(this).parents('tr') ).data();
    console.log('data='+data[0])
    GetworkExperienceDetails(data[0],'update');
    document.getElementById("updateempcontid").value = data[0];
    console.log(data[0]);

} );