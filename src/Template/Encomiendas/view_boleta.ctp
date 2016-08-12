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
    $pdf->Text($margen_x + 165, $margen_y + 22, utf8_decode(str_pad($encomienda->nro_doc,  6, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 29, utf8_decode($encomienda->personaRemitente->full_name));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 36, utf8_decode($encomienda->personaDestinatario->full_name));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 16, $margen_y + 43, utf8_decode($encomienda->desplazamiento->AgenciaOrigen->direccion . ' (' . $encomienda->desplazamiento->AgenciaOrigen->ubigeo->descripcion . ')'));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 95, $margen_y + 43, utf8_decode($encomienda->desplazamiento->AgenciaDestino->direccion . ' (' . $encomienda->desplazamiento->AgenciaDestino->ubigeo->descripcion . ')'));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 162, $margen_y + 38, utf8_decode(str_pad($encomienda->fechahora->day,  2, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 172, $margen_y + 38, utf8_decode($meses[$encomienda->fechahora->month - 1]));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 187, $margen_y + 38, utf8_decode($encomienda->fechahora->year));
    
    $pdf->SetFont("Arial", "", 10);
    $i = 0;
    foreach ($encomienda->encomiendas_tipos as $encomienda_tipo) {
        $descripcion = $encomienda_tipo->tipo_producto->descripcion . ' - '
            . $encomienda_tipo->detalle;
        $importe = $encomienda_tipo->cantidad * $encomienda_tipo->valor;
        
        $pdf->Text($margen_x + 5, $margen_y + 59 + ($i * 4), utf8_decode($encomienda_tipo->cantidad));
        $pdf->Text($margen_x + 13, $margen_y + 59 + ($i * 4), utf8_decode($descripcion));
        $pdf->Text($margen_x + 177, $margen_y + 59 + ($i * 4), utf8_decode(number_format($importe, 2, '.', ',')));

        $pdf->ln();
        $i++;
    }
    
    $pdf->SetFont("Arial", 'B', 17);
    $pdf->Text($margen_x + 178, $margen_y + 103, utf8_decode(number_format($encomienda->valor_total, 2, '.', ',')));
    
    $pdf->Output("Boleta_de_Venta.pdf", "I");
?>