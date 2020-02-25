<?php
require_once "../PDFCreatorAPI.class.php";

$Pdf = new \Infira\PDFCreatorAPI('http://pdf.hange.ee', '38f857b1-b222-49da-b058-b7295b68c3aa');
header("Content-type: application/pdf");
header('Pragma: no-cache');
echo $Pdf->convertHTML("tere");
exit;
