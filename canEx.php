<html id="anil" xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Untitled Page</title>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script type="text/javascript" >

        function exportToExcel() {

            //copy innerHTML of YourTable to strCopy Variable.
            debugger;
            var strCopy = document.getElementById("anil").innerHTML ;


            // clickExcel

            //getElementById("Bdy1").innerHTML;
            //copy strCopy to clipboardData, this

            window.clipboardData.setData("Text", strCopy);

            var objExcel = new ActiveXObject("Excel.Application");

            objExcel.visible = true;

            var objWorkbook = objExcel.Workbooks.Add;

            var objWorksheet = objWorkbook.Worksheets(1);
            objWorksheet.Paste;

        }
    </script>

    <style type="text/css">

        div.each-element{
            border:2px solid red;
            text-align:center;
            font-family:'segoe ui';
            margin:2%;
            padding:1%;
        }

    </style>


</head>
<body>
<form id="form1" runat="server">
    <div id='parent'>
        <table>
            <tr>
                <td>
                    <div>
                        <div id='child1' class='each-element'>Child 1</div>
                        <div id='child2' class='each-element'>Child 2</div>
                        <div id='child3' class='each-element'>Child 3</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <input id="clickExcel" type="button" style="height:35px;width:189px" value="BtnExport"  onclick="javascript:exportToExcel();" onclick="return clickExcel_onclick()" />
</form>
</body>
</html>