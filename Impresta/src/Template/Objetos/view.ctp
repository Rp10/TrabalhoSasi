<div class="objetos view large-9 medium-8 columns content">

    <h3><?= h($objeto->nome_obj) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row" class="col-xs-3"><?= __('Dono') ?></th>
            <td><?= $objeto->has('user') ? $this->Html->link($objeto->user->nome, ['controller' => 'Users', 'action' => 'view', $objeto->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row" class="col-xs-3"><?= __('Nome do objeto') ?></th>
            <td><?=$objeto->has('nome_obj') ? $this->Html->link($objeto->nome_obj, ['controller' => 'Objetos', 'action' => 'view', $objeto->id] ): '' ?></td>
        </tr>
        <tr>
            <th scope="row" class="col-xs-3"><?= __('Utilidade') ?></th>
            <td><?= h($objeto->utilidade) ?></td>
        </tr>
        <tr>
            <th scope="row" class="col-xs-3"><?= __('Estado de conservação') ?></th>
            <td><?= h($objeto->estado) ?></td>
        </tr>
        <tr>
            <th scope="row" class="col-xs-3"><?= __('identificador') ?></th>
            <td><?= $this->Number->format($objeto->id) ?></td>
        </tr>
        <tr>
            <th scope="row" class="col-xs-3"><?= __('Data de criação') ?></th>
            <td><?= h($objeto->created) ?></td>
        </tr>
        <tr>
            <th scope="row" class="col-xs-3"><?= __('Ultima modificação') ?></th>
            <td><?= h($objeto->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($objeto->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Historicos de emprestimos') ?></h4>
        <?php if (!empty($objeto->historicos)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Objeto Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Data Emprestimo') ?></th>
                <th scope="col"><?= __('Data Devolucao') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($objeto->historicos as $historicos): ?>
            <tr>
                <td><?= h($historicos->id) ?></td>
                <td><?= h($historicos->created) ?></td>
                <td><?= h($historicos->modified) ?></td>
                <td><?= h($historicos->objeto_id) ?></td>
                <td><?= h($historicos->user_id) ?></td>
                <td><?= h($historicos->data_emprestimo) ?></td>
                <td><?= h($historicos->data_devolucao) ?></td>
                <td><?= h($historicos->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Historicos', 'action' => 'view', $historicos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Historicos', 'action' => 'edit', $historicos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Historicos', 'action' => 'delete', $historicos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historicos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
