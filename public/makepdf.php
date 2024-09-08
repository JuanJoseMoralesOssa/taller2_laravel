<?php
require_once('../vendor/autoload.php');

use Taller2\Controllers\ProductController;

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF();

// Configurar el documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('PDF generado con HTML y TCPDF');

// Eliminar el encabezado y pie de página predeterminados si no los necesitas
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Añadir una página
$pdf->AddPage();

// Establecer la fuente (opcional)
$pdf->SetFont('Helvetica', '', 12);


$productController = new ProductController();
$data =
    json_decode(file_get_contents(('products.json')), true);


$html = '';
$html .= '<h2 style="font-size: 16rem; font-weight: 500;"> My products </h2>';
$html .= '<p style="font-size: 16rem; font-weight: 500;"> Your total: $ ' . ($productController->getTotalPrice()) . '</p>';
$html .= '<p style="font-size: 16rem; font-weight: 500;"> If you duplicate each product you will have: $ '  . ($productController->getDoubleTotalPrice()) . ' </p>';
$html .= '<div style="margin: 4rem auto; padding: 1rem;">';
$html .= '<div style="background-color: #ffb; display: flex; justify-content: space-between; align-items: center;">';

foreach ($data as $product) {
    $html .= '<div style="margin-top: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">';
    $html .= '<div style="height: 200px; border-top-left-radius: 8px; border-top-right-radius: 8px;">';
    $html .= '<img src="' . ($product['image'] ?? '') . '" alt="' . ($product['title'] ?? '') . '" style="width: 300px; height: 300px; object-fit: cover; ">';
    $html .= '</div>';
    $html .= '<div style="padding: 1rem; display: flex; justify-content: space-between; align-items: center;">';
    $html .= '<h3 style="font-size: 16rem; color: #4b5563; margin: 0;">';
    $html .= '<a href="' . ($product['image'] ?? '') . '" style="text-decoration: none; color: inherit;">' . ($product['title'] ?? ' ') . '</a>';
    $html .= '</h3>';
    $html .= '<p style="font-size: 16rem; font-weight: 500; color: #111827;">$' . ($product['price'] ?? '') . '</p>';
    $html .= '</div>';
    $html .= '</div>';
}

$html .= '</div>';
$html .= '</div>';




// Cargar el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF (se muestra en el navegador)
$pdf->Output('ejemplo.pdf', 'I');  // 'I' para mostrar en el navegador, 'D' para forzar la descarga
