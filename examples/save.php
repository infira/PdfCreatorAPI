<?php
require_once "../PDFCreatorAPI.class.php";

$Pdf = new \Infira\PDFCreatorAPI('serverUrl', 'apiKey');
header("Content-type: application/pdf");
header('Pragma: no-cache');
file_put_contents("test.pdf", $Pdf->convertHTML("tere"));
