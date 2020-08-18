

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.1.0/jszip-utils.js"></script>
<script type="text/javascript" src="../js/jszip-utils-ie.js"></script>
<!--<script type="text/javascript" src="../js/browser-test-utils.js"></script>-->
<script type="text/javascript" src="http://ludovicperrichon.com/content/images/2017/08/DocxReader.js?v=1.1"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script>
    $(document).ready(function() {

        gen();
        console.log('ss')
    })

    function gen(){

        var docx = new DocxReader();
        console.log('salam',docx)
        docx.Load("../senedler/output.docx", function(){
            console.log('Load',docx)


            // Search
            var found = docx.Search("Test"); // Return true
            var found2 = docx.Search("Testa"); // Return false

            // Replace
            docx.Replace("Read my", "Read your");

            // Change var inside document
            var docxvar = {
                Variable : "Change my var inside doc"
            };

            docx.docxtemplater.setData(docxvar);

            try {
                // render the document (replace all occurences of {first_name} by John, {last_name} by Doe, ...)
                docx.docxtemplater.render();
                console.log('trye');
            }
            catch (error) {
                console.log('error');
                var e = {
                    message: error.message,
                    name: error.name,
                    stack: error.stack,
                    properties: error.properties,
                }
                console.log(JSON.stringify({error: e}));
                // The error thrown here contains additional information when logged with JSON.stringify (it contains a property object).
                throw error;
            }

            // Change file name
            docx.SetName("Awesome changes by JS.docx")

            // Download
            docx.Download();

            // OPTIONAL : Upload to SharePoint document library
            var ctx = new SP.ClientContext(_spPageContextInfo.webAbsoluteUrl);
            var spDocsLib = ctx.get_web().get_lists().getById("DOCUMENT_LIBRARY_GUID");
            // OR
            // var spDocsLib = ctx.get_web().get_lists().getByTitle("DOCUMENT_LIBRARY_TITLE");
            docx.UploadToSharePoint(ctx, spDocsLib, function(sender, args){
                    // Success
                    alert('File Uploaded');
                },
                function(sender, args){
                    // Error
                    alert('Upload Failed');
                    console.log(args.get_message());
                });

        });
    }

    var DocxReader = function(){
        // Var
        this.url = "";
        this.error = null;
        this.zipContent = null;
        this.file = {
            contentAsString : null,
            contentAsXml : null
        };
        this.docxtemplater = null;
        this.name = "../senedler/out.docx";

        // Methods
        this.Load = function(url, loaded){
            console.log('this.Load='+url)
            this.url = url;

            var splitUrl = this.url.split('/');
            console.log('splitUrl='+splitUrl)
            this.name = splitUrl[splitUrl.length - 1];
            console.log('this.name='+this.name)
            console.log('this.url='+this.url)

            var docThis = this;
            JSZipUtils.getBinaryContent(this.url, function(error,content){
                if(error){
                    console.log('error='+error)
                    docThis.error = error;
                    return;
                }
                console.log('content='+content)
                docThis.zipContent = new JSZip(content);
                var documentxml = docThis.zipContent.file("word/document.xml");
                var strDocumentxml = documentxml.asText();
                docThis.file.contentAsString = strDocumentxml
                docThis.file.contentAsXml = $(strDocumentxml);

                docThis.docxtemplater = new Docxtemplater();
                docThis.docxtemplater.loadZip(docThis.zipContent);

                loaded();
            });
        };

        this.Search = function (txt){
            var lowerCaseTxt = txt.toLowerCase();
            var innerDocument = this.file.contentAsXml.find('w\\:body').text().toLowerCase();
            if(innerDocument.indexOf(lowerCaseTxt) != -1){
                return true;
            }

            return false;
        };

        this.Replace = function(oldtxt, newtxt){
            // Be careful, it will look in all the xml as text.
            // Don't replace tags otherwise your docx will not work anymore !
            var oldContent = this.file.contentAsString;
            var newContent = oldContent.replace(new RegExp(oldtxt, 'g'), newtxt);
            this.zipContent.file("word/document.xml", newContent);

            // Update object
            this.docxtemplater.loadZip(this.zipContent);
            this.file.contentAsString = newContent;
            this.file.contentAsXml = $(newContent);
        };

        this.ReplaceVariable = function(variables){
            this.docxtemplater = setData(variables);
            this.docxtemplater.render();

            // Update object
            this.zipContent = this.docxtemplater.getZip();
            var documentxml = this.zipContent.file("word/document.xml");
            var strDocumentxml = documentxml.asText();
            this.file.contentAsString = strDocumentxml
            this.file.contentAsXml = $(strDocumentxml);
        };

        this.SetName = function(name){
            this.name = name;
        };

        this.Download = function(){
            var out = this.docxtemplater.getZip().generate({
                type:"blob",
                mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            })
            saveAs(out,this.name);
        };

        this.UploadToSharePoint = function(clientContext, jsomListObject, onSucceed, onFailed){
            var base64 = this.zipContent.generate();
            var listRootFolder = jsomListObject.get_rootFolder();
            clientContext.load(listRootFolder);
            clientContext.executeQueryAsync(Function.createDelegate(this, function(){
                var fileName = listRootFolder.get_serverRelativeUrl() + '/' + this.name;

                //Create FileCreationInformation object using the read file data
                var createInfo = new SP.FileCreationInformation();
                createInfo.set_content(base64);
                createInfo.set_url(fileName);

                //Add the file to the library
                var uploadedDocument = jsomListObject.get_rootFolder().get_files().add(createInfo);

                //Load client context and execcute the batch
                clientContext.load(uploadedDocument);
                clientContext.executeQueryAsync(Function.createDelegate(this, onSucceed), Function.createDelegate(this, onFailed));
            }), Function.createDelegate(this, onFailed));

        };
    }


</script>