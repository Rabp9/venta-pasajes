<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ubigeo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ubigeo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ubigeos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Ubigeos'), ['controller' => 'Ubigeos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Ubigeo'), ['controller' => 'Ubigeos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agencias'), ['controller' => 'Agencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agencia'), ['controller' => 'Agencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ubigeos form large-9 medium-8 columns content">
    <?= $this->Form->create($ubigeo) ?>
    <fieldset>
        <legend><?= __('Edit Ubigeo') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentUbigeos, 'empty' => true]);
            echo $this->Form->input('lft');
            echo $this->Form->input('rght');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('categoria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
