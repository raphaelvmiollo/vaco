<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Avaliation'), ['action' => 'edit', $avaliation->idavalation]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Avaliation'), ['action' => 'delete', $avaliation->idavalation], ['confirm' => __('Are you sure you want to delete # {0}?', $avaliation->idavalation)]) ?> </li>
        <li><?= $this->Html->link(__('List Avaliations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Avaliation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="avaliations view large-10 medium-9 columns">
    <h2><?= h($avaliation->idavalation) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Idavalation') ?></h6>
            <p><?= $this->Number->format($avaliation->idavalation) ?></p>
            <h6 class="subheader"><?= __('Situation') ?></h6>
            <p><?= $this->Number->format($avaliation->situation) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($avaliation->date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observation') ?></h6>
            <?= $this->Text->autoParagraph(h($avaliation->observation)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Activities') ?></h4>
    <?php if (!empty($avaliation->activities)): ?>
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
        <?php foreach ($avaliation->activities as $activities): ?>
        <tr>
            <td><?= h($activities->idactivity) ?></td>
            <td><?= h($activities->activity_local) ?></td>
            <td><?= h($activities->activity_hours) ?></td>
            <td><?= h($activities->semester) ?></td>
            <td><?= h($activities->abstract) ?></td>
            <td><?= h($activities->date) ?></td>
            <td><?= h($activities->path) ?></td>
            <td><?= h($activities->user_id) ?></td>
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
