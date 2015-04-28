<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Classification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="classifications index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('idclassification') ?></th>
            <th><?= $this->Paginator->sort('classification_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($classifications as $classification): ?>
        <tr>
            <td><?= $this->Number->format($classification->idclassification) ?></td>
            <td><?= h($classification->classification_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $classification->idclassification]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $classification->idclassification]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classification->idclassification], ['confirm' => __('Are you sure you want to delete # {0}?', $classification->idclassification)]) ?>
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
