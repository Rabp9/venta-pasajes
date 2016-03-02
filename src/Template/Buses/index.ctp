<!-- src/Template/Buses/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Buses");
?>
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Placa</th>
            <th>Chasis</th>
            <th>Asientos</th>
            <th>Año</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<?= $this->Html->link("Nuevo Bus", ["controller" => "buses", "action" => "add"], ["class" => "btn btn-primary"]) ?>