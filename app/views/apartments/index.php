<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست آپارتمان‌ها</h2>
    <a href="/apartment_system/public/?route=apartments_create" class="btn btn-primary">آپارتمان جدید</a>
</div>

<div class="table-container">
    <table id="apartments-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>شماره</th>
            <th>پروژه</th>
            <th>بلاک</th>
            <th>طبقه</th>
            <th>متراژ</th>
            <th>اتاق</th>
            <th>وضعیت</th>
            <th>هزینه باقی‌مانده</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($apartments as $ap): ?>
        <tr>
            <td><?= $ap['apartment_number'] ?></td>
            <td><?= $ap['project_name'] ?></td>
            <td><?= $ap['block_name'] ?></td>
            <td><?= $ap['floor_number'] ?></td>
            <td><?= $ap['area'] ?></td>
            <td><?= $ap['rooms'] ?></td>
            <td><?= $ap['status'] ?></td>
            <td>
                <?= number_format($ap['estimated_total_cost'] - $ap['spent_cost']) ?>
            </td>
            <td>
                <a href="/apartment_system/public/?route=apartments_edit&id=<?= $ap['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                <a href="/apartment_system/public/?route=apartments_delete&id=<?= $ap['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
