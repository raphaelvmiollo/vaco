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
            echo $this->Form->input('name', array('class' => 'form-control'));
            echo $this->Form->input('email', array('class' => 'form-control'));
            echo $this->Form->input('login', array('class' => 'form-control'));
          //echo $this->Form->input('password', array('class' => 'form-control'));
            echo $this->Form->input('type', array('class' => 'form-control'));
            echo $this->Form->input('course_id', ['options' => $courses], array('class' => 'form-control'));
            ?>
        </fieldset>
        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
    </div>
    <div class="col-sm-5">
    </div>
    </div>
</div>
<?php $this->end(); ?>