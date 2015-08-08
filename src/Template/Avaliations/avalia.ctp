<?php
$this->extend('/Menus/menu_principal');
$this->start('sidebar');

$verify = $this->statusOfAcg($avaliation->situation);
?>
<div class="container">
    <div class="row">
        <div class = "col-md-10">
            <h2>Atividade de Complementar de Graduação</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="actions columns large-1 medium-3">
                    <?= $this->Form->create($avaliation); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li><h4 class="subheader"><?= __('Data de submissão:') ?></h4></li>
                                <li class="list-group-item"><?= h(date_format($avaliation->activity->submition_date, 'd/m/Y')) ?></li>
                                <li><h4 class="subheader"><?= __('Situação:') ?></h4></li>
                                <li class="<?= "list-group-item list-group-item-" . $verify['classe'] ?>">
                                    <strong><?= h($verify['situacao']) ?></strong>
                                </li>
                                <li><h4 class="subheader"><?= __('Usuário:') ?></h4></li>
                                <li class="list-group-item"><?= h($user[$avaliation->activity->user_id]) ?></li>
                                <li><h4 class="subheader"><?= __('Categoria:') ?></h4></li>
                                <li class="list-group-item"><?= h($class[$avaliation->activity->classification_id]) ?></li>
                                <li><h4 class="subheader"><?= __('Local:') ?></h4></li>
                                <li class="list-group-item"><?= h($avaliation->activity->activity_local) ?></li>                            
                                <li><h4 class="subheader"><?= __('Semestre da Atividade:') ?></h4></li>
                                <li class="list-group-item"><?= h($avaliation->activity->semester) ?></li>
                                <li><h4 class="subheader"><?= __('Data:') ?></h4></li>
                                <li class="list-group-item"><?= h(date_format($avaliation->activity->date, 'd/m/Y')) ?></li>
                                <li><h4 class="subheader"><?= __('Horas Solicitadas:'); ?></h4></li>
                                <li class="list-group-item"><?= h($avaliation->activity->activity_hours) ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <ul class="list-group">
                                    <li><h4 class="subheader"><?= __('Resumo:') ?></h4></li>
                                    <li class="list-group-item"><?= h($avaliation->activity->abstract) ?></li>
                                    <li><h4 class="subheader"><?= __('Arquivo:') ?></h4></li>
                                    <li class="list-group-item"><?= h($avaliation->activity->path) ?></li>  
                                    </br></br>
                                    <li class="list-group-item"><?= $this->Form->input('activity_hours', ['class' => 'form-control', 'type' => 'number', 'label' => 'Horas Totais:', 'value'=> $avaliation->activity->activity_hours, 'required' => true]) ?> </li>
                                    <li class="list-group-item"><h4 class="subheader"><strong><?= __('Observação:'); ?></strong></h4></li>
                                    <li class="list-group-item"><?= $this->Form->textarea('observation', ['class' => 'form-control', 'type' => 'text', 'required' => true]) . '<br>'; ?></li>
                                    <li class="list-group-item col-md-12">
                                        <div class="btn-group col-md-12" data-toggle="buttons">
                                            <label class="btn btn-success col-md-6">
                                                <input type="radio" name="situation" value="1" required="required"><strong>Deferir</strong>
                                            </label>
                                            <label class="btn btn-danger col-md-6">
                                                <input type="radio" name="situation" value="3"><strong>Indeferir</strong>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </fieldset>
                            <br>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary col-md-12']); ?>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <?= $this->Html->Link(__('Cancelar'), array('controller' => 'Activities', 'action' => 'activityList'), ['class' => 'btn btn-default col-md-12']); ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->end(); ?>