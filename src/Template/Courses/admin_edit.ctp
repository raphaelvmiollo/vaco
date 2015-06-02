<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="courses form large-10 medium-9 columns">
                <h2>Editar Curso</h2>
                <br>
                    <?= $this->Form->create($course); ?>
                <fieldset>
                    <?php echo $this->Form->input('course_name', ['class' => 'form-control', 'type' => 'text', 'label' => 'Nome do curso:']);?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-sm-7"></div>
    </div>
</div>
<?php $this->end(); ?>