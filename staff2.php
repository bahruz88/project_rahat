<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.0.0/jspdf.umd.min.js"></script>

</head>
<body>
<div id="html-content-holder" style="background-color: #F0F0F1; color: #00cc65; width: 500px;
        padding-left: 25px; padding-top: 10px;">
    <strong>Codepedia.info</strong><hr/>
    <h3 style="color: #3e4b51;">
        Html to canvas, and canvas to proper image
    </h3>
    <p style="color: #3e4b51;">
        <b>Codepedia.info</b> is a programming blog. Tutorials focused on Programming ASP.Net,
        C#, jQuery, AngularJs, Gridview, MVC, Ajax, Javascript, XML, MS SQL-Server, NodeJs,
        Web Design, Software</p>
    <p style="color: #3e4b51;">
        <b>html2canvas</b> script allows you to take "screenshots" of webpages or parts
        of it, directly on the users browser. The screenshot is based on the DOM and as
        such may not be 100% accurate to the real representation.
    </p>
    <iframe src=”senedler/emek2.pdf" width=”100%” height=”100%”>
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
<input id="btn-Preview-Image" type="button" value="Preview"/>
<a id="btn-Convert-Html2Image" href="#">Download</a>
<br/>
<h3>Preview :</h3>
<div id="previewImage">
</div>

<script  charset="UTF-8">



    $('#date_completion').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date()
    });
    $("#enterprise_name").change(function(){
        console.log('enterprise_name change'+$(this).attr('name'));
        var id=$(this).find('option:selected').val();
        $.ajax({
            url: 'st_selectStaff.php',
            type: "POST",
            data: { id:id},
            success: function (data) {
                console.log('dataaaaaaa=' + data)
                var table='';
                $.each($.parseJSON(data), function (key, value) {
                    table+='<tr class="typeOfDocument" >' +
                        '<td>'+value[0]+'</td>'+
                        '<td>'+value[1]+'</td>'+
                        '<td>'+1+'</td>'+
                        '<td>'+1000+'</td>'+
                        '<td>'+1000+'</td>'+
                        '<td>'+1000+'</td>';


                });

                $("table#staff_table").append(table);


            },
        });
    })
</script>
<script>
    $(document).ready(function(){


        var element = $("#html-content-holder"); // global variable
        var getCanvas; // global variable

        $("#btn-Preview-Image").on('click', function () {
            html2canvas(element, {
                onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });
        });

        $("#btn-Convert-Html2Image").on('click', function () {
            var imgageData = getCanvas.toDataURL("image/png");
            // Now browser starts downloading it instead of just showing it
            // var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            // console.log('getCanvas',getCanvas)
            // // console.log('imgageData'+imgageData)
            // // console.log('newData'+newData)
            // $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);



            var doc = new jsPDF('p', 'mm');
            doc.addImage(imgageData, 'PNG', 10, 10);
            doc.save('sample-file.pdf');
        });

    });

</script>
</body>
</html>