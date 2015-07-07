<?php
$this->extend('/Menus/menu_principal');
$this->start('sidebar');

$verify = $this->statusOfAcg($activity->avaliation->situation);
?>
<div class="container">
    <div class="row">
        <div class = "col-md-10">
            <h2><span class="<?= "label label-" . $verify['classe'] ?>">Atividade de Complementar de Graduação</span></h2>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-10">
            <div class="col-md-6">
                <ul class="list-group">
                    <li><h4 class="subheader"><?= __('Categoria:') ?></h4></li>
                    <li class="list-group-item"><?= h($activity->classification->classification_name) ?></li>
                    <li><h4 class="subheader"><?= __('Situação:') ?></h4></li>                
                    <li class="<?= "list-group-item list-group-item-" . $verify['classe'] ?>">
                        <strong><?= h($verify['situacao']) ?></strong></li>
                    <li><h4 class="subheader"><?= __('Local:') ?></h4></li>  
                    <li class="list-group-item"><?= h($activity->activity_local) ?></li>
                    <li><h4 class="subheader"><?= __('Horas Totais:') ?></h4></li>
                    <li class="list-group-item"><strong><?= h($activity->activity_hours) ?></strong></li>
                    <li><h4 class="subheader"><?= __('Semestre da Atividade:') ?></h4></li>
                    <li class="list-group-item"><?= h($activity->semester) ?></li>
                    <li><h4 class="subheader"><?= __('Data:') ?></h4></li>
                    <li class="list-group-item"><?= h(date_format($activity->date, 'd/m/Y')) ?></li>
                    <li><h4 class="subheader"><?= __('Resumo:') ?></h4></li>
                    <li class="list-group-item"><?= h($activity->abstract) ?></li>
                    <li><h4 class="subheader"><?= __('Data de submissão:') ?></h4></li>
                    <li class="list-group-item"><?= (date_format($activity->submition_date, 'd/m/Y')) ?></li> 
                </ul>
                <?= $this->Html->Link(__('Voltar'), ['controller' => 'Activities', 'action' => 'AlunoList'], ['class' => 'btn btn-primary']); ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'Delete', $activity->idactivity], ['confirm' => __('Você tem certeza que quer deletar esta atividade?'), 'class' => 'btn btn-danger', (($activity->avaliation->situation === 0 || $activity->avaliation->situation === -1) ? '' : 'disabled="disabled')]) ?>
            </div>
            <div class="col-md-6">
                <?php if($activity->avaliation->situation == 2 || $activity->avaliation->situation == 3): ?>
                <ul class="list-group">
                    <li><h4 class="subheader"><?= __('Data de avaliação:') ?></h4></li>
                    <li class="list-group-item"><?= (date_format($activity->avaliation->date, 'd/m/Y')) ?></li> 
                    <li><h4 class="subheader"><?= __('Observação do colegiado:'); ?></h4></li>
                    <li class="list-group-item"><?= h($activity->avaliation->observation) ?></li>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php $this->end(); ?>