<?php
$TipoUsuario = $this->request->session()->read('Auth.User.type');
?>
<!-- Menu para o Aluno -->
<?php if($TipoUsuario == 1): ?> 


<?php endif; ?>

<!-- Menu para o Colegiado -->
<?php if($TipoUsuario == 2): ?> 


<?php endif; ?>
<!-- Menu para a Coordenação -->
<?php if($TipoUsuario == 3): ?> 


<?php endif; ?>

<!-- Menu para o Administrador -->
<?php if($TipoUsuario == 4): ?> 
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
                <a class="navbar-brand"><?php echo $nome ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">           

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuários <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= $this->Html->link(__('Listar'), ['controller' => 'Users', 'action' => 'administradorList']) ?></li>
                            <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Users', 'action' => 'administradorAdd']) ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cursos <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= $this->Html->link(__('Listar'), ['controller' => 'Courses', 'action' => 'administradorList']) ?></li>
                            <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Courses', 'action' => 'administradorAdd']) ?></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configurações <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= $this->Html->link(__('Alterar Senha'), ['controller' => 'Users', 'action' => 'alterPass']) ?></li>

                        </ul>
                    </li>
                    <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout']) ?></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<?php endif; ?>

<?php echo $this->fetch('sidebar'); ?>

