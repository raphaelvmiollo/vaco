<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Avaliation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="avaliations index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('idavalation') ?></th>
            <th><?= $this->Paginator->sort('situation') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($avaliations as $avaliation): ?>
        <tr>
            <td><?= $this->Number->format($avaliation->idavalation) ?></td>
            <td><?= $this->Number->format($avaliation->situation) ?></td>
            <td><?= h($avaliation->date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $avaliation->idavalation]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $avaliation->idavalation]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $avaliation->idavalation], ['confirm' => __('Are you sure you want to delete # {0}?', $avaliation->idavalation)]) ?>
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
