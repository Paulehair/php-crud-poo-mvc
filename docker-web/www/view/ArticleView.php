<?php

namespace View;

class ArticleView 
{
  public function index(?array $data): string
  {
    ob_start();
    ?>
    <h1>
      Articles
    </h1>
    <?php if (null === $data) :?>
    <div>No article</div>
    <?php else:?>
    <?php foreach ($data as $article):?>
    <div>
      <div>
        <h3><?=$article['title']?></h3>
        <h4><?=$article['user_id']?></h4>
        <h5><?=$article['createdAt']?></h5>
      </div>
      <div><?=$article['content']?></div>
    </div>
  <?php 
    endforeach;
    endif;
    return \ob_get_clean();
  }
}