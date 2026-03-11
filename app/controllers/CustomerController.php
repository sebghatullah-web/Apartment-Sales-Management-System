<?php

class CustomerController extends Controller
{
    public function index()
    {
        $customerModel = $this->model("Customer");
        $customers = $customerModel->all();

        $page_title = "لیست مشتریان";

        $this->view("customers/index", compact('customers', 'page_title'));
    }

    public function create()
    {
        $page_title = "ایجاد مشتری جدید";
        $this->view("customers/create", compact('page_title'));
    }

    public function store()
    {
        $customerModel = $this->model("Customer");

        $data = [
            'full_name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'national_id' => $_POST['national_id'],
        ];

        $customerModel->create($data);

        header("Location: /apartment_system/public/?route=customers");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("مشتری مشخص نشده است.");

        $customerModel = $this->model("Customer");
        $customer = $customerModel->find($id);

        if (!$customer) die("مشتری یافت نشد.");

        $page_title = "ویرایش مشتری";

        $this->view("customers/edit", compact('customer', 'page_title'));
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) die("مشتری مشخص نشده است.");

        $customerModel = $this->model("Customer");

        $data = [
            'full_name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'national_id' => $_POST['national_id'],
        ];

        $customerModel->updateCustomer($id, $data);

        header("Location: /apartment_system/public/?route=customers");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("مشتری مشخص نشده است.");

        $customerModel = $this->model("Customer");
        $customerModel->deleteCustomer($id);

        header("Location: /apartment_system/public/?route=customers");
        exit;
    }
}
