<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

    <div class="container">
        <div class="row">
            <div class = "col-md-10">
                <h2>Atividades Complementares de Graduação</h2>
            </div> 
        </div>
               
        <div class="activities index large-10 medium-9 columns">
             <table cellpadding="0" cellspacing="0" class="table">
                <thead>
                   <tr>
                        <th><?= $this->Paginator->sort('users_iduser', 'Usuário') ?></th>
                        <th><?= $this->Paginator->sort('activity_local', 'Local da Atividade') ?></th>
                        <th><?= $this->Paginator->sort('activity_hours', 'Horas') ?></th>
                        <th><?= $this->Paginator->sort('semester', 'Semestre') ?></th>
                        <th><?= $this->Paginator->sort('date', 'Data') ?></th>
                        <th><?= $this->Paginator->sort('path', 'Arquivo') ?></th>    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activities as $activity): ?>
                        <tr>
                            <td><?= $this->Number->format($activity->users_iduser) ?></td>
                            <td><?= h($activity->activity_local) ?></td>
                            <td><?= h($activity->activity_hours) ?></td>
                            <td><?= h($activity->semester) ?></td>
                            <td><?= h($activity->date) ?></td>
                            <td><?= h($activity->path) ?></td>    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>

<?php $this->end(); ?>