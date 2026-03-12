<?php

class Block extends Model
{
    protected $table = 'blocks';

    public function all()
    {
        $sql = "SELECT b.*, p.name AS project_name 
                FROM blocks b
                JOIN projects p ON b.project_id = p.id
                ORDER BY b.id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBlocksWithAvailableFloors()
    {
        $sql = "
            SELECT 
                b.*, 
                p.name AS project_name,
                COUNT(f.id) AS built_floors
            FROM blocks b
            JOIN projects p ON b.project_id = p.id
            LEFT JOIN floors f ON f.block_id = b.id
            GROUP BY b.id
            HAVING built_floors < b.floors_count
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (project_id, name, floors_count)
                VALUES (:project_id, :name, :floors_count)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':project_id' => $data['project_id'],
            ':name' => $data['name'],
            ':floors_count' => $data['floors_count'],
        ]);
    }

    public function updateBlock($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET project_id = :project_id, name = :name, floors_count = :floors_count
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':project_id' => $data['project_id'],
            ':name' => $data['name'],
            ':floors_count' => $data['floors_count'],
            ':id' => $id,
        ]);
    }

    public function deleteBlock($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
