<?php $this->extend('/Menus/menu_principal'); 
$this->start('sidebar');?>

<div class="courses form large-10 medium-9 columns">
    <?= $this->Form->create($course); ?>
    <fieldset>
        <legend><?= __('Adicionar Curso') ?></legend>
        <?php
            echo $this->Form->input('Nome do curso: ');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
<?php $this->end(); ?>