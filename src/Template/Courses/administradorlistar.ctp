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
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Courses' ,'action' => 'administradorlistar']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Courses' ,'action' => 'administradoradd']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Avaliações <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Avaliations' ,'Avaliations' => 'administradorlistar']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Avaliations' ,'action' => 'administradoradd']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Classificações <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Classifications' ,'action' => 'administradorlistar']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Classifications' ,'action' => 'administradoradd']) ?></li>
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

<div class="courses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0" class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('idcourse') ?></th>
            <th><?= $this->Paginator->sort('course_name') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($courses as $course): ?>
        <tr>
            <td><?= $this->Number->format($course->idcourse) ?></td>
            <td><?= h($course->course_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'administradoredit', $course->idcourse]) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $course->idcourse], ['confirm' => __('Are you sure you want to delete # {0}?', $course->idcourse)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>