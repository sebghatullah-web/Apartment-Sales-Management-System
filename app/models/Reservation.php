<?php

class Reservation extends Model
{
    protected $table = 'reservations';

    public function all()
    {
        $sql = "SELECT r.*, 
                       c.full_name AS customer_name,
                       a.apartment_number,
                       f.floor_number,
                       b.name AS block_name,
                       p.name AS project_name
                FROM reservations r
                JOIN customers c ON r.customer_id = c.id
                JOIN apartments a ON r.apartment_id = a.id
                JOIN floors f ON a.floor_id = f.id
                JOIN blocks b ON f.block_id = b.id
                JOIN projects p ON b.project_id = p.id
                ORDER BY r.id DESC";

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
        $sql = "INSERT INTO {$this->table} (apartment_id, customer_id, status)
                VALUES (:apartment_id, :customer_id, 'ACTIVE')";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':apartment_id' => $data['apartment_id'],
            ':customer_id' => $data['customer_id'],
        ]);
    }

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE {$this->table} SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':status' => $status,
            ':id' => $id,
        ]);
    }

    public function deleteReservation($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function checkActiveReservation($apartment_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} 
                                    WHERE apartment_id = ? AND status = 'ACTIVE'");
        $stmt->execute([$apartment_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function reservationsByMonth()
    {
        $sql = "SELECT 
                    MONTH(created_at) AS month,
                    COUNT(*) AS total_reservations
                FROM reservations
                GROUP BY MONTH(created_at)
                ORDER BY MONTH(created_at)";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationsReport($filter)
    {
        $sql = "SELECT r.*, c.full_name, a.apartment_number
                FROM reservations r
                JOIN customers c ON r.customer_id = c.id
                JOIN apartments a ON r.apartment_id = a.id
                WHERE 1=1";

        if (!empty($filter['from'])) {
            $sql .= " AND r.created_at >= '{$filter['from']}'";
        }
        if (!empty($filter['to'])) {
            $sql .= " AND r.created_at <= '{$filter['to']}'";
        }

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}
