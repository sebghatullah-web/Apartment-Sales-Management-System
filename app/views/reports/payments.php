<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>
<h3>Payments Report</h3>

<form method="get">
    <input type="hidden" name="route" value="report_payments">

    <div class="row mb-3">
        <div class="col-md-3">
            <label>From Date</label>
            <input type="date" name="from" class="form-control" value="<?= $_GET['from'] ?? '' ?>">
        </div>

        <div class="col-md-3">
            <label>To Date</label>
            <input type="date" name="to" class="form-control" value="<?= $_GET['to'] ?? '' ?>">
        </div>

        <div class="col-md-3">
            <label>&nbsp;</label>
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Ownership ID</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Method</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($payments as $p): ?>
        <tr>
            <td><?= $p['full_name'] ?></td>
            <td><?= $p['ownership_id'] ?></td>
            <td><?= number_format($p['amount']) ?></td>
            <td><?= $p['payment_date'] ?></td>
            <td><?= $p['method'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require "../app/views/layouts/footer.php"; ?>