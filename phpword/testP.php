<?php
require_once 'vendor/autoload.php';

$objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
$contents=$objReader->load("helloWorld.docx");


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($contents, 'Word2007');
$objWriter->save('helloWorld2.docx');

// Saving the document as ODF file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
//$objWriter->save('helloWorld2.odt');

// Saving the document as HTML file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
//$objWriter->save('helloWorld2.html');

/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */