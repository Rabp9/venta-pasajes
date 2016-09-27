<?php
    $margen_x = 3;
    $margen_y = 10;
    $borde_celda = 0;
    $h_celda = 5;
    $meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DIC'];
    
    $pdf->setTitle(utf8_decode('Manifiesto de Pasajeros - Programación N° ' . $programacion->id));
    $pdf->SetLeftMargin(6);
    $pdf->SetAutoPageBreak(true, 5);  
    
    for ($i = 0; $i < $programacion->bus->nro_pisos; $i++) {
        
        $pdf->AddPage();
        $pdf->Image("img/logo.png", $margen_x + 75, $margen_y + 10);

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
        $pdf->Cell($w_value * 2 + $w_title, $h_celda, utf8_decode(@$programacion->piloto->conductor->persona->full_name), $borde_celda, 0, 'C');

        $pdf->SetFont("Arial", "B", 10);
        $pdf->Cell($w_title, $h_celda, utf8_decode('BREVETE'), $borde_celda, 0, 'C');
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell($w_value, $h_celda, utf8_decode(@$programacion->piloto->conductor->licencia), $borde_celda, 0, 'C');

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
        $w_title = 19;
        $pdf->SetFont("Arial", "", 6);
        $h_celda = 4;
        for ($j = 0; $j < 36; $j += 4) {
            $pasaje1 = null;
            $pasaje2 = null;
            $pasaje3 = null;
            $pasaje4 = null;
            $nro_doc1 = [];
            $nro_doc2 = [];
            $nro_doc3 = [];
            $nro_doc4 = [];
            $k_1 = 0;
            $k_2 = 0;
            $k_3 = 0;
            $k_4 = 0;
            foreach ($programacion->pasajes as $pasaje) {
                if ($pasaje->bus_asiento->nro_asiento == ($j + 1) && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                    $pasaje1[$k_1] = $pasaje;
                    $nro_doc1[$k_1] = $pasaje->nro_doc;
                    $k_1 += 1;
                }
                if ($pasaje->bus_asiento->nro_asiento == ($j + 2) && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                    $pasaje2[$k_2] = $pasaje;
                    $nro_doc2[$k_2] = $pasaje->nro_doc;
                    $k_2 += 1;
                }
                if ($pasaje->bus_asiento->nro_asiento == ($j + 3) && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                    $pasaje3[$k_3] = $pasaje;
                    $nro_doc3[$k_3] = $pasaje->nro_doc;
                    $k_3 += 1;
                }
                if ($pasaje->bus_asiento->nro_asiento == ($j + 4) && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                    $pasaje4[$k_4] = $pasaje;
                    $nro_doc4[$k_4] = $pasaje->nro_doc;
                    $k_4 += 1;
                }
            }
            // 1° fila
            $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');

            $pdf->Cell(($w_title * 2), $h_celda, '', $borde_celda, 0, 'C');

            $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
            $pdf->ln();

            // 2° fila
            $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje1[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc1)), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje2[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc2)), $borde_celda, 0, 'C');

            $pdf->Cell(($w_title * 2), $h_celda, '', $borde_celda, 0, 'C');

            $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje3[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc3)), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje4[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
            $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc4)), $borde_celda, 0, 'C');
            $pdf->ln();

            // 3° fila
            $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
            $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');

            $pdf->Cell(($w_title * 2), $h_celda, '', $borde_celda, 0, 'C');

            $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
            $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
            $pdf->ln();

            // 4° fila
            $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje1[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
            $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje2[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');

            $pdf->Cell(($w_title * 2), $h_celda, '', $borde_celda, 0, 'C');

            $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje3[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
            $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje4[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
            $pdf->ln();

            // 5° fila
            $tam_dni = 6;
            $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje1[0]->persona->dni), $borde_celda, 0, 'L');
            $pdf->SetFont("Arial", "B", 6);
            $pdf->Cell($tam_dni, $h_celda, utf8_decode($j + 1), $borde_celda, 0, 'C');
            $pdf->SetFont("Arial", "", 6);
            $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje2[0]->persona->dni), $borde_celda, 0, 'L');
            $pdf->SetFont("Arial", "B", 6);
            $pdf->Cell($tam_dni, $h_celda, utf8_decode($j + 2), $borde_celda, 0, 'C');

            $pdf->Cell(($w_title * 2), $h_celda, '', $borde_celda, 0, 'C');
         
            $pdf->SetFont("Arial", "", 6);
            $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje3[0]->persona->dni), $borde_celda, 0, 'L');
            $pdf->SetFont("Arial", "B", 6);
            $pdf->Cell($tam_dni, $h_celda, utf8_decode($j + 3), $borde_celda, 0, 'C');
            $pdf->SetFont("Arial", "", 6);
            $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje4[0]->persona->dni), $borde_celda, 0, 'L');
            $pdf->SetFont("Arial", "B", 6);
            $pdf->Cell($tam_dni, $h_celda, utf8_decode($j + 4), $borde_celda, 0, 'C');
            $pdf->ln();
        }
        $nro_asientos = 0;
        foreach ($programacion->bus->bus_piso as $bus_piso) {
            if($bus_piso->nro_piso == $i) {
                $nro_asientos = $bus_piso->nro_asientos;
                break;
            }
        } 
        if ($nro_asientos < )
        $pasaje1 = null;
        $pasaje2 = null;
        $pasaje3 = null;
        $pasaje4 = null;
        $pasaje5 = null;
        $nro_doc1 = [];
        $nro_doc2 = [];
        $nro_doc3 = [];
        $nro_doc4 = [];
        $nro_doc5 = [];
        $k_1 = 0;
        $k_2 = 0;
        $k_3 = 0;
        $k_4 = 0;
        $k_5 = 0;
        foreach ($programacion->pasajes as $pasaje) {
            if ($pasaje->bus_asiento->nro_asiento == 37 && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                $pasaje1[$k_1] = $pasaje;
                $nro_doc1[$k_1] = $pasaje->nro_doc;
                $k_1 += 1;
            }
            if ($pasaje->bus_asiento->nro_asiento == 38 && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                $pasaje2[$k_2] = $pasaje;
                $nro_doc2[$k_2] = $pasaje->nro_doc;
                $k_2 += 1;
            }
            if ($pasaje->bus_asiento->nro_asiento == 39 && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                $pasaje3[$k_3] = $pasaje;
                $nro_doc3[$k_3] = $pasaje->nro_doc;
                $k_3 += 1;
            }
            if ($pasaje->bus_asiento->nro_asiento == 40 && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                $pasaje4[$k_4] = $pasaje;
                $nro_doc4[$k_4] = $pasaje->nro_doc;
                $k_4 += 1;
            }
            if ($pasaje->bus_asiento->nro_asiento == 41 && $pasaje->bus_asiento->bus_piso->nro_piso == $i) {
                $pasaje5[$k_5] = $pasaje;
                $nro_doc5[$k_5] = $pasaje->nro_doc;
                $k_5 += 1;
            }
        }
        // 1° fila
        $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');

        $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
        
        $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('DESTINO'), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode('N° DE BOLETO'), $borde_celda, 0, 'C');
        $pdf->ln();

        // 2° fila
        $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje1[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc1)), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje2[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc2)), $borde_celda, 0, 'C');

        $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje3[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc3)), $borde_celda, 0, 'C');

        $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje3[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc3)), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(@$pasaje4[0]->detalle_desplazamiento->desplazamiento->AgenciaDestino->ubigeo->descripcion), $borde_celda, 0, 'C');
        $pdf->Cell($w_title, $h_celda, utf8_decode(implode(' - ', $nro_doc4)), $borde_celda, 0, 'C');
        $pdf->ln();

        // 3° fila
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');

        $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');

        $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode('NOMBRE:'), $borde_celda, 0, 'L');
        $pdf->ln();

        // 4° fila
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje3[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje4[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
        
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje3[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');

        $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje3[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
        $pdf->Cell($w_title * 2, $h_celda, utf8_decode(substr(@$pasaje4[0]->persona->full_name, 0, 29)), $borde_celda, 0, 'L');
        $pdf->ln();

        // 5° fila
        $tam_dni = 6;         
        $pdf->SetFont("Arial", "", 6);
        $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje1[0]->persona->dni), $borde_celda, 0, 'L');
        $pdf->SetFont("Arial", "B", 6);
        $pdf->Cell($tam_dni, $h_celda, utf8_decode(37), $borde_celda, 0, 'C');
        $pdf->SetFont("Arial", "", 6);
        $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje2[0]->persona->dni), $borde_celda, 0, 'L');
        $pdf->SetFont("Arial", "B", 6);
        $pdf->Cell($tam_dni, $h_celda, utf8_decode(38), $borde_celda, 0, 'C');
         
        $pdf->SetFont("Arial", "", 6);
        $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje1[0]->persona->dni), $borde_celda, 0, 'L');
        $pdf->SetFont("Arial", "B", 6);
        $pdf->Cell($tam_dni, $h_celda, utf8_decode(39), $borde_celda, 0, 'C');
        
        $pdf->SetFont("Arial", "", 6);
        $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje3[0]->persona->dni), $borde_celda, 0, 'L');
        $pdf->SetFont("Arial", "B", 6);
        $pdf->Cell($tam_dni, $h_celda, utf8_decode(40), $borde_celda, 0, 'C');
        $pdf->SetFont("Arial", "", 6);
        $pdf->Cell(($w_title * 2) - $tam_dni, $h_celda, utf8_decode('DNI: ' . @$pasaje4[0]->persona->dni), $borde_celda, 0, 'L');
        $pdf->SetFont("Arial", "B", 6);
        $pdf->Cell($tam_dni, $h_celda, utf8_decode(41), $borde_celda, 0, 'C');
        $pdf->ln();
    }
    $pdf->Output("Lista_de_Pssajeros.pdf", "I");
?>