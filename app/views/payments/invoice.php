<?php require "../app/views/layouts/header.php"; ?>

<h2 class="mb-3">فاکتور پرداخت</h2>

<p><strong>مشتری:</strong> <?= $ownership['customer_name'] ?></p>
<p><strong>آپارتمان:</strong> <?= $ownership['apartment_number'] ?></p>
<p><strong>پروژه:</strong> <?= $ownership['project_name'] ?></p>
<p><strong>بلاک:</strong> <?= $ownership['block_name'] ?></p>
<p><strong>طبقه:</strong> <?= $ownership['floor_number'] ?></p>
<p><strong>قیمت کل:</strong> <?= number_format($ownership['sale_price']) ?></p>
<p><strong>مجموع پرداخت:</strong> <?= number_format($totalPaid) ?></p>
<p><strong>باقی‌مانده:</strong> <?= number_format($ownership['sale_price'] - $totalPaid) ?></p>

<hr>

<h4>لیست پرداخت‌ها</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>مبلغ</th>
            <th>تاریخ</th>
            <th>روش</th>
            <th>توضیحات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($payments as $p): ?>
        <tr>
            <td><?= number_format($p['amount']) ?></td>
            <td><?= $p['payment_date'] ?></td>
            <td><?= $p['method'] ?></td>
            <td><?= $p['description'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<button onclick="window.print()" class="btn btn-primary">پرینت</button>

<?php require "../app/views/layouts/footer.php"; ?>
