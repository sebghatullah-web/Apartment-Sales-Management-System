<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست فروش‌ها</h2>
    <a href="/apartment_system/public/?route=ownerships_create" class="btn btn-primary">فروش جدید</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>مشتری</th>
            <th>آپارتمان</th>
            <th>پروژه</th>
            <th>بلاک</th>
            <th>طبقه</th>
            <th>قیمت فروش</th>
            <th>تاریخ فروش</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ownerships as $o): ?>
        <tr>
            <td><?= $o['customer_name'] ?></td>
            <td><?= $o['apartment_number'] ?></td>
            <td><?= $o['project_name'] ?></td>
            <td><?= $o['block_name'] ?></td>
            <td><?= $o['floor_number'] ?></td>
            <td><?= number_format($o['sale_price']) ?></td>
            <td><?= $o['sale_date'] ?></td>
            <td>
                <a href="/apartment_system/public/?route=ownerships_delete&id=<?= $o['id'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('حذف شود؟')">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
