<?php
    $margen_x = 3;
    $margen_y = 10;
    $borde_celda = 0;
    $h_celda = 5;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->setTitle(utf8_decode('Manifiesto de Pasajeros - Programación N° ' . $programacion->id));
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->Text($margen_x + 165, $margen_y + 22, utf8_decode(str_pad($programacion->id,  6, '0', STR_PAD_LEFT)));
    $pdf->AddPage();
    $pdf->Image("img/logo.png", $margen_x + 75, $margen_y + 10);

    // Header
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($margen_x + 99, $h_celda, utf8_decode('EMPRESA DE TRANSPORTES Y SERVICIOS GENERALES'), $borde_celda, 0, 'C');
    $pdf->ln(35);

    $w_title = 29;
    $w_value = 36;

    $borde_celda = 0;
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('ORIGEN'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->ruta->detalleArray[0]), 'B', 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode(array_pop((array_slice($programacion->ruta->detalleArray, -1)))), 'B', 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('HORA SALIDA'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->fecha_via->format('H:i:s')), 'B', 0, 'C');

    $pdf->ln();

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('VEHÍCULO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->bus->chasis), 'B', 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('PLACA'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->bus->placa), 'B', 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('FECHA DE VIAJE'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode($programacion->fecha_via->format('Y-m-d')), 'B', 0, 'C');

    $pdf->ln();

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('PILOTO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value * 2 + $w_title, $h_celda, utf8_decode(@$programacion->piloto->conductor->persona->full_name), 'B', 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('BREVETE'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode(@$programacion->piloto->conductor->licencia), 'B', 0, 'C');

    $pdf->ln();

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('COPILOTO'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value * 2 + $w_title, $h_celda, utf8_decode(@$programacion->copiloto->conductor->persona->full_name), 'B', 0, 'C');

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell($w_title, $h_celda, utf8_decode('BREVETE'), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "", 10);
    $pdf->Cell($w_value, $h_celda, utf8_decode(@$programacion->copiloto->conductor->licencia), 'B', 0, 'C');

    $pdf->ln(7);

    $borde_celda = 1;
    // INICIO LISTA PASAJEROS
    $w_title = 19;
    $pdf->SetFont("Arial", "B", 10);
    $h_celda = 7;

    // Cabecera
    $pdf->Cell(10, $h_celda, utf8_decode('N°'), $borde_celda, 0, 'C');
    $pdf->Cell(80, $h_celda, utf8_decode('Pasajero'), $borde_celda, 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode('DNI'), $borde_celda, 0, 'C');
    $pdf->Cell(30, $h_celda, utf8_decode('Origen'), $borde_celda, 0, 'C');
    $pdf->Cell(30, $h_celda, utf8_decode('Destino'), $borde_celda, 0, 'C');
    $pdf->Cell(28, $h_celda, utf8_decode('N° Asiento'), $borde_celda, 0, 'C');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "", 10);
    $h_celda = 5;
    $i = 1;
    foreach ($programacion->pasajes as $pasaje) {
        $pdf->Cell(10, $h_celda, utf8_decode($i), $borde_celda, 0, 'C');
        $pdf->Cell(80, $h_celda, utf8_decode($pasaje->persona->full_name), $borde_celda, 0, 'C');
        $pdf->Cell(20, $h_celda, utf8_decode($pasaje->persona->dni), $borde_celda, 0, 'C');
        $pdf->Cell(30, $h_celda, utf8_decode($pasaje->detalle_desplazamiento->desplazamiento->AgenciaOrigen->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell(30, $h_celda, utf8_decode($pasaje->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell(28, $h_celda, utf8_decode($pasaje->bus_asiento->nro_asiento . ' (' . $pasaje->bus_asiento->bus_piso->nro_piso . '° Piso )'), $borde_celda, 0, 'C');
        
        $pdf->ln();
        $i++;
    }
    
    $pdf->Output("Lista_de_Pssajeros.pdf", "I");
?>