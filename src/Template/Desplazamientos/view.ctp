<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Desplazamiento'), ['action' => 'edit', $desplazamiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Desplazamiento'), ['action' => 'delete', $desplazamiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desplazamiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Desplazamientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Desplazamiento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="desplazamientos view large-9 medium-8 columns content">
    <h3><?= h($desplazamiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($desplazamiento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Origen') ?></th>
            <td><?= $this->Number->format($desplazamiento->origen) ?></td>
        </tr>
        <tr>
            <th><?= __('Destino') ?></th>
            <td><?= $this->Number->format($desplazamiento->destino) ?></td>
        </tr>
    </table>
</div>
