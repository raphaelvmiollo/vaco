<h1>Sessão Coordenador</h1>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Crud Cursos'), ['controller' => 'Courses' ,'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crud Atividades'), ['controller' => 'Activities' ,'action' => 'index']) ?> </li>
         <li><?= $this->Html->link(__('Crud Classifications'), ['controller' => 'Classifications' ,'action' => 'index']) ?> </li>
        
    </ul>
</div>