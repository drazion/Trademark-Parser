<?php
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

$title = $_POST['registrant'];
$registrant = $_POST['registrant'];
$serial_number = $_POST['serial_number'];
$trademark_id = $_POST['trademark_id'];
$filing_date = $_POST['filing_date'];
$last_update = $_POST['last_update'];
$address = $_POST['address'];
$description = $_POST['description'];

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aaron Harvey');
$pdf->SetTitle($title);
$pdf->SetSubject('Trademark Example');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// Set some content to print
$html = <<<EOD
<p> </p><br/>
<p>
$address<br/>
</p>

<p><h1>$registrant's Trademark Application</h1></p>

<p>
<h2>Trademark Summary</h2>
Serial Number: $serial_number <br/>
Trademark ID Number: $trademark_id<br/>
Trademark Filing Date: $filing_date<br/>
Last Updated: $last_update<br/>
</p>

<p>
<h2>Trademark Description</h2>
$description
</p>
EOD;

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->Output($title . '.pdf', 'D');
