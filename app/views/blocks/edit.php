<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ویرایش بلاک</h2>

<form method="post" action="/apartment_system/public/?route=blocks_update">

    <input type="hidden" name="id" value="<?= $block['id'] ?>">

    <div class="mb-3">
        <label class="form-label">پروژه</label>
        <select name="project_id" class="form-control" required>
            <?php foreach ($projects as $project): ?>
                <option value="<?= $project['id'] ?>" 
                    <?= $project['id'] == $block['project_id'] ? 'selected' : '' ?>>
                    <?= $project['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">نام بلاک</label>
        <input type="text" name="name" class="form-control" value="<?= $block['name'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">تعداد طبقات</label>
        <input type="number" name="floors_count" class="form-control" value="<?= $block['floors_count'] ?>" required>
    </div>

    <button class="btn btn-success">به‌روزرسانی</button>
    <a href="/apartment_system/public/?route=blocks" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
