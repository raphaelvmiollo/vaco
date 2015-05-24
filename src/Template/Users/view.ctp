<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->iduser]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->iduser], ['confirm' => __('Are you sure you want to delete # {0}?', $user->iduser)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($user->name) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Login') ?></h6>
            <p><?= h($user->login) ?></p>
       <!-- <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p> -->
            <h6 class="subheader"><?= __('Course') ?></h6>
            <p><?= $user->has('course') ? $this->Html->link($user->course->idcourse, ['controller' => 'Courses', 'action' => 'view', $user->course->idcourse]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Iduser') ?></h6>
            <p><?= $this->Number->format($user->iduser) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= $this->Number->format($user->type) ?></p>
        </div>
    </div>
</div>
