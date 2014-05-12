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
		$this->File->recursive = 0;
		$this->set('files', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
      pr($this->data);
      $currentOriginFile = fread(fopen($this->data['File']['files'][0]['tmp_name'], 'r'), $this->data['File']['files'][0]['size']);
      
      $currentDestFile = fopen('~'.DS. $this->data['File']['files'][0]['name'], 'w');
      fwrite($currentDestFile, '1');
  
      //return $this->redirect(array('action' => 'listFiles'));
      //$this->File->create();
      /*if ($this->File->save($this->request->data)) {
				$this->Session->setFlash(__('The file has been saved.'));
				return $this->redirect(array('action' => 'listFiles'));
			} else {
				$this->Session->setFlash(__('The file could not be saved. Please, try again.'));
			}*/
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
		$this->request->onlyAllow('post', 'delete');
		if ($this->File->delete()) {
			$this->Session->setFlash(__('The file has been deleted.'));
		} else {
			$this->Session->setFlash(__('The file could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
