<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='js/jquery.js'></script>
  <link rel="stylesheet" href="css/demo.css"/>
  <link rel="stylesheet" href="css/jquery.orgchart.css"/>
    <style>
        div.orgChart div.node {
            padding: 4px 4px;
            width: auto !important;
            height:auto !important;
            min-height: 30px !important;

            min-width: 100px !important;
        }
        .fullName{
            margin-top: 10px;
            font-size:14px;
            color:#1a252fc9;
        }
        .structureName{
            font-size:20px;
            font-weight: 700;
        }
    </style>
  <script src="js/jquery.orgchart.js"></script>
   <script type='text/javascript'>
$(function(){
var members;
$.ajax({
	url:'load.php',
	async:false,
	success:function(data){
	  console.log('data='+data)
		 members=$.parseJSON(data)
	},
  // error: function(xhr, ajaxOptions, thrownError) {
  //   console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  // }
});

		//memberId,parentId,otherInfo
  if(members){
      console.log('members=',members)
    for(var i = 0; i < members.length; i++){

      var member = members[i];
        console.log('member.otherInfo=',member)
        var fullname= member[3]?  member[3] :'';

      if(i==0){
        $("#mainContainer").append("<li id="+member[0]+"><div class='structureName'>"+member[2]+"</div><div class='fullName'>"+fullname+"</div></li>")
      }else{

        if($('#pr_'+member[1]).length<=0){
          $('#'+member[1]).append("<ul id='pr_"+member[1]+"'><li id="+member[0]+"><div class='structureName'>"+member[2]+"</div><div class='fullName'>"+fullname+"</div></li></ul>")
        }
        else{
          $('#pr_'+member[1]).append("<li id="+member[0]+"><div class='structureName'>"+member[2]+"</div><div class='fullName'>"+fullname+"</div></li>")
        }

      }

    }

  }


					


    
	$("#mainContainer").orgChart({container: $("#main"),interactive: true, fade: true, speed: 'slow'});	

});


</script>


</head>
<body>
<div  style="display: none">


    <ul id="mainContainer" class="clearfix"></ul>
  	
</div>
<div id="main">
	
</div>
  
  
</body>


</html>








