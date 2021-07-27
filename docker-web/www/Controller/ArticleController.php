<?php 

namespace Controller;

include('Model/ArticleModel.php');
include('View/ArticleView.php');

use Model\ArticleModel;
use View\ArticleView;

class ArticleController
{
  protected $model;
  protected $view;

  public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new ArticleView();
    }

  public function index()
  {
      return $this->view->index($this->model->findAll());
  }
}
