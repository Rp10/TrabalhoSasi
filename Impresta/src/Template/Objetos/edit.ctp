<div class="objetos form large-9 medium-8 columns content">
    <?= $this->Form->create($objeto) ?>
    <fieldset>
        <legend><?= __('Editar Objeto') ?></legend>
        <?php
            echo $this->Form->input('nome_obj');
            echo $this->Form->input('utilidade');
            echo $this->Form->input('estado');
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
