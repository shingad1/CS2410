<?php
include_once("model/model.php");
include_once("view/view.php");

class Controller {
	public $model=null;
	public $view = null;

	function __construct() {
		// construnct the new omdle to conenct to DB
				$this->model = new Model("127.0.0.1", "banking", "root", "");
        $this->model->connect();
        $this->view = new View($this->model);
    }

	function invoke() {
			//display the menu page
			$this->view->display();

   }

}

?>
