<?php

class Floor extends Model
{
    protected $table = 'floors';

    public function all()
    {
        $sql = "SELECT f.*, b.name AS block_name, p.name AS project_name
                FROM floors f
                JOIN blocks b ON f.block_id = b.id
                JOIN projects p ON b.project_id = p.id
                ORDER BY f.id DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFloorsWithAvailableApartments()
    {
        $sql = "
            SELECT 
                f.*, 
                b.name AS block_name,
                p.name AS project_name,
                COUNT(a.id) AS built_apartments
            FROM floors f
            JOIN blocks b ON f.block_id = b.id
            JOIN projects p ON b.project_id = p.id
            LEFT JOIN apartments a ON a.floor_id = f.id
            GROUP BY f.id
            HAVING built_apartments < f.apartments_count
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
        $sql = "INSERT INTO {$this->table} (block_id, floor_number)
                VALUES (:block_id, :floor_number)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':block_id' => $data['block_id'],
            ':floor_number' => $data['floor_number'],
        ]);
    }

    public function updateFloor($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET block_id = :block_id, floor_number = :floor_number
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':block_id' => $data['block_id'],
            ':floor_number' => $data['floor_number'],
            ':id' => $id,
        ]);
    }

    public function deleteFloor($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
