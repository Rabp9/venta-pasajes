<?php
    $margen_x = 3;
    $margen_y = 10;
    $borde_celda = 0;
    $h_celda = 3;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    $pdf->AddPage();
    
    $pdf->SetFont("Arial", '', 18);
    $pdf->Text($margen_x + 136, $margen_y + 26, utf8_decode(str_pad($encomienda->nro_doc,  6, '0', STR_PAD_LEFT)));
    
    $pdf->Output("Reporte_de_Morosos.pdf", "I");
?>