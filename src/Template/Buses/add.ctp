<!-- src/Template/Buses/add.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Nuevo Bus");
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <?= $this->Form->create($bus) ?>
        <?php
            echo $this->Form->input('placa');
            echo $this->Form->input('chasis');
            echo $this->Form->input('asientos');
            echo $this->Form->input('anio', ['label' => "Año"]);
            echo $this->Form->input('motor');
            echo $this->Form->input("estado_id", [
                "label" => "Estado",
                "empty" => "Selecciona uno"
            ]);
        
            echo $this->Form->button("Registrar", ["class" => "btn btn-primary"]);
        ?>
        <?= $this->Form->end() ?>
    </div>
</div>