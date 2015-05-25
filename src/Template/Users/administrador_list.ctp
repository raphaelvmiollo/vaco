<?php $this->extend('/Menus/menu_principal');

$this->start('sidebar');?>
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
                    <!--<th><?= $this->Paginator->sort('Senha') ?></th>-->
                        <th><?= $this->Paginator->sort('Tipo') ?></th>
                        <th><?= $this->Paginator->sort('Curso') ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <?php if ((($this->Number->format($user->type)) == 2)
                               || (($this->Number->format($user->type)) == 4)): ?>
                            <tr>
                                <td><?= $this->Number->format($user->iduser) ?></td>
                                <td><?= h($user->name) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->login) ?></td>
                           <!-- <td><?= h($user->password) ?></td>  -->
                                <td><?= $this->Number->format($user->type) ?></td>
                                <td>
                                <?= $user->has('course') ? $user->course->course_name : '' ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Editar'), ['action' => 'alunoedit', $user->iduser]) ?>
                                     <?= $this->Form->postLink(__('Deletar'), ['action' => 'administradordelete', $user->iduser], ['confirm' => __('Você tem certeza que quer deletar # {0}?', $user->iduser)]) ?>
                                </td>
                            </tr>
                        <?php endif; ?>
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
<?php $this->end(); ?>