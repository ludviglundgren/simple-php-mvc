<?php

namespace App\Models;

use PDO;

class Post extends \Core\Model
{
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        };
    }

    public static function getAll()
    {

        try {
            $db = static::getDB();

            $statement = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function save()
    {
        $sql = 'INSERT INTO posts (title, content) VALUES (:title, :content)';
        
        $db = static::getDB();
        $stmt= $db->prepare($sql);

        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
        
        $stmt->execute();
    }
}
