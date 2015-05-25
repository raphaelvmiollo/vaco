<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>

<div class="container">

    <div class="courses index large-10 medium-9 columns">
        <table cellpadding="0" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID Curso') ?></th>
                    <th><?= $this->Paginator->sort('Nome') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= $this->Number->format($course->idcourse) ?></td>
                        <td><?= h($course->course_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Editar'), ['action' => 'administradoredit', $course->idcourse]) ?>
                            <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $course->idcourse], ['confirm' => __('Are you sure you want to delete # {0}?', $course->idcourse)]) ?>
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
</div>
<?php $this->end(); ?>