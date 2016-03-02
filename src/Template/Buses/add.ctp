<!-- src/Template/Buses/add.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Nuevo Bus");
?>
<?= $this->Form->create() ?>
<?php
    echo $this->Form->input('placa');
    echo $this->Form->input('chasis');
    echo $this->Form->input('asientos');
    echo $this->Form->input('asientos');
    echo $this->Form->input('asientos');
?>
<?= $this->Form->end() ?>