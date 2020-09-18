/*
**********************************************************************************************************************
************************************** is yeri INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

var workplace_tab ;
$('#workplaceInformationtab').click(function() {
    console.log('Tab clikc workplace_table');
    // $('#qual2').text( tabtext2+' / '+$('#workplaceInfoInfotab').text());

    $('#workplace_table').DataTable().clear().destroy();
    workplace_tab = $("#workplace_table").DataTable({
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
            url: "workplace_info/get_workplaceInfo.php",
            type: "POST"
        },"columnDefs": [ {
            "width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": "<img  id='workplaceInfo_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
                "<img  id='workplaceInfo_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
                "<img  id='workplaceInfo_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
        dom: 'lBfrtip',

        buttons: [
            {

                text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
                    console.log('workplaceInfoInsertModal')

                    $("#workplaceInfoInsertModal").modal();
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

    console.log('Tab clikc oldu',workplace_tab);
});

/*Emek muqavilesinin sertleri MELUMATALRİ SİLİNİR */
$("#workplaceInfoDelete").submit(function(e) {

    e.preventDefault();
    $.ajax( {
        url: "workplace_info/workplaceInfoDelete.php",
        method: "post",
        data: $("#workplaceInfoDelete").serialize(),
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
                $('#modalworkplaceInfoDelete').modal('hide');
                $('#modalDeleteSuccess').modal('show');
                workplace_tab.ajax.reload();
            }
            else  {
                console.log(strMessage);
                $("#badge_danger").text(strMessage);
            }
        }
    });
    workplace_tab.ajax.reload();

});

// /*workplaceInfo Info  table delete click*/
// $('#workplace_table').on( 'click', '#migration_workplaceInfo_information', function ()
// {
//     var data = workplace_tab.row( $(this).parents('tr') ).data();
//     console.log('data[0]='+data[0])
//     document.getElementById("workplaceInfoid").value = data[0];
//     $('#modalworkplaceInfoDelete').modal('show');
// } );

$("#workplaceInfoInsertForm").submit(function(e)
{
    console.log('salam insert')
    e.preventDefault();
    /*	if($("#langInsertForm").valid())
{ */
    $.ajax( {
        url: "workplace_info/workplaceInfoInsert.php",
        method: "post",
        data: $("#workplaceInfoInsertForm").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            console.log('strMessage='+$("#workplaceInfoInsertForm").serialize());
            console.log('strMessage='+strMessage);
            $("#badge_success").text('');
            $("#badge_danger").text('');
            if (strMessage.substr(1, 4)==='error')
            {

                $("#errorp").text(strMessage);
                $("#modalInsertError").modal('show');
                $("#workplaceInfoInsertModal").modal('hide');
            }
            else if (strMessage==='success')
            {
                $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
                $("#modalInsertSuccess").modal('show');
                $("#workplaceInfoInsertModal").modal('hide');

            }
            else  {
                $("#errorp").text(strMessage);
                $("#modalInsertError").modal('show');
                $("#workplaceInfoInsertModal").modal('hide');

            }
        }
    });
    workplace_tab.ajax.reload();
    $( "#workplaceInfoInsertForm" ).get(0).reset();
    /*}*/
});


/*GetworkplaceInfoDetails  */
function GetworkplaceInfoDetails(workplaceInfoid,optype)
{
    console.log('$workplaceInfoid='+workplaceInfoid)
    $.post("workplace_info/getworkplaceInfoDetail.php",
        {
            workplaceInfoid: workplaceInfoid
        },
        function (workplaceInfo_data, status)
        {
            console.log('workplaceInfodata1=',workplaceInfo_data)
            // PARSE json data
            var workplaceInfodata = JSON.parse(workplaceInfo_data);
            console.log('workplaceInfodata=',workplaceInfodata)
            console.log('workplaceInfodata.emp_id=',workplaceInfodata.emp_id)
            var result = workplaceInfodata.work_experience_before_enterprise.split(',');
            var result2 = workplaceInfodata.work_experience_enterprise.split(',');
            var result3 = workplaceInfodata.general_work_experience.split(',');
            if  (optype=='update') {
                $("#update_workplaceInfoid").val(workplaceInfodata.id).change();
                $("#update_employe").val(workplaceInfodata.emp_id).change();
                $("#update_work_experience_before_enterprise_year").val(result[0]);
                $("#update_work_experience_before_enterprise_month").val(result[1])
                $("#update_work_experience_before_enterprise_day").val(result[2]);

                $("#update_work_experience_enterprise_year").val(result2[0]);
                $("#update_work_experience_enterprise_month").val(result2[1])
                $("#update_work_experience_enterprise_day").val(result2[2]);

                $("#update_general_work_experience_year").val(result3[0]);
                $("#update_general_work_experience_month").val(result3[1])
                $("#update_general_work_experience_day").val(result3[2]);

                $('#modalEditworkplaceInfo').modal('show');
            }
            else {
                $("#view_workplaceInfoid").val(workplaceInfodata.id);
                $("#view_employe").val(workplaceInfodata.full_name);
                $("#view_work_experience_before_enterprise_year").val(result[0]);
                $("#view_work_experience_before_enterprise_month").val(result[1])
                $("#view_work_experience_before_enterprise_day").val(result[2]);

                $("#view_work_experience_enterprise_year").val(result2[0]);
                $("#view_work_experience_enterprise_month").val(result2[1])
                $("#view_work_experience_enterprise_day").val(result2[2]);

                $("#view_general_work_experience_year").val(result3[0]);
                $("#view_general_work_experience_month").val(result3[1])
                $("#view_general_work_experience_day").val(result3[2]);
                $('#modalViewworkplaceInfo').modal('show');
            }
        }
    );

}

/*workplaceInfo Update */
$("#workplaceInfoUpdate").submit(function(e)
{
    e.preventDefault();
    /*if($("#educationUpdate").valid())
    { */

    $.ajax( {
        url: "workplace_info/workplaceInfoUpdate.php",
        method: "post",
        data: $("#workplaceInfoUpdate").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            //console.log('serialize='+$("#workplaceInfoUpdate").serialize());
            console.log('strMessage='+strMessage);
            $("#badge_danger_update").text("");
            if (strMessage.substr(1, 4)==='error')
            {
                console.log(strMessage);
            }
            else if (strMessage==='success')
            {
                $('#modalEditworkplaceInfo').modal('hide');
                $('#modalUpdateSuccess').modal('show');
                workplace_tab.ajax.reload();
            }

            else  {
                $("#badge_danger_update").text(strMessage);
            }
        }
    });
    workplace_tab.ajax.reload();
    /*}
    else {
             alert('not valid') ;
         }*/
});

/*workplaceInfo table delete click*/
$('#workplace_table').on( 'click', '#workplaceInfo_delete', function ()
{
    var data = workplace_tab.row( $(this).parents('tr') ).data();

    document.getElementById("workplaceInfoid").value = data[0];

    $('#modalworkplaceInfoDelete').modal('show');
} );

/*workplaceInfo table view click  */
$('#workplace_table').on( 'click', '#workplaceInfo_view', function ()
{
    var data = workplace_tab.row( $(this).parents('tr') ).data();
    GetworkplaceInfoDetails(data[0],'view');
    console.log(data[0]);
} );
/*workplaceInfo table view click  */
$('#workplace_table').on( 'click', '#workplaceInfo_edit', function ()
{
    console.log('salam')

    var data = workplace_tab.row( $(this).parents('tr') ).data();
    console.log('data='+data[0])
    GetworkplaceInfoDetails(data[0],'update');
    document.getElementById("updateworkexpid").value = data[0];
    console.log(data[0]);

} );