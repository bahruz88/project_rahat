<?php
include('../session.php');
$users= "select * from $tbl_employee_category";
$result_users = $db->query($users);
$user = [];
$parent = [];
$user_id= [];
$icon= [];
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
            array_push($user, $row_users['category']);
            array_push($parent, $row_users['parent']);
            array_push($user_id, $row_users['id']);
            array_push($icon, $row_users['icon']);
        }
    }
}
$user = implode(",", $user);
$parent =implode(",", $parent);
$user_id =implode(",", $user_id);
$icon =implode(",", $icon);
?>
<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> ZTREE DEMO - addNodes / editName / removeNode / removeChildNodes</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/demo.css" type="text/css">
    <link rel="stylesheet" href="css/zTreeStyle/zTreeStyle.css" type="text/css">
    <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="js/jquery.ztree.excheck.js"></script>
    <script type="text/javascript" src="js/jquery.ztree.exedit.js"></script>
    <style type="text/css">
        .ztree li span.button.pIcon01_ico_open{margin-right:2px; background: url(css/zTreeStyle/img/diy/1_open.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.pIcon01_ico_close{margin-right:2px; background: url(css/zTreeStyle/img/diy/1_close.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon01_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/2.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon02_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/3.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon03_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/4.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon04_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/5.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon05_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/6.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon06_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/7.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon07_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/8.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
        .ztree li span.button.icon08_ico_docu{margin-right:2px; background: url(css/zTreeStyle/img/diy/9.png) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
    </style>
</HEAD>

<BODY>
<h1>STRUKTUR</h1>
<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
<input type="hidden" id="parent" name="parent" value="<?php echo $parent; ?>">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" id="icon" name="icon" value="<?php echo $icon; ?>">
<input type="hidden" id="user_id_edit" name="user_id_edit" value="">
<input type="hidden" id="user_name" name="user_name" value="">
<div class="content_wrap">
    <div class="zTreeDemoBackground left">
        <ul id="treeDemo" class="ztree"></ul>
    </div>
    <div class="right">
        <ul class="info">
            <li class="title">
<!--                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="callbackTrigger" checked /> Whether trigger the callback when execution removeNode() method.<br/>-->
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="addParent" href="#" title="add parent node" onclick="return false;">add parent node</a> ]
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="addLeaf" href="#" title="add leaf node" onclick="return false;">add leaf node</a> ]
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="edit" href="#" title="edit name" onclick="return false;">edit name</a> ]<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="remove" href="#" title="remove node" onclick="return false;">remove node</a> ]
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="clearChildren" href="#" title="make child nodes to empty" onclick="return false;">make child nodes to empty</a> ]<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="changeIcon" href="#" onclick="return false;">Change Icon</a> ]<br/>


            </li>

        </ul>
    </div>
</div>
</BODY>
</HTML>
<SCRIPT type="text/javascript">
    <!--
    var setting = {
        view: {
            selectedMulti: false
        },
        edit: {
            enable: true,
            showRemoveBtn: false,
            showRenameBtn: false
        },
        data: {
            keep: {
                parent:true,
                leaf:true
            },
            simpleData: {
                enable: true
            }
        },
        callback: {
            beforeDrag: beforeDrag,
            beforeRemove: beforeRemove,
            beforeRename: beforeRename,
            onRemove: onRemove
        }
    };

    var user=$('#user').val();
    var userArray=user.split(",");

    var parent=$('#parent').val();
    var parentArray=parent.split(",");

    var userId=$('#user_id').val();
    var userIdArray=userId.split(",");

    var icon=$('#icon').val();
    var iconArray=icon.split(",");
    console.log('userArray=',userArray)
    console.log('parentArray=',parentArray)
    console.log('userIdArray=',userIdArray)
    var zNodeArray=[]
    var open=false;
    var lastId=0;
    for(var j=0;j<userArray.length;j++){
        if(parentArray[j]==''){
            open=true;
        }else{
            open=false;
        }
        zNodeArray.push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"icon":iconArray[j],"open":open});
        if(j+1==userArray.length){
            lastId=userIdArray[j]
        }

    }
    console.log('zNodeArray=',zNodeArray)
    // var zNodes =[
    //     { id:1, pId:0, name:"parent node 1", open:true},
    //     { id:11, pId:1, name:"leaf node 1-1"},
    //     { id:12, pId:1, name:"leaf node 1-2"},
    //     { id:13, pId:1, name:"leaf node 1-3"},
    //     { id:2, pId:0, name:"parent node 2", open:true},
    //     { id:21, pId:2, name:"leaf node 2-1"},
    //     { id:22, pId:2, name:"leaf node 2-2"},
    //     { id:23, pId:2, name:"leaf node 2-3"},
    //     { id:3, pId:0, name:"parent node 3", open:true },
    //     { id:31, pId:3, name:"leaf node 3-1"},
    //     { id:32, pId:3, name:"leaf node 3-2"},
    //     { id:33, pId:3, name:"leaf node 3-3"}
    // ];
    var zNodes =zNodeArray;
    console.log('zNodes==',zNodes)
    var log, className = "dark";
    function beforeDrag(treeId, treeNodes) {
        return false;
    }
    function beforeRemove(treeId, treeNode) {
        className = (className === "dark" ? "":"dark");
        showLog("[ "+getTime()+" beforeRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
        return confirm("Confirm delete node '" + treeNode.name + "' it?");
    }
    function onRemove(e, treeId, treeNode) {
        showLog("[ "+getTime()+" onRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
    }
    function beforeRename(treeId, treeNode, newName) {
        if (newName.length == 0) {
            alert("Node name can not be empty.");
            var zTree = $.fn.zTree.getZTreeObj("treeDemo");
            setTimeout(function(){zTree.editName(treeNode)}, 10);
            return false;
        }
        return true;
    }
    function showLog(str) {
        if (!log) log = $("#log");
        log.append("<li class='"+className+"'>"+str+"</li>");
        if(log.children("li").length > 8) {
            log.get(0).removeChild(log.children("li")[0]);
        }
    }
    function getTime() {
        var now= new Date(),
            h=now.getHours(),
            m=now.getMinutes(),
            s=now.getSeconds(),
            ms=now.getMilliseconds();
        return (h+":"+m+":"+s+ " " +ms);
    }

    var newCount = 1;
    var tId='';
    var userId='';
    var bClick=0;
    var editT=false;
    var insertT=false;
    var PID=0;
    var isParent=''
    function add(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            isParent = e.data.isParent,
            nodes = zTree.getSelectedNodes(),
            treeNode = nodes[0];
        // console.log('nodes=',nodes)
        // console.log('treeNode treeNode=',treeNode)
        var treeNodeOld=treeNode;
        var u_name="new node" + (newCount++);
        isParent=isParent;
        bClick=0;
        console.log('isParentisParent='+isParent)

        if (treeNode) {
            if(!isParent){
                PID=treeNode.id;
                tId=treeNode.tId;
                var user_name=$('#'+tId+'_a').attr('title');
                console.log('PID 1=',PID)
                console.log('lastId=',lastId)
                console.log('treeNode1=',treeNode)
                treeNode = zTree.addNodes(treeNode, {id:(parseInt(lastId) + parseInt(newCount)), pId:PID, isParent:isParent, name:user_name});

            }else{
                console.log('isParent='+isParent)
                PID=treeNode.pId;
                tId=treeNode.tId;
                var user_name=$('#'+tId+'_a').attr('title');
                treeNode = zTree.addNodes(treeNode, {id:(parseInt(lastId) + parseInt(newCount)), pId:PID, isParent:isParent, name:user_name});

            }

        } else {
             tId=treeNode.tId;
            var user_name=$('#'+tId+'_a').attr('title');
            console.log('alt=',PID)
            console.log('treeNode1=',treeNode)
            PID='';
            treeNode = zTree.addNodes(null, {id:(parseInt(lastId) + parseInt(newCount)), pId:PID, isParent:isParent, name:user_name});
        }
        console.log('treeNode2=',treeNode)
        if (treeNode) {
            console.log('lastId=',lastId)
            zTree.editName(treeNode[0]);
            tId=treeNode[0].tId;
            userId=treeNode.id;
            insertT=true;
            editT=false;

        }
    else if (treeNodeOld) {
            treeNodeOld['pId']=lastId;
            treeNodeOld['id']=parseInt(lastId)+1;

            zTree.editName(treeNodeOld);
            console.log('treeNodeOld=',treeNodeOld)
            tId=treeNodeOld.tId;
            userId=treeNodeOld.id;
            insertT=true;
            editT=false;

        }
    else {
            alert("Leaf node is locked and can not add child node.");
        }


    };


    function edit() {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            nodes = zTree.getSelectedNodes(),
            treeNode = nodes[0];
        console.log('treeNode=',treeNode);
        if(treeNode){
            tId=treeNode.tId;
            userId=treeNode.id;
        }

        if (nodes.length == 0) {
            alert("Please select one node at first...");
            return;
        }
        zTree.editName(treeNode);
        bClick=0;
        editT=true;
        insertT=false;

    };
    $('body').click(function() {
        bClick++;

        if(editT==true && bClick==2){
            var user_id_edit=userId;
            var user_name=$('#'+tId+'_a').attr('title');
            console.log('user_name='+user_name)
            $.ajax({
                url: 'st_update.php',
                type: "POST",
                data: {id:user_id_edit, name:user_name,change:"category"},
                success: function (data) {
                    console.log('data=',jQuery.parseJSON(data));
                    zNodes=jQuery.parseJSON(data);
                    $.fn.zTree.init($("#treeDemo"), setting, zNodes);

                },
            });
        }
        if(insertT==true && bClick==2){
            var user_id_edit=userId;
            var user_name=$('#'+tId+'_a').attr('title');
            console.log('#='+'#'+tId+'_a')
            console.log('user_name='+user_name)
            $.ajax({
                url: 'st_insert.php',
                type: "POST",
                data: {id:(parseInt(lastId) + parseInt(newCount)), pId:PID, isParent:isParent, name:user_name},
                success: function (data) {
                    // console.log('data=' + data)
                    console.log('data=',jQuery.parseJSON(data));
                    zNodes=jQuery.parseJSON(data);
                    $.fn.zTree.init($("#treeDemo"), setting, zNodes);

                },
            });
        }

    });

    function remove(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            nodes = zTree.getSelectedNodes(),
            treeNode = nodes[0];
        userId=treeNode.id;
        if (nodes.length == 0) {
            alert("Please select one node at first...");
            return;
        }
        var callbackFlag = '';
        zTree.removeNode(treeNode, callbackFlag);
        $.ajax({
            url: 'st_delete.php',
            type: "POST",
            data: {id:userId},
            success: function (data) {
                console.log('data=' + data)
            },
        });
    };
    function clearChildren(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            nodes = zTree.getSelectedNodes(),
            treeNode = nodes[0];
        PID=treeNode.id;
        if (nodes.length == 0 || !nodes[0].isParent) {
            alert("Please select one parent node at first...");
            return;
        }
        console.log('PID=',PID)
        zTree.removeChildNodes(treeNode);
        $.ajax({
            url: 'st_delete.php',
            type: "POST",
            data: {parent:PID},
            success: function (data) {
                console.log('data=' + data)
            },
        });
    };

    var nameCount = 0, iconCount = 1, color = [0, 0, 0];
    function updateNode(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            type = e.data.type,
            nodes = zTree.getSelectedNodes();
        var id=0;
        var iconChange=0;
        if (nodes.length == 0) {
            alert("Please select one node...");
        }
        for (var i=0, l=nodes.length; i<l; i++) {
            zTree.setting.view.fontCss = {};
            if (type == "rename") {
                nodes[i].name = nodes[i].name.replace(/_[\d]*$/g, "") + "_" + (nameCount++);
            } else if (type == "icon") {
                console.log('nodes[i]=',nodes[i])
                id=nodes[i].id;

                if (iconCount > 8) {
                    nodes[i].iconSkin = null;
                    iconCount = 1;
                }
                else if (nodes[i].isParent) {
                    nodes[i].iconSkin = nodes[i].iconSkin ? null : "pIcon01";
                }
                else {
                    nodes[i].iconSkin = "icon0" + (iconCount++);
                    iconChange="css/zTreeStyle/img/diy/"+iconCount+".png";
                }
            } else if (type == "color") {
                color = [0, 0, 0];
                var r1 = Math.round(Math.random()*3 - 0.5);
                color[r1] = 15;
                var r2 = Math.round(Math.random()*3 - 0.5);
                while (r2 === r1) {
                    r2 = Math.round(Math.random()*3 - 0.5);
                }
                color[r2] = Math.round(Math.random()*16-0.5);
                zTree.setting.view.fontCss["color"] = "#"+color[0].toString(16)+color[1].toString(16)+color[2].toString(16);
            } else if (type == "font") {
                var style = $("#" + nodes[i].tId + "_a").css("font-style") ;
                style = (style=="italic" ? "normal" : "italic");
                zTree.setting.view.fontCss["font-style"] = style;
            }
            zTree.updateNode(nodes[i]);
            console.log('iconChange='+iconChange)
            $.ajax({
                url: 'st_update.php',
                type: "POST",
                data: {id:id,icon:iconChange,change:"icon"},
                success: function (data) {
                    // console.log('data=' + data)
                },
            });
        }
    }
    $(document).ready(function(){
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        $("#addParent").bind("click", {isParent:true}, add);
        $("#addLeaf").bind("click", {isParent:false}, add);
        $("#edit").bind("click", edit);
        $("#remove").bind("click", remove);
        $("#clearChildren").bind("click", clearChildren);
        $("#changeIcon").bind("click", {type:"icon"}, updateNode);
    });


    //-->
</SCRIPT>