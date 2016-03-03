<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Buses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buses form large-9 medium-8 columns content">
    <?= $this->Form->create($bus) ?>
    <fieldset>
        <legend><?= __('Edit Bus') ?></legend>
        <?php
            echo $this->Form->input('placa');
            echo $this->Form->input('chasis');
            echo $this->Form->input('asientos');
            echo $this->Form->input('año');
            echo $this->Form->input('motor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
