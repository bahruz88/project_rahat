

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RahatHR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .clearFix{
            clear: both;
        }
        .info{
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }
        .panel{
            box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
            margin:10px;
            padding:10px;
        }
        .profile-user-img{
            width:100px;
            height:100px;
        }
        .btn {
            padding:5px !important;
        }
        .hid{
            /*display: none;*/
        }
        @charset "utf-8";
        /* CSS Document */

        .margin_top2px{ margin-top:20px;}
        ul li button{  display: block;
            margin-bottom: 0;
            margin-left: 32px;}
        .full_container{ float:left; width:100%;}
        input[type="text"]{ width:300px; padding:6px; margin-top:10px; margin-bottom:6px;}
        .margin_ng{ margin-left:-4px;}
        ul {
            margin-left:0px;
            list-style:none;
            padding-left:40px; margin-left:-20px;
            padding: 0 0 0 16px;
            margin: 0;
        }
        li {
            margin: 0;
            padding: 0px 0 10px; border-left:1px solid #d9d9d9;}

        ul li.tree-lastsib
        { border:none !important;
        }
        span.tree-connector{
            width: 30px;
            height: 26px;
            display: inline-block; /* Required to make a span sizeable */
            vertical-align: top;
            text-align:center;
            border-bottom:1px solid #d9d9d9;

        }
        li.tree-lastsib > span.tree-connector{ border-left:1px solid #d9d9d9;}
        .buttons input[type="submit"], button {
            background: none repeat scroll 0 0 #047BA1;
            border: medium none !important;
            color: #FFFFFF;
            cursor: pointer;
            font-size: 12px;
            padding: 3px 7px;
        }
        .buttons input[type="submit"]:hover, button:hover {
            background: none repeat scroll 0 0 #118BBA;
        }

        .margin_top_o{ margin-top: 0!important}
        /*.romvebtn{ display:none;}*/
        .romvebtn{  border-left: 1px solid #D9D9D9;
            margin-left: 16px;
            margin-top: -20px;
            padding-top: 20px;}
        .romvebtn .buttons input[type="submit"], .romvebtn button{ background:#6F0B0B; margin-left:10px;}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<form name="f1" method="post" action="">
    <div id="container">
        <ul>

            <li><input type="text" id="txt_1" name="q_0_1" class="margin_top_o"></li>
<!--            <li  class="margin_left ">-->
<!--                <span class="tree-connector">No</span>-->
<!--                <input type="text" id="txt_2" value="Y_1" name="Y_1" class="margin_ng">-->
<!---->
<!--                <div class="romvebtn">-->
<!--                    <button type="button" id="2" class="remove ">Remove</button>-->
<!--                </div>-->
<!--                <button type="button" id="1" class="ul-appending ">Expand</button></li>-->
            <li  class="tree-lastsib">
                <span class="tree-connector">Yes</span>
                <input type="text" id="txt_3" value="Y_2" name="Y_2" class="margin_ng">
                <div class="romvebtn">
                    <button type="button" id="2" class="remove ">Sil</button>
                </div>
                <button type="button" id="2" class="ul-appending tt">Əlavə et</button></li>
        </ul>
    </div>
</form>





<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script>
    var nd=1;

    $('body').on('click', 'button.ul-appending', function(e) {
        $(this).prev('div.romvebtn').show();

        // $(this).hide();
        var idd = e.target.id;
        $(this).parent().append(
            $('<ul>').addClass('newul').append(
                $('<li class="tree-lastsib">').append($('<span class="tree-connector">Yes</span><input type="text"   value="N_'+idd+'_2" name="q_'+idd+'_2" id="N_'+idd+'_2"><div class="romvebtn"><button type="button" id="2" class="remove ">Sil</button></div>'),$('<button type="button" id="'+idd+'_2">').addClass('ul-appending').text("Əlavə et")) ));
        $('body').on('click','button.remove',function(){
                // console.log('remove remove'+$(this).parent('.romvebtn').parent('li').children('ul').html())
            if($(this).parent('.romvebtn').parent('li').children('ul').html()!=undefined){
                $(this).parent('.romvebtn').parent('li').children('ul').remove();
            }else{
                $(this).parent('.romvebtn').closest('li').remove();
            }





            $(this).parent('.romvebtn').next('button').show();
            $(this).parent('.romvebtn').hide();

        });
    });

</script>
</body>
</html>