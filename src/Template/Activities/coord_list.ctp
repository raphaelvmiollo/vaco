<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <div class="row">
        <div class = "col-md-10">
            <h2>Atividades Complementares de Graduação</h2>
        </div> 
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Pesquisar por</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" role="search" method="POST">
                    Aluno:
                    <div class="form-group">
                        <input type="text" name="userSearch" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="activities index large-10 medium-9 columns">
        <table cellpadding="0" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('submition_date', 'Submissão') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'Usuário') ?></th>
                    <th><?= $this->Paginator->sort('classification_id', 'Categoria') ?></th>
                    <th><?= $this->Paginator->sort('activity_local', 'Local da Atividade') ?></th>
                    <th><?= $this->Paginator->sort('activity_hours', 'Horas') ?></th>
                    <th><?= $this->Paginator->sort('semester', 'Semestre') ?></th>
                    <th><?= $this->Paginator->sort('date', 'Data') ?></th>
                    <th><?= $this->Paginator->sort('path', 'Arquivo') ?></th>
                    <th><?= $this->Paginator->sort('situation', 'Situação') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activities as $activity):
                    $verify = $this->statusOfAcg($activity->avaliation->situation);
                ?>
                    <tr class="<?php echo $verify["classe"]; ?>" >
                        <td><?= h(date_format($activity->submition_date, 'd/m/Y')) ?></td>
                        <td><?= h($activity->user->name) ?></td>
                        <td><?= h($activity->classification->classification_name) ?></td>
                        <td><?= h($activity->activity_local) ?></td>
                        <td><?= h($activity->activity_hours) . ' h' ?></td>
                        <td><?= h($activity->semester) ?></td>
                        <td><?= h(date_format($activity->date, 'd/m/Y')) ?></td>
                        <td><?= h($activity->path) ?></td>
                        <td><strong><?= h($verify["situacao"]) ?></strong></td>
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