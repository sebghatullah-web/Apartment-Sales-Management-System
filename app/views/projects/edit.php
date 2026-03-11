<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ویرایش پروژه</h2>

<form method="post" action="/apartment_system/public/?route=projects_update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($project['id']) ?>">

    <div class="mb-3">
        <label class="form-label">نام پروژه</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($project['name']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">موقعیت</label>
        <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($project['location']) ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">حالت</label>
        <input type="text" name="status" class="form-control" value="<?= htmlspecialchars($project['status']) ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">توضیحات</label>
        <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($project['description']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">به‌روزرسانی</button>
    <a href="/apartment_system/public/?route=projects" class="btn btn-secondary">بازگشت</a>
</form>

<?php require "../app/views/layouts/footer.php"; ?>
