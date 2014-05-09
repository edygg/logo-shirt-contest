<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
    <fieldset>
      <legend>
        <?php echo __('Ingresa tu usuario y tu contraseña.'); ?>
      </legend>
      <div class="form-group">
        <?php echo $this->Form->label('User.username', 'Usuario', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
          <?php echo $this->Form->input('username', array(
                  'label' => false,
                  'div' => false,
                  'class' => 'form-control',
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
      
    </fieldset>
<?php echo $this->Form->end(array('label' => 'Entrar', 'class' => 'btn btn-success')); ?>
</div>