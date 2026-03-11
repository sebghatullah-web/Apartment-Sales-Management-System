<?php

class Payment extends Model
{
    protected $table = 'payments';

    public function all()
    {
        $sql = "SELECT p.*, 
                       o.sale_price,
                       c.full_name AS customer_name,
                       a.apartment_number
                FROM payments p
                JOIN ownerships o ON p.ownership_id = o.id
                JOIN customers c ON o.customer_id = c.id
                JOIN apartments a ON o.apartment_id = a.id
                ORDER BY p.id DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByOwnership($ownership_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE ownership_id = ?");
        $stmt->execute([$ownership_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} 
                (ownership_id, amount, payment_date, method, description)
                VALUES (:ownership_id, :amount, :payment_date, :method, :description)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':ownership_id' => $data['ownership_id'],
            ':amount' => $data['amount'],
            ':payment_date' => $data['payment_date'],
            ':method' => $data['method'],
            ':description' => $data['description'],
        ]);
    }

    public function totalPaid($ownership_id)
    {
        $stmt = $this->db->prepare("SELECT SUM(amount) AS total FROM {$this->table} WHERE ownership_id = ?");
        $stmt->execute([$ownership_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    }

    public function paymentsByMonth()
    {
        $sql = "SELECT 
                    MONTH(payment_date) AS month,
                    SUM(amount) AS total_amount
                FROM payments
                GROUP BY MONTH(payment_date)
                ORDER BY MONTH(payment_date)";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}
