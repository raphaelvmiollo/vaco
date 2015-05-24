<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->idactivity]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->idactivity], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->idactivity)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Avaliations'), ['controller' => 'Avaliations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Avaliation'), ['controller' => 'Avaliations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="activities view large-10 medium-9 columns">
    <h2><?= h($activity->idactivity) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Activity Local') ?></h6>
            <p><?= h($activity->activity_local) ?></p>
            <h6 class="subheader"><?= __('Activity Hours') ?></h6>
            <p><?= h($activity->activity_hours) ?></p>
            <h6 class="subheader"><?= __('Semester') ?></h6>
            <p><?= h($activity->semester) ?></p>
            <h6 class="subheader"><?= __('Path') ?></h6>
            <p><?= h($activity->path) ?></p>
            <h6 class="subheader"><?= __('Classification') ?></h6>
            <p><?= $activity->has('classification') ? $this->Html->link($activity->classification->idclassification, ['controller' => 'Classifications', 'action' => 'view', $activity->classification->idclassification]) : '' ?></p>
            <h6 class="subheader"><?= __('Avaliation') ?></h6>
            <p><?= $activity->has('avaliation') ? $this->Html->link($activity->avaliation->idavalation, ['controller' => 'Avaliations', 'action' => 'view', $activity->avaliation->idavalation]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Idactivity') ?></h6>
            <p><?= $this->Number->format($activity->idactivity) ?></p>
            <h6 class="subheader"><?= __('Users Iduser') ?></h6>
            <p><?= $this->Number->format($activity->users_iduser) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($activity->date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Abstract') ?></h6>
            <?= $this->Text->autoParagraph(h($activity->abstract)); ?>

        </div>
    </div>
</div>
