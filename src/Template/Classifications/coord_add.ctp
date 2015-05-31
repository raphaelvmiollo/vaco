<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="classifications form large-10 medium-9 columns">
                <?= $this->Form->create($classification); ?>
                <fieldset>
                    <legend><?= __('Adicionar Categoria de ACG') ?></legend>
                    <?php
                    echo $this->Form->input('classification_name', ['class' => 'form-control', 'type' => 'text', 'label' => 'Categoria de ACG:', 'value'  => '']);
                    ?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Adcionar'), ['class' => 'btn btn-primary']) ?>  
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-sm-5"></div>
    </div>
</div>

<?php $this->end(); ?>