<?php

namespace Controller;

class ArticleController {
    public function addArticle() {
        $this->view->addArticle('addArticle');
    }
    public function deleteArticle() {
        $this->view->deleteArticle('deleteArticle');
    }
}