<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>

<div class="container">
    <h2>Editar Categoria</h2><br>
    <div class="row">
        <div class="col-sm-5">
            <div class="users form large-10 medium-9 columns">
                <?= $this->Form->create($classification); ?>
                <fieldset>
                    <?php echo $this->Form->input('classification_name', ['class' => 'form-control', 'type' => 'text', 'label' => 'Categoria de ACG:']) ?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-sm-5">
        </div>
    </div>
</div>

<?php $this->end(); ?>