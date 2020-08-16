<?php 

	
	namespace Controllers;

	class NotfoundController extends Controller
	{
		public function executar(){
				$this->view = new \Views\MainViews('404','header','footer');
				$this->view->render(array('titulo' => '404: Página não encontrada!'));
		}
		
	}

?>