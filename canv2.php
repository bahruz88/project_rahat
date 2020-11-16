<!DOCTYPE html>
<html>

<head>
    <link data-require="bootstrap-css@3.2.0" data-semver="3.2.0" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <style>
        .visibilityHide
        {
            visibility:hidden;
        }
    </style>

    <script data-require="jquery@2.0.1" data-semver="2.0.1" src="http://code.jquery.com/jquery-2.0.1.min.js"></script>
    <script src="js/html2canvas.min.js"></script>
    <script src="js/jspdf.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<input type="button" id="test" onClick="fnExcelReport();" value="download" />

<div id='MessageHolder'></div>

<a href="#" id="testAnchor"></a>
<table><thead>
    <tr role="row" style="height: 0px;"><th style="width: 15px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" class="sorting_asc sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="id: activate to sort column descending"><div class="dataTables_sizing" style="height:0;overflow:hidden;">id</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="ASA: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">ASA</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Əmək müqaviləsi müddətsizdirmi: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Əmək müqaviləsi müddətsizdirmi</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Əmək müqaviləsinin müddətli bağlanma səbəbləri: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Əmək müqaviləsinin müddətli bağlanma səbəbləri</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Müddətli əmək müqaviləsinin bağlanma tarixləri: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Müddətli əmək müqaviləsinin bağlanma tarixləri</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Sınaq müddəti: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Sınaq müddəti</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Sınaq müddətinin bitmə tarixi: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Sınaq müddətinin bitmə tarixi</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="İşçinin işə başlama tarixi: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">İşçinin işə başlama tarixi</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Əmək müqaviləsinin bağlanma tarixi: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Əmək müqaviləsinin bağlanma tarixi</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Mülkiyyət münasibətlərinin tənzimlənməsi: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Mülkiyyət münasibətlərinin tənzimlənməsi</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="İş yerinin statusu: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">İş yerinin statusu</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Əmək şaraiti: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Əmək şaraiti</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Vəzifə təlimatı: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Vəzifə təlimatı</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Kvota: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Kvota</div></th><th class="sorting" aria-controls="terms_employment_contract_table" rowspan="1" colspan="1" aria-label="Əməliyyat: activate to sort column ascending" style="width: 8px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"><div class="dataTables_sizing" style="height:0;overflow:hidden;">Əməliyyat</div></th></tr>
    </thead>

    <tbody><tr class="odd"><td valign="top" colspan="17" class="dataTables_empty"><!--?php echo $dil['datanotfound'] ; ?--></td></tr></tbody><tbody><tr><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td></tr><tr><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td></tr><tr><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td><td>undefined</td></tr><tr><td>13,Abdiyev Anar Rasim,Bəli,asd,24/10/2020,3,24/10/2020,24/10/2020,24/10/2020,adsd,asd,asd,Əsas,Normal,asdas,asda</td><td>20,sdf Rasim Anar,Bəli,,31/12/1969,2,02/11/2020,02/11/2020,02/11/2020,Avtomobilini istifade edecektir,Pensiya yasi catanda isine son verilecek,əmək haqqı saatlıq ödenir,Əsas,Normal,- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar,yox</td><td>26,uu uu uu,Bəli,,31/12/1969,1,03/11/2020,02/11/2020,04/11/2020,dfsdf,dsfsdfsdf,dfdsfsdfs,Əsas,Normal,Əmək müqaviləsinə xitam verilməsi barədə tərəflərin müəyyən etdiyi hallar Tərəflərin əmək haqqının ödənilməsi barədə razılığa gəldikləri digər şərtlər İş yerinin statusu123456789Əmək şaraiti,gdfgdfgdf</td><td>25,test11 test11 test11,Bəli,,31/12/1969,8,31/12/1969,31/12/1969,31/12/1969,avtomobil,diger hallara da baxilacaq,ayda 3 defe maas,Əsas,Normal,vezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaqvezife telimati bura yazilacaq,kvotalidir</td><td>18,test4 test4 test4,Xeyr,mövsumluk,27/10/2020,1,27/10/2020,26/10/2020,26/10/2020,Avtomobilini istifade edecektir,Pensiya yasi catanda isine son verilecek,əmək haqqı saatlıq ödenir,Əsas,Ağır,- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar,yox</td><td>8,Əliyev Samir Dadaş,Bəli,,31/12/1969,3,17/12/2020,01/10/2020,01/10/2020,Avtomobilini istifade edecektir,Pensiya yasi catanda isine son verilecek,əmək haqqı saatlıq ödenir,Əsas,Normal,- İR idarə olunması üzrə ədalətli siyasət və sistemin işləyib hazırlamaq; - Qanunvericiliyə və qabaqcıl beynəlxalq təcrübəyə uyğun olaraq əmək münasibətlərini idarə etmək; - Bankın işəgötürən qismində təqdimatının təkmilləşdirilməsində işlər görmək; - Tədris, inkişaf və ardıcıl planlaşdırma imkanlar,</td></tr></tbody></table>
</body>

</html>
<script>
    var tab_text;
    var data_type = 'data:application/vnd.ms-excel';


    function CreateHiddenTable(ListOfMessages)
    {
        var ColumnHead = "Column Header Text";
        var TableMarkUp='<table id="myModifiedTable" class="visibilityHide"><thead><tr><td><b>'+ColumnHead+'</b></td><td><b>'+ColumnHead+'</b></td>  </tr></thead><tbody>';

        for(i=0; i<ListOfMessages.length; i++){
            TableMarkUp += '<tr><td>' + ListOfMessages[i] +'</td><td>' + ListOfMessages[i] +'</td></tr>';
        }
        TableMarkUp += "</tbody></table>";
        $('#MessageHolder').append(TableMarkUp);
    }

    function fnExcelReport() {
        var Messages = "\n message1.\n message2.";
        var ListOfMessages = Messages.split(".");

        CreateHiddenTable(ListOfMessages);

        tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
        tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

        tab_text = tab_text + '<x:Name>Error Messages</x:Name>';

        tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
        tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

        tab_text = tab_text + "<table border='1px'>";
        tab_text = tab_text + $('#myModifiedTable').html();;
        tab_text = tab_text + '</table></body></html>';

        data_type = 'data:application/vnd.ms-excel';

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            if (window.navigator.msSaveBlob) {
                var blob = new Blob([tab_text], {
                    type: "application/csv;charset=utf-8;"
                });
                navigator.msSaveBlob(blob, 'Test file.xls');
            }
        } else {
            console.log(data_type);
            console.log(tab_text);
            $('#testAnchor')[0].click()
        }
        $('#MessageHolder').html("");
    }
    $($("#testAnchor")[0]).click(function(){
        console.log(data_type);
        console.log(tab_text);
        $('#testAnchor').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#testAnchor').attr('download', 'Test file.xls');
    });
</script>