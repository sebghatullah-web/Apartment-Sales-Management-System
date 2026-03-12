<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست پرداخت‌ها</h2>
    <a href="/apartment_system/public/?route=payments_create" class="btn btn-primary">پرداخت جدید</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>مشتری</th>
            <th>آپارتمان</th>
            <th>مبلغ</th>
            <th>تاریخ</th>
            <th>روش پرداخت</th>
            <th>فاکتور</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($payments as $p): ?>
        <tr>
            <td><?= $p['customer_name'] ?></td>
            <td><?= $p['apartment_number'] ?></td>
            <td><?= number_format($p['amount']) ?></td>
            <td><?= $p['payment_date'] ?></td>
            <td><?= $p['method'] ?></td>
            <td>
                <a href="/apartment_system/public/?route=payments_invoice&ownership_id=<?= $p['ownership_id'] ?>" 
                   class="btn btn-sm btn-secondary" target="_blank">مشاهده فاکتور</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
