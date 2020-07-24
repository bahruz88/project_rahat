<?php
include('../session.php');
$users= "select * from $tbl_employee_category";
$result_users = $db->query($users);
$user = [];
$parent = [];
$user_id= [];
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
            array_push($user, $row_users['user']);
            array_push($parent, $row_users['parent']);
            array_push($user_id, $row_users['id']);
        }
    }
}
$user = implode(",", $user);
$parent =implode(",", $parent);
$user_id =implode(",", $user_id);
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

</HEAD>

<BODY>
<h1>Edit Nodes - zTree methods</h1>
<h6>[ File Path: exedit/edit_fun.html ]</h6>
<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
<input type="hidden" id="parent" name="parent" value="<?php echo $parent; ?>">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" id="user_id_edit" name="user_id_edit" value="">
<input type="text" id="user_name" name="user_name" value="">
<div class="content_wrap">
    <div class="zTreeDemoBackground left">
        <ul id="treeDemo" class="ztree"></ul>
    </div>
    <div class="right">
        <ul class="info">
            <li class="title"><h2>1, Explanation of 'addNodes / editName / removeNode / removeChildNodes' method</h2>
                <ul class="list">
                    <li>Use 'addNodes / editName / removeNode / removeChildNodes' method can also be achieved copy / move nodes.</li>
                    <li>Method 'cancelEditName' is effective, only when edit the node name. Please use it when necessary, this demo doesn't show how to use the method.</li>
                    <li class="highlight_red">Use setting.data.keep.parent / leaf attribute, you can lock the parent node and leaf node.</li>
                    <li><p>Try to edit node:<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="callbackTrigger" checked /> Whether trigger the callback when execution removeNode() method.<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="addParent" href="#" title="add parent node" onclick="return false;">add parent node</a> ]
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="addLeaf" href="#" title="add leaf node" onclick="return false;">add leaf node</a> ]
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="edit" href="#" title="edit name" onclick="return false;">edit name</a> ]<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="remove" href="#" title="remove node" onclick="return false;">remove node</a> ]
                            &nbsp;&nbsp;&nbsp;&nbsp;[ <a id="clearChildren" href="#" title="make child nodes to empty" onclick="return false;">make child nodes to empty</a> ]<br/>
                            remove log:<br/>
                        <ul id="log" class="log"></ul></p>
                    </li>
                    <li class="highlight_red">How to use 'zTreeObj.addNodes / cancelEditName / editName / removeNode / removeChildNodes' method,  please see the API documentation.</li>
                </ul>
            </li>
            <li class="title"><h2>2, Explanation of setting</h2>
                <ul class="list">
                    <li>Same as 'Basic Edit Nodes'</li>
                    <li class="highlight_red">Lock the parent / leaf node status, need to set setting.data.keep.parent / leaf attribute, see the API documentation for more related contents</li>
                </ul>
            </li>
            <li class="title"><h2>3, Explanation of treeNode</h2>
                <ul class="list">
                    <li>Same as 'Basic Edit Nodes'</li>
                </ul>
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
    console.log('userArray=',userArray)
    console.log('parentArray=',parentArray)
    console.log('userIdArray=',userIdArray)
    var zNodeArray=[]
    var open=false;
    for(var j=0;j<userArray.length;j++){
        if(parentArray[j]==''){
            open=true;
        }else{
            open=false;
        }
        zNodeArray.push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});

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
    function add(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            isParent = e.data.isParent,
            nodes = zTree.getSelectedNodes(),
            treeNode = nodes[0];
        console.log('treeNode treeNode=',treeNode)
        var PID='';

        if (treeNode) {
            PID=treeNode.id;
            treeNode = zTree.addNodes(treeNode, {id:(100 + newCount), pId:PID, isParent:isParent, name:"new node" + (newCount++)});
            console.log('PID='+PID)
            console.log('isParent='+isParent)
            console.log('treeNode='+treeNode)
        } else {
            PID='';
            treeNode = zTree.addNodes(null, {id:(100 + newCount), pId:PID, isParent:isParent, name:"new node" + (newCount++)});
            console.log('treeNode 0par='+treeNode)
        }
        if (treeNode) {
            zTree.editName(treeNode[0]);
        } else {
            alert("Leaf node is locked and can not add child node.");
        }

        // $.ajax({
        //     url: 'st_insert.php',
        //     type: "POST",
        //     data: {id:(100 + newCount), pId:PID, isParent:isParent, name:"new node" + (newCount++)},
        //     success: function (data) {
        //         console.log('data=' + data)
        //         // members=$.parseJSON(data)
        //
        //     },
        // });
    };
    var tId='';
    var userId='';
    var bClick=0;
    var editT=false;

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
                data: {id:user_id_edit, name:user_name},
                success: function (data) {
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
        if (nodes.length == 0) {
            alert("Please select one node at first...");
            return;
        }
        var callbackFlag = $("#callbackTrigger").attr("checked");
        zTree.removeNode(treeNode, callbackFlag);
    };
    function clearChildren(e) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            nodes = zTree.getSelectedNodes(),
            treeNode = nodes[0];
        if (nodes.length == 0 || !nodes[0].isParent) {
            alert("Please select one parent node at first...");
            return;
        }
        zTree.removeChildNodes(treeNode);
    };

    $(document).ready(function(){
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        $("#addParent").bind("click", {isParent:true}, add);
        $("#addLeaf").bind("click", {isParent:false}, add);
        $("#edit").bind("click", edit);
        $("#remove").bind("click", remove);
        $("#clearChildren").bind("click", clearChildren);
    });
    //-->
</SCRIPT>