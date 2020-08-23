<?php    
 include('session.php');  
 $site_lang=$_SESSION['dil'] ;


 $sql_lang_level= "select * from $tbl_lang_level  where lang_short_name='$site_lang' ";

$employee_category= "select * from $tbl_employee_category WHERE structure_level = 1";
$result_employee_category = $db->query($employee_category);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>RahatHR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">-->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!--    <link rel="stylesheet" type="text/css" href="dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arimo" />



    <style>
        .staffText{
            font-weight: 700;
        }
        /*#stafftree td{*/
        /*    background-color: rgba(0,0,0,.075);*/
        /*}*/
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 <?php  include ("navbar.php")?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/rhr.png" alt="RahatHR Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RahatHR</span>
    </a>

    <!-- Sidebar -->
   <?php  include("main_menu.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<br>
<div class="col-12 col-sm-6 col-lg-12">
 <div class="card">
<div class="card-body">


    <?php
    include  ('contracts/mainContractModal.php');
    ?>

<!-- Tab panes -->
<div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
    <div class="form-group row" id="dateQuery">
        <label class="col-sm-4 col-form-label" for="date_completion"><?php echo $dil["military_date_completion"];?></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="date_completion" name="date_completion" placeholder="0000-00-00" />

        </div>
    </div>
    <div class="form-group row" id="dateQuery">
        <label class="col-sm-4 col-form-label" for="enterprise_name"><?php echo $dil["enterprise_name"];?></label>
        <div class="col-sm-6">
            <select data-live-search="true"  name="enterprise_name" id="enterprise_name"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["enterprise_name"];?>" >
                <option  value="0" >Seçin...</option>
                <?php
                $result_company = $db->query($sql_employee_company);
                if($result_company->num_rows > 0) {
                    while($row_company = $result_company->fetch_assoc()) {
                ?>
                <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>

                <?php } }?>
            </select>
        </div>
    </div>
	<div class="tab-pane active" id="staff" style="display: none;width:800px;margin:auto;">
        <div class="staffText">
        <div class="container text-center"><span id="companyName"></span></div>
        <div class="container text-center"><span class="company_adress"></span><span class="company_tel"></span></div>
        <br/>
        <div class="row">
            <div class="col-md-8"><span class="year"></span>-ci ilin <span class="month"></span> ayı üzrə ştat cədvəli</div>
            <div class="col-md-4">TƏSDİQ EDİRƏM:</div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-9  text-right">      <span class="enterprise_head_position"></span>   </div>
            <div class="col-md-3  text-left">       <span class="enterprise_head_fullname"></span></div>
        </div>
        <div class="row">
            <div class="col-md-8">&nbsp;</div>
            <div class="col-md-4"><span class="day"></span> <span class="month"></span> <span class="year"></span>-ci il</div>
        </div>
        <div class="row">
            <div class="col-md-4">Ştat vahidi     </div>
            <div class="col-md-1">5</div>
            <div class="col-md-6">nefer</div>
        </div>
        <div class="row">
            <div class="col-md-4">Aylıq əmək haqqı fondu     </div>
            <div class="col-md-1">5</div>
            <div class="col-md-6">manat</div>
        </div>
        <div class="row">
            <div class="col-md-2"><span class="day"></span> <span class="month"></span> <span class="year"></span>     </div>
            <div class="col-md-10">-ci il tarixindən qüvvəyə minir</div>
        </div>
        </div>
        <div id="staffTab" >
            <table id="stafftree">
                <colgroup>
                    <col width="15px" />
                    <col width="15px" />
                    <col width="200px" />
                    <col width="80px" />
                    <col width="150px" />
                    <col width="100px" />
                    <col width="150px" />
                </colgroup>
                <thead>
                <tr>
                    <th style="width:15px;"></th>
                    <th style="width:15px;">No</th>
                    <th style="width:200px;">Struktur bölmələrin adı və vəzifələr</th>
                    <th style="width:80px;">Ştat sayı (vahid)</th>
                    <th style="width:150px;">Vəzifə  maaşı (manatla)</th>
                    <th style="width:100px;">Vəzifə maaşına əlavə</th>
                    <th style="width:150px;"> Aylıq əmək haqqı fondu</th>
                </tr>
                </thead>
                <tbody id="fancyBody">
                <!-- Define a row template for all invariant markup: -->
                <tr>
                    <td class="alignCenter"></td>
                    <td></td>
                    <td></td>
                    <td> </td>
                    <td>
                        <span></span>
                    </td>
                    <td>
                        <span></span>

                    </td>
                    <td>
                        <span></span>

                    </td>

                </tr>
                </tbody>
            </table>

	</div>

	</div>
    <button onclick="saveDiv('staff2')" id="download" style="display: none">Yüklə</button>
    <button onclick="printDiv('staff','Title')"  id="print" style="display: none">Çap et</button>
    <div id="previewImage"  style="display: none">

    </div>
    <input type="hidden" class="form-control" id="tableStaff" name="tableStaff"   />
    <input type="hidden" class="form-control" id="company_name" name="company_name"   />
    <input type="hidden" class="form-control" id="company_address" name="company_address"   />
    <input type="hidden" class="form-control" id="company_tel" name="company_tel"   />
     <input type="hidden" class="form-control" id="enterprise_head_fullname" name="enterprise_head_fullname"   />
     <input type="hidden" class="form-control" id="enterprise_head_position" name="enterprise_head_position"   />
     <input type="hidden" class="form-control" id="day" name="day"   />
     <input type="hidden" class="form-control" id="month" name="month"   />
     <input type="hidden" class="form-control" id="year" name="year"   />


    <div id="editor"></div>

<!--    <button onclick="printDiv('staff','Title')">Print</button>-->
</div>
</div>
		  

</div>
</div>
  </div>
  <!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>


<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="dist/js/jquery.validate.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"  ></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
 <script type="text/javascript" src="js/contracts.js"></script>


</body>
</html>
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>-->
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/FileSaver.js"></script>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/jquery.wordexport.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- jquery-contextmenu (https://github.com/mar10/jquery-ui-contextmenu/) -->
<script src="//cdn.jsdelivr.net/npm/ui-contextmenu/jquery.ui-contextmenu.min.js"></script>

<link href="src/skin-win8/ui.fancytree.css" rel="stylesheet" />
<script src="src/jquery.fancytree.js"></script>
<script src="src/jquery.fancytree.dnd5.js"></script>
<script src="src/jquery.fancytree.edit.js"></script>
<script src="src/jquery.fancytree.gridnav.js"></script>
<script src="src/jquery.fancytree.table.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script  charset="UTF-8">
    var arrayData2=[];
    var arrayData=[];




    $("#enterprise_name").change(function(){
        console.log('enterprise_name change'+$(this).attr('name'));
        var company_id=$(this).find('option:selected').val();
        $.ajax({
            // url: 'st_selectStaff.php',
            url: 'st_selectWithCompany.php',
            type: "POST",
            data: { company_id:company_id},
            success: function (data) {
                console.log('dataaaaaaa=' + data)
                var data1=$.parseJSON(data);
                // data1.remove("icon");



                $('#companyDate').text($('#date_completion').val())
                var table='';
                // console.log('day='+$('#date_completion').val().substr(0, 2))
                // console.log('month='+$('#date_completion').val().substr(3, 2))
                var year=$('#date_completion').val().substr(6, 4);
                var month=$('#date_completion').val().substr(3, 2);
                switch ($('#date_completion').val().substr(3, 2)) {
                    case "01":
                        month = "Yanvar";
                        break;
                    case "02":
                        month = "Fevral";
                        break;
                    case "03":
                        month = "Mart";
                        break;
                    case "04":
                        month = "Aprel";
                        break;
                    case "05":
                        month = "May";
                        break;
                    case "06":
                        month = "İyun";
                        break;
                    case "07":
                        month = "İyul";
                        break;
                    case "08":
                        month = "Avqust";
                        break;
                    case "09":
                        month = "Sentyabr";
                        break;
                    case "10":
                        month = "Oktyabr";
                        break;
                    case "11":
                        month = "Noyabr";
                        break;
                    case "12":
                        month = "Dekabr";
                        break;
                }
                var day=$('#date_completion').val().substr(0, 2);

                $('#year').val(year)
                $('#month').val(month)
                $('#day').val(day)

                $('.year').text(year)
                $('.month').text(month)
                $('.day').text(day)
                $('.enterprise_head_fullname').text(data1["enterprise_head_fullname"])
                $('.enterprise_head_position').text(data1["enterprise_head_position"])
                $('#companyName').text('"'+data1["company_name"]+'"')
                $('.company_address').text(data1["company_address"])
                $('.company_tel').text(data1["company_tel"])

                    $('#enterprise_head_fullname').val(data1["enterprise_head_fullname"])
                    $('#enterprise_head_position').val(data1["enterprise_head_position"])
                    $('#company_name').val(data1["company_name"])
                    $('#company_address').val(data1["company_address"])
                    $('#company_tel').val(data1["company_tel"])


                // $("table#staff_table tbody").html('');
                console.log('dataaaaaaa111=', data1)
                $.each(data1, function (key, value) {
                    console.log('dataaaaaaa111 value=' , value)
                    if(key!="company_tel" && key!="company_address" && key!="company_name" && key!="enterprise_head_fullname"&& key!="enterprise_head_position" )
                    {
                        // table+='<tr class="typeOfDocument" >' +
                        //     '<td>'+value.id+'</td>'+
                        //     '<td>'+value.structure+'</td>'+
                        //     '<td>'+1+'</td>'+
                        //     '<td>'+1000+'</td>'+
                        //     '<td>'+1000+'</td>'+
                        //     '<td>'+1000+'</td>';
                        arrayData2.push({"id":value.id,"category":value.category})
                    }

                });
                console.log('arrayData2=',JSON.stringify(arrayData2))
                arrayData=JSON.stringify(arrayData2);

                // $("table#staff_table tbody").append(table);

                tree = $('#stafftree').fancytree('getTree');
                tree.reload($.parseJSON(data));

                $("#staff").css("display","block");
                $("#download").css("display","block");
                $("#print").css("display","block");
                // $("#tableStaff").val( $("table#staff_table").html());
                $("#tableStaff").val( $("table#stafftree").html());
                var element = $("#staff"); // global variable


                html2canvas(element, {
                    onrendered: function (canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;

                    }
                });
                $(".staffText").css("display","none");


            },
        });
    })
    function printDiv(divId,
                      title) {
        $(".staffText").css("display","block");

        let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

        mywindow.document.write(`<html><head><title>${title}</title>`);

        mywindow.document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >'+
            '<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">'+
            '<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">'+
            '<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">'+
            '<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">'+
            '<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">'+
            ' <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">'+
            '<link rel="stylesheet" href="dist/css/adminlte.min.css">'+
            ' <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">'+
            ' <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">'+
            '<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">'+
        '<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">'+
        '<link rel="stylesheet" type="text/css" href="css/datatables.min.css" />'+
        '<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">');

        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById(divId).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        $(".staffText").css("display","none");
        setTimeout(function () {
            mywindow.close();
        }, 250);

        return true;
    }
    var getCanvas; // global variable
    function saveDiv(divId) {
        // generate(divId)
        var imgageData = getCanvas.toDataURL("image/png");
        var doc = new jsPDF('p', 'mm');
        // var width = doc.internal.pageSize.getWidth();
        // var height = doc.internal.pageSize.getHeight();
        // doc.addImage(imgageData, 'PNG', 0, 0, width, height);
        doc.addImage(imgageData, 'PNG', 10, 10);
        doc.save('sample-file.pdf');
    }

</script>

<script type="text/javascript">
    var CLIPBOARD = null;
    var myJSON;
    // var pushOldu=false;
    var idArray;
    var eventArray=[];
    var createDateParent='1900-01-01';
    var dataArray=[];
    var silArray=[];
    var event_t='';
    var tree_e=[];
    var addNew=0;
    var tree=[];
    var trList;var companyId;
    $(function() {
        //var subArray =  <?php //echo json_encode(unflattenArray($flatArray)); ?>//;
        var subArray =  [];
        //idArray =  <?php //echo json_encode($idArray); ?>//;
        idArray =  [];
        console.log('subArray $idArray=',idArray);
        console.log('subArray parent=',subArray);

        pushOldu(subArray)
        function pushOldu(subArray) {
            console.log('subArray=', subArray)
            $("#stafftree")
                .fancytree({
                    checkbox: true,
                    checkboxAutoHide: true,
                    titlesTabbable: true, // Add all node titles to TAB chain
                    quicksearch: true, // Jump to nodes when pressing first character
                    // source: myJSON,
                    // source: { url: "ajax-tree-products.json" },
                    source: subArray,
                    //source: SOURCE,

                    extensions: ["edit", "dnd5", "table", "gridnav"],

                    dnd5: {
                        preventVoidMoves: true,
                        preventRecursion: true,
                        autoExpandMS: 400,
                        // dragStart: function(node, data) {
                        //     return true;
                        // },
                        // dragEnter: function(node, data) {
                        //     // return ["before", "after"];
                        //     return true;
                        // },
                        // dragDrop: function(node, data) {
                        //     data.otherNode.moveTo(node, data.hitMode);
                        // },
                    },
                    edit: {
                        triggerStart: ["f2", "shift+click", "mac+enter"],
                        close: function(event, data) {
                            if (data.save && data.isNew) {
                                console.log('a1',data)
                                if(data.node.parent.data.create_date){
                                    createDateParent=data.node.parent.data.create_date;
                                }

                                eventArray=event;
                                dataArray=data;
                                $(document).on('click', '#struktur', function(e) {
                                    console.log('a2')
                                    $('#query').css('display','none')
                                    $('#stQuery').css('display','block')
                                    $('#employeesQuery').css('display','none');
                                    $('#positionQuery').css('display','none');
                                    $('#dateQuery').css('display','block')
                                    $('#confirmQuery').css('display','block')
                                    $('#structureQuery').css('display','block')
                                    $(document).off('click', '#pozisya');
                                    $(document).off('click', '#struktur');

                                });
                                $(document).on('click', '#pozisya', function(e) {
                                    console.log('a3');
                                    $('#query').css('display','none')
                                    $('#stQuery').css('display','block')
                                    $('#employeesQuery').css('display','block')
                                    $('#positionQuery').css('display','block')
                                    $('#dateQuery').css('display','block')
                                    $('#confirmQuery').css('display','block')
                                    $('#structureQuery').css('display','none')
                                    $(document).off('click', '#pozisya');
                                    $(document).off('click', '#struktur');
                                    // var company_id=$('#company_id').val();



                                    $.ajax({
                                        url: 'st_emp_select.php',
                                        type: "POST",
                                        data: { company_id:companyId},
                                        success: function (data) {
                                            console.log('st_emp_select data=' + data)
                                            var option='<select data-live-search="true"  name="employee" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                                            option += '<option value="">Seçin..</option>';

                                            var row = '';
                                            // $('#tablePositions').find('tbody').html('');
                                            $.each($.parseJSON(data), function(k,v) {
                                                console.log('v=',v)
                                                option += '<option value="' + v.id + '" >' + v.firstname + ' '+v.lastname + ' '+v.surname + '</option>';

                                            });
                                            option+=' </select>';
                                            console.log('option='+option)
                                            // option += '</select>';
                                            $('#employees').html(option);
                                            // $('.employeesTree').html(option);
                                            $(".selectpicker").selectpicker();

                                        },
                                    });


                                });
                                confirmClick(companyId);


                                // Quick-enter: add new nodes until we hit [enter] on an empty title
                                $("#stafftree").trigger("nodeCommand", {
                                    cmd: "addSibling",
                                });
                            }
                        },
                    },
                    table: {
                        indentation: 20,
                        nodeColumnIdx: 2,
                        checkboxColumnIdx: 0,
                    },
                    gridnav: {
                        autofocusInput: false,
                        handleCursorKeys: true,
                    },

                    lazyLoad: function(event, data) {
                        data.result = { url: "../demo/ajax-sub2.json" };
                    },
                    createNode: function(event, data) {
                        // console.log('createNode',data)

                        if(data.node.data.id){
                            $('#butModal').css('display','none');
                            $(document).off('click', '#struktur');
                            $(document).off('click', '#pozisya');
                            $('#query').css('display','block')
                            $('#employeesQuery').css('display','none')

                        }
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");

                        // console.log('createNode node=',node)

                        // Span the remaining columns if it's a folder.
                        // We can do this in createNode instead of renderColumns, because
                        // the `isFolder` status is unlikely to change later
                        if (node.isFolder()) {
                            $tdList
                                .eq(2)
                                .prop("colspan", 6)
                                .nextAll()
                                .remove();
                            $tdList
                                .css("background-color",'rgba(0,0,0,.075)')

                        }
                    },
                    renderColumns: function(event, data) {

                        // console.log('renderColumns',data)
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                        trList = $(node.tr);

                        $tdList.eq(0).text('');
                        $tdList.eq(1).text(node.data.id);
                        $(node.tr).attr('data-id',node.data.id);
                        $(node.tr).attr('data-companyId',node.data.company_id);
                        //*men
                        $tdList
                            .eq(3)
                            // .find('input')
                            // .text(node.data.code);
                            .text(1);
                        //iconu gizledir
                        $tdList
                            .find('.fancytree-icon')
                            .css('display','none');
                        //ox isaresini gizledir
                        $tdList
                            .find('.fancytree-expander')
                            .css('display','none');

                        $tdList
                                .eq(4)
                                .find('span')
                                .text(1000);
                        $tdList
                            .eq(5)
                            .find('span')
                            // .text(node.data.full_name);
                            .text('-');


                        $tdList
                            .eq(6)
                            .find('span')
                            .text(10000);


                        $tdList
                            .eq(7)
                            .find('span')
                            .text(node.data.company);


                        // .find("input")
                        // .val(node.data.foo);
                        // $tdList
                        // 	.eq(5)
                        // 	.find("input")
                        // 	.val(node.data.children);
                        // console.log('$tdList=',$tdList)

                        // Static markup (more efficiently defined as html row template):
                        // $tdList.eq(3).html("<input type='input' value='"  "" + "'>");
                        // ...
                        // sagClick(node.data.id);
                        // treeClick(trList)
                    },
                    modifyChild: function(event, data) {
                        console.log('modifyChild event.type='+event.type)
                        console.log('modifyChild data=',data)

                        data.tree.info(event.type, data);

                    },
                })
                .on("nodeCommand", function(event, data) {
                    // Custom event handler that is triggered by keydown-handler and
                    // context menu:
                    var refNode,
                        moveMode,
                        tree = $.ui.fancytree.getTree(this),
                        node = tree.getActiveNode();
                    console.log('node cagirdim /////////////////////////////////////////',node)

                    switch (data.cmd) {

                        case "addChild":
                        case "addSibling":
                        case "indent":
                        case "moveDown":
                        case "moveUp":
                        case "outdent":
                        case "remove":
                        case "rename":
                            tree.applyCommand(data.cmd, node);
                            break;
                        case "cut":
                            CLIPBOARD = { mode: data.cmd, data: node };
                            break;
                        case "copy":
                            CLIPBOARD = {
                                mode: data.cmd,
                                data: node.toDict(true, function(dict, node) {
                                    delete dict.key;
                                }),
                            };
                            break;
                        case "clear":
                            CLIPBOARD = null;
                            break;
                        case "paste":
                            if (CLIPBOARD.mode === "cut") {
                                // refNode = node.getPrevSibling();
                                CLIPBOARD.data.moveTo(node, "child");
                                CLIPBOARD.data.setActive();
                            } else if (CLIPBOARD.mode === "copy") {
                                node.addChildren(
                                    CLIPBOARD.data
                                ).setActive();
                            }
                            break;
                        default:
                            alert("Unhandled command: " + data.cmd);
                            return;
                    }
                })
                .on("keydown", function(e) {
                    var cmd = null;

                    console.log("keyDown"+$.ui.fancytree.eventToString(e));
                    switch ($.ui.fancytree.eventToString(e)) {
                        case "ctrl+shift+n":
                        case "meta+shift+n": // mac: cmd+shift+n
                            cmd = "addChild";
                            break;
                        case "ctrl+c":
                        case "meta+c": // mac
                            cmd = "copy";
                            break;
                        case "ctrl+v":
                        case "meta+v": // mac
                            cmd = "paste";
                            break;
                        case "ctrl+x":
                        case "meta+x": // mac
                            cmd = "cut";
                            break;
                        case "ctrl+n":
                        case "meta+n": // mac
                            cmd = "addSibling";
                            break;
                        case "del":
                        case "meta+backspace": // mac
                            cmd = "remove";
                            break;
                        // case "f2":  // already triggered by ext-edit pluging
                        // 	cmd = "rename";
                        // 	break;
                        case "ctrl+up":
                        case "ctrl+shift+up": // mac
                            cmd = "moveUp";
                            break;
                        case "ctrl+down":
                        case "ctrl+shift+down": // mac
                            cmd = "moveDown";
                            break;
                        case "ctrl+right":
                        case "ctrl+shift+right": // mac
                            cmd = "indent";
                            break;
                        case "ctrl+left":
                        case "ctrl+shift+left": // mac
                            cmd = "outdent";
                    }
                    if (cmd) {
                        console.log('trigger')
                        $(this).trigger("nodeCommand", { cmd: cmd });
                        return false;
                    }
                });

            /*
             * Tooltips
             */
            // $("#tree").tooltip({
            // 	content: function () {
            // 		return $(this).attr("title");
            // 	}
            // });

            /*
             * Context menu (https://github.com/mar10/jquery-ui-contextmenu)
             */
            $("#tree").contextmenu({


                delegate: "span.fancytree-node",
                menu: [
                    {
                        title: "Redaktə et <kbd>[F2]</kbd>",
                        cmd: "rename",
                        uiIcon: "ui-icon-pencil",
                    },
                    {
                        title: "Sil <kbd>[Del]</kbd>",
                        cmd: "remove",
                        uiIcon: "ui-icon-trash",
                    },
                    { title: "----" },
                    {
                        title: "New sibling <kbd>[Ctrl+N]</kbd>",
                        cmd: "addSibling",
                        uiIcon: "ui-icon-plus",
                    },
                    {
                        title: "New child <kbd>[Ctrl+Shift+N]</kbd>",
                        cmd: "addChild",
                        uiIcon: "ui-icon-arrowreturn-1-e",
                    },
                    // { title: "----" },
                    // {
                    //     title: "Cut <kbd>Ctrl+X</kbd>",
                    //     cmd: "cut",
                    //     uiIcon: "ui-icon-scissors",
                    // },
                    // {
                    //     title: "Copy <kbd>Ctrl-C</kbd>",
                    //     cmd: "copy",
                    //     uiIcon: "ui-icon-copy",
                    // },
                    // {
                    //     title: "Paste as child<kbd>Ctrl+V</kbd>",
                    //     cmd: "paste",
                    //     uiIcon: "ui-icon-clipboard",
                    //     disabled: true,
                    // },
                ],
                beforeOpen: function(event, ui) {


                    var node = $.ui.fancytree.getNode(ui.target);
                    companyId=ui.target.closest('tr').attr('data-companyId')
                    console.log('node=',node)
                    $("#stafftree").contextmenu(
                        "enableEntry",
                        "paste",
                        !!CLIPBOARD
                    );
                    node.setActive();
                },
                select: function(event, ui) {

                    var that = this;


                    // delay the event, so the menu can close and the click event does
                    // not interfere with the edit control
                    setTimeout(function() {
                        $(that).trigger("nodeCommand", { cmd: ui.cmd });
                    }, 100);
                },
            });
        }


    $('#date_completion').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
    });
  });
</script>