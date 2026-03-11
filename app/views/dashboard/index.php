<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<?php
// ماه‌های میلادی
$months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

// فروش ماهانه
$salesData = array_fill(1, 12, 0);
foreach ($salesByMonth as $row) {
    $salesData[$row['month']] = (float)$row['total_amount'];
}

// پرداخت ماهانه
$paymentData = array_fill(1, 12, 0);
foreach ($paymentsByMonth as $row) {
    $paymentData[$row['month']] = (float)$row['total_amount'];
}

// رزرو ماهانه
$reservationData = array_fill(1, 12, 0);
foreach ($reservationsByMonth as $row) {
    $reservationData[$row['month']] = (int)$row['total_reservations'];
}
?>

<h2 class="mb-4">داشبورد مدیریت</h2>

<!-- کارت‌های آماری -->
<div class="row mb-4">

    <div class="col-md-2">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h6 class="card-title">پروژه‌ها</h6>
                <h3><?= $stats['projects'] ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h6 class="card-title">آپارتمان‌ها</h6>
                <h3><?= $stats['apartments'] ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h6 class="card-title">مشتریان</h6>
                <h3><?= $stats['customers'] ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h6 class="card-title">رزروها</h6>
                <h3><?= $stats['reservations'] ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h6 class="card-title">فروش‌ها</h6>
                <h3><?= $stats['sales'] ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h6 class="card-title">پرداخت‌ها</h6>
                <h3><?= $stats['payments'] ?></h3>
            </div>
        </div>
    </div>

</div>

<!-- نمودارها -->
<div class="row mb-4">

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">نمودار فروش ماهانه</div>
            <div class="card-body">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">نمودار پرداخت‌های ماهانه</div>
            <div class="card-body">
                <canvas id="paymentsChart"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="row mb-4">

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">نمودار رزروهای ماهانه</div>
            <div class="card-body">
                <canvas id="reservationsChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">وضعیت پروژه‌ها</div>
            <div class="card-body">
                <canvas id="projectStatusChart"></canvas>
            </div>
        </div>
    </div>

</div>

<!-- آخرین رزروها و پرداخت‌ها -->
<div class="row mb-4">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">آخرین رزروها</div>
            <div class="card-body">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>مشتری</th>
                            <th>آپارتمان</th>
                            <th>وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recent_reservations as $r): ?>
                        <tr>
                            <td><?= $r['customer_name'] ?></td>
                            <td><?= $r['apartment_number'] ?></td>
                            <td><?= $r['status'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">آخرین پرداخت‌ها</div>
            <div class="card-body">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>مشتری</th>
                            <th>مبلغ</th>
                            <th>تاریخ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recent_payments as $p): ?>
                        <tr>
                            <td><?= $p['customer_name'] ?></td>
                            <td><?= number_format($p['amount']) ?></td>
                            <td><?= $p['payment_date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const months = <?= json_encode($months) ?>;

// فروش
new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: "Sales ($)",
            data: <?= json_encode(array_values($salesData)) ?>,
            borderColor: "blue",
            fill: false
        }]
    }
});

// پرداخت‌ها
new Chart(document.getElementById('paymentsChart'), {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: "Payments ($)",
            data: <?= json_encode(array_values($paymentData)) ?>,
            backgroundColor: "green"
        }]
    }
});

// رزروها
new Chart(document.getElementById('reservationsChart'), {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: "Reservations",
            data: <?= json_encode(array_values($reservationData)) ?>,
            borderColor: "orange",
            fill: false
        }]
    }
});

// وضعیت پروژه‌ها
new Chart(document.getElementById('projectStatusChart'), {
    type: 'pie',
    data: {
        labels: <?= json_encode(array_column($projectStatus, 'status')) ?>,
        datasets: [{
            data: <?= json_encode(array_column($projectStatus, 'total')) ?>,
            backgroundColor: ["#0d6efd","#198754","#dc3545","#ffc107"]
        }]
    }
});
</script>

<?php require "../app/views/layouts/footer.php"; ?>
