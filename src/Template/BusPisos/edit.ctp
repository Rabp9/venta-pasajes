<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $busPiso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $busPiso->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bus Pisos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="busPisos form large-9 medium-8 columns content">
    <?= $this->Form->create($busPiso) ?>
    <fieldset>
        <legend><?= __('Edit Bus Piso') ?></legend>
        <?php
            echo $this->Form->input('imagen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
