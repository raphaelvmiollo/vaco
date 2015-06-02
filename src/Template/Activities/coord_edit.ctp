<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <h2>Avaliar Atividade</h2><br>
    <div class="row">
        <div class="col-sm-5">
            <div class="users form large-10 medium-9 columns">
                    <?= $this->Form->create($user); ?>
                <fieldset>
                    <?php
                    echo $this->Form->input('name', ['class' => 'form-control', 'type' => 'text', 'label' => 'Nome:']);                        echo $this->Form->input('email', ['class' => 'form-control', 'type' => 'text', 'label' => 'Email:', 'value'  => '']);
                    echo $this->Form->input('login', ['class' => 'form-control', 'type' => 'text', 'label' => 'Login:']);                        
                    //echo $this->Form->input('password', array('class' => 'form-control'));
                    echo '<strong>Tipo: </strong>';
                    echo $this->Form->select('type' ,[1 => 'Aluno', 2 => 'Membro do Colegiado'], ['class' => 'form-control']); 
                    echo $this->Form->input('course_id', ['type' => 'hidden', 'value' =>  $this->request->session()->read('Auth.User.course_id')]);
                    ?>
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