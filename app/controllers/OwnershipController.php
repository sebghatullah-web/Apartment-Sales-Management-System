<?php

class OwnershipController extends Controller
{
    public function index()
    {
        $ownershipModel = $this->model("Ownership");
        $ownerships = $ownershipModel->all();

        $page_title = "لیست فروش‌ها";

        $this->view("ownerships/index", compact('ownerships', 'page_title'));
    }

    public function create()
    {
        $apartmentModel = $this->model("Apartment");
        $customerModel = $this->model("Customer");

        $apartments = $apartmentModel->getCompletedApartments();
        $customers = $customerModel->all();

        $page_title = "فروش جدید";

        $this->view("ownerships/create", compact('apartments', 'customers', 'page_title'));
    }

    public function store()
    {
        $ownershipModel = $this->model("Ownership");

        $data = [
            'apartment_id' => $_POST['apartment_id'],
            'customer_id' => $_POST['customer_id'],
            'sale_price' => $_POST['sale_price'],
            'sale_date' => $_POST['sale_date'],
        ];

        // جلوگیری از فروش دوباره
        if ($ownershipModel->findByApartment($data['apartment_id'])) {
            die("این آپارتمان قبلاً فروخته شده است.");
        }

        $ownershipModel->create($data);

        header("Location: /apartment_system/public/?route=ownerships");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("فروش مشخص نشده است.");

        $ownershipModel = $this->model("Ownership");
        $ownershipModel->deleteOwnership($id);

        header("Location: /apartment_system/public/?route=ownerships");
        exit;
    }
}
