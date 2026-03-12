<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست رزروها</h2>
    <a href="/apartment_system/public/?route=reservations_create" class="btn btn-primary">رزرو جدید</a>
</div>

<div class="table-container">
    <table id="reservations-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>مشتری</th>
            <th>آپارتمان</th>
            <th>پروژه</th>
            <th>بلاک</th>
            <th>طبقه</th>
            <th>وضعیت رزرو</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reservations as $r): ?>
        <tr>
            <td><?= $r['customer_name'] ?></td>
            <td><?= $r['apartment_number'] ?></td>
            <td><?= $r['project_name'] ?></td>
            <td><?= $r['block_name'] ?></td>
            <td><?= $r['floor_number'] ?></td>
            <td><?= $r['status'] ?></td>
            <td>
                <?php if ($r['status'] == 'ACTIVE'): ?>
                    <a href="/apartment_system/public/?route=reservations_convert&id=<?= $r['id'] ?>" 
                       class="btn btn-success btn-sm">تبدیل به فروش</a>
                <?php endif; ?>

                <a href="/apartment_system/public/?route=reservations_delete&id=<?= $r['id'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('حذف شود؟')">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
