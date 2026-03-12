<?php

class ApartmentController extends Controller
{
    public function index()
    {
        $apartmentModel = $this->model("Apartment");
        $floorModel = $this->model("Floor");

        $apartments = $apartmentModel->all();
        $floors = $floorModel->getFloorsWithAvailableApartments();

        $page_title = "لیست آپارتمان‌ها";

        $this->view("apartments/index", compact('apartments', 'floors', 'page_title'));
    }

    public function create()
    {
        $floorModel = $this->model("Floor");
        $floors = $floorModel->all();

        $page_title = "ایجاد آپارتمان جدید";

        $this->view("apartments/create", compact('floors', 'page_title'));
    }

    public function store()
    {
        $apartmentModel = $this->model("Apartment");

        $data = [
            'floor_id' => $_POST['floor_id'],
            'apartment_number' => $_POST['apartment_number'],
            'area' => $_POST['area'],
            'rooms' => $_POST['rooms'],
            'status' => $_POST['status'],
            'base_price' => $_POST['base_price'],
            'estimated_total_cost' => $_POST['estimated_total_cost'],
            'spent_cost' => $_POST['spent_cost'],
        ];

        $apartmentModel->create($data);

        header("Location: /apartment_system/public/?route=apartments");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("آپارتمان مشخص نشده است.");

        $apartmentModel = $this->model("Apartment");
        $floorModel = $this->model("Floor");

        $apartment = $apartmentModel->find($id);
        $floors = $floorModel->all();

        if (!$apartment) die("آپارتمان یافت نشد.");

        $page_title = "ویرایش آپارتمان";

        $this->view("apartments/edit", compact('apartment', 'floors', 'page_title'));
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) die("آپارتمان مشخص نشده است.");

        $apartmentModel = $this->model("Apartment");

        $data = [
            'floor_id' => $_POST['floor_id'],
            'apartment_number' => $_POST['apartment_number'],
            'area' => $_POST['area'],
            'rooms' => $_POST['rooms'],
            'status' => $_POST['status'],
            'base_price' => $_POST['base_price'],
            'estimated_total_cost' => $_POST['estimated_total_cost'],
            'spent_cost' => $_POST['spent_cost'],
        ];

        $apartmentModel->updateApartment($id, $data);

        header("Location: /apartment_system/public/?route=apartments");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("آپارتمان مشخص نشده است.");

        $apartmentModel = $this->model("Apartment");
        $apartmentModel->deleteApartment($id);

        header("Location: /apartment_system/public/?route=apartments");
        exit;
    }
}
