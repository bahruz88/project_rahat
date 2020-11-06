stClick();
function stClick() {
    $(document).on('click', '#struktur', function (e) {
        //console.log('a2')
        $('#query').css('display', 'none')
        $('#stQuery').css('display', 'block')
        $('#employeesQuery').css('display', 'none');
        $('#positionQuery').css('display', 'none');
        $('#dateQuery').css('display', 'block')
        $('#confirmQuery').css('display', 'block')
        $('#structureQuery').css('display', 'block')
        $(document).off('click', '#pozisya');
        $(document).off('click', '#struktur');
        confirmClick();
    });
    $(document).on('click', '#pozisya', function (e) {
        //console.log('a3');
        $('#query').css('display', 'none')
        $('#stQuery').css('display', 'block')
        $('#employeesQuery').css('display', 'block')
        $('#positionQuery').css('display', 'block')
        $('#dateQuery').css('display', 'block')
        $('#confirmQuery').css('display', 'block')
        $('#structureQuery').css('display', 'none')
        $(document).off('click', '#pozisya');
        $(document).off('click', '#struktur');

        confirmClick();
    });
}

function confirmClick(companyId){
    $(document).on("click", "#confirm", function(e){
        $('#companyDiv').off('change', '#company');

        var employee=$('#employee option:selected').val()
        var structure_level=$('#structure_level option:selected').val()
        if($('#company_id').val()==''){

            var company_ids= $('#company').val();
            $('#company_id').val(company_ids);
             company_ids='0,'+$('#company').val();
        }else{
            var company_ids='0,'+$('#company_id').val()
        }

        var position_level=$('#position_level option:selected').val()
        var st_create_date=$('#st_create_date').val()!='' ? $('#st_create_date').val() :'1900-01-01';
        var st_end_date=$('#st_end_date').val()!='' ? $('#st_end_date').val() :'9999-12-31';

        if(validate(st_create_date)){
            $('#stQuery').css('display','none')

            if(structure_level!=0){
                $('#icon').val('images/icons/box1.png')
            }
            if(position_level!=0){
                $('#icon').val($('#position_level option:selected').attr('data-icon'))
            }
            $('#structure_level').find('option[value="0"]').prop('selected', true);

//Check the selected attribute for the real select
//             $('select[name=selValue]').val(1);
            $('#position_level').find('option[value="0"]').prop('selected', true);
            $('#employee').find('option[value="0"]').prop('selected', true);
            $('.filter-option-inner-inner').text('Seçin...');
            $(".selectpicker").selectpicker();
            var icon=$('#icon').val();

            var company_id=$('#companyId').val();


            //console.log('confirm col company_id='+company_id);
            //console.log('employee='+employee)
            if(eventArray){
                createNew(eventArray, dataArray, employee,structure_level,position_level,st_create_date,st_end_date,icon,company_id,company_ids);

            }else{
                createNew('yeni', 0, employee,structure_level,position_level,st_create_date,st_end_date,icon,company_id,company_ids);

            }

            $('#st_create_date').val('')
            $('#st_end_date').val('')
            $('.close').trigger('click');
            $(document).off('click', '#pozisya');
            $(document).off('click', '#struktur');
            $(document).off('click', '#confirm');
            // confirmClick().remove()
        }


    });

}
function validate(st_create_date){

    //console.log('st_create_date='+st_create_date+'='+createDateParent)
    // //console.log('st_create_date='+date.toString('dd-MM-yy');+'='+createDateParent)
    var dateAr = createDateParent.split('-');
    dateAr = dateAr[1] + '/' + dateAr[2] + '/' + dateAr[0];

    var dateAr2 = st_create_date.split('/');
    dateAr2 = dateAr2[1] + '/' + dateAr2[0] + '/' + dateAr2[2];

    //console.log('dateAr2='+dateAr2+'='+dateAr)
    //console.log('st_create_date='+Date.parse(dateAr2)+'='+Date.parse(dateAr))

    if(Date.parse(dateAr2)<Date.parse(dateAr)){
        //console.log('kicikdr');
        Swal.fire({
            icon: 'error',
            title: 'Xəbərdarlıq',
            text: 'Başlama tarixi əsas strukturun tarixindən əvvəl ola bilməz!',
            // footer: '<a href>Why do I have this issue?</a>'
        })
        return false;
    }
    return true;
}
function createNew(event,data,employee,structure_level,position_level,st_create_date,st_end_date,icon,company_id,company_ids){
    // //console.log('data',createRequestNumber(8))
    //console.log('eventeventeventevent',event)
    //console.log('data.cmd==',data.cmd)
    //console.log('data ==',data)

    var PID;
    var title;


    if (data==0){
        PID=0;
        title='Yeni';
        //console.log('Yeni')
    }else if(data.node.parent.data.id){
        PID=data.node.parent.data.id;
        title=data.node.title;
        company_id=data.node.parent.data.company_id
        //console.log('data.node.parent.data=',data.node.parent.data)

    }else if(data.node.parent.children[0].data.pId){
        PID=data.node.parent.children[0].data.pId;
        title=data.node.title;
        company_id= data.node.parent.children[0].data.company_id;
        //console.log('data.node.parent.children[0].data=',data.node.parent.children[0].data)

    }else if(data.node.title &&(!data.node.parent.children[0].data.pId || !data.node.parent.data.id)  ){
        title=data.node.title;
        //console.log('data.node=',data.node)
        PID=0;
    }

    //console.log('PID=='+PID);
    //console.log('title=='+title);
    //console.log('structure_level=='+structure_level);
    //console.log('position_level=='+position_level);
    //console.log('company_ids=='+company_ids);
    //console.log('company=='+$('#company').val());
    //console.log('company_id=='+company_id)
    //console.log('$pId=='+PID)
    $.ajax({
        url: 'structure/st_insert.php',
        type: "POST",
        data: { pId:PID, name:title,icon:icon,emp_id:employee,structure_level:structure_level,position_level:position_level,create_date:st_create_date,end_date:st_end_date,company_id:company_id,company_ids:company_ids,st:"st"},
        success: function (data) {
            //console.log('companycer=='+$('#company').val());
            //console.log('dataaaaaaaaada=' , data);
            //console.log('dataaaaaaaaaa=' , $.parseJSON(data));
            var tree = $('#tree').fancytree('getTree');

            tree.reload($.parseJSON(data));

        },
    });

}

function sagClick(number){
    // Hide context menu
    $(document).bind('contextmenu click',function(){
        $(".context-menu").hide();
        $("#txt_id").val("");
        $("#number_id").val("");
    });

    // disable right click and show custom context menu

    $("#idst"+number).bind('contextmenu', function (e) {

        var id = this.id;
         $("#txt_id").val(id);
        $("#number_id").val(number);

        // var top = e.pageY+5;
        // var left = e.pageX;
        var top = e.pageY-90;
        var left = e.pageX-215;

        $(".context-menu").toggle(100).css({
            top: top + "px",
            left: left + "px"

        });
        // Disable default menu
        return false;
    });

    $("#idemp"+number).bind('contextmenu', function (e) {

        var id = this.id;
        //console.log('//////////////////////////////////////////'+id)
        $("#txt_id").val(id);
        $("#number_id").val(number);
        //console.log('number_id[='+$("#number_id").val())
        var top = e.pageY-90;
        var left = e.pageX-215;

        // Show contextmenu
        $(".context-menu").toggle(100).css({
            top: top + "px",
            left: left + "px"
        });
        //console.log('companyid[[[[[[[[[[[[='+$(this).closest('tr').attr('data-companyid'))
        var company_id=$(this).closest('tr').attr('data-companyid')
        $.ajax({
            url: 'structure/st_emp_select.php',
            type: "POST",
            data: { company_id:company_id},
            success: function (data) {
                //console.log('st_emp_select data=' + data)
                // var option='<select data-live-search="true" style="display: none;"  name="employee" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                var option  = '<option value="">Seçin..</option>';

                var row = '';
                // $('#tablePositions').find('tbody').html('');
                $.each($.parseJSON(data), function(k,v) {
                    //console.log('v=',v)
                    option += '<option value="' + v.id + '" >' + v.firstname + ' '+v.lastname + ' '+v.surname + '</option>';

                });
                option+=' </select>';
                $('#'+id).closest('td').find('select').html(option);
                // $('.employeesTree').html(option);
                $(".selectpicker").selectpicker();

            },
        });

        // Disable default menu
        return false;
    });

    $("#idyear"+number).bind('contextmenu', function (e) {

        var id = this.id;
        $("#txt_id").val(id);
        $("#number_id").val(number);
        //console.log('number_id[='+$("#number_id").val())
        var top = e.pageY-90;
        var left = e.pageX-215;

        // Show contextmenu
        $(".context-menu").toggle(100).css({
            top: top + "px",
            left: left + "px"
        });
        // Disable default menu
        return false;
    });


    // disable context-menu from custom menu
    $('.context-menu').bind('contextmenu',function(){
        return false;
    });

    // Clicked context-menu item
    $('.context-menu li').click(function(){
        var className = $(this).find("span:nth-child(1)").attr("class");
        var titleid = $('#txt_id').val();
        $( "#"+ titleid ).css( "background-color", className );
        $(".context-menu").hide();
    });


    // Clicked context-menu item
    $('#contentEdit').click(function(){

        var idCont = $('#txt_id').val();
        if(idCont){
            //console.log('idCont='+idCont)
            $('#'+idCont).find('span').css('display','none')
            $('#'+idCont).find('select').css('display','block')
            $('#'+idCont).find('input').css('display','block')
            $('#'+idCont).find('button').css('display','block')

        }
        $('#'+idCont).off('click')
        $('table').click(function() {
            //console.log('body click'+$(this).attr('class'))
            $('#'+idCont).find('span').css('display','block')
            $('#'+idCont).find('select').css('display','none')
            $('#'+idCont).find('input').css('display','none')
            $('#'+idCont).find('button').css('display','none')
        });
        $('table div,table select,table input,table button').click(function(e){
            e.stopPropagation();
        });

    });
    // Clicked context-menu item

    $("#idst"+number).find('select').change(function(e){
        // e.stopPropagation();
        //console.log('contentEdit change'+$(this).attr('name'));
        if($(this).find('option:selected').val()!='0'){
            $(this).closest('td').find('span').text($(this).find('option:selected').text())
        }else{
            $(this).closest('td').find('span').text('')
        }

        $(this).closest('td').find('span').css('display','block')
        $(this).css('display','none');
        var thisName=$(this).attr('name')
        var thisVal=$(this).find('option:selected').val()
        var icon='images/icons/box1.png'

        if(thisName=='structure_level'){
            $('#icon').val('images/icons/box1.png')
        }else {
            $('#icon').val($('#position_level option:selected').attr('data-icon'))
        }
        var company_id=$(this).closest('tr').attr('data-companyId')
        // var company_id=$('#company_id').val()

        $.ajax({
            url: 'structure/st_update.php',
            type: "POST",
            data: { id:number, name:thisVal,change:thisName,company_id:company_id},
            success: function (data) {
                //console.log('st_update dataaaaaaa=' + data)
                var tree = $('#tree').fancytree('getTree');
                tree.reload($.parseJSON(data));

            },
        });
    });


    $("#idemp"+number).find('select').change(function(){
        //console.log('contentEdit change'+$(this).attr('name'));
        if($(this).find('option:selected').val()!='0'){
            $(this).closest('td').find('span').text($(this).find('option:selected').text())
        }else{
            $(this).closest('td').find('span').text('')
        }

        $(this).closest('td').find('span').css('display','block')
        $(this).css('display','none');
        var thisName='emp_id'
        var thisVal=$(this).find('option:selected').val();
        // var company_id=$('#company_id').val()
        var company_id=$(this).closest('tr').attr('data-companyId');
        $.ajax({
            url: 'structure/st_update.php',
            type: "POST",
            data: { id:number, name:thisVal,change:thisName,company_id:company_id},
            success: function (data) {
                //console.log('dataaaaaaaw=' + data)
                $("#idemp"+number).find('span').css('display','block')
                $("#idemp"+number).find('select').css('display','none')

            },
        });
    });

    $("#idyearButton"+number).click(function(){

        $(this).closest('td').find('span').text($("#idcreateInput"+number).val()+'/'+$("#idendInput"+number).val())

        $(this).closest('td').find('span').css('display','block')
        // $(this).css('display','none');
        var createDate=$(this).closest('td').find("#idcreateInput"+number).val()
        var endDate=$(this).closest('td').find("#idendInput"+number).val()
        //console.log('contentEdit createDate'+createDate);
        //console.log('contentEdit endDate'+endDate);
        // var company_id=$('#company_id').val()
        var company_id=$(this).closest('tr').attr('data-companyId')
        // if(validate(createDate)) {
        $.ajax({
            url: 'structure/st_update.php',
            type: "POST",
            data: {id: number, createDate: createDate, endDate: endDate,company_id:company_id},
            success: function (data) {
                //console.log('idyearButton dataaaaaaaw=' + $.parseJSON(data))
                $("#idyear" + number).find('span').css('display', 'block')
                $("#idyear" + number).find('button').css('display', 'block')
                $("#idcreateInput" + number).css('display', 'none')
                $("#idendInput" + number).css('display', 'none')
                $('.datepicker').css('display', 'none')
                var tree = $('#tree').fancytree('getTree');
                tree.reload($.parseJSON(data));

            },
        });
        // }
    });
    $("#idcreateInput"+number).datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true
        // startDate: new Date()
        // });
    })
    $("#idendInput"+number).datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true
        // startDate: new Date()
        // });
    })

}
$(document).on('click', '#menyu_edit', function(e) {
    addNew=0;
    $("#tree").trigger("nodeCommand", { cmd: 'rename' });
})
$(document).on('click', '#menyu_delete', function(e) {
    addNew=0;
    $("#tree").trigger("nodeCommand", { cmd: 'remove' });
})
$(document).on('click', '#menyu_add', function(e) {
    addNew=0;
    //console.log('sssss')
    $("#tree").trigger("nodeCommand", { cmd: "addSibling"});
})
$(document).on('click', '#menyu_addChild', function(e) {
    addNew=0;
    $("#tree").trigger("nodeCommand", { cmd: 'addChild' });
})

function treeClick(trList){
    trList.on('click',function(){
        //console.log('tree event',$(this).attr('data-id'))
        var stId=$(this).attr('data-id')
        var company_id=$(this).closest('tr').attr('data-companyId')
        //console.log('treeClick company_id='+company_id)
        // var company_id=$('#company_id').val()
        $.ajax({
            url: 'structure/st_selectRoles.php',
            type: "POST",
            async:false,
            data: {id: stId},
            success: function (data) {
                //console.log('dataaaaas=' , data);
                fillStTable(jQuery.parseJSON(data),stId)
            },
        });
        $.ajax({
            url: 'structure/st_selectEmpCompany.php',
            type: "POST",
            async:false,
            data: {company_id: company_id},
            success: function (data) {
                //console.log('st_selectEmpCompany DATA11=',data)

                var option='<select data-live-search="true"  name="positionList" id="positionList"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                option += '<option value="0">Seçin..</option>';
                var PositArr=['']
                $.each(jQuery.parseJSON(data), function(k,v){
                    if(jQuery.inArray( v[0], PositArr )<0){
                        option += '<option value="'+v[0]+'"  data-companyId="'+v[5]+'" data-stId="'+stId+'" data-empid="'+v[4]+'" data-createdate="'+v[2]+'" data-enddate="'+v[3]+'" data-fullName="'+v[1]+'" data-positcode="'+v[0]+'">'+v[0]+' '+v[1]+'</option>';
                        PositArr.push(v[0]);
                    }
                });
                option+=' </select>';

                // $('#posList').html(option);
                $('#structure_roles').find('#posList').html(option);
                $(".selectpicker").selectpicker();
                // //console.log('posList='+ $('#posList').html())
                positionList();
                // //console.log('structure_roles posList='+ $('#structure_roles').find('#posList').html())

            }
        })
        $.ajax({
            url: 'structure/st_selectStPosition.php',
            type: "POST",
            async:false,
            data: { id:stId},
            success: function (data) {
                //console.log('trList st_selectStPosition data=' + jQuery.parseJSON(data));

                fillTreeTable(jQuery.parseJSON(data),stId);




            },
        });
    })
}
function myTextClick(){
    var thisVal =''
    $('.myText').on('click', function() {
        var div = $(this);

        var dataVal = $(this).attr('data-val');
        var positcode = $(this).closest('tr').attr('data-positcode');
        var empid = $(this).closest('tr').attr('data-empid');
        var stId = $(this).closest('tr').attr('data-id');
        var start_date = $(this).closest('tr').find('#start_date').text();
        var end_date = $(this).closest('tr').find('#end_date').text();
        var roleid = $(this).closest('tr').attr('data-role');
        //console.log('myText='+start_date+'=en='+end_date);
        //console.log('roleid='+roleid);
        var tb = div.find('input:text');//get textbox, if exist
        if (tb.length) {//text box already exist
            if(tb.val()<=100) {
                div.text(tb.val());//remove text box & put its current value as text to the div
                $.ajax({
                    url: 'structure/st_insertRole.php',
                    type: "POST",
                    data: {
                        posit_code: positcode,
                        stId: stId,
                        role_id: roleid,
                        role_start_date: start_date,
                        role_end_date: end_date,
                        emp_id: empid,
                        percent: tb.val()
                    },
                    success: function (data) {
                        //console.log('dataaaaaaapp=', data);
                        // //console.log('dataaaaaaaaaa=' , $.parseJSON(data));
                        // var tree = $('#tree').fancytree('getTree');
                        // tree.reload($.parseJSON(data));
                    },
                });
            }else{
                div.text(thisVal)

            }
        } else {
            thisVal = $(this).text();
            //console.log('thisVal='+thisVal)
            tb = $('<input>').prop({
                'type': 'text',
                'value': div.text()//set text box value from div current text
            });
            div.empty().append(tb);//add new text box
            tb.focus();//put text box on focus

        }


    });
}

function positionList(){
    $("#positionList").change(function(){
        //console.log('positionList change'+$(this).attr('name'));
        if($(this).find('option:selected').val()!='0'){
            var role_createdate=$(this).find('option:selected').attr('data-createdate')
            var role_enddate=$(this).find('option:selected').attr('data-enddate')
            var fullName=$(this).find('option:selected').attr('data-fullName')
            var stId=$(this).find('option:selected').attr('data-stId')
            $('#role_start_date').val(role_createdate)
            $('#role_end_date').val(role_enddate)
            // $('#fullName').text(fullName)
            //console.log('role_createdate'+role_createdate);



        }else{
            $('#role_start_date').val(role_createdate)
            $('#role_end_date').val(role_enddate)
        }
    });
}
$(function () {
    $(".selectpicker").selectpicker();
    $('#st_create_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true,
        // startDate: new Date()
    });
    $('#st_end_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true,
        // startDate: new Date()
    }); $('#st_end_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true,
        // startDate: new Date()
    });
    $('#role_start_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true,
        // startDate: new Date()
    });
    $('#role_end_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true,
        // startDate: new Date()
    });

        $('#companyDiv').on( 'change','#company',  function () {
            //console.log("change company="+$(this).val());
            var company_id=$(this).val();
            var company_text=$(this).find('option:selected').text();
            $('#companyId').val(company_id);
            //console.log("company_id="+company_id);
            //console.log("$('#companyId').val()="+$('#companyId').val());

            $('#company_id').val(company_id);

            $('#company_name').val(company_text);

            company_id='0,'+company_id;
            $.ajax({
                url: 'structure/st_selectWithCompany.php',
                type: "POST",
                data: {company_id: company_id,st:"st"},
                success: function (data) {
                    // //console.log('companyDiv DATA=',data)
                    var tree = $('#tree').fancytree('getTree');
                    if(data!=''){
                        tree.reload($.parseJSON(data));
                    }else{
                        tree.reload([]);
                    }


                }
            })

        })


$("#confirmRole").click(function() {
       console.log('confirmRole change');
        var role_id=  $('#roles option:selected').val();
        var posit_code=$('#positionList option:selected').attr('data-positcode');
        var empid=$('#positionList option:selected').attr('data-empid');
        var stId=$('#positionList option:selected').attr('data-stId')
        var company_id=$('#positionList option:selected').attr('data-companyId')
        var start_date= $('#role_start_date').val()
        var end_date= $('#role_end_date').val()
    console.log('stId='+stId)
    //console.log('role='+$('#roles option:selected').text())
    $.ajax({
        url: 'structure/st_selectValidateRole.php',
        type: "POST",
        data: { role_id:role_id,company_id:company_id},
        success: function (data) {
            console.log('data='+data)
            console.log('data='+jQuery.parseJSON(data))
            if(jQuery.parseJSON(data).length>0){
                $('#changeRoleClick').trigger('click');
                $('#changeItem').on('click',function(){
                    // do your stuffs with id
                    //console.log('datamodal='+data)
                    // $("#successMessage").html("Record With id "+id+" Deleted successfully!");
                    $('#changeRole').modal('hide'); // now close modal
                    insertRole(company_id,role_id,stId,empid,posit_code,start_date,end_date)
                })
            }else{
                insertRole(company_id,role_id,stId,empid,posit_code,start_date,end_date)
            }
            function insertRole(company_id,role_id,stId,empid,posit_code,start_date,end_date){
                //console.log('company_id=' , company_id);
                //console.log('posit_code=' , posit_code);
                //console.log('stId=' , stId);
                $.ajax({
                    url: 'structure/st_insertRole.php',
                    type: "POST",
                    data: { company_id:company_id,role_id:role_id,stId:stId,emp_id:empid, posit_code:posit_code, role_start_date:start_date, role_end_date:end_date},
                    success: function (data) {
                        console.log('dataaaaas=' , data);
                        $('#roles').find('option[value="0"]').prop('selected', true);
                         $('#positionList').find('option[value="0"]').prop('selected', true);
                        $('#role_start_date').val('')
                        $('#role_end_date').val('')
                        $('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
                        // $('#tablePositions').find('tbody').html('');
                        // $('#tableStructureRoles').find('tbody').html('');

                         fillStTable(jQuery.parseJSON(data),stId)
                        //fillTreeTable(jQuery.parseJSON(data),stId)

                        Swal.fire(
                            'Əməliyyat müvəffəqiyyətlə yerine yetirildi!',
                            '',
                            'success'
                        )
                        $(".selectpicker").selectpicker();
                        // //console.log('dataaaaaaaaaa=' , $.parseJSON(data));
                        // var tree = $('#tree').fancytree('getTree');
                        // tree.reload($.parseJSON(data));
                    },
                });
            }

            }
        });

    })
});
function fillTreeTable(data,stId){
    var row = '';
    $('#tablePositions').find('tbody').html('');
     $.each(data, function(k,v){
         if(v[2].substr(0, 1)=="P"){
             //console.log('trList v=' + v[9]);
             //console.log('trList option=' + v[2]);
             var fName='Təyin edilməyib';
             var fRole='Təyin edilməyib';
             var fRole_id=0;
             var fPercent=0;

             if(v[8]){
                 fName=v[8];
             }
             if(v[9]){
                 fRole=v[9];
                 fRole_id=v[12];
             }
             if(v[7]){
                 fPercent=v[7];
             }

             row +='<tr data-id="'+v[11]+'" data-role="'+fRole_id+'" data-positcode="'+v[2]+'" data-empid="'+v[10]+'"> '  +
                 ' <td><img src="'+v[6]+'" alt="" style="width:20px;height:20px;"></td>  '  +
                 ' <td>'+fRole+'</td>  '  +
                 ' <td>'+v[2]+'</td>  '  +
                 ' <td>'+fName+'</td>  '  +
                 ' <td class="myText" data-val="percent">'+fPercent+'</td>  '  +
                 ' <td  id="start_date">'+v[4]+'</td>  '  +
                 ' <td id="end_date">'+v[5]+'</td>  '  +
                 '</tr>  ';
         }

    });
    $('#tablePositions').find('tbody').html(row);
     myTextClick()

}
function fillStTable(data,stId){
    var row = '';
    // $('#tablePositions').find('tbody').html('');
    $('#tableStructureRoles').find('tbody').html('');
    $.each(data, function(k,v){
        //console.log('trList v=' + v[9]);
        //console.log('trList option=' + v[2]);
        var fName='Təyin edilməyib';
        var fRole='Təyin edilməyib';
        var fPercent=0;

        if(v[8]){
            fName=v[8];
        }
        if(v[9]){
            fRole=v[9];
        }
        if(v[7]){
            fPercent=v[7];
        }

        row +='<tr data-id="'+v[11]+'" data-positcode="'+v[2]+'" data-empid="'+v[10]+'"> '  +
            // ' <td><img src="'+v[6]+'" alt="" style="width:20px;height:20px;"></td>  '  +
            ' <td>'+fRole+'</td>  '  +
            ' <td>'+v[2]+'</td>  '  +
            ' <td>'+fName+'</td>  '  +
            ' <td class="myText" data-val="percent">'+fPercent+'</td>  '  +
            ' <td  id="start_date">'+v[4]+'</td>  '  +
            ' <td id="end_date">'+v[5]+'</td>  '  +
            ' <td><button type="button" class="btn btn-danger deleteStRole"  >Sil</button></td>  '  +
            '</tr>  ';
    });

    // $('#tablePositions').find('tbody').html(row);
    $('#tableStructureRoles').find('tbody').html(row);

    $(".deleteStRole").click(function() {
        //console.log("deleteStRole")
        var id= $(this).closest('tr').attr('data-id');
        $.ajax({
            url: 'structure/st_deleteStRole.php',
            type: "POST",
            data: {id:id,stId:stId},
            success: function (data) {
                //console.log('data=' + data);
                // Swal.fire(
                //     'Silmə əməliyyatı müvəffəqiyyətlə yerine yetirildi!',
                //     '',
                //     'success'
                // )
                fillStTable(jQuery.parseJSON(data),stId)
            }
        })
    })
    // myTextClick()

}


