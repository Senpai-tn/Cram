<?php 
include '../../Vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$data='<h1>Test</h1>';
$mpdf->writeHTML($data);
$mpdf->Output('test.pdf'); 
?>
