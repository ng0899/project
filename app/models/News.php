<?php

namespace app\models;

use system\core\Model;

class News extends Model
{
    public $table = 'news';

    public function getNewsByCategory($categoryId)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `category_id` = ?";
        return $this->db->query($sql, [$categoryId]);
    }
}
