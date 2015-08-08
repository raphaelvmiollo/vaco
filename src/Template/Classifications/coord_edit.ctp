<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="users form large-10 medium-9 columns">
                <?= $this->Form->create($classification); ?>
                <fieldset>
                    <legend><?= __('Editar Categoria de ACG') ?></legend>
                    <?php
                    echo $this->Form->input('classification_name', ['class' => 'form-control', 'type' => 'text', 'label' => 'Categoria de ACG:', 'required' => true]). "<br>";
                    echo $this->Form->label('Avaliador:');
                        echo $this->Form->select('avaliator_type', [2 => 'Membro do Colegiado', 3 => 'Coordenação'], ['class' => 'form-control', 'required' => true]). "<br>";
                    echo $this->Form->label('Descrição:');
                        echo $this->Form->textarea('description', ['class' => 'form-control', 'type' => 'text', 'required' => true]). "<br>";
                    echo $this->Form->input('max_hours', ['class' => 'form-control', 'type' => 'number', 'label' => 'Número máximo de horas:', 'required' => true]). "<br>";
                    echo $this->Form->input('course_id', ['type' => 'hidden', 'value' =>  $this->request->session()->read('Auth.User.course_id')]);
                    ?>
                </fieldset>
                 <?= $this->Html->Link(__('Cancela'), array('controller' => 'Classifications', 'action' => 'coordList'), ['class' => 'btn btn-danger']);?>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-sm-5">
        </div>
    </div>
</div>

<?php $this->end(); ?>