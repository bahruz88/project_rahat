<?php
require_once '../phpdocx_pro/classes/TransformDoc.inc';
$docx = new TransformDoc();
$docx->setStrFile('document.docx');
$docx->generateXHTML();
$html = $docx->getStrXHTML();

