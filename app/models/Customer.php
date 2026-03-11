<?php

class Customer extends Model
{
    protected $table = 'customers';

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
        $sql = "INSERT INTO {$this->table} (full_name, phone, email, national_id)
                VALUES (:full_name, :phone, :email, :national_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':full_name' => $data['full_name'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':national_id' => $data['national_id'],
        ]);
    }

    public function updateCustomer($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET full_name = :full_name,
                    phone = :phone,
                    email = :email,
                    national_id = :national_id
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':full_name' => $data['full_name'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':national_id' => $data['national_id'],
            ':id' => $id,
        ]);
    }

    public function deleteCustomer($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
