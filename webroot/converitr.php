<?php
$link = mysqli_connect("localhost", "root", "");
if (mysqli_select_db($link, "bd_janytours")) {
    $query = "SELECT * FROM ubigeos";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $nulo = 0;
        $nuevo_ubigeo = array();
        if($row["cod_prov"] == $nulo && $row["cod_dist"] == $nulo) {
            $nuevo_ubigeo["categoria"] = "Departamento";
            $nuevo_ubigeo["parent_id"] = null;
        } elseif($row["cod_dist"] == $nulo) {
            $nuevo_ubigeo["categoria"] = "Provincia";
            $nuevo_ubigeo["parent_id"] = found_departamento($row["cod_dpto"], $link);
            // $nuevo_ubigeo["parent_id"] = $row["cod_dpto"];
        } else {
            $nuevo_ubigeo["categoria"] = "Distrito";
            $nuevo_ubigeo["parent_id"] = $row["cod_prov"];
        }
        $nuevo_ubigeo["descripcion"] = $row["descripcion"];
        
        var_dump($nuevo_ubigeo);
    }
}

function found_departamento($cod_dpto, $link) {
    $query = "SELECT * FROM ubigeos WHERE cod_prov = '00' AND cod_dist = '00' AND cod_dpto = '$cod_dpto'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    return $row["id"];
}