<?php
    $margen_x = 3;
    $margen_y = 11;
    $borde_celda = 0;
    $h_celda = 3;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
    
    $pdf->SetFont("Arial", '', 16);
    $pdf->Text($margen_x + 15, $margen_y + 20, utf8_decode(str_pad($pasaje->nro_doc, 6, '0', STR_PAD_LEFT)));

    // Razon Social
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 17, $margen_y + 27, utf8_decode(@$pasaje->cliente->razonsocial));
    
    // RUC
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 99, $margen_y + 27, utf8_decode(@$pasaje->cliente->ruc));
    
    // Pasajero
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 10, $margen_y + 35, utf8_decode($pasaje->persona->full_name));
    
    // DNI
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 106, $margen_y + 35, utf8_decode($pasaje->persona->dni));
    
    // Fecha de Viaje
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 17, $margen_y + 42, utf8_decode((new \Cake\I18n\Time($pasaje->programacion->fechahora_prog))->format('Y-m-d')));
    
    // Hora de Viaje
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 69, $margen_y + 42, utf8_decode((new \Cake\I18n\Time($pasaje->programacion->fechahora_prog))->format('H:i:s')));
    
    // Asientos
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 104, $margen_y + 42, utf8_decode($pasaje->bus_asiento->nro_asiento));
    
    // Valor
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + -2, $margen_y + 54, utf8_decode(number_format($pasaje->valor, 2, '.', ',')));
    
    // Origen
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 8, $margen_y + 57, utf8_decode($pasaje->detalle_desplazamiento->desplazamiento->AgenciaOrigen->ubigeo->descripcion));
    
    // Destino
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 55, $margen_y + 57, utf8_decode($pasaje->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion));

    // Lugar de emisión
//    $pdf->SetFont("Arial", '', 8);
//    $pdf->Text($margen_x + 55, $margen_y + 58, utf8_decode('dsadsa'/*$pasaje->detalle_desplazamiento->desplazamiento->AgenciaDestino->id*/));

    // Fecha de Emisión
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 114, $margen_y + 62, utf8_decode($pasaje->fechahora->year));
    $pdf->Text($margen_x + 124, $margen_y + 62, utf8_decode($meses[$pasaje->fechahora->month - 1]));
    $pdf->Text($margen_x + 134, $margen_y + 62, utf8_decode(str_pad($pasaje->fechahora->day, 2, '0')));

    // Control
    // Número de Boleto
    $pdf->SetFont("Arial", '', 14);
    $pdf->Text($margen_x + 164, $margen_y + 24, utf8_decode(str_pad($pasaje->nro_doc, 6, '0', STR_PAD_LEFT)));
    
    // Fecha de Viaje
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 149, $margen_y + 37, utf8_decode((new \Cake\I18n\Time($pasaje->programacion->fechahora_prog))->year));
    $pdf->Text($margen_x + 163, $margen_y + 37, utf8_decode($meses[(new \Cake\I18n\Time($pasaje->programacion->fechahora_prog))->month - 1]));
    $pdf->Text($margen_x + 175, $margen_y + 37, utf8_decode(str_pad((new \Cake\I18n\Time($pasaje->programacion->fechahora_prog))->day, 2, 0)));
    
    // Asiento
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 154, $margen_y + 49, utf8_decode($pasaje->bus_asiento->nro_asiento));
   
    // Hora
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 169, $margen_y + 49, utf8_decode((new \Cake\I18n\Time($pasaje->programacion->fechahora_prog))->format('H:i:s')));
    
    // Destino
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 152, $margen_y + 57, utf8_decode($pasaje->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion));
    
    // Valor
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 152, $margen_y + 64, utf8_decode(number_format($pasaje->valor, 2, '.', ',')));
    
    $pdf->Output("Boleto_de_Viaje.pdf", "I");
?>