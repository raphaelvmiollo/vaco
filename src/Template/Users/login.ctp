<div class="band transparent-subband" style="background-color: rgb(240, 242, 241);">
    <div class="container"> 
        <a class="no-link h1 pull-right no-margin-top uppercase humanist-font" href="#">
            <b>UFSM</b> | Portal de ACGs</a>
    </div>
</div>

<div class="row conteudo_fundo" >
    <br>
    <br>
    <div class=" col-sm-6 offset2 img_logo hidden-phone" >
        <?php echo $this->Html->image('UFSM-banner-logo.png', array('width' => '400px', 'alt' => 'LOGO_UFSM')); ?>
    </div>
    <div class="col-sm-3 formulario_login"> 
        <div class="wrapper">
            <?= $this->Form->create() ?>
            <?= $this->Form->input('login', array('class' => 'form-control', 'label' => 'Login: ')); ?>
            <?= $this->Form->input('password', array('class' => 'form-control', 'label' => 'Senha: ')); ?> <br>
            <?= $this->Form->button('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')) ?>
            <?= $this->Form->end() ?>
            <br>
            <?= $this->Flash->render() ?>           

            <?= $this->fetch('content') ?>
        </div>
    </div>

</div>


