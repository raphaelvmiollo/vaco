<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" ><?php echo $nome?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                </li>
                <li><?= $this->Html->link(__('Listar Atividades'), ['controller' => 'Activities' ,'action' => 'alunolistar']) ?></li>
                <li ><a href="#">Adicionar Atividades</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configurações <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Alterar a senha'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>

                    </ul>
                </li>


                <li> <?= $this->Html->link(__('Sair'), ['controller' => 'Users' ,'action' => 'logout']) ?></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <h2>Alterar senha</h2>
            <hr><br>
            <div class="users form large-10 medium-9 columns">
                <?= $this->Form->create($user); ?>
                <fieldset>

                    <?php
                    echo $this->Form->input('oldpassword' , array('class' => 'form-control','type' => 'password',   'label' => 'Insira senha atual:', 'value' => ''));
                    echo $this->Form->input('password' , array('class' => 'form-control', 'label' => 'Insira a nova senha:', 'value' => ''));
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
