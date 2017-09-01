<?= $this->Flash->render('error') ?>
        <?= $this->Flash->render('success') ?>

<div class="historicos form large-9 medium-8 columns content">
    <?= $this->Form->create($historico) ?>
    <fieldset>
        <legend><?= __('Edit Historico') ?></legend>
        <?php
                echo $this->Form->input('objeto_id', ['options' => $objetos]);
                echo $this->Form->input('user_id', ['options' => $users]);
                ?>
        <input class="form-control " id="data_emprestimo" placeholder="MM/DD/YYYY"
               name="data_emprestimo" type="date" />
        <?php
                echo $this->Form->input('devolvido',['label'=> "Objeto foi devolvido"]);
                echo $this->Form->input('nome');
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
