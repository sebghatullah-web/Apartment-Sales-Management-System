<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>
<h3>Sales Report</h3>

<form method="get">
    <input type="hidden" name="route" value="report_sales">

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

<div class="table-container">
    <table id="sales-report-table" class="table table-bordered">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Project</th>
            <th>Apartment</th>
            <th>Sale Date</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($sales as $s): ?>
        <tr>
            <td><?= $s['full_name'] ?></td>
            <td><?= $s['project_name'] ?></td>
            <td><?= $s['apartment_number'] ?></td>
            <td><?= $s['sale_date'] ?></td>
            <td><?= number_format($s['apartment_price']) ?></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>