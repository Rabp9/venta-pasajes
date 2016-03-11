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
            $nuevo_ubigeo["parent_id"] = $row["cod_dpto"];
        } else {
            $nuevo_ubigeo["categoria"] = "Distrito";
            $nuevo_ubigeo["parent_id"] = $row["cod_prov"];
        }
        $nuevo_ubigeo["descripcion"] = $row["descripcion"];
        
        var_dump($nuevo_ubigeo);
    }
}