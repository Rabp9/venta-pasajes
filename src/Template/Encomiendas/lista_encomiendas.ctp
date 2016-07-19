<?php
    $margen_x = 3;
    $margen_y = 10;
    $borde_celda = 0;
    $h_celda = 5;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
    $pdf->Image("img/logo.png", $margen_x, $margen_y);
    
    // Header
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(80, $h_celda, utf8_decode('EMPRESA DE TRANSPORTES GENERALES'), $borde_celda, 0, 'C');
    $pdf->ln();
    
    $h_celda = 10;
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 22);
    $pdf->Cell(80, $h_celda, utf8_decode('"JHANY TOURS"'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 16);
    $pdf->Cell(68, $h_celda, utf8_decode('RELACIÓN DE'), $borde_celda, 0, 'C');
    $pdf->ln();
    
    $h_celda = 6;
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "", 8);
    $pdf->Cell(80, $h_celda, utf8_decode('S.A.C.'), $borde_celda, 0, 'R');
    $pdf->SetFont("Arial", "", 16);
    $pdf->Cell(68, $h_celda, utf8_decode('ENCOMIENDAS'), $borde_celda, 0, 'C');
    $pdf->ln(10);
    
    // Datos
    $borde_celda = 0;
    $h_celda = 5;
    $pdf->SetFont("Arial", "B", 7);
    $pdf->Cell(24, $h_celda, utf8_decode('Oficina de Origen:'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "", 7);
    $pdf->Cell(35, $h_celda, utf8_decode('Av. Larco (Chepen)'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "B", 7);
    $pdf->Cell(24, $h_celda, utf8_decode('Oficina de Destino:'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "", 7);
    $pdf->Cell(35, $h_celda, utf8_decode('Av. Larco (Chepen)'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "B", 7);
    $pdf->Cell(15, $h_celda, utf8_decode('Omnibus:'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "", 7);
    $pdf->Cell(29, $h_celda, utf8_decode('PLACAXXXX'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "B", 7);
    $pdf->Cell(11, $h_celda, utf8_decode('Fecha:'), $borde_celda, 0, 'L');
    $pdf->SetFont("Arial", "", 7);
    $pdf->Cell(21, $h_celda, utf8_decode('05/06/2016'), $borde_celda, 0, 'L');
    $pdf->ln();
    
    // Tabla
    // Header
    $borde_celda = 1;
    $h_celda = 5;
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(10, $h_celda, utf8_decode('N°'), $borde_celda, 0, 'C');
    $pdf->Cell(62, $h_celda, utf8_decode('NOMBRE'), $borde_celda, 0, 'C');
    $pdf->Cell(62, $h_celda, utf8_decode('DESCRIPCIÓN'), $borde_celda, 0, 'C');
    $pdf->Cell(24, $h_celda, utf8_decode('IMPORTE'), $borde_celda, 0, 'C');
    $pdf->Cell(39, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->ln();
    
    // Tabla
    // Body
    $i = 1;
    $total = 45;
    $n_encomiendas = sizeof($programacion->encomiendas);
    foreach ($programacion->encomiendas as $encomienda) {
        $pdf->SetFont("Arial", "", 7);
        $pdf->Cell(10, $h_celda, utf8_decode($i), $borde_celda, 0, 'C');
        $pdf->Cell(62, $h_celda, utf8_decode($encomienda->personaRemitente->full_name), $borde_celda, 0, 'C');
        $pdf->Cell(62, $h_celda, utf8_decode($encomienda->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell(24, $h_celda, utf8_decode(number_format($encomienda->valor_total, 2, '.', ',')), $borde_celda, 0, 'C');
        $pdf->Cell(39, $h_celda, utf8_decode($encomienda->desplazamiento->AgenciaDestino->direccion . ' (' . $encomienda->desplazamiento->AgenciaDestino->ubigeo->descripcion . ')'), $borde_celda, 0, 'C');
        $pdf->ln();
        $i++;
    }
    
    for ($i = 0; $i < ($total - $n_encomiendas); $i++) {
        $pdf->Cell(10, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
        $pdf->Cell(62, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
        $pdf->Cell(62, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
        $pdf->Cell(24, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
        $pdf->Cell(39, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
        $pdf->ln();
    }
    
    // Firmas
    $pdf->ln();
    $h_celda = 5;
    $borde_celda = 0;
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(72, $h_celda, utf8_decode(''), 'B', 0, 'C');
    $pdf->Cell(26, $h_celda, utf8_decode(''), $borde_celda, 0, 'L');
    $pdf->Cell(56, $h_celda, utf8_decode(''), $borde_celda, 0, 'R');
    $pdf->Cell(43, $h_celda, utf8_decode(''), 'B', 0, 'R');
    $pdf->ln();
    
    $pdf->Cell(72, $h_celda, utf8_decode('EMPRESA DE TRANSPORTES GENERALES JHANY TOURS S.A.C.'), $borde_celda, 0, 'C');
    $pdf->Cell(26, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(56, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(43, $h_celda, utf8_decode('RECIBÌ CONFORME'), $borde_celda, 0, 'C');
    
    $pdf->Output("Reporte_de_Morosos.pdf", "I");
?>