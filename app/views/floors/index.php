<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست طبقات</h2>
    <a href="/apartment_system/public/?route=floors_create" class="btn btn-primary">طبقه جدید</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>شماره طبقه</th>
            <th>بلاک</th>
            <th>پروژه</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($floors as $floor): ?>
        <tr>
            <td><?= $floor['id'] ?></td>
            <td><?= $floor['floor_number'] ?></td>
            <td><?= $floor['block_name'] ?></td>
            <td><?= $floor['project_name'] ?></td>
            <td>
                <a href="/apartment_system/public/?route=floors_edit&id=<?= $floor['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                <a href="/apartment_system/public/?route=floors_delete&id=<?= $floor['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
