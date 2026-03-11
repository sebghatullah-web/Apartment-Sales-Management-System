<?php

class PaymentController extends Controller
{
    public function index()
    {
        $paymentModel = $this->model("Payment");
        $payments = $paymentModel->all();

        $page_title = "لیست پرداخت‌ها";

        $this->view("payments/index", compact('payments', 'page_title'));
    }

    public function create()
    {
        $ownershipModel = $this->model("Ownership");
        $ownerships = $ownershipModel->all();

        $page_title = "پرداخت جدید";

        $this->view("payments/create", compact('ownerships', 'page_title'));
    }

    public function store()
    {
        $paymentModel = $this->model("Payment");
        $ownershipModel = $this->model("Ownership");

        $ownership_id = $_POST['ownership_id'];
        $amount = $_POST['amount'];

        // بررسی بدهی
        $ownership = $ownershipModel->find($ownership_id);
        $totalPaid = $paymentModel->totalPaid($ownership_id);

        if ($totalPaid + $amount > $ownership['sale_price']) {
            die("مبلغ پرداخت بیشتر از بدهی است.");
        }

        $data = [
            'ownership_id' => $ownership_id,
            'amount' => $amount,
            'payment_date' => $_POST['payment_date'],
            'method' => $_POST['method'],
            'description' => $_POST['description'],
        ];

        $paymentModel->create($data);

        header("Location: /apartment_system/public/?route=payments");
        exit;
    }

    public function invoice()
    {
        $ownership_id = $_GET['ownership_id'] ?? null;
        if (!$ownership_id) die("مالکیت مشخص نشده است.");

        $paymentModel = $this->model("Payment");
        $ownershipModel = $this->model("Ownership");

        $ownership = $ownershipModel->find($ownership_id);
        $payments = $paymentModel->findByOwnership($ownership_id);
        $totalPaid = $paymentModel->totalPaid($ownership_id);

        $page_title = "فاکتور پرداخت";

        $this->view("payments/invoice", compact('ownership', 'payments', 'totalPaid', 'page_title'));
    }
}
