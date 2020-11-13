// Code goes here

$(document).ready(function(){

  // export 1 is the default jsPDF one, it really reduces the image quality
// export 2 is the work-around which looks pretty good
$("#button1").on('click', exportOne);
$("#download").on('click', exportTwo);

function exportOne(){
    var pdf = new jsPDF('l','px'),
        source = $('main')[0];
    
    pdf.addHTML(
          source, 0, 0, {
              pagesplit: true
          },
          function(dispose){
              pdf.save('test.pdf');
          }
      );
}

function exportTwo() {
    var staffchoose=$("input[name='staffSelect']:checked").val();
    if(staffchoose=='1'){
        $(".staffText").css("display","block");
        $(".staffText2").css("display","block");
        $(".stattText").css("display","none");
        $(".stattText2").css("display","none");
    }else{
        $(".staffText").css("display","none");
        $(".staffText2").css("display","none");
        $(".stattText").css("display","block");
        $(".stattText2").css("display","block");
    }
    var canvasShiftImg = function(img, shiftAmt, scale, pageHeight, pageWidth){
      var c = document.createElement('canvas'),
        ctx = c.getContext('2d'),
        shifter = Number(shiftAmt || 0),
        scaledImgHeight = img.height * scale,
        scaledImgWidth = img.width * scale;
        
      ctx.canvas.height = pageHeight;
      ctx.canvas.width = pageWidth;
      ctx.drawImage(img, 0, shifter, scaledImgWidth, scaledImgHeight)
      
      return c;
    };

    var canvasToImg = function(canvas, loaded, error){
      var dataURL = canvas.toDataURL('image/png'),
        img = new Image();
      img.onload = loaded;
      img.onerror = error;
      img.src = dataURL;
    };
    
    var imageToPdf = function(){
      // can't pass any parameters or else "this" won't be the img element
      var img = this,
        pdf = new jsPDF('l','px'),
        pdfInternals = pdf.internal,
        pdfPageSize = pdfInternals.pageSize,
        pdfScaleFactor = pdfInternals.scaleFactor,
        pdfPageWidth = pdfPageSize.width,
        pdfPageHeight = pdfPageSize.height,
        pdfPageWidthPx = pdfPageWidth * pdfScaleFactor,
        pdfPageHeightPx = pdfPageHeight * pdfScaleFactor,
        
        imgScaleFactor = Math.min(pdfPageWidthPx / img.width, 1),
        imgScaledHeight = img.height * imgScaleFactor,
        
        shiftAmt = 0,
        done = false;
      
      while(!done){
        var newCanvas = canvasShiftImg(img, shiftAmt, imgScaleFactor, pdfPageHeightPx, pdfPageWidthPx);
        pdf.addImage(newCanvas, 'png', 0, 0, pdfPageWidth, 0, null, 'SLOW');
        
        shiftAmt -= pdfPageHeightPx;
        
        if(-1*shiftAmt < imgScaledHeight){
          pdf.addPage();
        } else {
          done = true;
        }
      }
      
      pdf.save('test.pdf');
    };
    var imageLoadError = function(){
      alert('there was an image load error :(');
    };

    var scaleBy = 5;
    var w = 1000;
    var h = 1000;
    var canvas = document.createElement('canvas');
    canvas.width = w * scaleBy;
    canvas.height = h * scaleBy;
    canvas.style.width = w + 'px';
    canvas.style.height = h + 'px';
    var context = canvas.getContext('2d');
    context.scale(scaleBy, scaleBy);
    html2canvas($('#staff'), {
        canvas:canvas,
        onrendered: function(canvas){
          // params: canvas, onload, onerror
          canvasToImg(canvas, imageToPdf, imageLoadError);
        }
    });
}

});