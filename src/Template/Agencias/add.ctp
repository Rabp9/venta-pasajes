<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Agencias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ubigeos'), ['controller' => 'Ubigeos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ubigeo'), ['controller' => 'Ubigeos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="agencias form large-9 medium-8 columns content">
    <?= $this->Form->create($agencia) ?>
    <fieldset>
        <legend><?= __('Add Agencia') ?></legend>
        <?php
            echo $this->Form->input('direccion');
            echo $this->Form->input('telefono');
            echo $this->Form->input('celular');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
