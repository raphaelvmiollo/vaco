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

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuários <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Users' ,'action' => 'administradorlistar']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Users' ,'action' => 'administradoradd']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Atividades <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Activities' ,'action' => 'administradorlistar']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Activities' ,'action' => 'administradoradd']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cursos <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Avaliações <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Classificações <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                    </ul>
                </li>

            </ul>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configurações <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><?= $this->Html->link(__('Alterar a senha'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                    
                </ul>
            </li>
            <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users' ,'action' => 'logout']) ?></li>

        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $activity->idactivity],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activity->idactivity)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Avaliations'), ['controller' => 'Avaliations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Avaliation'), ['controller' => 'Avaliations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="activities form large-10 medium-9 columns">
    <?= $this->Form->create($activity); ?>
    <fieldset>
        <legend><?= __('Edit Activity') ?></legend>
        <?php
            echo $this->Form->input('activity_local');
            echo $this->Form->input('activity_hours');
            echo $this->Form->input('semester');
            echo $this->Form->input('abstract');
            echo $this->Form->input('date');
            echo $this->Form->input('path');
            echo $this->Form->input('users_iduser');
            echo $this->Form->input('classification_id', ['options' => $classifications]);
            echo $this->Form->input('avaliation_id', ['options' => $avaliations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>