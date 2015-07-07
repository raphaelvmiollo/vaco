<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar');?>

<div class="container">
    <div class="row">
        <div class = "col-md-10">
            <h2>Usuários</h2>
        </div>
        <div class = "col-md-2">
        <?= $this->Html->Link(__('Adicionar Usuário'), array('controller' => 'Users', 'action' => 'adminAdd'), ['class' => 'btn btn-primary', 'style' => 'margin-top:15px']) ?> </li>
        </div>
        <?= $this->Flash->render() ?>
    </div>
    <div class="users index large-10 medium-9 columns">
        <?= $this->Flash->render() ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('login', 'Login') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>      
                <!--<th><?= $this->Paginator->sort('password') ?></th>-->
                    <th><?= $this->Paginator->sort('type', 'Tipo') ?></th>
                    <th><?= $this->Paginator->sort('course_id', 'Curso') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($users as $user): ?>
                         <tr>
                            <td><?= h($user->login) ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->email) ?></td>
                       <!-- <td><?= h($user->password) ?></td>  -->
                            <td><?= $this->typeOfUser($this->Number->format($user->type)) ?></td>
                            <td>
                            <?= $user->course->course_code. " - " . $user->course->course_name  ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('Editar'), ['controller' => 'users', 'action' => 'adminEdit', $user->iduser], ['class' => 'btn btn-default']) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['action' => 'adminDelete', $user->iduser], ['confirm' => __('Você tem certeza que quer deletar # {0}?', $user->iduser), 'class' => 'btn btn-default']) ?>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>

<?php $this->end(); ?>