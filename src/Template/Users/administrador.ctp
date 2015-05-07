<h1>Sessão Administrador</h1>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="side-nav">
     <li><?= $this->Html->link(__('Crud Atividades'), ['controller' => 'Activities' ,'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crud Classificações'), ['controller' => 'Classifications' ,'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crud Avaliações'), ['controller' => 'Avaliations' ,'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crud Cursos'), ['controller' => 'Courses' ,'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crud Usuarios'), ['controller' => 'Users' ,'action' => 'index']) ?> </li>
       
       
        
    </ul>
</div>