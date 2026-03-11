<?php

class Ownership extends Model
{
    protected $table = 'ownerships';

    public function all()
    {
        $sql = "SELECT o.*, 
                       c.full_name AS customer_name,
                       a.apartment_number,
                       f.floor_number,
                       b.name AS block_name,
                       p.name AS project_name
                FROM ownerships o
                JOIN customers c ON o.customer_id = c.id
                JOIN apartments a ON o.apartment_id = a.id
                JOIN floors f ON a.floor_id = f.id
                JOIN blocks b ON f.block_id = b.id
                JOIN projects p ON b.project_id = p.id
                ORDER BY o.id DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT o.*, 
                    c.full_name AS customer_name,
                    a.apartment_number,
                    f.floor_number,
                    b.name AS block_name,
                    p.name AS project_name
                FROM ownerships o
                JOIN customers c ON o.customer_id = c.id
                JOIN apartments a ON o.apartment_id = a.id
                JOIN floors f ON a.floor_id = f.id
                JOIN blocks b ON f.block_id = b.id
                JOIN projects p ON b.project_id = p.id
                WHERE o.id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} 
                (apartment_id, customer_id, sale_price, sale_date)
                VALUES (:apartment_id, :customer_id, :sale_price, :sale_date)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':apartment_id' => $data['apartment_id'],
            ':customer_id' => $data['customer_id'],
            ':sale_price' => $data['sale_price'],
            ':sale_date' => $data['sale_date'],
        ]);
    }

    public function findByApartment($apartment_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE apartment_id = ?");
        $stmt->execute([$apartment_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteOwnership($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function salesByMonth()
    {
        $sql = "SELECT 
                    MONTH(sale_date) AS month,
                    COUNT(*) AS total_sales,
                    SUM(sale_price) AS total_amount
                FROM ownerships
                GROUP BY MONTH(sale_date)
                ORDER BY MONTH(sale_date)";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesReport($filter)
    {
        $sql = "SELECT 
            o.*, 
            c.full_name, 
            a.apartment_number, 
            a.base_price AS apartment_price,
            p.name AS project_name
        FROM ownerships o
        JOIN customers c ON o.customer_id = c.id
        JOIN apartments a ON o.apartment_id = a.id
        JOIN floors f ON a.floor_id = f.id
        JOIN blocks b ON f.block_id = b.id
        JOIN projects p ON b.project_id = p.id
        WHERE 1=1";

        if (!empty($filter['from'])) {
            $sql .= " AND o.sale_date >= '{$filter['from']}'";
        }
        if (!empty($filter['to'])) {
            $sql .= " AND o.sale_date <= '{$filter['to']}'";
        }

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}
