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

  <title><?php echo $company_name ; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"   media='screen,print'>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css"   media='screen,print'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"   media='screen,print'>
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"   media='screen,print'>
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



    <link rel="stylesheet" href="css/staff.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="modal"><!-- Place at bottom of page --></div>
<div class="wrapper">

  <!-- Navbar -->
 <?php  include ("navbar.php")?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/rhr.png" alt="" class="brand-image  elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">&ensp; </span>
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
//    include  ('contracts/mainContractModal.php');
    ?>

<!-- Tab panes -->
<div class="tab-content" style="padding-left:15px; box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
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
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="staffSelect"><?php echo $dil["choose"];?></label>
        <div class="col-sm-6">
            <fieldset >
                <input type="radio" value="1" name="staffSelect">&nbsp; <label for="">Ştat cədvəli</label> &nbsp;
                <input type="radio" value="2" name="staffSelect">&nbsp;<label for="">Ştat Əmri</label>
            </fieldset>
        </div>
    </div>
    <div class="form-group row text-left">
        <div class="col-sm-1">
            <button type="button" class=" btn btn-primary" id="staffSearch">Axtar</button>

        </div>
        <div class="col-sm-1">
<!--            <button class=" btn btn-primary" onclick="getPDF()" id="download" style="display: none">Yüklə</button>-->
            <button class=" btn btn-primary" onclick="saveDiv('staff2')" id="download" style="display: none">Yüklə</button>
        </div>
        <div class="col-sm-1">
            <button class=" btn btn-primary" onclick="printDiv('staff','Title')" id="print" style="display: none">Çap et</button>
        </div>




    </div>
    <div class="tab-pane active" id="noStaff" style="width:800px;margin:auto;">
    </div>
    <div class="container tab-pane active" id="staff" style="display: none;margin:auto;">

        <div class="staffText">
            <div style="width:100%;text-align: center;"><span class="company"></span></div>
            <div style="width:100%;text-align: center;"><span class="company_adress"></span><span class="company_tel"></span></div>
            <br/>
            <table style="width:100%;border:0;">
                <tr>
                    <td style="width:50%"><span class="year"></span>-ci ilin <span class="month"></span> ayı üzrə ştat cədvəli</td>
                    <td>TƏSDİQ EDİRƏM:</td>
                </tr>
                <tr style="height:20px"></tr>
                <tr>
                    <td  style="text-align: right;"> <span class="enterprise_head_position"></span></td>
                    <td  style="text-align: left;"><span class="enterprise_head_fullname"></span></td>
                </tr>
                <tr style="height:20px"></tr>
                <tr>
                    <td>  </td>
                    <td><span class="day"></span> <span class="month"></span> <span class="year"></span>-ci il </td>
                </tr>
                <tr style="height:20px"></tr>

                <tr>
                    <td colspan="2">
                        <table  style="width:100%;text-align: center;">
                            <tr>
                                <td style="width:30%;text-align: left;">Ştat vahidi</td>
                                <td style="width:5%;text-align: center;"><span id="countStaff"></span></td>
                                <td style="width:65%;text-align: left;">nəfər</td>
                            </tr>
                            <tr>
                                <td style="width:30%;text-align: left;">Aylıq əmək haqqı fondu</td>
                                <td style="width:5%;text-align: center;"><span id="countWage"></span></td>
                                <td style="width:65%;text-align: left;">manat</td>
                            </tr>
                            <tr style="height:20px"></tr>
                            <tr>
                                <td style="width:30%;text-align: left;"><span class="day"></span> <span class="month"></span> <span class="year"></span></td>
                                <td colspan="2" style="width:70%;text-align: left;">-ci il tarixindən qüvvəyə minir</td>
                            </tr>
                        </table>
                    </td>
                </tr>


            </table>
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


            <div class="row staffText2" >
                <table style="width:100%;text-align: center;">
                    <tr style="height:20px;"></tr>
                    <tr>
                        <td><span class="enterprise_head_position"></span></td>
                        <td> <span class="enterprise_head_fullname"></span></td>
                    </tr>
                </table>
            </div>



	</div>
	<div class="container  tab-pane active" id="statt" style="display: none;margin:auto;">
        <div class="stattText">
        <div style="width:100%;text-align: center;"><strong><span class="company"></span></strong></div>
        <div style="width:100%;text-align: center;"><strong><span class="company_adress"></span><span class="company_tel"></span></strong></div>
        <br/>
            <table  style="width:100%;text-align: center;">
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="2"  style="width:80%;">Cəmiyyətin ştat cədvəlində aşağıdaki dəyişiklik edilmişdir.</td>
                    <td><span class="day"></span> <span class="month"></span> <span class="year"></span></td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td  style="width:30%;"> Dəyişiklik tarixi:</td>
                    <td style="width:30%;"> </td>
                    <td  style="width:40%;"></td>
                </tr>
                <tr style="height:20px;"></tr>
            </table>


        </div>
        <div id="stattTab" style="font-weight: bold;margin-top:40px;" >
            <table id="statttree">

                <thead>
                <tr class="text-center" style="font-size:12px;">
                    <th style="width:15px;" rowspan="2"></th>
                    <th style="width:15px;border:1px solid grey;" rowspan="2">No</th>
                    <th style="width:80px;border:1px solid grey;" rowspan="2">Struktur bölmələrin adı və vəzifələr</th>
                    <th style="width:200px;border:1px solid grey;" colspan="4"  >Mövcud vəziyyət</th>
                    <th style="width:200px;border:1px solid grey;" colspan="4"  >Yeni vəziyyət</th>



                </tr>
                <tr  style="font-size:12px;">

                    <td style="width:40px;border:1px solid grey;">Ştat sayı (vahid)</td>
                    <td style="width:40px;border:1px solid grey;">Vəzifə  maaşı (manatla)</td>
                    <td style="width:40px;border:1px solid grey;">Vəzifə maaşına əlavə</td>
                    <td style="width:40px;border:1px solid grey;"> Aylıq əmək haqqı fondu</td>

                    <td style="width:40px;border:1px solid grey;">Ştat sayı (vahid)</td>
                    <td style="width:40px;border:1px solid grey;">Vəzifə  maaşı (manatla)</td>
                    <td style="width:40px;border:1px solid grey;">Vəzifə maaşına əlavə</td>
                    <td style="width:40px;border:1px solid grey;"> Aylıq əmək haqqı fondu</td>


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
        <div class="row stattText2" >
            <table>
                <tr>
                    <td colspan="2">
                    Cəmiyyətin müvafiq strukturları əmrin icrasından irəli gələn digər məsələləri həll etsinlər.
                    </td>
                </tr>
                <tr style="font-weight: bold;">
                    <td style="width:40%;text-align: right;"> <span class="enterprise_head_position"></span></td>
                    <td style="width:60%;text-align: left;"><span class="enterprise_head_fullname"></span></td>

                </tr>
            </table>
         </div>

	</div>

    <input type="hidden" class="form-control" id="tableStaff" name="tableStaff"   />
    <input type="hidden" class="form-control" id="company" name="company"   />
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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>-->
<script src="js/html2canvas.js"></script>


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
    $body = $("body");

    // $(document).on({
    //     ajaxStart: function() { $body.addClass("loading");    },
    //     ajaxStop: function() { $body.removeClass("loading"); }
    // });
    var arrayData2=[];
    var arrayData=[];
    var getCanvas;


    $("#staffSearch").click(function(){
        $body.addClass("loading");
          countStaff=0;
         countWage=0;
         countWageStat=0;
         countStatt=0;
        console.log('enterprise_name change'+$('#enterprise_name').attr('name'));
        var company_id=$('#enterprise_name').find('option:selected').val();
        // var staffSelect=$('#staffSelect').val();
        var staffSelect=$("input[name='staffSelect']:checked").val();

            $("#staff").css("display","none");
            $("#statt").css("display","none");
        $("#download").css("display","none");
        $("#print").css("display","none");
        $(".staffText").css("display","block");
        $(".stattText").css("display","block");
        $(".stattText2").css("display","block");
        $(".staffText2").css("display","block");

        console.log('staffSearch staffSelect='+staffSelect);
        console.log('staffSearch company_id='+company_id);
        var datee=$('#date_completion').val();
        $.ajax({
            // url: 'st_selectStaff.php',
            url: 'structure/st_selectWithCompanyPage.php',
            type: "POST",
            async:false,
            data: { company_id:company_id,datee:datee},
            success: function (data) {
                if(data){
                    console.log('dataaaaaaa parseJSON staff====*** =' , $.parseJSON(data))
                    var data1=$.parseJSON(data);
                    // data1.remove("icon");
                    $('#companyDate').text($('#date_completion').val())

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
                    $('#companyName').text('"'+data1["company"]+'"')
                    $('.company_address').text(data1["company_address"])
                    $('.company_tel').text(data1["company_tel"])

                    $('#enterprise_head_fullname').val(data1["enterprise_head_fullname"])
                    $('#enterprise_head_position').val(data1["enterprise_head_position"])
                    $('#company').val(data1["company"])
                    $('#company_address').val(data1["company_address"])
                    $('#company_tel').val(data1["company_tel"])


                    // $("table#staff_table tbody").html('');
                    console.log('dataaaaaaa111=', data1)
                    $.each(data1, function (key, value) {
                        $.each(value, function (k, v) {
                             // console.log('key=' + k + ' val=' + v);


                            $('#'+k).val(v)
                            $('#'+k).text(v)
                            $('.'+k).text(v)
                        })
                        // console.log('dataaaaaaa111 value=' , value)
                        if(key!="company_tel" && key!="company_address" && key!="company" && key!="enterprise_head_fullname"&& key!="enterprise_head_position" )
                        {
                            arrayData2.push({"id":value.id,"category":value.category})
                        }

                    });
                    console.log('arrayData2=',JSON.stringify(arrayData2))
                    arrayData=JSON.stringify(arrayData2);

                    // $("table#staff_table tbody").append(table);

                    tree = $('#stafftree').fancytree('getTree');
                    tree.reload($.parseJSON(data));

                    tree = $('#statttree').fancytree('getTree');
                    tree.reload($.parseJSON(data));

                    if(staffSelect=='1'){
                        $("#staff").css("display","block");
                        $("#statt").css("display","none");
                        var element = $("#staff");
                    }else  if(staffSelect=='2'){
                        $("#staff").css("display","none");
                        $("#statt").css("display","block");
                        var element = $("#statt");
                    }
console.log('staffSelect==='+staffSelect)

                    // $("#tableStaff").val( $("table#staff_table").html());
                    $("#tableStaff").val( $("table#stafftree").html());
                    element.css({
                        'transform': 'scale(1)',
                        '-ms-transform': 'scale(1)',
                        '-webkit-transform': 'scale(1)' });

                    html2canvas(element, {
                        onrendered: function(canvas) {
                            canvas.getContext('2d');
                            getCanvas = canvas;
                            console.log(" canvas deyisdi="+element.attr('id'));

                            $body.removeClass("loading");
                            $("#download").css("display","block");
                            $("#print").css("display","block");
                        }
                    });
                    // html2canvas(element, {quality: 0,
                    //     scale: 105,dpi: 1000 }).then(function (canvas) {
                    //         canvas.getContext('2d');
                    //         getCanvas = canvas;
                    //         console.log(" canvas deyisdi="+element.attr('id'));
                    //
                    //     $body.removeClass("loading");
                    //     $("#download").css("display","block");
                    //     $("#print").css("display","block");
                    //
                    // });

                    $("#noStaff").css("display","none");
                }else{
                    $("#noStaff").html("<h3>Heç bir məlumat tapılmadı</h3>")

                    $body.removeClass("loading");
                }
                setTimeout(function () {
                    $(".staffText").css("display","none");
                    $(".stattText").css("display","none");
                    $(".stattText2").css("display","none");
                    $(".staffText2").css("display","none");
                }, 350);

            },
        });
    })
    function printDiv(divId,
                      title) {

        var staffchoose=$("input[name='staffSelect']:checked").val();
        if(staffchoose=='1'){
            divId="staff";
            $(".staffText").css("display","block");
            $(".staffText2").css("display","block");
            $(".stattText").css("display","none");
            $(".stattText2").css("display","none");
        }else{
            divId="statt";
            $(".staffText").css("display","none");
            $(".staffText2").css("display","none");
            $(".stattText").css("display","block");
            $(".stattText2").css("display","block");
        }


        let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

        mywindow.document.write(`<html><head><title>${title}</title>`);

        mywindow.document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen,print">'+

            '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="print">'+
            '<style>@media print {\n' +
            '  [class*="col-sm-"] {\n' +
            '    float: left;\n' +
            '  }\n' +
            '}</style>'+
            '<link rel="stylesheet" href="css/staff.css">');

        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById(divId).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        console.log('mywindow=', mywindow.document)

        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        $(".staffText").css("display","none");
        $(".staffText2").css("display","none");
        $(".stattText").css("display","none");
        $(".stattText2").css("display","none");

        setTimeout(function () {
            mywindow.close();
        }, 250);

        return true;
    }

     // global variable
    function saveDiv(divId) {
        $(".staffText").css("display","block");
        $(".stattText").css("display","block");
        $(".stattText2").css("display","block");
        $(".staffText2").css("display","block");
        // generate(divId)
        var staffchoose=$("input[name='staffSelect']:checked").val();
         if(staffchoose=='1') {
            var HTML_Width = $("#staff").width();
            var HTML_Height =$("#staff").height();
        }else{
            var HTML_Width = $("#statt").width();
            var HTML_Height =$("#statt").height();
        }
        console.log('HTML_Width='+HTML_Width)
        var top_left_margin = 10;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height+100;

        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


        var imgData = getCanvas.toDataURL("image/png", 1.0);
        var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'PNG', 0, 0,canvas_image_width,canvas_image_height);


        for (var i = 1; i <= totalPDFPages; i++) {
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'PNG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }

        pdf.save("staff.pdf");

        $(".staffText").css("display","none");
        $(".stattText").css("display","none");
        $(".stattText2").css("display","none");
        $(".staffText2").css("display","none");


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
    var count_pozisya=0;
    var trList;var companyId;
    var countStaff=0;
    var countWage=0;
    var countWageStat=0;
    var countStatt=0;
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
            countStaff=0
            countStatt=0
            $("#stafftree")
                .fancytree({
                    checkbox: true,
                    checkboxAutoHide: true,
                    titlesTabbable: true, // Add all node titles to TAB chain
                    quicksearch: true, // Jump to nodes when pressing first character
                    source: subArray,
                    extensions: [ "table"],
                    table: {
                        indentation: 20,
                        nodeColumnIdx: 2,
                        checkboxColumnIdx: 0,
                    },

                    createNode: function(event, data) {

                        if(data.node.data.id){
                            $('#butModal').css('display','none');
                            $(document).off('click', '#struktur');
                            $(document).off('click', '#pozisya');
                            $('#query').css('display','block')
                            $('#employeesQuery').css('display','none')
                        }
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                        trList = $(node.tr);
                        // console.log('createNode node=',node)

                        // Span the remaining columns if it's a folder.
                        // We can do this in createNode instead of renderColumns, because
                        // the `isFolder` status is unlikely to change later
                        if (node.isFolder()) {
                            count_pozisya=0;
                            $tdList
                                .eq(2)
                                .prop("colspan", 6)
                                .nextAll()
                                .remove();
                            $tdList
                                .css("background-color",'rgb(206 200 200)');
                            $tdList
                                .css("border",'1px solid #9a9797');
                            $tdList
                                .css("cursor","default");
                        }
                    },
                    renderColumns: function(event, data) {

                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                        trList = $(node.tr);
                        // console.log('renderColumns node.data=',data.node);
                        // console.log('renderColumns node.data[1]=',node.data[1]);
                        var staffCount=1;



                        $tdList.eq(0).text('');
                        if (node.isFolder()==false) {
                            count_pozisya++;
                            // console.log('count_pozisya='+count_pozisya)
                            $tdList.eq(1).text(count_pozisya);
                        }else{
                            count_pozisya=0;
                            // $tdList.eq(1).text(node.data.id);
                            $tdList.eq(1).text('');
                        }


                        $(node.tr).attr('data-id',node.data.id);
                        $(node.tr).attr('data-companyId',node.data.company_id);
                        //*mayya
                        $tdList
                            .eq(3)
                            .text(node.data.countCategory);
                        if(node.data.code){
                            if(node.data.code.substr(0, 1)=="P"){
                                countStaff+=parseInt(node.data.countCategory)
                                if(node.data.wageN){
                                    countWage+=parseInt(node.data.wageN)*parseInt(node.data.countCategory)
                                    $('#countWage').text(countWage)
                                }


                                // console.log('countStaff='+countStaff);
                                $('#countStaff').text(countStaff)

                            }
                        }else{
                            $('#countStaff').text('')
                            $('#countWage').text('')
                        }




                        //iconu gizledir
                        $tdList
                            .find('.fancytree-icon')
                            .css('display','none');
                        //ox isaresini gizledir
                        $tdList
                            .find('.fancytree-expander')
                            .css('display','none');

                        if(node.data.wage){
                            $tdList
                                .eq(4)
                                .find('span')
                                .text(node.data.wage);
                            $tdList
                                .eq(6)
                                .find('span')
                                .text(parseInt(node.data.wageN)*parseInt(node.data.countCategory));
                        }else{
                            $tdList
                                .eq(4)
                                .find('span')
                                .text('');
                            $tdList
                                .eq(6)
                                .find('span')
                                .text('');

                        }
                        $tdList
                            .eq(5)
                            .find('span')
                            // .text(node.data.full_name);
                            .text('-');

                        $tdList
                            .eq(7)
                            .find('span')
                            .text(node.data.company);
                        $tdList
                            .find('.fancytree-node')
                            .css('padding-left','5px');

                        $('.fancytree-title').off('click')
                        $('.fancytree-node').off('click')
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



                })
            $("#statttree")
                .fancytree({
                    checkbox: true,
                    checkboxAutoHide: true,
                    titlesTabbable: true, // Add all node titles to TAB chain
                    quicksearch: true, // Jump to nodes when pressing first character
                    source: subArray,
                    extensions: [ "table"],
                    table: {
                        indentation: 20,
                        nodeColumnIdx: 2,
                        checkboxColumnIdx: 0,
                    },

                    createNode: function(event, data) {
                        if(data.node.data.id){
                            $('#butModal').css('display','none');
                            $(document).off('click', '#struktur');
                            $(document).off('click', '#pozisya');
                            $('#query').css('display','block')
                            $('#employeesQuery').css('display','none')
                        }
                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                        trList = $(node.tr);
                        // console.log('createNode node=',node)

                        // Span the remaining columns if it's a folder.
                        // We can do this in createNode instead of renderColumns, because
                        // the `isFolder` status is unlikely to change later
                        if (node.isFolder()) {
                            count_pozisya=0;
                            $tdList
                                .eq(2)
                                .prop("colspan", 9)
                                .nextAll()
                                .remove();
                            $tdList
                                .css("background-color",'rgb(206 200 200)');
                            $tdList
                                .css("border",'1px solid #9a9797');
                            $tdList
                                .css("cursor","default");
                        }
                    },
                    renderColumns: function(event, data) {

                        var node = data.node,
                            $tdList = $(node.tr).find(">td");
                        trList = $(node.tr);
                        // console.log('renderColumns node.data=',data.node);
                        // console.log('renderColumns node.data[1]=',node.data[1]);
                        var staffCount=1;



                        $tdList.eq(0).text('');
                        if (node.isFolder()==false) {
                            count_pozisya++;
                            // console.log('count_pozisya='+count_pozisya)
                            $tdList.eq(1).text(count_pozisya);
                        }else{
                            count_pozisya=0;
                            // $tdList.eq(1).text(node.data.id);
                            $tdList.eq(1).text('');
                        }
                        if(node.data.code){
                            if(node.data.code.substr(0, 1)=="P"){
                                countStatt+=parseInt(node.data.countCategory)
                                // console.log('countStaff='+countStatt);
                                $('#countStaff').text(countStatt)

                                if(node.data.wageN){
                                    countWageStat+=parseInt(node.data.wageN)*parseInt(node.data.countCategory)
                                    $('#countWage').text(countWageStat)
                                }
                            }
                        }else{
                            $('#countStaff').text('')
                            $('#countWage').text('')
                        }


                        $(node.tr).attr('data-id',node.data.id);
                        $(node.tr).attr('data-companyId',node.data.company_id);
                        //*mayya
                        $tdList
                            .eq(3)
                            .text(node.data.countCategory);
                        //iconu gizledir
                        $tdList
                            .find('.fancytree-icon')
                            .css('display','none');
                        //ox isaresini gizledir
                        $tdList
                            .find('.fancytree-expander')
                            .css('display','none');
                        if(node.data.wage){
                            $tdList
                                .eq(4)
                                .find('span')
                                .text(node.data.wage);
                            $tdList
                                .eq(6)
                                .find('span')
                                .text(parseInt(node.data.wageN)*parseInt(node.data.countCategory));
                        }else{
                            $tdList
                                .eq(4)
                                .find('span')
                                .text('');
                            $tdList
                                .eq(6)
                                .find('span')
                                .text('');

                        }

                        $tdList
                            .eq(5)
                            .find('span')
                            // .text(node.data.full_name);
                            .text('-');



                        $tdList
                            .eq(7)
                            .find('span')
                            .text(node.data.company);
                        $tdList
                            .find('.fancytree-node')
                            .css('padding-left','5px');

                        $('.fancytree-title').off('click')
                        $('.fancytree-node').off('click')
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



                })


        }

         $("#stafftree").unbind();
         $("#statttree").unbind();

    $('#date_completion').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        autoclose: true
    });
  });
</script>
<div id="pp"></div>