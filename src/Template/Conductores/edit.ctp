<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conductore->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conductore->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conductores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conductores form large-9 medium-8 columns content">
    <?= $this->Form->create($conductore) ?>
    <fieldset>
        <legend><?= __('Edit Conductore') ?></legend>
        <?php
            echo $this->Form->input('licencia');
            echo $this->Form->input('categoria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
