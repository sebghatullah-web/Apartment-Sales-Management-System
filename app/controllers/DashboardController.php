<?php

class DashboardController extends Controller
{
    public function index()
    {
        $projectModel = $this->model("Project");
        $apartmentModel = $this->model("Apartment");
        $customerModel = $this->model("Customer");
        $reservationModel = $this->model("Reservation");
        $ownershipModel = $this->model("Ownership");
        $paymentModel = $this->model("Payment");

        // آمار کلی
        $stats = [
            'projects' => count($projectModel->all()),
            'apartments' => count($apartmentModel->all()),
            'customers' => count($customerModel->all()),
            'reservations' => count($reservationModel->all()),
            'sales' => count($ownershipModel->all()),
            'payments' => count($paymentModel->all()),
        ];

        // داده‌های نمودار
        $salesByMonth = $ownershipModel->salesByMonth();
        $paymentsByMonth = $paymentModel->paymentsByMonth();
        $reservationsByMonth = $reservationModel->reservationsByMonth();
        $projectStatus = $projectModel->projectStatusStats();

        // آخرین موارد
        $recent_reservations = array_slice($reservationModel->all(), 0, 5);
        $recent_payments = array_slice($paymentModel->all(), 0, 5);

        $page_title = "داشبورد مدیریت";

        $this->view("dashboard/index", compact(
            'stats',
            'salesByMonth',
            'paymentsByMonth',
            'reservationsByMonth',
            'projectStatus',
            'recent_reservations',
            'recent_payments',
            'page_title'
        ));
    }
}
