<!DOCTYPE html>
<html>
<body>
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
<span id="ss">salam</span>
<canvas id="myCanvas" width="200" height="100" style="border:1px solid #d3d3d3;">
    Your browser does not support the HTML canvas tag.</canvas>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    ctx.font = "30px Arial";
    console.log('$(\'#ss\').text()='+$('#ss').text())
    // ctx.fillText($('#ss').text(),1000,500);
    ctx.strokeText($('#staff_table'),10,50);
</script>

</body>
</html>