<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conductore'), ['action' => 'edit', $conductore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conductore'), ['action' => 'delete', $conductore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conductore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conductores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conductore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conductores view large-9 medium-8 columns content">
    <h3><?= h($conductore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Persona') ?></th>
            <td><?= $conductore->has('persona') ? $this->Html->link($conductore->persona->id, ['controller' => 'Personas', 'action' => 'view', $conductore->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Licencia') ?></th>
            <td><?= h($conductore->licencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= h($conductore->categoria) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $conductore->has('estado') ? $this->Html->link($conductore->estado->descripcion, ['controller' => 'Estados', 'action' => 'view', $conductore->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($conductore->id) ?></td>
        </tr>
    </table>
</div>
