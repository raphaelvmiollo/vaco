<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $avaliation->idavalation],
                ['confirm' => __('Are you sure you want to delete # {0}?', $avaliation->idavalation)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Avaliations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="avaliations form large-10 medium-9 columns">
    <?= $this->Form->create($avaliation); ?>
    <fieldset>
        <legend><?= __('Edit Avaliation') ?></legend>
        <?php
            echo $this->Form->input('situation');
            echo $this->Form->input('observation');
            echo $this->Form->input('date', array('empty' => true, 'default' => ''));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
