<?php
    $margen_x = 3;
    $margen_y = 10;
    $borde_celda = 0;
    $h_celda = 5;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
   // $pdf->Image("img/logo.png", $margen_x + 75, $margen_y + 10);
    
    // Header
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($margen_x + 99, $h_celda, utf8_decode('EMPRESA DE TRANSPORTES Y SERVICIOS GENERALES'), $borde_celda, 0, 'C');
    $pdf->ln(35);
    
    $w_title = 29;
    $w_value = 36;
    
    $borde_celda = 1;
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('ORIGEN'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->ruta->detalleArray[0]), $borde_celda, 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode(array_pop((array_slice($programacion->ruta->detalleArray, -1)))), $borde_celda, 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('HORA SALIDA'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->fecha_via->format('H:i:s')), $borde_celda, 0, 'C');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('VEHÍCULO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->bus->chasis), $borde_celda, 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('PLACA'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->bus->placa), $borde_celda, 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('FECHA DE VIAJE'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->fecha_via->format('Y-m-d')), $borde_celda, 0, 'C');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('PILOTO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value * 2 + $w_title, $h_celda, utf8_decode($programacion->piloto->conductor->persona->full_name), $borde_celda, 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('BREVETE'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->piloto->conductor->licencia), $borde_celda, 0, 'C');
    
    $pdf->ln();

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('COPILOTO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value * 2 + $w_title, $h_celda, utf8_decode(@$programacion->copiloto->conductor->persona->full_name), $borde_celda, 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('BREVETE'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode(@$programacion->copiloto->conductor->licencia), $borde_celda, 0, 'C');
    
    $pdf->ln(7);
    
    // INICIO LISTA PASAJEROS
    $w_title = 20;
    $pdf->SetFont("Arial", "", 6);
  
    // 1° fila
    $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
    
    $pdf->Cell(($w_title * 2) - 5, $h_celda, '', $borde_celda, 0, 'C');
    
    $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
    $pdf->ln();
    
   // 2° fila
    $pdf->Cell($w_title, $h_celda, utf8_decode('hgddgd'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('dgdsafas'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('dsadsadsa'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('gfsfsd'), $borde_celda, 0, 'C');
    
    $pdf->Cell(($w_title * 2) - 5, $h_celda, '', $borde_celda, 0, 'C');
    
    $pdf->Cell($w_title, $h_celda, utf8_decode('hgddgd'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('dgdsafas'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('dsadsadsa'), $borde_celda, 0, 'C');
    $pdf->Cell($w_title, $h_celda, utf8_decode('gfsfsd'), $borde_celda, 0, 'C');
    $pdf->ln();
    
    // 3° fila
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
    
    $pdf->Cell(($w_title * 2) - 5, $h_celda, '', $borde_celda, 0, 'C');
    
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
    $pdf->ln();
    
    // 4° fila
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('dsadsadsa:'), $borde_celda, 0, 'L');
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('sadsadadsad:'), $borde_celda, 0, 'L');
    
    $pdf->Cell(($w_title * 2) - 5, $h_celda, '', $borde_celda, 0, 'C');
    
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBddsaasdsaRE:'), $borde_celda, 0, 'L');
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('dsadsadsa:'), $borde_celda, 0, 'L');
    $pdf->ln();
    
    // 5° fila
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('DNI: 12345678'), $borde_celda, 0, 'L');
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('DNI: 12345678'), $borde_celda, 0, 'L');
    
    $pdf->Cell(($w_title * 2) - 5, $h_celda, '', $borde_celda, 0, 'C');
    
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('DNI: 12345678'), $borde_celda, 0, 'L');
    $pdf->Cell($w_title * 2, $h_celda, utf8_decode('DNI: 12345678'), $borde_celda, 0, 'L');
    $pdf->ln();
    
    $pdf->Output("Lista_de_Pssajeros.pdf", "I");
?>