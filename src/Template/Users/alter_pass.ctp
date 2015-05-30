<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h2>Alterar Senha</h2>
                <hr><br>
                <div class="users form large-10 medium-9 columns">
                    <?= $this->Form->create($user); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('oldpassword'     , array('class' => 'form-control', 'type' => 'password', 'label' => 'Insira senha atual:', 'value'   => ''));
                        echo $this->Form->input('newpassword'     , array('class' => 'form-control', 'type' => 'password', 'label' => 'Insira a nova senha:', 'value'  => ''));
                        echo $this->Form->input('confirmpassword' , array('class' => 'form-control', 'type' => 'password', 'label' => 'Confirme a nova senha:', 'value'=> ''));
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Alterar')) ?>
                    <?= $this->Form->end() ?>
                    <br>
                    <?= $this->Flash->render() ?>
                </div>
            </div>
            <div class="col-sm-7"></div>
        </div>
    </div>

<?php $this->end(); ?>