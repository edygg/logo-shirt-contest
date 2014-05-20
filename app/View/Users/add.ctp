<div class="users form">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Inscripción'); ?></legend>
        <div class="form-group">
        	<?php echo $this->Form->label('User.username', 'Usuario', array('class' => 'col-sm-2 control-label')); ?>
        	<div class="col-sm-5">
        		<?php echo $this->Form->input('username', array(
        			'label' => false, 
        			'class' => 'form-control',
        			'div' => false,
        			)); ?>
        	</div>
        </div>

        <div class="form-group">
        	<?php echo $this->Form->label('User.password', 'Password', array('class' => 'col-sm-2 control-label'));  ?>
        	<div class="col-sm-5">
    			<?php echo $this->Form->input('password', array(
    				'label' => false,
    				'div' => false,
    				'class' => 'form-control',
    			)); ?>
        	</div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->label('User.email', 'Correo', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
              <?php echo $this->Form->input('email', array(
                'label' => false,
                'div' => false,
                'class' => 'form-control',
              )); ?>
            </div>
          </div>
          

        <?php echo $this->Form->hidden('role', array('value' => 'author')); ?>
    </fieldset>
	<?php echo $this->Form->end(array(
		'label' => 'Registrarse',
		'class' => 'btn btn-success',
		'div' => false,
	)); ?>
</div>