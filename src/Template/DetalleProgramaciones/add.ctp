<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Detalle Programaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rutas'), ['controller' => 'Rutas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ruta'), ['controller' => 'Rutas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programaciones'), ['controller' => 'Programaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Programacione'), ['controller' => 'Programaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleProgramaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($detalleProgramacione) ?>
    <fieldset>
        <legend><?= __('Add Detalle Programacione') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
