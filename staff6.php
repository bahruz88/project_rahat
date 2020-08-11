<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
</head>
<body>
<table id="table" border="1">
    <tr>
        <td>
            Foo
        </td>
        <td>
            Bar
        </td>
    </tr>
</table>

<a id="downloadLink" onclick="exportF(this)">Export to excel</a>

<script  charset="UTF-8">

    function exportF(elem) {
        var table = document.getElementById("table");
        var html = table.outerHTML;
        var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url
        elem.setAttribute("href", url);
        elem.setAttribute("download", "export.xls"); // Choose the file name
        return false;
    }

</script>
</body>
</html>