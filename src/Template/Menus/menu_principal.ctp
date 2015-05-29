<?php $TipoUsuario = $this->request->session()->read('Auth.User.type'); ?>

<? if ($TipoUsuario == 1): ?> 

<? endif; ?>

<? if ($TipoUsuario == 2): ?> 

<? endif; ?>

<? if ($TipoUsuario == 3): ?> 

<? endif; ?>

<? if ($TipoUsuario == 4): ?> 
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="button"> 
                            <?= 
                                $this->Html->link(__('Página Inicial'),array('controller' => 'Pages', 'action' => 'index')); ?>
                        </li>
                        <li class="button-bar">
                            <?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'adminList']) ?>
                        </li>
                        <li class="button-bar">
                            <?= $this->Html->link(__('Cursos'), ['controller' => 'Courses', 'action' => 'adminList']) ?>
                        </li>
                    </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo " ". $nome. " " ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= $this->Html->link(__('Alterar Senha'), ['controller' => 'Users', 'action' => 'alterPass']) ?></li>
                            <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<? endif; ?>

<?php echo $this->fetch('sidebar'); ?>

