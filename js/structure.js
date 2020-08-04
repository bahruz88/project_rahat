stClick();
function stClick() {
    $(document).on('click', '#struktur', function (e) {
        console.log('a2')
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
        console.log('a3');
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

function confirmClick(e){
    $(document).on("click", "#confirm", function(e){
        console.log('confirm col ');
        var employee=$('#employeesQuery option:selected').val()
        var structure_level=$('#structure_level option:selected').val()
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
            var icon=$('#icon').val();
            if(eventArray){
                createNew(eventArray, dataArray, employee,structure_level,position_level,st_create_date,st_end_date,icon);

            }else{
                createNew('yeni', 0, employee,structure_level,position_level,st_create_date,st_end_date,icon);

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

    console.log('st_create_date='+st_create_date+'='+createDateParent)
    // console.log('st_create_date='+date.toString('dd-MM-yy');+'='+createDateParent)
    var dateAr = createDateParent.split('-');
    dateAr = dateAr[1] + '/' + dateAr[2] + '/' + dateAr[0];

    var dateAr2 = st_create_date.split('/');
    dateAr2 = dateAr2[1] + '/' + dateAr2[0] + '/' + dateAr2[2];

    console.log('dateAr2='+dateAr2+'='+dateAr)
    console.log('st_create_date='+Date.parse(dateAr2)+'='+Date.parse(dateAr))

    if(Date.parse(dateAr2)<Date.parse(dateAr)){
        console.log('kicikdr');
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
function createNew(event,data,employee,structure_level,position_level,st_create_date,st_end_date,icon){
    // console.log('data',createRequestNumber(8))
    console.log('eventeventeventevent',event)
    console.log('data.cmd==',data.cmd)
    var PID;
    var title;

    if (data==0){
        PID=0;
        title='Yeni';
    }else if(data.node.parent.data.id){
        PID=data.node.parent.data.id;
        title=data.node.title;

    }else if(data.node.parent.children[0].data.pId){
        PID=data.node.parent.children[0].data.pId;
        title=data.node.title;
    }else if(data.node.title &&(!data.node.parent.children[0].data.pId || !data.node.parent.data.id)  ){
        title=data.node.title;
        PID=0;
    }

    console.log('PID=='+PID);
    console.log('title=='+title);
    console.log('structure_level=='+structure_level);
    console.log('position_level=='+position_level);
    console.log('st_create_date=='+st_create_date);
    $.ajax({
        url: 'st_insert.php',
        type: "POST",
        data: { pId:PID, name:title,icon:icon,emp_id:employee,structure_level:structure_level,position_level:position_level,create_date:st_create_date,end_date:st_end_date},
        success: function (data) {
            console.log('dataaaaaaaaada=' , data);
            console.log('dataaaaaaaaaa=' , $.parseJSON(data));
            var tree = $('#tree').fancytree('getTree');
            tree.reload($.parseJSON(data));
            $('.bootstrap-select .filter-option-inner-inner').text('Seçin...');
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
        console.log('number_id[='+$("#number_id").val())
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
        $("#txt_id").val(id);
        $("#number_id").val(number);
        console.log('number_id[='+$("#number_id").val())
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

    $("#idyear"+number).bind('contextmenu', function (e) {

        var id = this.id;
        $("#txt_id").val(id);
        $("#number_id").val(number);
        console.log('number_id[='+$("#number_id").val())
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
            console.log('idCont='+idCont)
            $('#'+idCont).find('span').css('display','none')
            $('#'+idCont).find('select').css('display','block')
            $('#'+idCont).find('input').css('display','block')
            $('#'+idCont).find('button').css('display','block')
        }

    });
    // Clicked context-menu item
    $("#idst"+number).find('select').change(function(){
        console.log('contentEdit change'+$(this).attr('name'));
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


        $.ajax({
            url: 'st_update.php',
            type: "POST",
            data: { id:number, name:thisVal,change:thisName},
            success: function (data) {
                console.log('dataaaaaaa=' + data)
                var tree = $('#tree').fancytree('getTree');
                tree.reload($.parseJSON(data));

            },
        });
    });


    $("#idemp"+number).find('select').change(function(){
        console.log('contentEdit change'+$(this).attr('name'));
        if($(this).find('option:selected').val()!='0'){
            $(this).closest('td').find('span').text($(this).find('option:selected').text())
        }else{
            $(this).closest('td').find('span').text('')
        }

        $(this).closest('td').find('span').css('display','block')
        $(this).css('display','none');
        var thisName='emp_id'
        var thisVal=$(this).find('option:selected').val()
        $.ajax({
            url: 'st_update.php',
            type: "POST",
            data: { id:number, name:thisVal,change:thisName},
            success: function (data) {
                console.log('dataaaaaaaw=' + data)
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
        console.log('contentEdit createDate'+createDate);
        console.log('contentEdit endDate'+endDate);
        // if(validate(createDate)) {
        $.ajax({
            url: 'st_update.php',
            type: "POST",
            data: {id: number, createDate: createDate, endDate: endDate},
            success: function (data) {
                console.log('dataaaaaaaw=' + $.parseJSON(data))
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
        // startDate: new Date()
        // });
    })
    $("#idendInput"+number).datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
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
    console.log('sssss')
    $("#tree").trigger("nodeCommand", { cmd: "addSibling"});
})
$(document).on('click', '#menyu_addChild', function(e) {
    addNew=0;
    $("#tree").trigger("nodeCommand", { cmd: 'addChild' });
})
function alertFunc(extOptions){
    var options = {
        title:'',
        content:'',
        text: '',
        type:'info',//info,warning
        showCancelButton: false,
        buttonText: 'Bağla',
        redirectUrl:'',
    };

};
function treeClick(trList){
    trList.on('click',function(){
        console.log('tree event',$(this).attr('data-id'))
        $.ajax({
            url: 'st_selectPosition.php',
            type: "POST",
            data: { id:$(this).attr('data-id')},
            success: function (data) {

                console.log('trList data=' + jQuery.parseJSON( data));

                var option='<select data-live-search="true"  name="positionList" id="positionList"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
               option += '<option value="0">Seçin..</option>';

                var row = '';
                $('#tablePositions').find('tbody').html('');
                $.each(jQuery.parseJSON(data), function(k,v){
                    console.log('trList fullname=' + v[8]);
                    console.log('trList option=' + v[2]);
                    option += '<option value="'+v[0]+'" data-createdate="'+v[4]+'" data-enddate="'+v[5]+'" data-fullName="'+v[8]+'">'+v[2]+'</option>';
                    row +='<tr data-id="'+v[0]+'" data-positcode="'+v[2]+'"> '  +
                        ' <td><img src="'+v[6]+'" alt="" style="width:20px;height:20px;"></td>  '  +
                        ' <td>'+v[2]+'</td>  '  +
                        ' <td>'+v[8]+'</td>  '  +
                        ' <td class="myText" data-val="percent">'+v[7]+'</td>  '  +
                        ' <td class="myText" id="start_date">'+v[4]+'</td>  '  +
                        ' <td class="myText" id="end_date">'+v[5]+'</td>  '  +
                        '</tr>  ';
                });
                option+=' </select>';
                $('#tablePositions').find('tbody').html(row);
                console.log('option='+option)
                $('#posList').html(option);
                $(".selectpicker").selectpicker();
                positionList();
                $('.myText').on('click', function() {

                    var div = $(this);
                    var dataVal = $(this).attr('data-val');
                    var positcode = $(this).closest('tr').attr('data-positcode');
                    var start_date = $(this).closest('tr').find('#start_date').text();
                    var end_date = $(this).closest('tr').find('#end_date').text();
                    console.log('myText='+start_date+'=en='+end_date);
                    var tb = div.find('input:text');//get textbox, if exist
                    if (tb.length) {//text box already exist
                        div.text(tb.val());//remove text box & put its current value as text to the div
                        $.ajax({
                            url: 'st_insertRole.php',
                            type: "POST",
                            data: {  posit_code:positcode,role_id:'', role_start_date:start_date,role_end_date:end_date, percent:tb.val()},
                            success: function (data) {
                                console.log('dataaaaaaapp=' , data);
                                // console.log('dataaaaaaaaaa=' , $.parseJSON(data));
                                // var tree = $('#tree').fancytree('getTree');
                                // tree.reload($.parseJSON(data));
                            },
                        });
                    } else {
                        tb = $('<input>').prop({
                            'type': 'text',
                            'value': div.text()//set text box value from div current text
                        });
                        div.empty().append(tb);//add new text box
                        tb.focus();//put text box on focus
                    }
                });
            },
        });
    })
}
function positionList(){
    $("#positionList").change(function(){
        console.log('positionList change'+$(this).attr('name'));
        if($(this).find('option:selected').val()!='0'){
            var role_createdate=$(this).find('option:selected').attr('data-createdate')
            var role_enddate=$(this).find('option:selected').attr('data-enddate')
            var fullName=$(this).find('option:selected').attr('data-fullName')
            $('#role_start_date').val(role_createdate)
            $('#role_end_date').val(role_enddate)
            $('#fullName').text(fullName)
            console.log('role_createdate'+role_createdate);
        }else{
            $('#role_start_date').val(role_createdate)
            $('#role_end_date').val(role_enddate)
        }
    });
}
$(function () {
    $('#st_create_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date()
    });
    $('#st_end_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date()
    });
    $('#role_start_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date()
    });
    $('#role_end_date').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date()
    });


    $("#confirmRole").click(function() {
        console.log('confirmRole change');
        var role_id=  $('#roles option:selected').val();
        var posit_code=$('#positionList option:selected').text();
        var start_date= $('#role_start_date').val()
        var end_date= $('#role_end_date').val()
        console.log('confirmRole change'+posit_code);
        $.ajax({
            url: 'st_insertRole.php',
            type: "POST",
            data: { role_id:role_id, posit_code:posit_code, role_start_date:start_date, role_end_date:end_date},
            success: function (data) {
                console.log('dataaaaas=' , data);
                $('#roles').find('option[value="0"]').prop('selected', true);
                $('#positionList').find('option[value="0"]').prop('selected', true);
                $('#role_start_date').val('')
                $('#role_end_date').val('')
                Swal.fire(
                    'Əməliyyat müvəffəqiyyətlə yerine yetirildi!',
                    '',
                    'success'
                )
                // console.log('dataaaaaaaaaa=' , $.parseJSON(data));
                // var tree = $('#tree').fancytree('getTree');
                // tree.reload($.parseJSON(data));
            },
        });
    })
});