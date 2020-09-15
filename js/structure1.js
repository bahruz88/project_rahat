/*
**********************************************************************************************************************
************************************** Emek muqavilesinin sertleri INFO BILIKLERI ************************************************************
**********************************************************************************************************************
*/

var terms_employment_contract_table ;
$('#empContractInfotab').click(function() {
    console.log('Tab clikc empContractInfotab');
    // $('#qual2').text( tabtext2+' / '+$('#empContractInfotab').text());

    $('#terms_employment_contract_table').DataTable().clear().destroy();
    terms_employment_contract_table = $("#terms_employment_contract_table").DataTable({
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
            url: "emp_contract/get_empContractInfo.php",
            type: "POST"
        },"columnDefs": [ {
            "width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": "<img  id='empContract_view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+
                "<img  id='empContract_delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
                "<img  id='empContract_edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
        dom: 'lBfrtip',

        buttons: [
            {

                text: 'Yenisini yarat <i class="fa fa-plus"></i>',
                action: function ( e, dt, node, config ) {
                    console.log('empContractInsertModal')

                    $("#empContractInsertModal").modal();
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

    console.log('Tab clikc oldu',terms_employment_contract_table);
});

/*Emek muqavilesinin sertleri MELUMATALRİ SİLİNİR */
$("#empContractDelete").submit(function(e) {

    e.preventDefault();
    $.ajax( {
        url: "emp_contract/empContractDelete.php",
        method: "post",
        data: $("#empContractDelete").serialize(),
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
                $('#modalEmpContractDelete').modal('hide');
                $('#modalDeleteSuccess').modal('show');
                terms_employment_contract_table.ajax.reload();
            }
            else  {
                console.log(strMessage);
                $("#badge_danger").text(strMessage);
            }
        }
    });
    terms_employment_contract_table.ajax.reload();


});

// /*empContract Info  table delete click*/
// $('#terms_employment_contract_table').on( 'click', '#migration_empContract_information', function ()
// {
//     var data = terms_employment_contract_table.row( $(this).parents('tr') ).data();
//     console.log('data[0]='+data[0])
//     document.getElementById("empcontractid").value = data[0];
//     $('#modalempContractDelete').modal('show');
// } );

$("#empContractInsertForm").submit(function(e)
{
    console.log('salam insert')
    e.preventDefault();
    /*	if($("#langInsertForm").valid())
{ */
    $.ajax( {
        url: "emp_contract/empContractInsert.php",
        method: "post",
        data: $("#empContractInsertForm").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            console.log('strMessage='+$("#empContractInsertForm").serialize());
            console.log('strMessage='+strMessage);
            $("#badge_success").text('');
            $("#badge_danger").text('');
            if (strMessage.substr(1, 4)==='error')
            {

                $("#errorp").text(strMessage);
                $("#modalInsertError").modal('show');
                $("#empContractInsertModal").modal('hide');
            }
            else if (strMessage==='success')
            {
                $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
                $("#modalInsertSuccess").modal('show');
                $("#empContractInsertModal").modal('hide');

            }
            else  {
                $("#errorp").text(strMessage);
                $("#modalInsertError").modal('show');
                $("#empContractInsertModal").modal('hide');

            }
        }
    });
    terms_employment_contract_table.ajax.reload();
    $( "#empContractInsertForm" ).get(0).reset();
    /*}*/
});


/*GetEmpContractDetails  */
function GetEmpContractDetails(empcontractid,optype)
{
    console.log('$empcontractid='+empcontractid)
    $.post("emp_contract/getEmpContractDetail.php",
        {
            empcontractid: empcontractid
        },
        function (empcontract_data, status)
        {
            console.log('empcontractdata1=',empcontract_data)
            // PARSE json data
            var empcontractdata = JSON.parse(empcontract_data);
            console.log('empcontractdata=',empcontractdata)
            if  (optype=='update') {
                $("#update_empcontractid").val(empcontractdata.id).change();
                $("#update_empContractempid").val(empcontractdata.teId).change();
                $("#update_empContract_app").val(empcontractdata.exist_id).change();
                $("#update_renew_interval").val(empcontractdata.renew_interval).change();
                $("#update_last_renew_date").val(empcontractdata.last_renew_date);
                $("#update_physical_deficiency").val(empcontractdata.chois_id).change();
                $("#update_deficiency_desc").val(empcontractdata.deficiency_desc);
                $('#modalEditEmpContract').modal('show');
            }
            else {
                $("#view_empContractemp").val(empcontractdata.full_name);
                $("#view_empContract_app").val(empcontractdata.exist_desc);
                $("#view_renew_interval").val(empcontractdata.renew_interval+' Ay');
                $("#view_last_renew_date").val(empcontractdata.last_renew_date);
                $("#view_physical_deficiency").val(empcontractdata.chois_desc);
                $("#view_deficiency_desc").val(empcontractdata.deficiency_desc);
                $('#modalViewempContract').modal('show');
            }
        }
    );

}

/*empContract Update */
$("#empContractUpdate").submit(function(e)
{
    e.preventDefault();
    /*if($("#educationUpdate").valid())
    { */

    $.ajax( {
        url: "emp_contract/empContractUpdate.php",
        method: "post",
        data: $("#empContractUpdate").serialize(),
        dataType: "text",
        success: function(strMessage)
        {
            //console.log('serialize='+$("#empContractUpdate").serialize());
            console.log('strMessage='+strMessage);
            $("#badge_danger_update").text("");
            if (strMessage.substr(1, 4)==='error')
            {
                console.log(strMessage);
            }
            else if (strMessage==='success')
            {
                $('#modalEditEmpContract').modal('hide');
                $('#modalUpdateSuccess').modal('show');
                terms_employment_contract_table.ajax.reload();
            }

            else  {
                $("#badge_danger_update").text(strMessage);
            }
        }
    });
    terms_employment_contract_table.ajax.reload();
    /*}
    else {
             alert('not valid') ;
         }*/
});

/*empContract table delete click*/
$('#terms_employment_contract_table').on( 'click', '#empContract_delete', function ()
{
    var data = terms_employment_contract_table.row( $(this).parents('tr') ).data();

    document.getElementById("empcontractid").value = data[0];

    $('#modalEmpContractDelete').modal('show');
} );

/*empContract table view click  */
$('#terms_employment_contract_table').on( 'click', '#empContract_view', function ()
{
    var data = terms_employment_contract_table.row( $(this).parents('tr') ).data();
    GetEmpContractDetails(data[0],'view');
    console.log(data[0]);
} );
/*empContract table view click  */
$('#terms_employment_contract_table').on( 'click', '#empContract_edit', function ()
{
    console.log('salam')

    var data = terms_employment_contract_table.row( $(this).parents('tr') ).data();
    console.log('data='+data[0])
    GetEmpContractDetails(data[0],'update');
    document.getElementById("updateempcontid").value = data[0];
    console.log(data[0]);

} );