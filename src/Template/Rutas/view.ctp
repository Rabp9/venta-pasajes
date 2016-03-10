<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ruta'), ['action' => 'edit', $ruta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ruta'), ['action' => 'delete', $ruta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ruta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rutas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ruta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rutas view large-9 medium-8 columns content">
    <h3><?= h($ruta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $ruta->has('estado') ? $this->Html->link($ruta->estado->descripcion, ['controller' => 'Estados', 'action' => 'view', $ruta->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ruta->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($ruta->descripcion)); ?>
    </div>
</div>
