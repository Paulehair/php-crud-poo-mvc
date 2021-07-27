<?php

namespace Controller;

class ErrorController {
	public function Err404() {
		$this->view->render('error/404');
	}
}