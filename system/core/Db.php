<?php


namespace system\core;


class Db
{
    protected $pdo;
    protected static $instance;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/db.php';
        $option = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        try{
            $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $option);
        }catch (\Exception $e){
            trigger_error("Ошибка при подключении к базе данных!", E_USER_ERROR);
        }

    }

    public static function instance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function exec($sql)
    {
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql, $param = [])
    {
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        try{
            $res = $stmt->execute($param);
            if($res !== false){
                return $stmt->fetchAll();
            }else{
                return [];
            }
        }catch (\Exception $e){
            pr($e->getTraceAsString());
        }

    }
}