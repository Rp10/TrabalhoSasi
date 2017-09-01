<?= $this->Flash->render('error') ?>
<?= $this->Flash->render('success') ?>

<div class="historicos form large-9 medium-8 columns content">
    <?= $this->Form->create($historico) ?>
    <fieldset>
        <legend><?= __('Efetuar emprestimo: ') ?></legend>
        <?php
                echo $this->Form->input('objeto_id', ['options' => $objetos]);

                ?>
        <input class="form-control " id="data_emprestimo"
               name="data_emprestimo" type="date" />
        <?php
                echo $this->Form->input('nome');
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>