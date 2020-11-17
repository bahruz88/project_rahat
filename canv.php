<!DOCTYPE html>
<html>
<body>
<style>
    p {
        color: green;
    }
</style>
<p>
    How to trigger a file download when
    clicking an HTML button or JavaScript?
<p>
<div id="employee_tab" style="display:none;overflow-x: auto;">
    <table id="employee_table" class="table table-striped  table-bordered table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Ataadı</th>
            <th>Cinsi</th>
            <th>Ailə vəziyyəti</th>
            <th>Doğum tarixi</th>
            <th>Doğum yeri</th>
            <th>Vətəndaşlığı</th>
            <th>FİN</th>
            <th>Vəsiqənin seriya və nömrəsi</th>
            <th>Vəsiqənin verilmə tarixi</th>
            <th>Etibarlılıq müddəti</th>
            <th>Vəsiqəni verən orqanın adı</th>
            <th>Yaşadığı ünvan</th>
            <th>Qeydiyyat ünvan</th>
            <th>Mobil telefonu</th>
            <th>Ev telefonu</th>
            <th>Email</th>
            <th>Təcili vəziyyətdə əlaqə</th>

        </tr>
        </thead>
        <tbody></tbody>
    </table>

</div>
    <br/>
    <input type="button" id="btn"
           value="Download" />
    <script>
        function download(file, text) {

            //creating an invisible element
            var element = document.createElement('a');
            element.setAttribute('href',
                'data:text/plain;charset=utf-8, '
                + encodeURIComponent(text));
            element.setAttribute('download', file);

            // Above code is equivalent to
            // <a href="path of file" download="file name">

            document.body.appendChild(element);

            //onClick property
            element.click();

            document.body.removeChild(element);
        }

        // Start file download.
        document.getElementById("btn")
            .addEventListener("click", function() {
                // Generate download of hello.txt
                // file with some content
                var text = document.getElementById("employee_tab").innerHTML;
                var filename = "GFG.xls";

                download(filename, text);
            }, false);
    </script>
</body>
</html>