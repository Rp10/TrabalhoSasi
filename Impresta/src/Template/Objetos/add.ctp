<div class="objetos form large-9 medium-8 columns content">
    <?= $this->Form->create($objeto) ?>
    <fieldset>
        <legend><?= __('Adicionar Objeto') ?></legend>
        <?php
            echo $this->Form->input('nome_obj', ['label'=>"Nome do Objeto:"]);
            echo $this->Form->input('utilidade', ['label'=>"Utilidade:"]);
            echo $this->Form->input('estado', ['label'=>"Estado de conservação:"]);
            echo $this->Form->input('descricao', ['label'=>"Descrição:"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
