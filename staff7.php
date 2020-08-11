<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/FileSaver.js"></script>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/jquery.wordexport.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event)      {
            $("#page-content").wordExport();
        });
    });
</script>
<a class="word-export" href="#">Click me</a>
<div id="page-content">
    <div class="staffText">
        <div class="container text-center"><span id="companyName"></span></div>
        <div class="container text-center">AZ1114, AZƏRBAYCAN, BAKI ŞƏHƏRİ, BİNƏQƏDİ RAYONU, M.RƏSULZADƏ ŞTQ, AĞAMALI OĞLU (RƏSULZADƏ QƏS.), EV 5A
            Tel: 012 404 19 19 / 050 265 14 36</div>
        <br/>
        <div class="row">
            <div class="col-md-8">2020-ci ilin iyun ayı üzrə ştat cədvəli</div>
            <div class="col-md-4">TƏSDİQ EDİRƏM:</div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-12  text-right">      Direktor _______________________ Aftandil Aftandil</div>
        </div>
        <div class="row">
            <div class="col-md-8">&nbsp;</div>
            <div class="col-md-4">01 iyun 2020-ci il</div>
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
            <div class="col-md-1"><span id="companyDate"></span>     </div>
            <div class="col-md-11">-ci il tarixindən qüvvəyə minir</div>
        </div>
    </div>
    <table id="staff_table" class="table table-striped  table-bordered table-hover">

        <thead>
        <th>No</th>
        <th style="width:150px;">Struktur bölmələrin adı və vəzifələr</th>
        <th style="width:150px;">Ştat sayı (vahid)</th>
        <th style="width:150px;">Vəzifə  maaşı (manatla)</th>
        <th style="width:150px;">Vəzifə maaşına əlavə</th>
        <th style="width:150px;"> Aylıq əmək haqqı fondu</th>
        </thead>
        <tbody>

        </tbody>



    </table>
    </div>