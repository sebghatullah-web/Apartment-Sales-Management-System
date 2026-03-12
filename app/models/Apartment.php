<?php

class Apartment extends Model
{
    protected $table = 'apartments';

    public function all()
    {
        $sql = "SELECT a.*, 
                       f.floor_number, 
                       b.name AS block_name, 
                       p.name AS project_name
                FROM apartments a
                JOIN floors f ON a.floor_id = f.id
                JOIN blocks b ON f.block_id = b.id
                JOIN projects p ON b.project_id = p.id
                ORDER BY a.id DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompletedApartments()
    {
        $sql = "SELECT 
                a.*, 
                p.name AS project_name,
                b.name AS block_name,
                f.floor_number
            FROM apartments a
            JOIN floors f ON a.floor_id = f.id
            JOIN blocks b ON f.block_id = b.id
            JOIN projects p ON b.project_id = p.id
            LEFT JOIN ownerships o ON o.apartment_id = a.id
            WHERE a.status = 'COMPLETED'
              AND o.id IS NULL";

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
        $sql = "INSERT INTO {$this->table} 
                (floor_id, apartment_number, area, rooms, status, base_price, estimated_total_cost, spent_cost)
                VALUES 
                (:floor_id, :apartment_number, :area, :rooms, :status, :base_price, :estimated_total_cost, :spent_cost)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':floor_id' => $data['floor_id'],
            ':apartment_number' => $data['apartment_number'],
            ':area' => $data['area'],
            ':rooms' => $data['rooms'],
            ':status' => $data['status'],
            ':base_price' => $data['base_price'],
            ':estimated_total_cost' => $data['estimated_total_cost'],
            ':spent_cost' => $data['spent_cost'],
        ]);
    }

    public function updateApartment($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET floor_id = :floor_id,
                    apartment_number = :apartment_number,
                    area = :area,
                    rooms = :rooms,
                    status = :status,
                    base_price = :base_price,
                    estimated_total_cost = :estimated_total_cost,
                    spent_cost = :spent_cost
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':floor_id' => $data['floor_id'],
            ':apartment_number' => $data['apartment_number'],
            ':area' => $data['area'],
            ':rooms' => $data['rooms'],
            ':status' => $data['status'],
            ':base_price' => $data['base_price'],
            ':estimated_total_cost' => $data['estimated_total_cost'],
            ':spent_cost' => $data['spent_cost'],
            ':id' => $id,
        ]);
    }

    public function deleteApartment($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
