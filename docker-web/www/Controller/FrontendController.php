<?php

namespace Controller;

use Helper\PdoConnexion;

class FrontendController
{
	public function index()
	{
		$pdo = new PdoConnexion();
		var_dump($pdo);
		// $pdo->prepare("SELECT * FROM `articles`");
		// $this->model->render('index');
	}
	public function show()
	{
		$this->model->show('show');
	}
}
