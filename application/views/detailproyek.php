<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';

// import dompdf class into global namespace
use Dompdf\Dompdf;
// $dompdf = new Dompdf\Dompdf();

// instantiate dompdf class
$dompdf = new Dompdf();

// pdf content
$html = '<h1 style="color:blue;">Hello World!</h1><p>A PDF generated by DomPDF library.</p>';

// load html
$dompdf->loadHtml($html);

// set paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// render html as pdf
$dompdf->render();

// output the pdf to browser
$dompdf->stream();
?>