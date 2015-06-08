<?php $this->extend('/Menus/menu_principal'); 
$this->start('sidebar');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="users form large-10 medium-9 columns">
                    <h2>Adicionar Usuário</h2>
                    <?= $this->request->session()->read('User.course_id') ?>
                    <br>
                    <?= $this->Form->create($user); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('name', array('class' => 'form-control', 'type' => 'text', 'label' => 'Nome:', 'value'  => '', 'required' => true)). "<br>";
                        echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'email', 'label' => 'Email:', 'value'  => '', 'required' => true)). "<br>";
                        echo $this->Form->input('login', array('class' => 'form-control', 'type' => 'text', 'label' => 'Login:', 'value'  => '', 'required' => true)). "<br>";
                        echo $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'label' => 'Senha:', 'value'  => '', 'required' => true)). "<br>";   
                        echo '<strong>Tipo: </strong>';
                        echo $this->Form->select('type' ,[1 => 'Aluno', 2 => 'Membro do Colegiado'], ['class' => 'form-control']). "<br>";
                        echo $this->Form->input('course_id', ['type' => 'hidden', 'value' =>  $this->request->session()->read('Auth.User.course_id')]);
                        ?>
                    </fieldset>
                     <?= $this->Html->Link(__('Cancela'), array('controller' => 'Users', 'action' => 'coordList'), ['class' => 'btn btn-danger']);?>
                    <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div
    
<?php $this->end(); ?>