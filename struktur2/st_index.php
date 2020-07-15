<?php
include('../session.php');
$users= "select * from $tbl_employee_category";
$result_users = $db->query($users);
$user = [];
$parent = [];
$user_id= [];
$create_date= [];
$st_type= [];
$sub_array='';
$data = array();
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
            array_push($user, $row_users['category']);
            array_push($parent, $row_users['parent']);
            array_push($user_id, $row_users['id']);
            array_push($create_date, $row_users['create_date']);
            array_push($st_type, $row_users['st_type']);
            $sub_array   = array();
            $sub_array[] = $row_users['id'];
            $sub_array[] = $row_users['category'];
            $sub_array[] = $row_users['parent'];
            $sub_array[] = $row_users['create_date'];
            $sub_array[] = $row_users['st_type'];
            $sub_array[] = [];
            $data[]     = $sub_array;
        }
    }
}
$user = implode(",", $user);
$parent =implode(",", $parent);
$user_id =implode(",", $user_id);
$create_date =implode(",", $create_date);
$st_type =implode(",", $st_type);
//print_r($data);
//$sub_array =implode(",", json_encode($data));
//$subArray =$data;
$flatArray=$data;
unflattenArray($flatArray);
function createArray($arrC){
    $arrChil=array();
    foreach ($arrC as $arrCh)
    {
        $arrCh['id'] = $arrCh[0];
        $arrCh['title'] = $arrCh[1];
        $arrCh['pId'] = $arrCh[2];
        $arrCh['st_type'] = $arrCh[3];
        $arrCh['year'] = $arrCh[4];
//        $arrCh['children'] = $arrCh[5];
        $arrCh['expandedcr'] = true;
        $arrCh['folder'] = true;
        if(count($arrCh[5])>0){

            $arrCh['children'] = createArray($arrCh[5]);
            unset($arrCh[0]);
            unset($arrCh[1]);
            unset($arrCh[2]);
            unset($arrCh[3]);
            unset($arrCh[4]);
            unset($arrCh[5]);
        }
        $arrChil[]=$arrCh;
    }
    return $arrChil;
}
function unflattenArray($flatArray){
    $refs = array(); //for setting children without having to search the parents in the result tree.
    $result = array();
    $arrr = array();

    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while(count($flatArray) > 0){
        for ($i=count($flatArray)-1; $i>=0; $i--){
//
            if ($flatArray[$i][2]==''){
                //root element: set in result and ref!
                $result[$flatArray[$i][0]] = $flatArray[$i];
                $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                unset($flatArray[$i]);
                $flatArray = array_values($flatArray);
            }

            else if ($flatArray[$i][2] != 0){
                //no root element. Push to the referenced parent, and add to references as well.
                if (array_key_exists($flatArray[$i][2], $refs)){
                    //parent found
                    $o = $flatArray[$i];
                    $refs[$flatArray[$i][0]] = $o;
                    $refs[$flatArray[$i][2]][5][] = &$refs[$flatArray[$i][0]];
                    unset($flatArray[$i]);
                    $flatArray = array_values($flatArray);
                }
            }
        }
    }
    $arrResult=array();
    foreach ($result as $arr)
    {
        $arr['id'] = $arr[0];
        $arr['title'] = $arr[1];
        $arr['pId'] = $arr[2];
        $arr['st_type'] = $arr[3];
        $arr['year'] = $arr[4];
        $arr['expanded'] = true;
        $arr['folder'] = true;
        $arrCi=array();
        foreach ($arr[5] as $arrC)
        {
            $arrC['id'] = $arrC[0];
            $arrC['title'] = $arrC[1];
            $arrC['pId'] = $arrC[2];
            $arrC['st_type'] = $arrC[3];
            $arrC['year'] = $arrC[4];
            $arrC['expanded2'] = true;
            $arrC['folder'] = true;
//            $arrC['children'] = $arrC[5];
            $arrChi=array();
            if(count($arrC[5])>0){
                $arrChi= createArray($arrC[5]);
                $arrC['children'] = $arrChi;
                unset($arrC[0]);
                unset($arrC[1]);
                unset($arrC[2]);
                unset($arrC[3]);
                unset($arrC[4]);
                unset($arrC[5]);
            }

//            $arrC['children'] = $arrChi;
            $arrCi[]=$arrC;


        }
        $arr['children'] = $arrCi;
        unset($arr[0]);
        unset($arr[1]);
        unset($arr[2]);
        unset($arr[3]);
        unset($arr[4]);
        unset($arr[5]);
        $arrResult[]= $arr;
    }

 return $arrResult;
//
//print_r($result);



//    return forArray($result);
}
//$arrCi=array();
//function forArray($result){
//
//    foreach ($result as $arr)
//    {
//        $arr['id'] = $arr[0];
//        $arr['title'] = $arr[1];
//        $arr['pId'] = $arr[2];
//        $arr['st_type'] = $arr[3];
//        $arr['year'] = $arr[4];
//        $arr['expanded'] = true;
//        $arr['folder'] = true;
//        $arrCi[]=$arr;
////        $arr['children'] = $arrCi;
//        unset($arr[0]);
//        unset($arr[1]);
//        unset($arr[2]);
//        unset($arr[3]);
//        unset($arr[4]);
////        unset($arr[5]);
//        if(count($arr[5])>0){
//
//            $arr['children'] =forArray($arr[5]);
//
//        }else{
//            $arr['children'] = $arr[5];
//           $arrCi[]=$arr;
//        }
//
//        print_r($arrCi);
//        return $arrCi;
//    }
//}
?>

<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
<input type="hidden" id="parent" name="parent" value="<?php echo $parent; ?>">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" id="create_date" name="create_date" value="<?php echo $create_date; ?>">
<input type="hidden" id="st_type" name="st_type" value="<?php echo $st_type; ?>">
<!--<input type="hidden" id="sub_array" name="sub_array" value="--><?php //echo $sub_array; ?><!--">-->
<input type="hidden" id="user_id_edit" name="user_id_edit" value="">
<input type="hidden" id="user_name" name="user_name" value="">
<!DOCTYPE html>
<html>
<head>
    <meta
            http-equiv="content-type"
            content="text/html; charset=ISO-8859-1"
    />
    <title>Multiple Extensions - Fancytree</title>

    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- This demo uses an 3rd-party, jQuery UI based context menu -->
    <link
            href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
            rel="stylesheet"
    />
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
        var pushOldu=false;

        $(function() {
             //var subArray = "<?php //echo  json_encode($data); ?>//";
            // var subArray = "{{json_encode($data)}}";
            //var subArray = "<?//= json_encode($data); ?>//";
            var subArray =  <?php echo json_encode(unflattenArray($flatArray)); ?>;
            console.log('subArray parent=',subArray)
            // for(var j=0;j<subArray.length;j++){
            //     zNodeArray.push({"id":subArray[0],"title":subArray[1],"pId":subArray[2],"st_type":subArray[4],"year":subArray[3], "expanded":true,"folder": true,"children":childrenArray});
            //     zNodeArray.push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});
            //
            // }
            console.log('zNodeArray=',zNodeArray)
            var  zNodeArray=[]
            // var open=false;
            var user=$('#user').val();
            var userArray=user.split(",");
            var parent=$('#parent').val();
            var parentArray=parent.split(",");

            var userId=$('#user_id').val();
            var userIdArray=userId.split(",")

            var create_date=$('#create_date').val();
            var createDateArray=create_date.split(",")

            var st_type=$('#st_type').val();
            var stTypeArray=st_type.split(",");

            // var sub_array=$('#sub_array').val();
            // var subArray=sub_array.split(",");

            var childrenArray=[];
            var pushArray=[];


            // for(var j=0;j<userArray.length;j++){
            //     if(parentArray[j]==''){
            //         open=true;
            //     }else{
            //         open=false;
            //     }
            //     findChild(j,userIdArray[j])
            //
            // }
            // function findChild(j,parentId){

            // $.ajax({
            //     url: 'st_select.php',
            //     type: "POST",
            //     data: {id:1},
            //     success: function (data) {
            //         console.log('data ss=',data)

                    var jsonARR=subArray;


                    var ID;
                    // $.each(jsonARR, function(k,v){
                    //     // if(v[2]!=null){
                    //
                    //         ID=v[0];
                    //         $.each(jsonARR, function(key,val){
                    //             console.log('val=',val)
                    //             console.log('val[2]='+val[2]+' ID='+ID)
                    //             childrenArray=[];
                    //             console.log('childrenArray0=',childrenArray)
                    //             if(val[2]==ID ){///&& v[0]!=val[0]
                    //                 // ID=val[0];
                    //                 // childrenArray=[];
                    //                 console.log('childrenArray1=',childrenArray)
                    //                 childrenArray.push({"id":val[0],"title":val[1],"pId":val[2],"st_type":val[4],"year":val[3], "expanded":true,"folder": true,"children":childrenArray});
                    //                 console.log('childrenArray2=',childrenArray)
                    //                 zNodeArray.push(childrenArray)
                    //             }
                    //             // if(v[0]!=val[0]){
                    //             //     zNodeArray.push({"id":v[0],"title":v[1],"pId":v[2],"st_type":v[4],"year":v[3], "expanded":true,"folder": true,"children":childrenArray});
                    //             //
                    //             // }
                    //
                    //         })
                    //     // if(childrenArray!=[]){
                    //     //     zNodeArray.push(childrenArray)
                    //     // }
                    //     // console.log('childrenArray=',childrenArray)
                    //        // zNodeArray.push({"id":v[0],"title":v[1],"pId":v[2],"st_type":v[4],"year":v[3], "expanded":true,"folder": true,"children":''});
                    //
                    //         // if(v[2]!=null){
                    //         //     childrenArray.push({"id":v[0],"title":v[1],"pId":v[2],"st_type":v[4],"year":v[3],"type":v[4],"author":v[2],"qty":332,"price":224});
                    //         //     // console.log('childrenArray=',childrenArray)
                    //         // }else{
                    //         //     zNodeArray.push({"id":v[0],"title":v[1],"pId":v[2],"st_type":v[4],"year":v[3], "expanded":true,"folder": true,"children":childrenArray});
                    //         //
                    //         // }
                    //
                    //         console.log('zNodeArray=',zNodeArray)
                    //        // }
                    //
                    // });

                    // console.log('childrenArray=',childrenArray)
                    // //zNodeArray+=[{"title":userArray[j], "expanded":true,"folder": true,"children":childrenArray}]
                    //
                    // // console.log('zNodeArray=',zNodeArray)
                    // pushOldu(zNodeArray);
            //     },
            // });

            // }


            // function pushOldu(zNodeArray) {
              pushArray = subArray;
           console.log('pushArray=', pushArray)


            var SOURCE = [
                {"title": "Books", "expanded": true, "folder": true, "children": [
                        {"title": "Art of War", "type": "book", "author": "Sun Tzu", "year": -500, "qty": 21, "price": 5.95},
                        {"title": "The Hobbit", "type": "book", "author": "J.R.R. Tolkien", "year": 1937, "qty": 32, "price": 8.97},
                        {"title": "The Little Prince", "type": "book", "author": "Antoine de Saint-Exupery", "year": 1943, "qty": 2946, "price": 6.82},
                        {"title": "Don Quixote", "type": "book", "author": "Miguel de Cervantes", "year": 1615, "qty": 932, "price": 15.99}
                    ]},
                {"title": "Music", "folder": true, "children": [
                        {"title": "Nevermind", "type": "music", "author": "Nirvana", "year": 1991, "qty": 916, "price": 15.95},
                        {"title": "Autobahn", "type": "music", "author": "Kraftwerk", "year": 1974, "qty": 2261, "price": 23.98},
                        {"title": "Kind of Blue", "type": "music", "author": "Miles Davis", "year": 1959, "qty": 9735, "price": 21.90},
                        {"title": "Back in Black", "type": "music", "author": "AC/DC", "year": 1980, "qty": 3895, "price": 17.99},
                        {"title": "The Dark Side of the Moon", "type": "music", "author": "Pink Floyd", "year": 1973, "qty": 263, "price": 17.99},
                        {"title": "Sgt. Pepper's Lonely Hearts Club Band", "type": "music", "author": "The Beatles", "year": 1967, "qty": 521, "price": 13.98}
                    ]},
                {"title": "Electronics & Computers", "expanded": true, "folder": true, "children": [
                        {"title": "Cell Phones", "folder": true, "children": [
                                {"title": "Moto G", "type": "phone", "author": "Motorola", "year": 2014, "qty": 332, "price": 224.99},
                                {"title": "Galaxy S8", "type": "phone", "author": "Samsung", "year": 2016, "qty": 952, "price": 509.99},
                                {"title": "iPhone SE", "type": "phone", "author": "Apple", "year": 2016, "qty": 444, "price": 282.75},
                                {"title": "G6", "type": "phone", "author": "LG", "year": 2017, "qty": 951, "price": 309.99},
                                {"title": "Lumia", "type": "phone", "author": "Microsoft", "year": 2014, "qty": 32, "price": 205.95},
                                {"title": "Xperia", "type": "phone", "author": "Sony", "year": 2014, "qty": 77, "price": 195.95},
                                {"title": "3210", "type": "phone", "author": "Nokia", "year": 1999, "qty": 3, "price": 85.99}
                            ]},
                        {"title": "Computers", "folder": true, "children": [
                                {"title": "ThinkPad", "type": "computer", "author": "IBM", "year": 1992, "qty": 16, "price": 749.90},
                                {"title": "C64", "type": "computer", "author": "Commodore", "year": 1982, "qty": 83, "price": 595.00},
                                {"title": "MacBook Pro", "type": "computer", "author": "Apple", "year": 2006, "qty": 482, "price": 1949.95},
                                {"title": "Sinclair ZX Spectrum", "type": "computer", "author": "Sinclair Research", "year": 1982, "qty": 1, "price": 529},
                                {"title": "Apple II", "type": "computer", "author": "Apple", "year": 1977, "qty": 17, "price": 1298},
                                {"title": "PC AT", "type": "computer", "author": "IBM", "year": 1984, "qty": 3, "price": 1235.00}
                            ]}
                    ]},
                {"title": "More...", "folder": true, "lazy": true}
            ];
            console.log('SOURCE=',SOURCE)

            // }
            $("#tree")
                .fancytree({
                    checkbox: true,
                    checkboxAutoHide: true,
                    titlesTabbable: true, // Add all node titles to TAB chain
                    quicksearch: true, // Jump to nodes when pressing first character
                    // source: myJSON,
                    // source: { url: "ajax-tree-products.json" },
                   source: pushArray,
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
                        console.log('createNode')
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
                            .eq(4)
                            .text(node.data.st_type);
                        // .find("input")
                        // .val(node.key);
                        $tdList
                            .eq(3)
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
                        console.log('modifyChild')
                        data.tree.info(event.type, data);
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
                            tree.applyCommand(data.cmd, node);
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

                    // console.log(e.type, $.ui.fancytree.eventToString(e));
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
                        $(this).trigger("nodeCommand", { cmd: cmd });
                        return false;
                    }
                });
            // }

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
                    console.log('ui=',ui)
                    var that = this;
                    // delay the event, so the menu can close and the click event does
                    // not interfere with the edit control
                    setTimeout(function() {
                        $(that).trigger("nodeCommand", { cmd: ui.cmd });
                    }, 100);
                },
            });
            // }
        });
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
<!--		<h1>-->
<!--			Example: tree grid with keyboard navigation, DnD, and editing-->
<!--			capabilites-->
<!--		</h1>-->
<!--		<div class="description">-->
<!--			Bringing it all together: this sample combines different extensions-->
<!--			and custom events to implement an editable tree grid:-->
<!--			<ul>-->
<!--				<li>'ext-dnd' to re-order nodes using drag-and-drop.</li>-->
<!--				<li>-->
<!--					'ext-table' + 'ext-gridnav' to implement a tree grid.<br />-->
<!--					Try <kbd>UP / DOWN / LEFT / RIGHT</kbd>, <kbd>TAB</kbd>,-->
<!--					<kbd>Shift+TAB</kbd>-->
<!--					to navigate between grid cells. Note that embedded input-->
<!--					controls remain functional.-->
<!--				</li>-->
<!--				<li>-->
<!--					'ext-edit': inline editing.<br />-->
<!--					Try <kbd>F2</kbd> to rename a node.<br />-->
<!--					<kbd>Ctrl+N</kbd>, <kbd>Ctrl+Shift+N</kbd> to add nodes-->
<!--					(Quick-enter: add new nodes until [enter] is hit on an empty-->
<!--					title).-->
<!--				</li>-->
<!--				<li>-->
<!--					Extended keyboard shortcuts:<br />-->
<!--					<kbd>Ctrl+C</kbd>, <kbd>Ctrl+X</kbd>, <kbd>Ctrl+V</kbd> for-->
<!--					copy/paste,<br />-->
<!--					<kbd>Ctrl+UP</kbd>, <kbd>Ctrl+DOWN</kbd>,-->
<!--					<kbd>Ctrl+LEFT</kbd>, <kbd>Ctrl+RIGHT</kbd>-->
<!--          to move nodes around and change indentation.<br>-->
<!--          (On macOS, add <kbd>Shift</kbd> to the keystrokes.)-->
<!--				</li>-->
<!--				<li>-->
<!--					3rd-party-->
<!--					<a href="https://github.com/mar10/jquery-ui-contextmenu"-->
<!--						>contextmenu</a-->
<!--					>-->
<!--					for additional edit commands-->
<!--				</li>-->
<!--			</ul>-->
<!--		</div>-->
<!--		<div>-->
<!--			<label for="skinswitcher">Skin:</label>-->
<!--			<select id="skinswitcher"></select>-->
<!--		</div>-->
<!---->
<!--		<h1>Table Tree</h1>-->
<!--		<div>-->
<!--			<label>Fake input:<input id="input1"/></label>-->
<!--		</div>-->
<table id="tree">
    <colgroup>
        <col width="30px" />
        <col width="50px" />
        <col width="350px" />
        <col width="150px" />
        <col width="150px" />
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th>Id</th>
        <th></th>
        <th> Tip </th>
        <th>İl</th>
    </tr>
    </thead>
    <tbody>
    <!-- Define a row template for all invariant markup: -->
    <tr>
        <td class="alignCenter"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
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
