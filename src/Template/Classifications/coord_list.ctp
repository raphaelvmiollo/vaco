<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <div class="row">
        <div class = "col-md-10">
            <h2>Categorias de ACG</h2>
        </div>
        <div class = "col-md-2">
            <?= $this->Html->Link(__('Adicionar Categoria'), array('controller' => 'Classifications', 'action' => 'coordAdd'), ['class' => 'btn btn-primary', 'style' => 'margin-top:15px']) ?> </li>
        </div>
    </div>
    <div class="users index large-10 medium-9 columns">
        <table cellpadding="0" cellspacing="0" class="table">
            <thead>
                <tr>
                    <!--<th><?= $this->Paginator->sort('idclassification', 'ID') ?></th>-->
                    <th><?= $this->Paginator->sort('classification_name', 'Nome da Categoria') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classifications as $classification): ?>
                    <tr>
                        <!--<td><?= $this->Number->format($classification->idclassification) ?></td>-->
                        <td><?= h($classification->classification_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Editar'), ['action' => 'coordEdit', $classification->idclassification], ['class' => 'btn btn-default']) ?>
                            <?= $this->Form->postLink(__('Deletar'), ['action' => 'coordDelete', $classification->idclassification], ['confirm' => __('Are you sure you want to delete # {0}?', $classification->idclassification), 'class' => 'btn btn-default']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
 </div>

<?php $this->end(); ?>