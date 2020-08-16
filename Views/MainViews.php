<?php


	namespace Views;
/*
* @params filename -> pasta/nome do arquivo main
* @params header -> pasta/nome do arquivo header
* @params footer -> pasta/nome do arquivo footer
*/
	class MainViews
	{
		private $filename;
		private $header;
		private $footer;
		private $param1;


		public function __construct($filename, $header = "header", $footer = "footer")
		{
			$this->filename = $filename;
			$this->header = $header;
			$this->footer = $footer;
		}

		public function render($arr = []){
			include("src/templates/".$this->header.".php");
			include("src/pages/".$this->filename.".php");
			include("src/templates/".$this->footer.".php");
		}
	}


?>