<?php
include('../session.php');
$sql_employees= "select * from $tbl_employees where  emp_status=1";
$sql_position_level= "select * from $tbl_position_level";
$sql_structure_level= "select * from $tbl_structure_level";


//$users= "select * from $tbl_employee_category";
$users= "select tec.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,teco.company_name company,tsl.title struc,tpl.title posit 
from $tbl_employee_category tec
LEFT join $tbl_employees te on te.id=tec.emp_id 
LEFT join $tbl_employee_company teco on tec.company_id=teco.id
LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level";
//echo $users;
//$users= "select tec.*,tep.* from $tbl_employee_category tec
//INNER join $tbl_employee_position tep on tep.category_id=tec.id";
$result_users = $db->query($users);

$sub_array='';
$data = array();
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
            $sub_array   = array();
            $sub_array[] = $row_users['id'];
            $sub_array[] = utf8_encode($row_users['category']);
            $sub_array[] = $row_users['parent'];
            $sub_array[] = $row_users['create_date'];
            $sub_array[] = utf8_encode($row_users['code']);

            $sub_array[] = [];//children
             $sub_array[] = utf8_encode($row_users['full_name']);
            $sub_array[] = utf8_encode($row_users['company']);
           $sub_array[] = utf8_encode($row_users['struc']);
            $sub_array[] = utf8_encode($row_users['posit']);
            $data[]     = $sub_array;
        }
    }
}
//print_r($data);

$flatArray=$data;
unflattenArray($flatArray);
function createArray($arrC){
    $arrChil=array();
    foreach ($arrC as $arrCh)
    {
        $arrCh['id'] = $arrCh[0];
        $arrCh['title'] = $arrCh[1];
        $arrCh['pId'] = $arrCh[2];
        $arrCh['year'] = $arrCh[3];
        $arrCh['code'] = $arrCh[4];
        $arrCh['full_name'] = $arrCh[6];
        $arrCh['company'] = $arrCh[7];
        $arrCh['structure'] = $arrCh[8];
        $arrCh['posit'] = $arrCh[9];
        $arrCh['children'] = $arrCh[5];
        $arrCh['expanded'] = false;
        $arrCh['folder'] = true;
        if(count($arrCh[5])>0){

            $arrCh['children'] = createArray($arrCh[5]);
            unset($arrCh[0]);
            unset($arrCh[1]);
            unset($arrCh[2]);
            unset($arrCh[3]);
            unset($arrCh[4]);
            unset($arrCh[5]);
            unset($arrCh[6]);
            unset($arrCh[7]);
            unset($arrCh[8]);
            unset($arrCh[9]);
        }
        $arrChil[]=$arrCh;
    }
    return $arrChil;
}
function unflattenArray($flatArray)
{

    $refs = array(); //for setting children without having to search the parents in the result tree.
    $result = array();
    $arrrId = array();
    $arrrPId = array();
    $arrrId[]=0;
for ($j = 0; $j < count($flatArray); $j++) {
    $arrrId[]=$flatArray[$j][0];
    $arrrPId[]=$flatArray[$j][2];
}

    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while (count($flatArray) > 0) {
        for ($i = count($flatArray) - 1; $i >= 0; $i--) {
            if(in_array($flatArray[$i][2],$arrrId)){

            if ($flatArray[$i][2] == 0) {
                //root element: set in result and ref!
                $result[$flatArray[$i][0]] = $flatArray[$i];
                $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                unset($flatArray[$i]);
                $flatArray = array_values($flatArray);
            } else if ($flatArray[$i][2] != 0) {
                //no root element. Push to the referenced parent, and add to references as well.
                if (array_key_exists($flatArray[$i][2], $refs)) {
                        //parent found
                        $o = $flatArray[$i];
                        $refs[$flatArray[$i][0]] = $o;
                        $refs[$flatArray[$i][2]][5][] = &$refs[$flatArray[$i][0]];
                        unset($flatArray[$i]);
                        $flatArray = array_values($flatArray);
                }
            }
            }else {
                unset($flatArray[$i]);
                $flatArray = array_values($flatArray);
            }
        }
    }
    if (count($result) > 0) {
//        print_r(createArray($result));
        return createArray($result);
    }
}
//print_r(unflattenArray($flatArray));
//$arr = array_map('utf8_encode', );
//echo '--'.json_encode(unflattenArray($flatArray));

?>

<!--<input type="hidden" id="create_date" name="create_date" value="--><?php //echo $create_date; ?><!--">-->
<!--<input type="hidden" id="st_type" name="st_type" value="--><?php //echo $st_type; ?><!--">-->
<!--<input type="hidden" id="sub_array" name="sub_array" value="--><?php //echo $sub_array; ?><!--">-->
<input type="hidden" id="user_id_edit" name="user_id_edit" value="">
<input type="hidden" id="user_name" name="user_name" value="">
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta
            http-equiv="content-type"
            content="text/html; charset=ISO-8859-1"
    />
    <title>Multiple Extensions - Fancytree</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- This demo uses an 3rd-party, jQuery UI based context menu -->
    <link
            href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- jquery-contextmenu (https://github.com/mar10/jquery-ui-contextmenu/) -->
    <script src="//cdn.jsdelivr.net/npm/ui-contextmenu/jquery.ui-contextmenu.min.js"></script>

    <link href="src/skin-win8/ui.fancytree.css" rel="stylesheet" />
    <script src="src/jquery.fancytree.js"></script>
    <script src="src/jquery.fancytree.dnd5.js"></script>
    <script src="src/jquery.fancytree.edit.js"></script>
    <script src="src/jquery.fancytree.gridnav.js"></script>
    <script src="src/jquery.fancytree.table.js"></script>
    <!--
    <script src="../../build/jquery.fancytree-all.min.js"></script>
-->

    <!-- Start_Exclude: This block is not part of the sample code -->
    <link href="lib/prettify.css" rel="stylesheet" />
    <script src="lib/prettify.js"></script>
    <link href="demo/sample.css" rel="stylesheet" />
    <script src="demo/sample.js"></script>
    <!-- End_Exclude -->
    <script type="text/javascript">
        var CLIPBOARD = null;
        var myJSON;
        // var pushOldu=false;

        $(function() {
            var subArray =  <?php echo json_encode(unflattenArray($flatArray)); ?>;
            console.log('subArray parent=',subArray);

            pushOldu(subArray)
            function pushOldu(subArray) {
                console.log('subArray=', subArray)
                var addNew=0;
                $("#tree")
                    .fancytree({
                        checkbox: true,
                        checkboxAutoHide: true,
                        titlesTabbable: true, // Add all node titles to TAB chain
                        quicksearch: true, // Jump to nodes when pressing first character
                        // source: myJSON,
                        // source: { url: "ajax-tree-products.json" },
                        source: subArray,
                        //source: SOURCE,

                        extensions: ["edit", "dnd5", "table", "gridnav"],

                        dnd5: {
                            preventVoidMoves: true,
                            preventRecursion: true,
                            autoExpandMS: 400,
                            dragStart: function(node, data) {
                                return true;
                            },
                            dragEnter: function(node, data) {
                                // return ["before", "after"];
                                return true;
                            },
                            dragDrop: function(node, data) {
                                data.otherNode.moveTo(node, data.hitMode);
                            },
                        },
                        edit: {
                            triggerStart: ["f2", "shift+click", "mac+enter"],
                            close: function(event, data) {
                                if (data.save && data.isNew) {
                                    console.log('a1')

                                    $(document).on('click', '#struktur', function(e) {
                                        console.log('a2')
                                        // createNew(event, data,'struktur');
                                        // $('.close').trigger('click');
                                        $(document).off('click', '#struktur');
                                        $('#query').css('display','none')
                                        $('#stQuery').css('display','block')
                                        $('#employeesQuery').css('display','none');
                                        $('#positionQuery').css('display','none');
                                        $('#dateQuery').css('display','block')
                                        $('#confirmQuery').css('display','block')
                                        $('#structureQuery').css('display','block')
                                    });
                                    $(document).on('click', '#pozisya', function(e) {
                                        console.log('a3');
                                        $('#query').css('display','none')
                                        $('#stQuery').css('display','block')
                                        $('#employeesQuery').css('display','block')
                                        $('#positionQuery').css('display','block')
                                        $('#dateQuery').css('display','block')
                                        $('#confirmQuery').css('display','block')
                                        $('#structureQuery').css('display','none')
                                        $(document).off('click', '#pozisya');


                                    });
                                    $(document).on("click", "#confirm", function(){
                                    // $(document).on('change', '#employeesQuery', function(e) {
                                        console.log('employeesQuery');

                                        $('#stQuery').css('display','none')
                                        var employee=$('#employeesQuery option:selected').val()
                                        var structure_level=$('#structure_level option:selected').val()
                                        var position_level=$('#position_level option:selected').val()
                                        var st_create_date=$('#st_create_date').val();
                                        console.log('st_create_date='+st_create_date)
                                        createNew(event, data, employee,structure_level,position_level,st_create_date);
                                        $('.close').trigger('click');
                                        $(document).off('click', '#pozisya');
                                        $(document).off('click', '#struktur');
                                        $(document).off('click', '#confirm');
                                    });

                                    // Quick-enter: add new nodes until we hit [enter] on an empty title
                                    $("#tree").trigger("nodeCommand", {
                                        cmd: "addSibling",
                                    });
                                }
                            },
                        },
                        table: {
                            indentation: 20,
                            nodeColumnIdx: 2,
                            checkboxColumnIdx: 0,
                        },
                        gridnav: {
                            autofocusInput: false,
                            handleCursorKeys: true,
                        },

                        lazyLoad: function(event, data) {
                            data.result = { url: "../demo/ajax-sub2.json" };
                        },
                        createNode: function(event, data) {
                            console.log('createNode',data)
                            if(data.node.data.id){
                                $('#butModal').css('display','none');
                                $(document).off('click', '#struktur');
                                $(document).off('click', '#pozisya');
                                $('#query').css('display','block')
                                $('#employeesQuery').css('display','none')

                            }
                            var node = data.node,
                                $tdList = $(node.tr).find(">td");
                            // console.log('createNode node=',node)

                            // Span the remaining columns if it's a folder.
                            // We can do this in createNode instead of renderColumns, because
                            // the `isFolder` status is unlikely to change later
                            // if (node.isFolder()) {
                            //     $tdList
                            //         .eq(2)
                            //         .prop("colspan", 6)
                            //         .nextAll()
                            //         .remove();
                            //
                            // }
                        },
                        renderColumns: function(event, data) {
                            console.log('renderColumns')
                            var node = data.node,
                                $tdList = $(node.tr).find(">td");
                            // console.log('renderColumns node=',node)
                            // console.log('renderColumns node.year=',node.data.year)
                            // (Index #0 is rendered by fancytree by adding the checkbox)
                            // Set column #1 info from node data:
                            // $tdList.eq(1).text(node.getIndexHier());
                            $tdList.eq(1).text(node.data.id);
                            //*men
                            // $tdList.eq(3).text('hg');
                            // (Index #2 is rendered by fancytree)
                            // Set column #3 info from node data:
                            $tdList
                                .eq(3)
                                // .find('input')
                                .text(node.data.code);
                            if(node.data.structure){
                                $tdList
                                    .eq(4)
                                    // .find('input')
                                    .text(node.data.structure);
                            }
                            if(node.data.posit){
                                $tdList
                                    .eq(4)
                                    // .find('input')
                                    .text(node.data.posit);
                            }

                            // .find("input")
                            // .val(node.key);
                             $tdList
                                .eq(5)
                                // .find('input')
                                .text(node.data.full_name);
                            // .find("input")
                            // .val(node.key);
                            $tdList
                                .eq(6)
                                // .find('input')
                                .text(node.data.year);
                            // .find("input")
                            // .val(node.data.foo);
                            // $tdList
                            // 	.eq(5)
                            // 	.find("input")
                            // 	.val(node.data.children);
                            // console.log('$tdList=',$tdList)

                            // Static markup (more efficiently defined as html row template):
                            // $tdList.eq(3).html("<input type='input' value='"  "" + "'>");
                            // ...
                        },
                        modifyChild: function(event, data) {
                            console.log('modifyChild event.type='+event.type)
                            console.log('modifyChild data=',data)
                            data.tree.info(event.type, data);

                            if(data.operation=='add'){
                                addNew++;
                            }
                            if(data.operation=='remove'){
                                addNew++;
                            }
                            if(data.operation=='rename' && addNew==0){
                                console.log('rename',data)
                                console.log('data.cmd==',data.cmd)
                                var ID;
                                var title;

                                ID=data.childNode.data.id;
                                title=data.childNode.title;
                                console.log('ID=='+ID);
                                console.log('title=='+title);

                                $.ajax({
                                    url: 'st_update.php',
                                    type: "POST",
                                    data: { id:ID, name:title,change:'category'},
                                    success: function (data) {
                                        console.log('data=' + data)
                                        // members=$.parseJSON(data)

                                    },
                                });
                            }
                            if(data.operation=='remove' && addNew==1){
                                console.log('rename sil',data)
                                console.log('data.cmd==',data.cmd)
                                var ID;
                                var delet;
                                if(data.childNode){
                                    ID=data.childNode.data.id;
                                    delet="id"
                                }else{
                                    ID=data.node.data.id;
                                    delet="parent"
                                }
                                console.log('ID=='+ID);

                                $.ajax({
                                    url: 'st_delete.php',
                                    type: "POST",
                                    data: {id:ID,delet:delet},
                                    success: function (data) {
                                        console.log('data=' + data)
                                    },
                                });
                            }
                        },
                    })
                    .on("nodeCommand", function(event, data) {
                        // Custom event handler that is triggered by keydown-handler and
                        // context menu:
                        var refNode,
                            moveMode,
                            tree = $.ui.fancytree.getTree(this),
                            node = tree.getActiveNode();

                        switch (data.cmd) {

                            case "addChild":
                            case "addSibling":
                            case "indent":
                            case "moveDown":
                            case "moveUp":
                            case "outdent":
                            case "remove":
                            case "rename":
                                console.log('-----------------='+addNew)
                                if(addNew==1){
                                    $('#butModal').trigger('click');
                                    // $(document).on('click', '#struktur', function(){
                                    //     $('.close').trigger('click');
                                    // });
                                }else{
                                    tree.applyCommand(data.cmd, node);
                                }

                                break;
                            case "cut":
                                CLIPBOARD = { mode: data.cmd, data: node };
                                break;
                            case "copy":
                                CLIPBOARD = {
                                    mode: data.cmd,
                                    data: node.toDict(true, function(dict, node) {
                                        delete dict.key;
                                    }),
                                };
                                break;
                            case "clear":
                                CLIPBOARD = null;
                                break;
                            case "paste":
                                if (CLIPBOARD.mode === "cut") {
                                    // refNode = node.getPrevSibling();
                                    CLIPBOARD.data.moveTo(node, "child");
                                    CLIPBOARD.data.setActive();
                                } else if (CLIPBOARD.mode === "copy") {
                                    node.addChildren(
                                        CLIPBOARD.data
                                    ).setActive();
                                }
                                break;
                            default:
                                alert("Unhandled command: " + data.cmd);
                                return;
                        }
                    })
                    .on("keydown", function(e) {
                        var cmd = null;

                        console.log("keyDown"+$.ui.fancytree.eventToString(e));
                        switch ($.ui.fancytree.eventToString(e)) {
                            case "ctrl+shift+n":
                            case "meta+shift+n": // mac: cmd+shift+n
                                cmd = "addChild";
                                break;
                            case "ctrl+c":
                            case "meta+c": // mac
                                cmd = "copy";
                                break;
                            case "ctrl+v":
                            case "meta+v": // mac
                                cmd = "paste";
                                break;
                            case "ctrl+x":
                            case "meta+x": // mac
                                cmd = "cut";
                                break;
                            case "ctrl+n":
                            case "meta+n": // mac
                                cmd = "addSibling";
                                break;
                            case "del":
                            case "meta+backspace": // mac
                                cmd = "remove";
                                break;
                            // case "f2":  // already triggered by ext-edit pluging
                            // 	cmd = "rename";
                            // 	break;
                            case "ctrl+up":
                            case "ctrl+shift+up": // mac
                                cmd = "moveUp";
                                break;
                            case "ctrl+down":
                            case "ctrl+shift+down": // mac
                                cmd = "moveDown";
                                break;
                            case "ctrl+right":
                            case "ctrl+shift+right": // mac
                                cmd = "indent";
                                break;
                            case "ctrl+left":
                            case "ctrl+shift+left": // mac
                                cmd = "outdent";
                        }
                        if (cmd) {
                            console.log('trigger')
                            $(this).trigger("nodeCommand", { cmd: cmd });
                            return false;
                        }
                    });

                /*
                 * Tooltips
                 */
                // $("#tree").tooltip({
                // 	content: function () {
                // 		return $(this).attr("title");
                // 	}
                // });

                /*
                 * Context menu (https://github.com/mar10/jquery-ui-contextmenu)
                 */
                $("#tree").contextmenu({


                    delegate: "span.fancytree-node",
                    menu: [
                        {
                            title: "Edit <kbd>[F2]</kbd>",
                            cmd: "rename",
                            uiIcon: "ui-icon-pencil",
                        },
                        {
                            title: "Delete <kbd>[Del]</kbd>",
                            cmd: "remove",
                            uiIcon: "ui-icon-trash",
                        },
                        { title: "----" },
                        {
                            title: "New sibling <kbd>[Ctrl+N]</kbd>",
                            cmd: "addSibling",
                            uiIcon: "ui-icon-plus",
                        },
                        {
                            title: "New child <kbd>[Ctrl+Shift+N]</kbd>",
                            cmd: "addChild",
                            uiIcon: "ui-icon-arrowreturn-1-e",
                        },
                        { title: "----" },
                        {
                            title: "Cut <kbd>Ctrl+X</kbd>",
                            cmd: "cut",
                            uiIcon: "ui-icon-scissors",
                        },
                        {
                            title: "Copy <kbd>Ctrl-C</kbd>",
                            cmd: "copy",
                            uiIcon: "ui-icon-copy",
                        },
                        {
                            title: "Paste as child<kbd>Ctrl+V</kbd>",
                            cmd: "paste",
                            uiIcon: "ui-icon-clipboard",
                            disabled: true,
                        },
                    ],
                    beforeOpen: function(event, ui) {
                        console.log('beforeOpen')
                        var node = $.ui.fancytree.getNode(ui.target);
                        $("#tree").contextmenu(
                            "enableEntry",
                            "paste",
                            !!CLIPBOARD
                        );
                        node.setActive();
                    },
                    select: function(event, ui) {


                        console.log('event=',event)
                        console.log('ui=',ui);
                        addNew=0;
                        var that = this;
                        // delay the event, so the menu can close and the click event does
                        // not interfere with the edit control
                        setTimeout(function() {
                            $(that).trigger("nodeCommand", { cmd: ui.cmd });
                        }, 100);

                    },
                });
            }
        });
        $(document).on('click', '#struktur', function(){
            console.log('struktur');
            createNew('struktur',0,1)
            $(document).off('click', '#struktur');
            $(document).off('click', '#pozisya');
            $('.close').trigger('click');

        });
        $(document).on('click', '#pozisya', function(){
            console.log('pozisya');
            createNew('pozisya',0,1)
            $(document).off('click', '#pozisya');
            $(document).off('click', '#struktur');
            $('.close').trigger('click');
            // $('#butModal').css('display','none');

        });

        // createNew(event, data, employee,structure_level,position_level)
        function createNew(event,data,employee,structure_level,position_level,st_create_date){
            console.log('st_create_date',st_create_date)
            console.log('eventeventeventevent',event)
            console.log('data.cmd==',data.cmd)
            var PID;
            var title;
            var st_type;
            if(data==0){
                PID=0;
                title=event;
            }else

            if(data.node.parent.data.id){
                PID=data.node.parent.data.id;
                title=data.node.title;

            }else{
                PID=data.node.parent.children[0].data.pId;
                title=data.node.title;
            }
            // st_type=type;

            console.log('PID=='+PID);
            console.log('title=='+title);

            $.ajax({
                url: 'st_insert.php',
                type: "POST",
                data: { pId:PID, name:title,emp_id:employee,structure_level:structure_level,position_level:position_level,create_date:st_create_date},
                success: function (data) {
                    console.log('dataaaaaaaaaa=' , $.parseJSON(data));
                    var tree = $('#tree').fancytree('getTree');
                    tree.reload($.parseJSON(data));

                },
            });
        }
    </script>


    <style type="text/css">
        .ui-menu {
            width: 180px;
            font-size: 63%;
        }
        .ui-menu kbd {
            /* Keyboard shortcuts for ui-contextmenu titles */
            float: right;
        }
        /* custom alignment (set by 'renderColumns'' event) */
        td.alignRight {
            text-align: right;
        }
        td.alignCenter {
            text-align: center;
        }
        td input[type="input"] {
            width: 40px;
        }
    </style>


</head>

<body class="example">
<h2>STRUKTUR</h2>

<!-- Small modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" id="butModal" data-target=".bd-example-modal-lg">New</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="new" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Struktur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  id="query">
                    <p>Siz "Struktur" yaratmaq isteyirsiniz yoxsa "Pozisya"?</p>
                    <div class="row TEXT-CENTER">

                        <div class="col-md-6"><button type="button" class="btn btn-info" id="struktur">Strukur</button></div>
                        <div class="col-md-6"><button type="button" class="btn btn-info" id="pozisya" >Pozisya</button></div>
                    </div>
                </div>


                <div class="container" style="display: none;"  id="stQuery">
                    <div class="form-group row" id="employeesQuery">
                    <label class="col-sm-4 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
                    <div class="col-sm-6">
                        <select data-live-search="true"  name="employee" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
                            <option  value="0" >Seçin...</option>
                            <?php
                            $result_employees_view = $db->query($sql_employees);
                            if ($result_employees_view->num_rows > 0) {
                                while($row_employees= $result_employees_view->fetch_assoc()) {

                                    ?>
                                    <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'];  ?></option>

                                <?php } }?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group row"  id="positionQuery">
                        <label class="col-sm-4 col-form-label" for="position_level"><?php echo $dil["position_level"];?></label>
                        <div class="col-sm-6">
                            <select data-live-search="true"  name="position_level" id="position_level"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["position_level"];?>" >
                                <option  value="0" >Seçin...</option>

                                <?php
                                $result_position_view = $db->query($sql_position_level);
                                if ($result_position_view->num_rows > 0) {
                                    while($row_position= $result_position_view->fetch_assoc()) {

                                        ?>
                                        <option  value="<?php echo $row_position['id']; ?>" ><?php echo $row_position['title'];  ?></option>

                                    <?php } }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="structureQuery">
                        <label class="col-sm-4 col-form-label" for="structure_level"><?php echo $dil["structure_level"];?></label>
                        <div class="col-sm-6">
                            <select data-live-search="true"  name="structure_level" id="structure_level"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["structure_level"];?>" >
                                <option  value="0" >Seçin...</option>
                                <?php
                                $result_structure_view = $db->query($sql_structure_level);
                                if ($result_structure_view->num_rows > 0) {
                                    while($row_structure= $result_structure_view->fetch_assoc()) {

                                        ?>
                                        <option  value="<?php echo $row_structure['id']; ?>" ><?php echo $row_structure['title'];  ?></option>

                                    <?php } }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="dateQuery">
                        <label class="col-sm-4 col-form-label" for="st_create_date"><?php echo $dil["create_date"];?></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="st_create_date" name="st_create_date" placeholder="0000-00-00" />
                        </div>
                    </div>
                    <div class="row TEXT-CENTER"  id="confirmQuery">

                        <div class="col-md-12"><button type="button" class="btn btn-info" id="confirm" >Təsdiq</button></div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>

<table id="tree">
    <colgroup>
        <col width="30px" />
        <col width="50px" />
        <col width="350px" />
        <col width="150px" />
        <col width="150px" />
        <col width="150px" />
        <col width="150px" />
        <col width="150px" />
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th>Id</th>
        <th></th>
        <th> Kod </th>
        <th> Səviyyə </th>
        <th> Person </th>
        <th>İl</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <!-- Define a row template for all invariant markup: -->
    <tr>
        <td class="alignCenter"></td>
        <td></td>
        <td></td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <!--					<td><input name="input1" type="input" /></td>-->
        <!--					<td><input name="input2" type="input" /></td>-->
        <!--					<td class="alignCenter">-->
        <!--						<input name="cb1" type="checkbox" />-->
        <!--					</td>-->
        <!--					<td class="alignCenter">-->
        <!--						<input name="cb2" type="checkbox" />-->
        <!--					</td>-->
        <!--					<td>-->
        <!--						<select name="sel1" id="">-->
        <!--							<option value="a">A</option>-->
        <!--							<option value="b">B</option>-->
        <!--						</select>-->
        <!--					</td>-->
    </tr>
    </tbody>
</table>

<!-- Start_Exclude: This block is not part of the sample code -->
<!--		<hr />-->
<!--		<p class="sample-links  no_code">-->
<!--			<a class="hideInsideFS" href="https://github.com/mar10/fancytree"-->
<!--				>jquery.fancytree.js project home</a-->
<!--			>-->
<!--			<a class="hideOutsideFS" href="#">Link to this page</a>-->
<!--			<a class="hideInsideFS" href="index.html">Example Browser</a>-->
<!--			<a href="#" id="codeExample">View source code</a>-->
<!--		</p>-->
<pre id="sourceCode" class="prettyprint" style="display:none"></pre>
<!-- End_Exclude -->
</body>
</html>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $('#st_create_date').datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // startDate: new Date()
        });
    });
</script>
<script>

    $(document).ready(function() {
        // $('#create_date').datetimepicker({ format: 'DD/MM/YYYY'  });
    });
</script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
