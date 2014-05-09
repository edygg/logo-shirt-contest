<?php

class HomeController extends AppController {
	
	public function beforeFilter() {
		$this->layout = 'layout_with_bar';
		$this->Auth->allow('index', 'contestRules', 'contestRulesDownload', 'logoDirectives');
	}

	public function index() {
		$this->set('title_for_layout', 'Página inicio - Concurso Logo y Camisa');
	}

	public function contestRules() {
		$this->set('title_for_layout', 'Bases del Concurso');
	}

	public function contestRulesDownload() {
		$file = 'files/Bases_Concurso_ISC.pdf';
		$this->response->file($file);
		return $this->response;
	}

	public function logoDirectives() {
		$file = 'files/Imagen_corporativa.pdf';
		$this->response->file($file);
		return $this->response;
	}	
}