<?php


namespace system\core;


abstract class Model
{
    protected $db;
    protected $table;
    protected $pk = 'id';

    public function __construct()
    {
        $this->db = Db::instance();
    }

    public function query($sql)
    {
        return $this->db->exec($sql);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        return $this->db->query($sql);
    }

    public function findLimit($start, $limit)
    {
        $sql = "SELECT * FROM " . $this->table . " LIMIT $start, $limit";

        return $this->db->query($sql);
    }

    public function count($params = [])
    {
        $arr = $this->findAll();
        return count($arr);
    }

    public function findOne($id, $pk = '')
    {
        if($pk != ''){
            $this->pk = $pk;
        }
        $sql = "SELECT * FROM {$this->table} WHERE {$this->pk} = ? LIMIT 1";
        return $this->db->query($sql, [$id]);
    }
}