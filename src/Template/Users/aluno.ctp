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
				<li class="active"><a href="#">Adicionar Atividade <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Listar Atividades</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><?= $this->Html->link(__('Sair'), ['controller' => 'Users' ,'action' => 'logout']) ?></li>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="actions columns large-2 medium-3">
		<h2>Minhas atividades</h2>

		
	</div>
</div>