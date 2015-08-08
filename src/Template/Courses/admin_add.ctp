<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="courses form large-10 medium-9 columns">
                <?= $this->Form->create($course); ?>
                <fieldset>
                    <legend><?= __('Adicionar Curso') ?></legend>
                        <?php echo $this->Form->input('course_code', ['class' => 'form-control', 'type' => 'number', 'label' => 'Código:', 'required' => true]);?>
                        <?php echo $this->Form->input('course_name', ['class' => 'form-control', 'type' => 'text', 'label' => 'Nome do curso:', 'required' => true]);?>
                </fieldset>
                <br>
                <?= $this->Html->Link(__('Cancela'), array('controller' => 'Courses', 'action' => 'adminList'), ['class' => 'btn btn-danger']);?>
                <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-sm-5"></div>
    </div>
</div

<?php $this->end(); ?>