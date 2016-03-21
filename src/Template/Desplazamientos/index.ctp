<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Desplazamiento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="desplazamientos index large-9 medium-8 columns content">
    <h3><?= __('Desplazamientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('origen') ?></th>
                <th><?= $this->Paginator->sort('destino') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($desplazamientos as $desplazamiento): ?>
            <tr>
                <td><?= $this->Number->format($desplazamiento->id) ?></td>
                <td><?= $this->Number->format($desplazamiento->origen) ?></td>
                <td><?= $this->Number->format($desplazamiento->destino) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $desplazamiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $desplazamiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $desplazamiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desplazamiento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
