<h1>Subir archivos</h1>
<br>

<div id="requisitos">
		<h2>Requisitos</h2>
		<ol>
			<li>El diseño del logo debe apegarse a las restricciones institucionales que establece la universidad. Se debe respetar la forma diamantada, la tipografía y los colores oficiales de azul, rojo, negro y blanco.</li>
			<li>Los diseños deben ser originales y no podrán haber sido presentados en otros concursos ni usados con anterioridad. Debe crearse exclusivamente para la carrera de Ingeniería en Sistemas Computacionales de UNITEC.</li>
			<li>Cada participante debe subir 5 archivos:
        <ul>
          <li>Propuesta de logo en formato JPG y formato vectorial usando Adobe Illustrator</li>
          <li>Propuesta de la camisa oficial en formato JPG y formato vectorial usando Adobe Illustrator</li>
          <li>Un archivo en formato PPT donde expliquen brevemente en qué consiste su propuesta, las motivaciones y argumentos por los que creen que deben ganar el premio.</li>
        </ul>
      </li>
      <li>La camisa oficial debe de ser estilo “Polo”.</li>
      <li>Las propuestas deberán ser presentadas únicamente en las fechas establecidas anteriormente.</li>
		</ol>
	</div>

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
<div class="col-sm-8">
  <table class="table table-hover">
    <tbody>
      <?php foreach($files as $file): ?>
      <tr>
        <td><?php echo basename($file['File']['path']); ?></td>
        <td><?php echo $this->Html->link('Eliminar', array('action' => 'delete', $file['File']['id']), array('class' => 'btn btn-sm btn-danger')); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php endif; ?>