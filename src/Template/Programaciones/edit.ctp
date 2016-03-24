<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $programacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $programacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Programaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buses'), ['controller' => 'Buses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bus'), ['controller' => 'Buses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="programaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($programacione) ?>
    <fieldset>
        <legend><?= __('Edit Programacione') ?></legend>
        <?php
            echo $this->Form->input('fechahora_prog', ['empty' => true]);
            echo $this->Form->input('fecha_via', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
