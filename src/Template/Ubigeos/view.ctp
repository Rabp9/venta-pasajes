<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ubigeo'), ['action' => 'edit', $ubigeo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ubigeo'), ['action' => 'delete', $ubigeo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ubigeo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ubigeos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ubigeo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Ubigeos'), ['controller' => 'Ubigeos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Ubigeo'), ['controller' => 'Ubigeos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agencias'), ['controller' => 'Agencias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agencia'), ['controller' => 'Agencias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ubigeos view large-9 medium-8 columns content">
    <h3><?= h($ubigeo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Ubigeo') ?></th>
            <td><?= $ubigeo->has('parent_ubigeo') ? $this->Html->link($ubigeo->parent_ubigeo->id, ['controller' => 'Ubigeos', 'action' => 'view', $ubigeo->parent_ubigeo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= h($ubigeo->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= h($ubigeo->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($ubigeo->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= h($ubigeo->categoria) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ubigeo->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Agencias') ?></h4>
        <?php if (!empty($ubigeo->agencias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ubigeo Id') ?></th>
                <th><?= __('Direccion') ?></th>
                <th><?= __('Telefono') ?></th>
                <th><?= __('Celular') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ubigeo->agencias as $agencias): ?>
            <tr>
                <td><?= h($agencias->id) ?></td>
                <td><?= h($agencias->ubigeo_id) ?></td>
                <td><?= h($agencias->direccion) ?></td>
                <td><?= h($agencias->telefono) ?></td>
                <td><?= h($agencias->celular) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Agencias', 'action' => 'view', $agencias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Agencias', 'action' => 'edit', $agencias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Agencias', 'action' => 'delete', $agencias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agencias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ubigeos') ?></h4>
        <?php if (!empty($ubigeo->child_ubigeos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Categoria') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ubigeo->child_ubigeos as $childUbigeos): ?>
            <tr>
                <td><?= h($childUbigeos->id) ?></td>
                <td><?= h($childUbigeos->parent_id) ?></td>
                <td><?= h($childUbigeos->lft) ?></td>
                <td><?= h($childUbigeos->rght) ?></td>
                <td><?= h($childUbigeos->descripcion) ?></td>
                <td><?= h($childUbigeos->categoria) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ubigeos', 'action' => 'view', $childUbigeos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ubigeos', 'action' => 'edit', $childUbigeos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ubigeos', 'action' => 'delete', $childUbigeos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childUbigeos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
