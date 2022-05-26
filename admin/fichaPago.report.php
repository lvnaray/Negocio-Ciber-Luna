<?php
require_once 'fichaPago.controller.php';
$sistema = new Sistema;
$fichas = new FichaPago;
$id_cliente = $_SESSION['id_cliente'];
$datos = $fichas->readOneReport($id_cliente);
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {

    $content ="
    <h1>FICHA DE PAGO</h1>
    <h2>SE DEBE DE PAGAR LA CANTIDAD SOLICITADA</h2>
    <h4> ESTIMADO CLIENTE ".$datos[0]['nombre']."</h4>";
    $content.="
    <h3>De domicilio: </h3>
    <h4>".$datos[0]['calle'].$datos[0]['numeroVivienda']."</h4>";
    $content.="
    <h3>De la colonia: </h3>
    <h4>".$datos[0]['colonia']."</h4>";
    $content.="
    <h3>El cual tiene el plan y costo de: </h3>
    <h4>".$datos[0]['plan']." $".$datos[0]['precio']."</h4>";
    $content.="
    <h1>BANCO BBVA de su preferencia</h1>
    <h2>Número de cuenta: 1145445221445</h2>
    <h4>El cual se debe de pagar(depositado en la cuenta) a tiempo en una fecha límite de".$datos[0]['fechaLimite']."</h4>";

    
    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    ob_end_clean();
    $html2pdf->output('receta.pdf', 'I');
} catch (Html2PdfException $e) {

    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}