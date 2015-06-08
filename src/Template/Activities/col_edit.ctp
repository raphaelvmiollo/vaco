<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $activity->idactivity],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activity->idactivity)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Avaliations'), ['controller' => 'Avaliations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Avaliation'), ['controller' => 'Avaliations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="activities form large-10 medium-9 columns">
    <?= $this->Form->create($activity); ?>
    <fieldset>
        <legend><?= __('Edit Activity') ?></legend>
        <?php
            echo $this->Form->input('activity_local');
            echo $this->Form->input('activity_hours');
            echo $this->Form->input('semester');
            echo $this->Form->input('abstract');
            echo $this->Form->input('date');
            echo $this->Form->input('path');
            echo $this->Form->input('user_id');
            echo $this->Form->input('classification_id', ['options' => $classifications]);
            echo $this->Form->input('avaliation_id', ['options' => $avaliations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
