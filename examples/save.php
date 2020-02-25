<?php
require_once "../PDFCreatorAPI.class.php";

$Pdf = new \Infira\PDFCreatorAPI('serverUrl', 'apiKey');
file_put_contents("test.pdf", $Pdf->convertHTML("tere"));
