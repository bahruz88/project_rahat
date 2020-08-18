<style>
    table {
        border-collapse: collapse;
    }

    td {
        border: 1px gray solid;
        padding: 4px;
        width: 5em;
    }


</style>
<h2>Demo</h2>
<button id="export">Export</button> Click to open table in Microsoft Word
<div id="docx">
    <div class="WordSection1">
        <table>
            <tr>
                <td>A1</td>
                <td>B1</td>
                <td>C1</td>
                <td>E1</td>
            </tr>
            <tr>
                <td>A2</td>
                <td>B2</td>
                <td>C2</td>
                <td>E2</td>
            </tr>
            <tr>
                <td>A3</td>
                <td>B3</td>
                <td>C3</td>
                <td>E3</td>
            </tr>
            <tr>
                <td>A4</td>
                <td>B4</td>
                <td>C4</td>
                <td>E4</td>
            </tr>
        </table>
    </div>
</div>
<script>
    /* HTML to Microsoft Word Export Demo
 * This code demonstrates how to export an html element to Microsoft Word
 * with CSS styles to set page orientation and paper size.
 * Tested with Word 2010, 2013 and FireFox, Chrome, Opera, IE10-11
 * Fails in legacy browsers (IE<10) that lack window.Blob object
 */
    window.export.onclick = function() {

        if (!window.Blob) {
            alert('Your legacy browser does not support this action.');
            return;
        }

        var html, link, blob, url, css;

        // EU A4 use: size: 841.95pt 595.35pt;
        // US Letter use: size:11.0in 8.5in;

        css = (
            '<style>' +
            '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
            'div.WordSection1 {page: WordSection1;}' +
            'table{border-collapse:collapse;}td{border:1px gray solid;width:5em;padding:2px;}'+
            '</style>'
        );

        html = window.docx.innerHTML;
        blob = new Blob(['\ufeff', css + html], {
            type: 'application/msword'
        });
        url = URL.createObjectURL(blob);
        console.log('url='+url)
        link = document.createElement('A');
        link.href = url;
        console.log('link='+link)

        // Set default file name.
        // Word will append file extension - do not add an extension here.
        link.download = 'Document';
        document.body.appendChild(link);
        console.log('msSaveOrOpenBlob='+navigator.msSaveOrOpenBlob)
        if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'Document.doc'); // IE10-11
        else link.click();  // other browsers
        document.body.removeChild(link);
    };

</script>