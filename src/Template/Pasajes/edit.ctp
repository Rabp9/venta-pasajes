<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pasaje->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pasaje->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pasajes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bus Asientos'), ['controller' => 'BusAsientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bus Asiento'), ['controller' => 'BusAsientos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programaciones'), ['controller' => 'Programaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Programacione'), ['controller' => 'Programaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pasajes form large-9 medium-8 columns content">
    <?= $this->Form->create($pasaje) ?>
    <fieldset>
        <legend><?= __('Edit Pasaje') ?></legend>
        <?php
            echo $this->Form->input('valor');
            echo $this->Form->input('fechahora', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
