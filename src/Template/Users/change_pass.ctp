<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h2>Alterar Senha</h2>
                <br>
                <div class="users form large-10 medium-9 columns">
                    <?= $this->Form->create($user); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'label' => 'Insira senha atual:', 'value'   => '', 'required' => true)) . "<br>";
                        echo $this->Form->input('newPassword1', array('class' => 'form-control', 'type' => 'password', 'label' => 'Insira a nova senha:', 'value'  => '', 'required' => true)) . "<br>";
                        echo $this->Form->input('newPassword2', array('class' => 'form-control', 'type' => 'password', 'label' => 'Confirme a nova senha:', 'value'=> '', 'required' => true)) . "<br>";
                        ?>
                    </fieldset>
                    <br>
                    <?= $this->Html->Link(__('Cancela'), array('controller' => 'Pages', 'action' => 'index'), ['class' => 'btn btn-danger']);?>
                    <?= $this->Form->button(__('Alterar'), ['class' => 'btn btn-primary' , 'type'=>'submit']);?>
                    <?= $this->Form->end() ?>
                    <br>
                    <?= $this->Flash->render() ?>
                </div>
            </div>
            <div class="col-sm-7"></div>
        </div>
    </div>

<?php $this->end(); ?>