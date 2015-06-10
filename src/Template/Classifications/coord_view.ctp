<?php
$this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>

<div class="container">
    <div class="row">
        <div class = "col-md-10">
            <h2><span class="label label-primary"><?= h($classification->classification_name) ?></span></h2>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-5">
            <ul class="list-group">
                <h4 class="subheader"><?= __('Nome da Categoria:') ?></h4>
                 <li class="list-group-item"><?= h($classification->classification_name)?></li>

                <h4 class="subheader"><?= __('Avaliador:') ?></h4>
                 <li class="list-group-item"><?= h($this->typeOfUser($this->Number->format($classification->avaliator_type)))?></li>

                <h4 class="subheader"><?= __('Descrição:') ?></h4>
                 <li class="list-group-item"> <?= $this->Text->autoParagraph(h($classification->description))?></li>

                <h4 class="subheader"><?= __('Máximo de horas:') ?></h4>
                 <li class="list-group-item"><?= h($classification->max_hours)?></li>
            </ul>
            <?= $this->Html->Link(__('Voltar'), ['controller' => 'Classifications', 'action' => 'coordList'], ['class' => 'btn btn-primary']);?>
            <?= $this->Html->link(__('Editar'), ['action' => 'coordEdit', $classification->idclassification], ['class' => 'btn btn-primary']) ?>
        </div>
        
    </div>
</div>

<?php $this->end(); ?>