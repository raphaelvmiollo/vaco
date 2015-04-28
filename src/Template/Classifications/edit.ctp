<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $classification->idclassification],
                ['confirm' => __('Are you sure you want to delete # {0}?', $classification->idclassification)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="classifications form large-10 medium-9 columns">
    <?= $this->Form->create($classification); ?>
    <fieldset>
        <legend><?= __('Edit Classification') ?></legend>
        <?php
            echo $this->Form->input('classification_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
