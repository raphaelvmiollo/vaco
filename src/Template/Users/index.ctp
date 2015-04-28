<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('iduser') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('login') ?></th>
       <!-- <th><?= $this->Paginator->sort('password') ?></th> -->
            <th><?= $this->Paginator->sort('type') ?></th>
            <th><?= $this->Paginator->sort('course_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->iduser) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->login) ?></td>
       <!-- <td><?= h($user->password) ?></td>  -->
            <td><?= $this->Number->format($user->type) ?></td>
            <td>
                <?= $user->has('course') ? $this->Html->link($user->course->idcourse, ['controller' => 'Courses', 'action' => 'view', $user->course->idcourse]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->iduser]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->iduser]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->iduser], ['confirm' => __('Are you sure you want to delete # {0}?', $user->iduser)]) ?>
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
