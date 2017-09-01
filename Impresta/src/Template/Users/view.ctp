<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->nome) ?></h3>
    <table class="vertical-table">

        <tr>
            <th class="col-sm-6" scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th class="col-sm-6" scope="row"><?= __('Password') ?></th>
            <td><?= "*******" ?></td>
        </tr>
        <tr>
            <th class="col-sm-6" scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th class="col-sm-6" scope="row"><?= __('Contato') ?></th>
            <td><?= h($user->contato) ?></td>
        </tr>
        <tr>
            <th class="col-sm-6" scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th class="col-sm-6" scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th class="col-sm-6" scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><strong><?= __('Historico de emprestimos') ?></strong></h4>
        <?php if (!empty($user->historicos)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __("Identificador") ?></th>
                <th scope="col"><?= __("Objeto") ?></th>
                <th scope="col"><?= __('Dono') ?></th>
                <th scope="col"><?= __('Data do emprestomo') ?></th>
                <th scope="col"><?= __('Previsão de Devolução') ?></th>
                <th scope="col"><?= __('Empresetado para:') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($user->historicos as $historicos): ?>
            <tr>
                <td><?= h($historicos->id) ?></td>
                <td><?= h($historicos->objeto_id)?></td>
                <td><?= h($user->nome) ?></td>
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
    <div class="related">
        <h4><strong><?= __('Related Objetos') ?></strong></h4>
        <?php if (!empty($user->objetos)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome Obj') ?></th>
                <th scope="col"><?= __('Utilidade') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->objetos as $objetos): ?>
            <tr>
                <td><?= h($objetos->id) ?></td>
                <td><?= h($objetos->nome_obj) ?></td>
                <td><?= h($objetos->utilidade) ?></td>
                <td><?= h($objetos->estado) ?></td>
                <td><?= h($objetos->descricao) ?></td>
                <td><?= h($objetos->created) ?></td>
                <td><?= h($objetos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Objetos', 'action' => 'view', $objetos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Objetos', 'action' => 'edit', $objetos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Objetos', 'action' => 'delete', $objetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objetos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
