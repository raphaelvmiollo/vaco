<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Classification'), ['action' => 'edit', $classification->idclassification]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Classification'), ['action' => 'delete', $classification->idclassification], ['confirm' => __('Are you sure you want to delete # {0}?', $classification->idclassification)]) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="classifications view large-10 medium-9 columns">
    <h2><?= h($classification->idclassification) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Classification Name') ?></h6>
            <p><?= h($classification->classification_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Idclassification') ?></h6>
            <p><?= $this->Number->format($classification->idclassification) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Activities') ?></h4>
    <?php if (!empty($classification->activities)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Idactivity') ?></th>
            <th><?= __('Activity Local') ?></th>
            <th><?= __('Activity Hours') ?></th>
            <th><?= __('Semester') ?></th>
            <th><?= __('Abstract') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Path') ?></th>
            <th><?= __('Users Iduser') ?></th>
            <th><?= __('Classification Id') ?></th>
            <th><?= __('Avaliation Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($classification->activities as $activities): ?>
        <tr>
            <td><?= h($activities->idactivity) ?></td>
            <td><?= h($activities->activity_local) ?></td>
            <td><?= h($activities->activity_hours) ?></td>
            <td><?= h($activities->semester) ?></td>
            <td><?= h($activities->abstract) ?></td>
            <td><?= h($activities->date) ?></td>
            <td><?= h($activities->path) ?></td>
            <td><?= h($activities->users_iduser) ?></td>
            <td><?= h($activities->classification_id) ?></td>
            <td><?= h($activities->avaliation_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->idactivity]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->idactivity]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->idactivity], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->idactivity)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
