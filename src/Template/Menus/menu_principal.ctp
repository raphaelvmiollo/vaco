<?php $TipoUsuario = $this->request->session()->read('Auth.User.type'); ?>
<nav class="band navbar ufsm gradient">    
    <div class="container"> 
        <ul class="nav"> 
            <li>
                <a class="humanist-font" href="http://site.ufsm.br/"><strong>UFSM</strong> &nbsp;|&nbsp;Portal de ACGs</a>
            </li> 
        </ul> 
        <ul class="nav pull-right">
            <li> <div class="btn-group">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
                        <span class="glyphicon glyphicon-cog"></span><?php echo " " . $nome . " " ?><span class="caret"></span> </a>
                    <ul class="dropdown-menu" role="menu"> 
                        <li><a href="/vaco/users/changePass"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Alterar Senha</a><li>      
                        <li><a href="/vaco/users/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Sair</a><li>      
                    </ul> 
                </div> 
            </li> 
        </ul> 
    </div> 
</nav>
<!----------------MENU_USUÁRIO---------------->
<nav class="navbar menuTop">
    <div class="container">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <!-- Menu do ALUNO -->
            <? if ($TipoUsuario == 1): ?> 
                <ul class="nav navbar-nav">
                    <li class="button-bar"> 
                       <a href="/vaco/pages"><span class="glyphicon glyphicon-home"></span>&nbsp;Página Inicial</a>
                    </li>
                    <li class="button-bar">
                        <a href="/vaco/activities/alunoAdd"><span class="glyphicon glyphicon-open-file"></span>&nbsp;Enviar ACG</a>
                    </li>
                    <li class="button-bar">
                        <a href="/vaco/activities/alunoList"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Visualisar ACGs</a>
                    </li>
                </ul>
            <? endif; ?>

            <!-- Menu do COLEGIADO -->
            <? if ($TipoUsuario == 2): ?> 
                <ul class="nav navbar-nav">
                    <li class="button-bar"> 
                       <a href="/vaco/pages"><span class="glyphicon glyphicon-home"></span> Página Inicial</a>
                    </li>
                    <li class="button-bar">
                        <a href="/vaco/activities/activityList"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Avaliar</a>
                    </li>
                </ul>
            <? endif; ?>

            <!-- Menu da COORDENAÇÃO  -->
            <? if ($TipoUsuario == 3): ?> 
                <ul class="nav navbar-nav">
                    <li class="button-bar"> 
                        <a href="/vaco/pages"><span class="glyphicon glyphicon-home"></span> Página Inicial</a>
                    </li>
                    <li class="button-bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;ACGs&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/vaco/activities/coordList"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Listar</a></li>
                            <li><a href="/vaco/activities/activityList"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Avaliar</a></li>
                            <li><a href="/vaco/activities/approveList"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Aprovar</a></li>
                        </ul>
                    </li>
                    <li class="button-bar">
                        <a href="/vaco/users/coordList"><span class="glyphicon glyphicon-user"></span>&nbsp;Usuários</a>
                    </li>
                    <li class="button-bar">
                        <a href="/vaco/classifications/coordList"><span class="glyphicon glyphicon-th-list"></span>&nbsp;Categorias de ACG</a>
                    </li>
                </ul>
            <? endif; ?>

            <!-- Menu do ADMINISTRADOR -->
            <? if ($TipoUsuario == 4): ?> 
                <ul class="nav navbar-nav">
                    <li class="button-bar">
                        <a href="/vaco/pages"><span class="glyphicon glyphicon-home"></span> Página Inicial</a>
                    <!--</li>-->
                    <li class="button-bar">
                        <a href="/vaco/users/adminList"><span class="glyphicon glyphicon-user"></span> Usuários</a>
                    </li>
                    <li class="button-bar">
                        <a href="/vaco/courses/adminList"><span class="glyphicon glyphicon-education"></span> Cursos</a>
                    </li>
                </ul>

            <? endif; ?>

        </div>
</nav>
<?php echo $this->fetch('sidebar'); ?>

