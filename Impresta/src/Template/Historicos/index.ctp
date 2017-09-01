<div class="historicos index large-9 medium-8 columns content">
    <h3><?= __('Historicos') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="col-xs-1"><?= $this->Paginator->sort('id',"Identificador") ?></th>
                <th scope="col" class="col-xs-1"><?= $this->Paginator->sort('objeto_id') ?></th>
                <th scope="col" class="col-xs-1"><?= $this->Paginator->sort('user_id', "Dono") ?></th>
                <th scope="col" class="col-xs-1"><?= $this->Paginator->sort('data_emprestimo', 'Data do emprestimo') ?></th>
                <th scope="col" class="col-xs-1"><?= $this->Paginator->sort('devolvido', 'Já devolveu ?') ?></th>
                <th scope="col" class="col-xs-1"><?= $this->Paginator->sort('nome', 'Emprestado para: ') ?></th>
                <th scope="col" class="col-xs-1 actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historicos as $historico): ?>
            <tr>
                <td class="text-center"><?= $this->Number->format($historico->id) ?></td>
                <td><?= $historico->has('objeto') ? $this->Html->link($historico->objeto->nome_obj, ['controller' => 'Objetos', 'action' => 'view', $historico->objeto->id]) : '' ?></td>
                <td><?= $historico->has('user') ? $this->Html->link($historico->user->nome, ['controller' => 'Users', 'action' => 'view', $historico->user->id]) : '' ?></td>
                <td><?= h($historico->data_emprestimo) ?></td>
                <td><?= h($historico->devolvido) ? "SIM" : "Ainda emprestado" ?></td>
                <td><?= h($historico->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historico->id)]) ?>
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
