<?php namespace App\Models;


use Core\Database\Database;

abstract class Model {
    protected $db;

    function __construct()
    {
        Database::open();
        $this->db = Database::getConnection();
    }

    public function all()
    {
        return $this->select("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function find($id)
    {
        return $this->select("SELECT * FROM {$this->table}WHERE id = {$id}");
    }

    /**
     * @return mixed
     */
    public function select($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}