<!doctype html>
<html>
<head>
	<title><?php echo $title_for_layout ?></title>
	<?php 
		echo $this->Html->charset('utf-8');
		echo $this->Html->css(array(
				'bootstrap.min',
				'font-awesome.min',
				'contest_rules',
			));
	?>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<?php echo $this->Html->link('Nueva Imagen para Sistemas', '/', array('class' => 'navbar-brand')); ?>
		</div>
		<ul class="nav navbar-nav">
			<li><?php echo $this->Html->link('Inicio', '/'); ?></li>
			<li><?php echo $this->Html->link('Bases del concurso', array('controller' => 'home', 'action' => 'contestRules')); ?></li>
      <?php if (AuthComponent::user('id')): ?>
      <li><?php echo $this->Html->link('Sube tus archivos', array('controller' => 'files', 'action' => 'listFiles')); ?></li>
      <?php endif; ?>
		</ul>
		<div class="navbar-right">
			<?php if (!AuthComponent::user('id')) : ?>
				<?php echo $this->Html->link('Regístrate!', array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-success navbar-btn')); ?>
				<?php echo $this->Html->link('Entrar', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-info navbar-btn'));  ?>
			<?php else: ?>
				<p class="navbar-text"> Hola <?php echo AuthComponent::user('username'); ?>!</p>
				<?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-danger navbar-btn')); ?>
			<?php endif; ?>
		</div>
	</nav>

	<main class="col-sm-9 col-sm-offset-1">
    <?php echo $this->Session->flash('flash', array('element' => 'failure')); ?>
    <?php echo $this->Session->flash('flash', array('element' => 'success')); ?>
		<?php echo $this->fetch('content'); ?>
	</main>

	<!-- Scripts -->
	<?php echo $this->Html->script(array(
			'jquery-2.1.1.min',
			'bootstrap.min',
			'contest_rules',
		)); 
	?>
</body>
</html>