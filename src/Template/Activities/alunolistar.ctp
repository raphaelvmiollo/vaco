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
				<li class="active"><a href="#">Listar Atividades</a></li>
				<li><?= $this->Html->link(__('Adicionar Atividade'), ['controller' => 'Activities' ,'action' => 'alunoadd']) ?></li>
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
		<h2>Minhas atividades</h2>

		<div class="activities index large-10 medium-9 columns">
			<table cellpadding="0" cellspacing="0" class="table">
				<thead>
					<tr>
						<!--<th><?= $this->Paginator->sort('idactivity') ?></th>-->
						<th><?= $this->Paginator->sort('Resumo') ?></th>
						<th><?= $this->Paginator->sort('Local da Atividade') ?></th>
						<th><?= $this->Paginator->sort('Horas de Atividade') ?></th>
						<th><?= $this->Paginator->sort('Semestre') ?></th>

						<th><?= $this->Paginator->sort('Data e Hora ') ?></th>
						<th><?= $this->Paginator->sort('arquivo') ?></th>
						<th><?= $this->Paginator->sort('Situação') ?></th>


					</tr>
				</thead>
				<tbody>
					<?php foreach ($activities  as $activity): ?>
						<?php switch ($activity->avaliation->situation) {
							case '0':
								$classe = "class='info'";
								$situacao = "Em análise";
								break;
								case '1':
								$classe = "class='success'";
								$situacao = "Aprovada";
								break;
								case '2':
								$classe = "class='danger'";
								$situacao = "Reprovada";
								break;
							
							default:
								# code...
								break;
						} ?>

						<tr <?php echo $classe; ?> >
							<!-- <td><?= $this->Number->format($activity->idactivity) ?></td>-->
							<td><?= h($activity->abstract) ?></td>
							<td><?= h($activity->activity_local) ?></td>
							<td><?= h($activity->activity_hours) ?></td>
							<td><?php  if($activity->semester == 1){echo "Primeiro";}else{echo "Segundo";} ?>


							</td>

							<td><?= h($activity->date) ?></td>
							<td><?= h($activity->path) ?></td>
							<td><?= h($situacao) ?></td>
						</tr>

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
</div>