<?php

	namespace Controllers;

	class HomeController extends Controller
	{

		public function executar(){
			$this->view = new \Views\MainViews('home/home','home/header','home/footer');
			$this->view->render(array('titulo' => 'HOME'));
		}
	}


?>