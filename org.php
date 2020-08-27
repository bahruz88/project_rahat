<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='js/jquery.js'></script>
  <link rel="stylesheet" href="css/demo.css"/>
    <style>
        html, body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #tree {
            width: 100%;
            height: 100%;
        }

    </style>

    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
</head>
<body>
<div id="companyDiv">
    <label class="col-sm-4 col-form-label" for="company"><?php echo $dil["company"];?></label>
    <div class="col-sm-6">
        <select data-live-search="true"  name="company" id='company' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"   >
            <option  value="" >Seçin...</option>

            <?php
            $result_company = $db->query($sql_employee_company);
            if ($result_company->num_rows > 0) {
                while($row_company= $result_company->fetch_assoc()) {
                    ?>
                    <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>
                <?php } }?>
        </select>
    </div>
</div>
<div id="tree"></div>
  
  
</body>
<script type='text/javascript'>
    var company_id=''
    var company_name=''
    $('#companyDiv').on( 'change','#company',  function () {
        console.log("company CHANGE")
        if($(this).find('option:selected').val()!="0"){
            company_id=$(this).find('option:selected').val()
            company_name=$(this).find('option:selected').text()
            $("#mainContainer").html("")
            load(company_id,company_name)
        }
    });
    function load(company_id,company_name){
        var members;
        $.ajax({
            url:'loadorg.php',
            async:false,
            type: "POST",
            data: { company_id:company_id},
            success:function(data){
                console.log('data='+data);
                members=$.parseJSON(data);
                var member=[];
                member.push({ id: 0, name: company_name })
                $.each(members,function(k,v){
                    console.log('v=',v);
                    if(v.pid){
                        member.push({ id: v.id,pid:v.pid, name: v.name, title: v.title })
                    }else{
                        member.push({ id: v.id,pid:0, name: v.name, title: v.title })
                    }

                })
                console.log('members=',members);
                console.log('member=',member);
                var chart = new OrgChart(document.getElementById("tree"), {
                    enableDragDrop: true,
                    enableSearch: false,
                    // showYScroll: false,
                    //showXScroll: false,
                     mouseScrool: false,
                    nodeMouseClick: false,
                    nodeBinding: {
                        field_0: "name",
                        field_1: "title"
                    },
                    nodes:member
                });
            },
        });
    }

</script>

</html>








