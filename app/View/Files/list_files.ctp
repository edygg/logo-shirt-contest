<h1>Subir archivos</h1>
<br>
<?php 
  echo $this->Form->create('File', array('type' => 'file', 'action' => 'add', 'class' => 'form-horizontal'));
  echo $this->Form->input('files.', array('type' => 'file', 'multiple'));
  echo '<br>';
  echo $this->Form->end(array(
    'label' => 'Subir',
    'class' => 'btn btn-success',
    'div' => false,
  ));
?>
<br>
<?php if (empty($files)): ?>
  <div class="alert alert-warning">
    <p>No hay archivos que mostrar.</p>
  </div>
<?php else: ?>
  <table class="table table-hover">
    <tbody>
      <?php foreach($files as $file): ?>
      <tr>
        <td><?php echo basename($file['File']['path']); ?></td>
        <td><?php echo $this->Html->link('Eliminar', array('action' => 'delete', 'id' => $file['File']['id']), array('class' => 'btn btn-sm btn-danger')); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>