<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>لیست پروژه‌ها</h2>
    <a href="/apartment_system/public/?route=projects_create" class="btn btn-primary">پروژه جدید</a>
</div>

<div class="table-container">
    <table id="projects-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام پروژه</th>
            <th>موقعیت</th>
            <th>حالت</th>
            <th>توضیحات</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($projects)): ?>
        <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= htmlspecialchars($project['id']) ?></td>
                <td><?= htmlspecialchars($project['name']) ?></td>
                <td><?= htmlspecialchars($project['location']) ?></td>
                <td><?= htmlspecialchars($project['status']) ?></td>
                <td><?= nl2br(htmlspecialchars($project['description'])) ?></td>
                <td>
                    <a href="/apartment_system/public/?route=projects_edit&id=<?= $project['id'] ?>" class="btn btn-sm btn-warning">ویرایش</a>
                    <a href="/apartment_system/public/?route=projects_delete&id=<?= $project['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('حذف شود؟');">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">هیچ پروژه‌ای ثبت نشده است.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<?php require "../app/views/layouts/footer.php"; ?>
