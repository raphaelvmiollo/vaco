<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->idcourse]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->idcourse], ['confirm' => __('Are you sure you want to delete # {0}?', $course->idcourse)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="courses view large-10 medium-9 columns">
    <h2><?= h($course->idcourse) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Course Name') ?></h6>
            <p><?= h($course->course_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Idcourse') ?></h6>
            <p><?= $this->Number->format($course->idcourse) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($course->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Iduser') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Login') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('Course Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($course->users as $users): ?>
        <tr>
            <td><?= h($users->iduser) ?></td>
            <td><?= h($users->name) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->login) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->type) ?></td>
            <td><?= h($users->course_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->iduser]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->iduser]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->iduser], ['confirm' => __('Are you sure you want to delete # {0}?', $users->iduser)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
