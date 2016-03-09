<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $persona->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personas form large-9 medium-8 columns content">
    <?= $this->Form->create($persona) ?>
    <fieldset>
        <legend><?= __('Edit Persona') ?></legend>
        <?php
            echo $this->Form->input('dni');
            echo $this->Form->input('nombres');
            echo $this->Form->input('apellidos');
            echo $this->Form->input('domicilio');
            echo $this->Form->input('fecha_nac', ['empty' => true]);
            echo $this->Form->input('sexo');
            echo $this->Form->input('telefono');
            echo $this->Form->input('cel');
            echo $this->Form->input('correo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
