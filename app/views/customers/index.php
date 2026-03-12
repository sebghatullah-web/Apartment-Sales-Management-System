<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست مشتریان</h2>
    <a href="/apartment_system/public/?route=customers_create" class="btn btn-primary">مشتری جدید</a>
</div>

<div class="table-container">
    <table id="customers-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>نام</th>
            <th>ولد/بنت</th>
            <th>شماره تذکره</th>
            <th>تلفن</th>
            <th>ایمیل</th>
            <th>آدرس</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $c): ?>
        <tr>
            <td><?= $c['full_name'] ?></td>
            <td><?= $c['father_name'] ?></td>
            <td><?= $c['passport'] ?></td>
            <td><?= $c['phone'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><?= $c['addressc'] ?></td>
            <td>
                <a href="/apartment_system/public/?route=customers_edit&id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                <a href="/apartment_system/public/?route=customers_delete&id=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
