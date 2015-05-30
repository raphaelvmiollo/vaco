<?php $this->extend('/Menus/menu_principal'); 
$this->start('sidebar');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="users form large-10 medium-9 columns">
                    <h2>Adicionar Usuário</h2>
                    <br>
                    <?= $this->Form->create($user); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('name' ,array('class' => 'form-control', 'type' => 'text', 'label' => 'Nome:', 'value'  => ''));
                        echo $this->Form->input('email' ,array('class' => 'form-control', 'type' => 'text', 'label' => 'Email:', 'value'  => ''));
                        echo $this->Form->input('login' ,array('class' => 'form-control', 'type' => 'text', 'label' => 'Login:', 'value'  => ''));
                        echo $this->Form->input('password' ,array('class' => 'form-control', 'type' => 'password', 'label' => 'Senha:', 'value'  => ''));    
                        echo '<strong>Tipo: </strong>';
                        echo $this->Form->select('type' ,[3 => 'Coordenação', 4 => 'Administrador'], ['class' => 'form-control']); 
                        echo '<strong>Curso: </strong>';
                        echo $this->Form->select('course_id', $courses, ['class' => 'form-control']);
                        ?>
                    </fieldset>
                    <br>
                    <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div
    
<?php $this->end(); ?>