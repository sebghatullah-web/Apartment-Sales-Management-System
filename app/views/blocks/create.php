<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ایجاد بلاک جدید</h2>

<form method="post" action="/apartment_system/public/?route=blocks_store">

    <div class="mb-3">
        <label class="form-label">پروژه</label>
        <select name="project_id" class="form-control" required>
            <option value="">انتخاب پروژه</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?= $project['id'] ?>"><?= $project['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">نام بلاک</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">تعداد طبقات</label>
        <input type="number" name="floors_count" class="form-control" required>
    </div>

    <button class="btn btn-success">ذخیره</button>
    <a href="/apartment_system/public/?route=blocks" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
