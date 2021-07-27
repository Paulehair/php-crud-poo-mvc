<?php

namespace Model;

include('Helper/PdoConnexion.php');

use Helper\PdoConnexion;

class ArticleModel
{

  protected $pdo;
  
  public function __construct()
  {
    $this->pdo = PdoConnexion::get();
  }
  
  public function handleError(\PDOStatement $stmt): void
  {
      if ($stmt->errorCode() !== '00000') {
          echo($stmt->errorCode() . '\n');
          echo($stmt->errorInfo() . '\n');
          die("Miskine....");
      }
  }

  public function findAll(): ?array
  {
    $pgsql = `SELECT id, title, content, created_at, user_id FROM 'article'`;
    
    $stmt = $this->pdo->prepare($pgsql);
    $stmt->execute();

    $this->handleError($stmt);

    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    if ([] === $data) {

      return null;
    }
    return $data;
  }

  public function find(int $id): array
  {
    $pgsql = "SELECT 
      `id`, 
      `title`,
      `content`,
      `created_at`,
      `user_id`
    FROM 
      `article` 
    WHERE 
      `id` = :id
    ;";

    $stmt = $this->pdo->prepare($pgsql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $this->handleError($stmt);

    $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    if ([] === $data) {
        return null;
    }
    return $data;
  }

  public function edit(array $data): void
  {
    $pgsql = "UPDATE
      `article`
    SET
      `title` = :title,
      `content` = :content,
      `created_at` = :created_at,
      `user_id` = :user_id
    WHERE
      `id` = :id
    ;";

    $stmt = $this->pdo->prepare($pgsql);
    $stmt->bindValue(':id', $data['id']);
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':content', $data['content']);
    $stmt->bindValue(':created_at', $data['created_at']);
    $stmt->bindValue(':user_id', $data['user_id']);
    $stmt->execute();

    $this->handleError($stmt);
  }

  public function add(array $data): ?int
  {
    $pgsql = "INSERT INTO 
      `article`
    SET
      `title` = :title,
      `content` = :content,
      `created_at` = :created_at,
      `user_id` = :user_id
    ;";

    $stmt = $this->pdo->prepare($pgsql);
    $stmt->bindValue(':id', $data['id']);
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':content', $data['content']);
    $stmt->bindValue(':created_at', $data['created_at']);
    $stmt->bindValue(':user_id', $data['user_id']);
    $stmt->execute();

    $this->handleError($stmt);

    return $this->pdo->lastInsertId();
  }

  public function delete(int $id): void
  {
    $pgsql = "DELETE FROM 
      `article` 
    WHERE 
      `id` = :id 
    LIMIT 1
    ;";

    $stmt = $this->pdo->prepare($pgsql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $this->handleError($stmt);
  }
}