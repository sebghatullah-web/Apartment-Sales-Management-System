<?php

class ReportController extends Controller
{
    public function index()
    {
        $page_title = "Reports";
        $this->view("reports/index", compact('page_title'));
    }

    public function sales()
    {
        $model = $this->model("Ownership");
        $sales = $model->getSalesReport($_GET);

        $page_title = "Sales Report";
        $this->view("reports/sales", compact('sales', 'page_title'));
    }

    public function payments()
    {
        $model = $this->model("Payment");
        $payments = $model->getPaymentsReport($_GET);

        $page_title = "Payments Report";
        $this->view("reports/payments", compact('payments', 'page_title'));
    }

    public function reservations()
    {
        $model = $this->model("Reservation");
        $reservations = $model->getReservationsReport($_GET);

        $page_title = "Reservations Report";
        $this->view("reports/reservations", compact('reservations', 'page_title'));
    }
}
