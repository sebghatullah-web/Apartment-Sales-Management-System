<?php

class Project extends Model
{
    protected $table = 'projects';

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (name, location, description, status) VALUES (:name, :location, :description, :status)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':location' => $data['location'],
            ':description' => $data['description'],
            ':status' => $data['status'],
        ]);
    }

    public function updateProject($id, $data)
    {
        $sql = "UPDATE {$this->table} SET name = :name, location = :location, description = :description, status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':location' => $data['location'],
            ':description' => $data['description'],
            ':status' => $data['status'],
            ':id' => $id,
        ]);
    }

    public function deleteProject($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function projectStatusStats()
    {
        $sql = "SELECT status, COUNT(*) AS total FROM projects GROUP BY status";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}
