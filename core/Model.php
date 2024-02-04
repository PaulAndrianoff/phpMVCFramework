<?php
namespace core;

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function findAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($data) {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function update($id, $data) {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ', ');

        $sql = "UPDATE {$this->table} SET $fields WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id; // Ensure the ID is included for the WHERE clause
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}
