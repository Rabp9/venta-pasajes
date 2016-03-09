<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personas view large-9 medium-8 columns content">
    <h3><?= h($persona->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Dni') ?></th>
            <td><?= h($persona->dni) ?></td>
        </tr>
        <tr>
            <th><?= __('Nombres') ?></th>
            <td><?= h($persona->nombres) ?></td>
        </tr>
        <tr>
            <th><?= __('Apellidos') ?></th>
            <td><?= h($persona->apellidos) ?></td>
        </tr>
        <tr>
            <th><?= __('Domicilio') ?></th>
            <td><?= h($persona->domicilio) ?></td>
        </tr>
        <tr>
            <th><?= __('Sexo') ?></th>
            <td><?= h($persona->sexo) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefono') ?></th>
            <td><?= h($persona->telefono) ?></td>
        </tr>
        <tr>
            <th><?= __('Cel') ?></th>
            <td><?= h($persona->cel) ?></td>
        </tr>
        <tr>
            <th><?= __('Correo') ?></th>
            <td><?= h($persona->correo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($persona->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Nac') ?></th>
            <td><?= h($persona->fecha_nac) ?></td>
        </tr>
    </table>
</div>
