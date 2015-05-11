

<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4" id="formulario_login"> 
		<div class="wrapper">
			<?= $this->Form->create() ?>
			<?= $this->Form->input('login', array('class' => 'form-control')); ?>
			<?= $this->Form->input('password', array('class' => 'form-control')); ?> <br>
			<?= $this->Form->button('Login', array('class' => 'btn btn-lg btn-primary btn-block')) ?>
			<?= $this->Form->end() ?>
			<br>
			<?= $this->Flash->render() ?>
			
			
			<?= $this->fetch('content') ?>
		</div>
	</div>
	<div class="col-sm-4"></div>

</div>



