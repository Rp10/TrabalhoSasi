<div class="objetos index large-9 medium-8 columns content table-responsive">
    <?= $this->Flash->render('erro') ?>
    <?= $this->Flash->render('success') ?>
    <h3><?= __('Objetos') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="col-xs-2"><?= $this->Paginator->sort('id',"Identificador") ?></th>
                <th scope="col" class="col-xs-2"><?= $this->Paginator->sort('user_id',"Dono") ?></th>
                <th scope="col" class="col-xs-2"><?= $this->Paginator->sort('nome_obj', "Objeto") ?></th>
                <th scope="col" class="col-xs-2"><?= $this->Paginator->sort('utilidade', "Utilidade") ?></th>
                <th scope="col" class="col-xs-2"><?= $this->Paginator->sort('estado', "Estado de Conservação") ?></th>
                <th scope="col" class="actions col-xs-2"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objetos as $objeto): ?>
            <tr>
                <td><?= $this->Number->format($objeto->id) ?></td>
                <td><?= $objeto->has('user') ? $this->Html->link($objeto->user->nome, ['controller' => 'Users', 'action' => 'view', $objeto->user->id]) : '' ?></td>
                <td><?= $objeto->has('nome_obj') ? $this->Html->link($objeto->nome_obj, ['controller' => 'Objetos', 'action' => 'view', $objeto->id] ): '' ?></td>
                <td><?= h($objeto->utilidade) ?></td>
                <td><?= h($objeto->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $objeto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $objeto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $objeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objeto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator ">
        <ul class="pagination pagination-lg">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
