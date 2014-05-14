<?php
App::uses('AppController', 'Controller');
/**
 * Files Controller
 *
 * @property File $File
 * @property PaginatorComponent $Paginator
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class FilesController extends AppController {
  
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Auth', 'Session');

  public function beforeFilter() {
    $this->layout = 'layout_with_bar';
  }
  
/**
 * index method
 *
 * @return void
 */
	public function listFiles() {
		$files = $this->File->find('all', array(
      'conditions' => array('user_id' => AuthComponent::user('id')),
    ));
		$this->set('files', $files);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
      $directories = "files/users/". AuthComponent::user('username') . "/";
      mkdir($directories, 0777, true);
      
      foreach ($this->data['File']['files'] as $file) {
        $target_path = $directories . $file['name'];
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            $this->File->create();
            if ($this->File->save(array(
              'user_id' => AuthComponent::user('id'),
              'path' => $target_path,
            ))) {
               $this->Session->setFlash('Tus archivos se han guardado', 'success'); 
            } else {
              $this->Session->setFlash('Ha ocurrido un problema. Vuelve a intentar', 'failure');
            }   
        } else {
            $this->Session->setFlash('Ha ocurrido un problema. Vuelve a intentar', 'failure');
        }
      }
      
      $this->redirect(array('action' => 'listFiles'));
		}
	}
  
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->File->id = $id;
		if (!$this->File->exists()) {
			throw new NotFoundException(__('Invalid file'));
		}
		//$this->request->onlyAllow('post', 'delete');
    $file = $this->File->find('first', array('conditions' => array('File.id' => $id)));
		if ($this->File->delete()) {
      if (unlink($file['File']['path'])) {
        $this->Session->setFlash(__('El archivo ha sido elimminado.'), 'success');
      } else {
        $this->Session->setFlash(__('Ha ocurrido un error.'), 'failure');
      }
			
		} else {
			$this->Session->setFlash(__('The file could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'listFiles'));
	}
}
