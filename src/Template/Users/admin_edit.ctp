<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <h2>Editar usuário</h2><br>
    <div class="row">
        <div class="col-sm-5">
            <div class="users form large-10 medium-9 columns">
                    <?= $this->Form->create($user); ?>
                <fieldset>
                    <?php
                    asort($courses);
                    echo $this->Form->input('name',  ['class' => 'form-control', 'type' => 'text', 'label' => 'Nome:', 'required' => true]). "<br>";
                    echo $this->Form->input('login',  ['class' => 'form-control', 'type' => 'text', 'label' => 'Login:', 'required' => true]). "<br>";
                    echo $this->Form->input('email',  ['class' => 'form-control', 'type' => 'text', 'label' => 'Email:', 'required' => true]). "<br>";
                    echo '<strong>Tipo: </strong>';
                    echo $this->Form->select('type' ,[3 => 'Coordenação', 4 => 'Administrador'], ['class' => 'form-control', 'required' => true]). "<br>";
                    echo '<strong>Curso: </strong>';
                    echo $this->Form->select('course_id', $courses, ['class' => 'form-control', 'required' => true]). "<br>";
                    ?>
                </fieldset>
                 <?= $this->Html->Link(__('Cancela'), array('controller' => 'Users', 'action' => 'adminList'), ['class' => 'btn btn-danger']);?>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="col-sm-5">
        </div>
    </div>
</div>
<?php $this->end(); ?>