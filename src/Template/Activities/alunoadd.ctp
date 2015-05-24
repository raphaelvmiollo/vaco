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
                <li>




                </li>
                <li><?= $this->Html->link(__('Listar Atividades'), ['controller' => 'Activities' ,'action' => 'alunolistar']) ?></li>
                <li class="active"><a href="#">Adicionar Atividades</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configurações <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><?= $this->Html->link(__('Alterar a senha'), ['controller' => 'Users' ,'action' => 'alunoeditsenha']) ?></li>
                    
                </ul>
            </li>


            <li> <?= $this->Html->link(__('Sair'), ['controller' => 'Users' ,'action' => 'logout']) ?></li>

        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="row">
<div class="col-sm-5">
    <div class="actions columns large-2 medium-3">
        <h2>Adicionar Atividade</h2>
        <div class="activities form large-10 medium-9 columns">
            <?= $this->Form->create($activity); ?>
            <fieldset>
               <?php
               echo $this->Form->input('activity_local' , array('class' => 'form-control'));
               echo $this->Form->input('activity_hours' , array('class' => 'form-control'));
               echo $this->Form->input('semester' , array('class' => 'form-control'));
               echo $this->Form->input('abstract' , array('class' => 'form-control'));
               echo $this->Form->input('date');
               echo $this->Form->input('path' , array('class' => 'form-control'));
               echo $this->Form->input('users_iduser');
               echo $this->Form->input('classification_id', ['options' => $classifications]);
               echo $this->Form->input('avaliation_id', ['options' => $avaliations]);
               ?>
           </fieldset>
           <?= $this->Form->button(__('Adicionar')) ?>
           <?= $this->Form->end() ?>
           </div>
           <div class="col-sm-7"></div>
       </div>
