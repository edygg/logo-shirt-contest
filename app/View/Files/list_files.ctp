<?php 
  echo $this->Form->create('File', array('type' => 'file', 'action' => 'add'));
  echo $this->Form->input('files.', array('type' => 'file', 'multiple'));
  echo $this->Form->end('Upload');
?>