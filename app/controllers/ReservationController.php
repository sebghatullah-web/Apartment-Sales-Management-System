<?php

class ReservationController extends Controller
{
    public function index()
    {
        $reservationModel = $this->model("Reservation");
        $reservations = $reservationModel->all();

        $page_title = "لیست رزروها";

        $this->view("reservations/index", compact('reservations', 'page_title'));
    }

    public function create()
    {
        $apartmentModel = $this->model("Apartment");
        $customerModel = $this->model("Customer");

        // فقط آپارتمان‌های قابل رزرو
        $apartments = $apartmentModel->all();
        $customers = $customerModel->all();

        $page_title = "ایجاد رزرو جدید";

        $this->view("reservations/create", compact('apartments', 'customers', 'page_title'));
    }

    public function store()
    {
        $reservationModel = $this->model("Reservation");
        $apartmentModel = $this->model("Apartment");

        $apartment_id = $_POST['apartment_id'];
        $customer_id = $_POST['customer_id'];

        // جلوگیری از رزرو دوباره
        $existing = $reservationModel->checkActiveReservation($apartment_id);
        if ($existing) {
            die("این آپارتمان قبلاً رزرو شده است.");
        }

        // بررسی وضعیت آپارتمان
        $ap = $apartmentModel->find($apartment_id);
        if ($ap['status'] == 'COMPLETED') {
            die("آپارتمان تکمیل‌شده قابل رزرو نیست.");
        }

        $reservationModel->create([
            'apartment_id' => $apartment_id,
            'customer_id' => $customer_id,
        ]);

        header("Location: /apartment_system/public/?route=reservations");
        exit;
    }

    public function convertToSale()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("رزرو مشخص نشده است.");

        $reservationModel = $this->model("Reservation");
        $ownershipModel = $this->model("Ownership");

        $reservation = $reservationModel->find($id);

        if (!$reservation) die("رزرو یافت نشد.");

        // تبدیل رزرو به فروش
        $ownershipModel->create([
            'apartment_id' => $reservation['apartment_id'],
            'customer_id' => $reservation['customer_id'],
            'sale_price' => 0,
            'sale_date' => date("Y-m-d"),
        ]);

        // تغییر وضعیت رزرو
        $reservationModel->updateStatus($id, 'CONVERTED_TO_SALE');

        header("Location: /apartment_system/public/?route=reservations");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("رزرو مشخص نشده است.");

        $reservationModel = $this->model("Reservation");
        $reservationModel->deleteReservation($id);

        header("Location: /apartment_system/public/?route=reservations");
        exit;
    }
}
