<h1>Sessão Aluno</h1>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Adicionar Atividades'), ['controller' => 'Activities' ,'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Atividades'), ['controller' => 'Activities' ,'action' => 'aluno']) ?> </li>
        
    </ul>
</div>