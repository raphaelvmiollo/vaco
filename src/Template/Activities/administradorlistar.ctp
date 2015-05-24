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
<div class="activities index large-10 medium-9 columns" >
    <table cellpadding="0" cellspacing="0" class="table">
    <thead >
        <tr>
            <th><?= $this->Paginator->sort('idactivity') ?></th>
            <th><?= $this->Paginator->sort('activity_local') ?></th>
            <th><?= $this->Paginator->sort('activity_hours') ?></th>
            <th><?= $this->Paginator->sort('semester') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
            <th><?= $this->Paginator->sort('path') ?></th>
            <th><?= $this->Paginator->sort('users_iduser') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($activities as $activity): ?>
        <tr>
            <td><?= $this->Number->format($activity->idactivity) ?></td>
            <td><?= h($activity->activity_local) ?></td>
            <td><?= h($activity->activity_hours) ?></td>
            <td><?= h($activity->semester) ?></td>
            <td><?= h($activity->date) ?></td>
            <td><?= h($activity->path) ?></td>
            <td><?= $this->Number->format($activity->users_iduser) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'administradoredit', $activity->idactivity]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->idactivity], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->idactivity)]) ?>
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