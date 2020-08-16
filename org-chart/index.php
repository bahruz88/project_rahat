<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='jquery.js'></script>
  <link rel="stylesheet" href="demo.css"/>
  <link rel="stylesheet" href="jquery.orgchart.css"/>
  <script src="jquery.orgchart.js"></script>
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
    for(var i = 0; i < members.length; i++){

      var member = members[i];
      console.log(member[1])
      console.log(member[2])

      if(i==0){
        $("#mainContainer").append("<li id="+member.memberId+">"+member[2]+"</li>")
      }else{

        if($('#pr_'+member[1]).length<=0){
          $('#'+member.parentId).append("<ul id='pr_"+member[1]+"'><li id="+member[0]+">"+member[2]+"</li></ul>")
        }
        else{
          $('#pr_'+member[1]).append("<li id="+member[1]+">"+member[2]+"</li>")
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








