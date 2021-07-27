<?php

include('Controller/RouterController.php');
include('Controller/ArticleController.php');

use \Controller\RouterController;
use \Controller\ArticleController;

$article = new ArticleController();

$routes = new RouterController('/');
$routes->get('/', $article->index());

// user
    // username
    // mail
    // password
    // role
// articles
    // title
    // content
    // createdAt
    // user_id
// comments
    // content
    // user_id
    // article_id