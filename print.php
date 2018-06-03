<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = 'ababab';

$mpdf->WriteHTML($html);
$mpdf->Output('Laporan Hasil Konsultasi.pdf','D');
