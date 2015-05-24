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
                        <li><?= $this->Html->link(__('Listar'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                        <li><?= $this->Html->link(__('Inserir'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
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
<h2>Usuários</h2>


<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0" class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Id') ?></th>
            <th><?= $this->Paginator->sort('Nome') ?></th>
            <th><?= $this->Paginator->sort('e-mail') ?></th>
            <th><?= $this->Paginator->sort('login') ?></th>
       <!-- <th><?= $this->Paginator->sort('Senha') ?></th> -->
            <th><?= $this->Paginator->sort('Tipo') ?></th>
            <th><?= $this->Paginator->sort('ID Curso') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <?php if (($this->Number->format($user->type)) == 2):?>
            <tr>
                <td><?= $this->Number->format($user->iduser) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->login) ?></td>
           <!-- <td><?= h($user->password) ?></td>  -->
                <td><?= $this->Number->format($user->type) ?></td>
                <td>
                    <?= $user->has('course') ? $this->Html->link($user->course->idcourse, ['controller' => 'Courses', 'action' => 'view', $user->course->idcourse]) : '' ?>
                </td>
                <td class="actions">

                    <?= $this->Html->link(__('Editar'), ['action' => 'alunoedit', $user->iduser]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'administradordelete', $user->iduser], ['confirm' => __('Você tem certeza que quer deletar # {0}?', $user->iduser)]) ?>
                </td>
            </tr>
        <?php endif;?>
    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>