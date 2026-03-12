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
        $sql = "INSERT INTO {$this->table} (full_name, father_name, passport, phone, email, addressc)
                VALUES (:full_name, :father_name, :passport, :phone, :email, :addresc)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':full_name' => $data['full_name'],
            ':father_name' => $data['father_name'],
            ':passport' => $data['passport'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':addressc' => $data['addressc'],
        ]);
    }

    public function updateCustomer($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET full_name = :full_name,
                    father_name = :father_name,
                    passport = :passport,
                    phone = :phone,
                    email = :email,
                    addressc = :addressc
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':full_name' => $data['full_name'],
            ':father_name' => $data['father_name'],
            ':passport' => $data['passport'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':addressc' => $data['addressc'],
            ':id' => $id,
        ]);
    }

    public function deleteCustomer($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
