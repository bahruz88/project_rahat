
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Example of save PDF as file, string, blob or base64, jQuery Survey Library Example</title>

    <meta name="viewport" content="width=device-width"/>
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://surveyjs.azureedge.net/1.7.26/survey.jquery.js"></script>
    <link rel="stylesheet" href="./index.css">
    <link href="https://surveyjs.azureedge.net/1.7.26/modern.css" type="text/css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"></script>
    <script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script>
    <script src="https://surveyjs.azureedge.net/1.7.26/survey.pdf.js"></script>

</head>
<body>

<button id="saveAsFileBtn" style="margin:10px">Save as File</button>
<button id="saveAsStringBtn" style="margin:10px">Save as String</button>
<button id="saveAsBlobBtn" style="margin:10px">Save as Blob</button>
<button id="pdfPreviewBtn" style="margin:10px">PDF Preview</button>
<div id="pdf-preview"></div>
<div id="surveyElement" style="display:inline-block;width:100%;"></div>
<div id="surveyResult"></div>

<script type="text/javascript" src="./index.js"></script>
<script>

    Survey
        .StylesManager
        .applyTheme("modern");

    var json = {
        "questions": [
            {
                "type": "text",
                "name": "savepdf",
                "title": "Save me, please"
            }
        ]
    };

    window.survey = new Survey.Model(json);

    survey
        .onComplete
        .add(function (result) {
            document
                .querySelector('#surveyResult')
                .textContent = "Result JSON:\n" + JSON.stringify(result.data, null, 3);
        });

    $("#surveyElement").Survey({model: survey});

    function saveSurveyToPdf(filename, surveyModel, saveType) {
        var surveyPDF = new SurveyPDF.SurveyPDF(json);
        surveyPDF.data = surveyModel.data;
        if (saveType === "saveAsFile") {
            surveyPDF.save(filename);
        } else if (saveType === "saveAsString") {
            surveyPDF
                .raw()
                .then(function (text) {
                    var file = new Blob([text], {type: "application/pdf"});
                    var a = document.createElement("a");
                    a.href = URL.createObjectURL(file);
                    a.download = filename;
                    document
                        .body
                        .appendChild(a);
                    a.click();
                });
        } else if (saveType === "saveAsBlob") {
            surveyPDF
                .raw("bloburl")
                .then(function (bloburl) {
                    var a = document.createElement("a");
                    a.href = bloburl;
                    a.download = filename;
                    document
                        .body
                        .appendChild(a);
                    a.click();
                });
        } else {
            var oldFrame = document.getElementById("pdf-preview-frame");
            if (oldFrame)
                oldFrame
                    .parentNode
                    .removeChild(oldFrame);
            surveyPDF
                .raw("dataurlstring")
                .then(function (dataurl) {
                    var pdfEmbed = document.createElement("embed");
                    pdfEmbed.setAttribute("id", "pdf-preview-frame");
                    pdfEmbed.setAttribute("type", "application/pdf");
                    pdfEmbed.setAttribute("style", "width:100%");
                    pdfEmbed.setAttribute("height", 200);
                    pdfEmbed.setAttribute("src", dataurl);
                    var previewDiv = document.getElementById("pdf-preview");
                    previewDiv.appendChild(pdfEmbed);
                });
        }
    }
    document
        .getElementById("saveAsFileBtn")
        .onclick = function () {
        saveSurveyToPdf("surveyAsFile.pdf", survey, "saveAsFile");
    };
    document
        .getElementById("saveAsStringBtn")
        .onclick = function () {
        saveSurveyToPdf("surveyAsString.pdf", survey, "saveAsString");
    };
    document
        .getElementById("saveAsBlobBtn")
        .onclick = function () {
        saveSurveyToPdf("surveyAsBlob.pdf", survey, "saveAsBlob");
    };
    document
        .getElementById("pdfPreviewBtn")
        .onclick = function () {
        saveSurveyToPdf("", survey, "pdfPreview");
    };
</script>

</body>
</html>