<?php
    $margen_x = 3;
    $margen_y = 11;
    $borde_celda = 0;
    $h_celda = 3;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
    
    $pdf->SetFont("Arial", '', 18);
    $pdf->Text($margen_x + 165, $margen_y + 22, utf8_decode(str_pad($giro->nro_doc,  6, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 29, utf8_decode($giro->personaRemitente->full_name));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 36, utf8_decode($giro->personaDestinatario->full_name));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 16, $margen_y + 43, utf8_decode($giro->desplazamiento->AgenciaOrigen->direccion . ' (' . $giro->desplazamiento->AgenciaOrigen->ubigeo->descripcion . ')'));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 95, $margen_y + 43, utf8_decode($giro->desplazamiento->AgenciaDestino->direccion . ' (' . $giro->desplazamiento->AgenciaDestino->ubigeo->descripcion . ')'));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 162, $margen_y + 38, utf8_decode(str_pad($giro->fecha->day,  2, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 172, $margen_y + 38, utf8_decode($meses[$giro->fecha->month - 1]));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 187, $margen_y + 38, utf8_decode($giro->fecha->year));
    
    $pdf->SetFont("Arial", "", 10);
    $pdf->Text($margen_x + 5, $margen_y + 59, utf8_decode(1));
    $pdf->Text($margen_x + 13, $margen_y + 59, utf8_decode('Giro de S/. '. number_format($giro->detalle, 2, '.', ',')));
    $pdf->Text($margen_x + 177, $margen_y + 59, utf8_decode(number_format($giro->valor_total, 2, '.', ',')));

    $pdf->ln();
    
    $pdf->SetFont("Arial", 'B', 17);
    $pdf->Text($margen_x + 178, $margen_y + 103, utf8_decode(number_format($giro->valor_total, 2, '.', ',')));
    
    $pdf->Output("Boleta_de_Venta.pdf", "I");
?>