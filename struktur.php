

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
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<p>Click the button to make a BUTTON element with text.</p>

<button id="btn0">Try it</button>
<!--<input type="text" value="" class="hid">-->
<div id="cr"></div>



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
    // function myFunction() {
    //     var btn = document.createElement("BUTTON");
    //     btn.innerHTML = "Neew Element";
    //     document.getElementById('cr').appendChild(btn);
    // }
    var btnId='';
    var i=1;
    $(document).on("click", "button", function() {
        console.log('ss')
        var btn = document.createElement("BUTTON");
        btn.innerHTML = "Neew Element";
        btn.id='btn'+i;
        i++;
        document.getElementById('cr').appendChild(btn);

    } );


    $(document).on("contextmenu", "button", function(e){
        e.preventDefault();
        console.log('ss');
        btnId=$(this);
        btnId.html('<input type="text" value="" class="hid">');
        $( ".hid" ).focus();
        $('.hid').css('display','block');
        return false;
    });
    $(document).on("keypress", ".hid", function (e) {
        console.log(e.which)
        if(e.which === 13) {
            if($(this).val()!=''){
                btnId.html($(this).val());
            }else{
                btnId.html('Neew Element');
            }

            $(this).val('');
            $('.hid').css('display', 'none');
        }

    } );

</script>
</body>
</html>