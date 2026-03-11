<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between mb-3">
    <h2>لیست بلاک‌ها</h2>
    <a href="/apartment_system/public/?route=blocks_create" class="btn btn-primary">بلاک جدید</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام بلاک</th>
            <th>پروژه</th>
            <th>تعداد طبقات</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($blocks as $block): ?>
        <tr>
            <td><?= $block['id'] ?></td>
            <td><?= $block['name'] ?></td>
            <td><?= $block['project_name'] ?></td>
            <td><?= $block['floors_count'] ?></td>
            <td>
                <a href="/apartment_system/public/?route=blocks_edit&id=<?= $block['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                <a href="/apartment_system/public/?route=blocks_delete&id=<?= $block['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
