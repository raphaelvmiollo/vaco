<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
     
        <li>    <?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout']) ?> </li>
    </ul>
</div>
<div class="activities index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('idactivity') ?></th>
            <th><?= $this->Paginator->sort('activity_local') ?></th>
            <th><?= $this->Paginator->sort('activity_hours') ?></th>
            <th><?= $this->Paginator->sort('semester') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('path') ?></th>
            <th><?= $this->Paginator->sort('users_iduser') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($activities as $activity): ?>
        <tr>
            <td><?= $this->Number->format($activity->idactivity) ?></td>
            <td><?= h($activity->activity_local) ?></td>
            <td><?= h($activity->activity_hours) ?></td>
            <td><?= h($activity->semester) ?></td>
            <td><?= h($activity->date) ?></td>
            <td><?= h($activity->path) ?></td>
            <td><?= $this->Number->format($activity->users_iduser) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $activity->idactivity]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->idactivity]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->idactivity], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->idactivity)]) ?>
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
