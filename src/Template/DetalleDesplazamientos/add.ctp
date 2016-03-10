<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Detalle Desplazamientos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rutas'), ['controller' => 'Rutas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ruta'), ['controller' => 'Rutas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programacion Viajes'), ['controller' => 'ProgramacionViajes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Programacion Viaje'), ['controller' => 'ProgramacionViajes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agencias'), ['controller' => 'Agencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agencia'), ['controller' => 'Agencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleDesplazamientos form large-9 medium-8 columns content">
    <?= $this->Form->create($detalleDesplazamiento) ?>
    <fieldset>
        <legend><?= __('Add Detalle Desplazamiento') ?></legend>
        <?php
            echo $this->Form->input('hora_salida', ['empty' => true]);
            echo $this->Form->input('hora_llegada', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
