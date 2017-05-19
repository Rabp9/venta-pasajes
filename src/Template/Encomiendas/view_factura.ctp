<?php
    $margen_x = 3;
    $margen_y = 11;
    $borde_celda = 0;
    $h_celda = 3;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetTitle('Factura');
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
    
    $pdf->SetFont("Arial", '', 18);
    $pdf->Text($margen_x + 165, $margen_y + 29, utf8_decode(str_pad($encomienda->nro_doc,  6, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 35, utf8_decode($encomienda->personaRemitente->full_name));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 40, utf8_decode($encomienda->cliente->direccion));
    
    $pdf->SetFont("Arial", '', 8);
    $pdf->Text($margen_x + 22, $margen_y + 45, utf8_decode($encomienda->cliente->ruc));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 155, $margen_y + 40, utf8_decode(str_pad($encomienda->fechahora->day,  2, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 163, $margen_y + 40, utf8_decode($meses[$encomienda->fechahora->month - 1]));
    
    $pdf->SetFont("Arial", '', 13);
    $pdf->Text($margen_x + 178, $margen_y + 40, utf8_decode($encomienda->fechahora->year));
    
    $pdf->SetFont("Arial", "", 10);
    $i = 0;
    foreach ($encomienda->encomiendas_tipos as $encomienda_tipo) {
        $descripcion = $encomienda_tipo->tipo_producto->descripcion . ' - '
            . $encomienda_tipo->detalle;
        $importe = $encomienda_tipo->cantidad * $encomienda_tipo->valor;
        
        $pdf->Text($margen_x + 7, $margen_y + 58 + ($i * 5), utf8_decode($encomienda_tipo->cantidad));
        $pdf->Text($margen_x + 20, $margen_y + 58 + ($i * 5), utf8_decode($descripcion));
        $pdf->Text($margen_x + 180, $margen_y + 58 + ($i * 5), utf8_decode(number_format($importe, 2, '.', ',')));

        $pdf->ln();
        $i++;
    }
    
    $pdf->SetFont("Arial", '', 17);
    $pdf->Text($margen_x + 180, $margen_y + 112, utf8_decode(number_format($encomienda->valor_neto, 2, '.', ',')));
    
    $pdf->SetFont("Arial", '', 17);
    $pdf->Text($margen_x + 180, $margen_y + 119, utf8_decode(number_format($encomienda->igv, 2, '.', ',')));
    
    $pdf->SetFont("Arial", 'B', 17);
    $pdf->Text($margen_x + 180, $margen_y + 125, utf8_decode(number_format($encomienda->valor_total, 2, '.', ',')));
    
    $pdf->SetFont("Arial", '', 10);
    $pdf->Text($margen_x + 48, $margen_y + 125, utf8_decode(str_pad($encomienda->fechahora->day,  2, '0', STR_PAD_LEFT)));
    
    $pdf->SetFont("Arial", '', 10);
    $pdf->Text($margen_x + 60, $margen_y + 125, utf8_decode($meses[$encomienda->fechahora->month - 1]));
    
    $pdf->SetFont("Arial", '', 10);
    $pdf->Text($margen_x + 73, $margen_y + 125, utf8_decode($encomienda->fechahora->year));
    
    $pdf->Text(170, 10, utf8_decode(strtoupper($encomienda->condicion)));
    
    $pdf->Output("Factura.pdf", "I");
?>