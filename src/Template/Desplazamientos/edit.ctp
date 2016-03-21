<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $desplazamiento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $desplazamiento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Desplazamientos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="desplazamientos form large-9 medium-8 columns content">
    <?= $this->Form->create($desplazamiento) ?>
    <fieldset>
        <legend><?= __('Edit Desplazamiento') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
