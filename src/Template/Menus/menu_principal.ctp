<?php $TipoUsuario = $this->request->session()->read('Auth.User.type'); ?>
<nav class="band navbar ufsm gradient">    
 <div class="container"> 
     <ul class="nav"> 
         <li><a class="uppercase humanist-font" href="/aluno/index.html"><span class="bold">UFSM</span> | Portal das ACGS</a>
         </li> 
     </ul> 
     <ul class="nav pull-right">
      <li> <div class="btn-group">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
              <i class="icon-user"></i><span class="glyphicon glyphicon-user"></span><?php echo " " . $nome . " " ?><span class="caret"></span> </a>
              <ul class="dropdown-menu" role="menu"> 
               <li><?= $this->Html->link(__('Alterar Senha'), ['controller' => 'Users', 'action' => 'changePass']) ?></li>
                    
                     <li role="menuitem" class="divider">
                     </li> 
                       <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                     </ul> 
                 </div> 
             </li> 
         </ul> 
     </div> 
 </nav>
<!----------------MENU_USUÁRIO---------------->
 <nav class="navbar ">
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

            <!-- Menu do ALUNO -->
            <? if ($TipoUsuario == 1): ?> 
            <ul class="nav navbar-nav">
                <li class="button"> 
                    <?= $this->Html->link(__('Página Inicial'), array('controller' => 'Pages', 'action' => 'index')); ?>
                </li>
                <li class="button-bar">
                    <?= $this->Html->link(__('Enviar ACG'), ['controller' => 'Activities', 'action' => 'alunoAdd']) ?>
                </li>
                <li class="button-bar">
                    <?= $this->Html->link(__('Visualisar ACGs'), ['controller' => 'Activities', 'action' => 'alunoList']) ?>
                </li>
            </ul>
        <? endif; ?>

        <!-- Menu do COLEGIADO -->
<!--            <? if ($TipoUsuario == 2): ?> 
                <ul class="nav navbar-nav">
                    <li class="button"> 
                        <?= $this->Html->link(__('Página Inicial'), array('controller' => 'Pages', 'action' => 'index')); ?>
                    </li>
                    <li class="button-bar">
                        <?= $this->Html->link(__('Avaliar ACGs'), ['controller' => 'Activities', 'action' => 'colList']) ?>
                    </li>
                </ul>
            <? endif; ?>

            <!-- Menu da COORDENAÇÃO  -->
    <!--        <? if ($TipoUsuario == 3): ?> 
                <ul class="nav navbar-nav">
                    <li class="button"> 
                        <?= $this->Html->link(__('Página Inicial'), array('controller' => 'Pages', 'action' => 'index')); ?>
                    </li>
                    <li class="button">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">ACGs<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li> <?= $this->Html->link(__('Listar'), ['controller' => 'Activities', 'action' => 'coordList']) ?></li>
                            <li><?= $this->Html->link(__('Avaliar'), ['controller' => 'Activities', 'action' => 'coordAvalia']) ?></li>
                        </ul>
                    </li>
                    <li class="button-bar">
                        <?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'coordList']) ?>
                    </li>
                    <li class="button-bar">
                        <?= $this->Html->link(__('Categorias de ACG'), ['controller' => 'Classifications', 'action' => 'coordList']) ?>
                    </li>
                </ul>
            <? endif; ?>

            <!-- Menu do ADMINISTRADOR -->
     <!--       <? if ($TipoUsuario == 4): ?> 
                <ul class="nav navbar-nav">
                    <li class="button"> 
                        <?= $this->Html->link(__('Página Inicial'), array('controller' => 'Pages', 'action' => 'index')); ?>
                    </li>
                    <li class="button-bar">
                        <?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'adminList']) ?>
                    </li>
                    <li class="button-bar">
                        <?= $this->Html->link(__('Cursos'), ['controller' => 'Courses', 'action' => 'adminList']) ?>
                    </li>
                </ul>

            <? endif; ?>

               </div><!-- /.container-fluid -->
</nav>
<?php echo $this->fetch('sidebar'); ?>

