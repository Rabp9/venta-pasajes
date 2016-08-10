<?php
    $margen_x = 3;
    $margen_y = 10;
    $borde_celda = 0;
    $h_celda = 3;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
    $pdf->Image("img/logo.png", $margen_x, $margen_y);
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(13, $h_celda, utf8_decode('TRUJILLO:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Prolongación Vallejo N° 1364 - Urb. Rázuri - RPC: 943775530'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->Cell(48);
    
    $pdf->Cell(13, $h_celda, utf8_decode(''), $borde_celda, 0, 'L');

    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('949716283 - RPM: #956566139 / #948505777'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(8, $h_celda, utf8_decode('CHAO:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Av. Victor Raúl N° 458 - A - RPM: #998585479'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(9, $h_celda, utf8_decode('SIHUAS:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Jr. Bolivar N° 111 - RPM: #995422973 Mov. 964492073'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(18, $h_celda, utf8_decode('HUANCASPATA:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Jr. Libertad N° 258 - RPM: #948903535'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(27, $h_celda, utf8_decode('SANTIAGO DE CHALLAS:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Plaza de Armas S/N - Cel.: 942639366'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(16, $h_celda, utf8_decode('TAYABAMBA:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Av. Salaverry N° 198 - Pblo Tayabamba _La Libertad - Pataz -'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->Cell(48);
    
    $pdf->Cell(16, $h_celda, utf8_decode(''), $borde_celda, 0, 'L');

    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Tayabamba - RPC: 943775533 / 943775528'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(11, $h_celda, utf8_decode('TAURIJA:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Jr. Pérez Vélez S/N (Bodega Pablo Morillo) RPM# 941977239'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    // Fila
    $pdf->Cell(48);
    $pdf->SetFont("Arial", "B", 6);
    $pdf->Cell(14, $h_celda, utf8_decode('BULDIBUYO:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(60, $h_celda, utf8_decode('Calle San Martín S/N RPM #942893344'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->RoundedRect($margen_x + 132, $margen_y - 3, 68, ($h_celda * 10) + 6, 5, '1234', 'D');

    $pdf->SetFont("Arial", "", 18);
    $pdf->Text($margen_x + 136, $margen_y + 6, utf8_decode("R.U.C. 20477466479"));
    
    $pdf->SetFont("Arial", 'B', 18);
    $pdf->Text($margen_x + 136, $margen_y + 16, utf8_decode("BOLETA DE VENTA"));
    
    $pdf->SetFont("Arial", '', 18);
    $pdf->Text($margen_x + 136, $margen_y + 26, utf8_decode('0001 - N° ' . str_pad($encomienda->id,  6, '0', STR_PAD_LEFT)));
    
    // Datos
    $h_celda = 5;
    $pdf->ln(5);
    
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(22, $h_celda, utf8_decode('Remitente:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 9);
    $pdf->Cell(100, $h_celda, utf8_decode($encomienda->personaRemitente->full_name), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(22, $h_celda, utf8_decode('Destinatario:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 9);
    $pdf->Cell(100, $h_celda, utf8_decode($encomienda->personaDestinatario->full_name), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(22, $h_celda, utf8_decode('Origen:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 9);
    $pdf->Cell(100, $h_celda, utf8_decode($encomienda->desplazamiento->AgenciaOrigen->direccion . ' (' . $encomienda->desplazamiento->AgenciaOrigen->ubigeo->descripcion . ')'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(22, $h_celda, utf8_decode('Destino:'), $borde_celda, 0, 'L');
    
    $pdf->SetFont("Arial", "", 9);
    $pdf->Cell(100, $h_celda, utf8_decode($encomienda->desplazamiento->AgenciaDestino->direccion . ' (' . $encomienda->desplazamiento->AgenciaDestino->ubigeo->descripcion . ')'), $borde_celda, 0, 'L');
    
    $pdf->ln();
    
    $pdf->RoundedRect($margen_x + 135, $margen_y + 40, 19, 10, 3, '14', 'D');
    $pdf->RoundedRect($margen_x + 154, $margen_y + 40, 11, 10, 0, '', 'D');
    $pdf->RoundedRect($margen_x + 165, $margen_y + 40, 15, 10, 0, '', 'D');
    $pdf->RoundedRect($margen_x + 180, $margen_y + 40, 20, 10, 3, '23', 'D');

    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 137, $margen_y + 47, utf8_decode('FECHA'));
    $pdf->Text($margen_x + 157, $margen_y + 47, utf8_decode(str_pad($encomienda->fechahora->day,  2, '0', STR_PAD_LEFT)));
    $pdf->Text($margen_x + 168, $margen_y + 47, utf8_decode($meses[$encomienda->fechahora->month - 1]));
    // $pdf->Text($margen_x + 170, $margen_y + 47, utf8_decode(str_pad($encomienda->fechahora->month,  2, '0', STR_PAD_LEFT)));
    $pdf->Text($margen_x + 185, $margen_y + 47, utf8_decode($encomienda->fechahora->year));
    
    // Detalle
    // Header
    $pdf->RoundedRect($margen_x + 3, $margen_y + 55, 160, 10, 3, '1', 'D');
    $pdf->RoundedRect($margen_x + 163, $margen_y + 55, 37, 10, 3, '2', 'D');
    
    $pdf->SetFont("Arial", 'B', 11);
    $pdf->Text($margen_x + 59, $margen_y + 60, utf8_decode('DECLARACIÓN DE ENVÍO'));
    
    $pdf->SetFont("Arial", '', 7);
    $pdf->Text($margen_x + 31, $margen_y + 63, utf8_decode('Por medio de este documento, el remitente, bajo su responsabilidad declara enviar los siguiente.'));
    
    $pdf->SetFont("Arial", 'B', 11);
    $pdf->Text($margen_x + 172, $margen_y + 61, utf8_decode('IMPORTE'));
    
    $pdf->ln(10);
    
    // Detalle
    // Body
    $h_celda = 5;
    $borde_celda = 'RL';
    
    $max_detail= 35;
    $n_detail = sizeof($encomienda->encomiendas_tipos);
    
    for ($i = 0; $i < $n_detail; $i++) {
        $descripcion = $encomienda->encomiendas_tipos[$i]->tipo_producto->descripcion . ' - '
            . $encomienda->encomiendas_tipos[$i]->detalle . ' (' 
            . $encomienda->encomiendas_tipos[$i]->valor . ') x' 
            . $encomienda->encomiendas_tipos[$i]->cantidad;
        $importe = $encomienda->encomiendas_tipos[$i]->cantidad * $encomienda->encomiendas_tipos[$i]->valor;
        
        $pdf->SetFont("Arial", "", 8);
        $pdf->Cell(160, $h_celda, utf8_decode($descripcion), $borde_celda, 0, 'L');
        $pdf->Cell(37, $h_celda, utf8_decode(number_format($importe, 2, '.', ',')), $borde_celda, 0, 'L');

        $pdf->ln();
    }
    
    for ($i = 0; $i < ($max_detail - $n_detail); $i++) {
        
        $pdf->SetFont("Arial", "", 8);
        $pdf->Cell(160, $h_celda, '', $borde_celda, 0, 'L');
        $pdf->Cell(37, $h_celda, '', $borde_celda, 0, 'L');

        $pdf->ln();
    }
    
    // Detalle
    // Footer
    
    $pdf->RoundedRect($margen_x + 3, $margen_y + 65 + ($h_celda * 35), 160, 10, 3, '4', 'D');
    $pdf->RoundedRect($margen_x + 163, $margen_y + 65 + ($h_celda * 35), 37, 10, 3, '3', 'D');
    
    $pdf->SetFont("Arial", 'BI', 10);
    $pdf->Text($margen_x + 152, $margen_y + 71 + ($h_celda * 35), utf8_decode('Soles'));
    
    $pdf->SetFont("Arial", 'B', 10);
    $pdf->Text($margen_x + 164, $margen_y + 71 + ($h_celda * 35), utf8_decode(number_format($encomienda->valor_total, 2, '.', ',')));
    
    // Datos Finales
    $pdf->RoundedRect($margen_x + 3, $margen_y + 77 + ($h_celda * 35), 123, 15, 3, '1234', 'D');
    $pdf->RoundedRect($margen_x + 126, $margen_y + 77 + ($h_celda * 35), 37, 15, 3, '1234', 'D');
    $pdf->RoundedRect($margen_x + 163, $margen_y + 77 + ($h_celda * 35), 37, 15, 3, '1234', 'D');
    
    $pdf->SetFont("Arial", '', 5);
    $pdf->Text($margen_x + 10, $margen_y + 81 + ($h_celda * 35), utf8_decode('La Empresa no se responsabiliza por deterioro al mal embalaje, NO RESPONDE por vida de animales, por dinero y valores no declarados;'));
    
    $pdf->SetFont("Arial", '', 5);
    $pdf->Text($margen_x + 8, $margen_y + 84 + ($h_celda * 35), utf8_decode('tampoco por direcciones equivocadas. Las encomiendas furtas, viveres, articulos en descomposición serán desechados a partir de las 48 horas'));
    
    $pdf->SetFont("Arial", '', 5);
    $pdf->Text($margen_x + 28, $margen_y + 87 + ($h_celda * 35), utf8_decode('de su llegada. Una vez firmada de haber recibido conforme no aceptamos ningún reclamo.'));
    
    $pdf->SetFont("Arial", 'B', 16);
    $pdf->Text($margen_x + 132, $margen_y + 86 + ($h_celda * 35), utf8_decode('TOTAL S/.'));
    
    $pdf->SetFont("Arial", 'B', 16);
    $pdf->Text($margen_x + 170, $margen_y + 86 + ($h_celda * 35), utf8_decode(number_format($encomienda->valor_total, 2, '.', ',')));

    $pdf->ln(30);
    
    // Firmas
    $h_celda = 5;
    $borde_celda = 0;
    
    $pdf->SetFont("Arial", "", 8);
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(40, $h_celda, utf8_decode(''), 'B', 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(40, $h_celda, utf8_decode(''), 'B', 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(37, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    
    $pdf->ln();
    
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(40, $h_celda, utf8_decode('Jhany Tours S.A.C.'), $borde_celda, 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->Cell(40, $h_celda, utf8_decode('Recibi conforme'), $borde_celda, 0, 'C');
    $pdf->Cell(20, $h_celda, utf8_decode(''), $borde_celda, 0, 'C');
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(37, $h_celda, utf8_decode('EMISOR'), $borde_celda, 0, 'C');
    
    $pdf->Output("Reporte_de_Morosos.pdf", "I");
?>