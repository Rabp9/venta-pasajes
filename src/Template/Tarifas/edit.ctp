<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tarifa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tarifa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tarifas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tarifas form large-9 medium-8 columns content">
    <?= $this->Form->create($tarifa) ?>
    <fieldset>
        <legend><?= __('Edit Tarifa') ?></legend>
        <?php
            echo $this->Form->input('precio_min');
            echo $this->Form->input('precio_max');
            echo $this->Form->input('tiempo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
