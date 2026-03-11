<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ایجاد طبقه جدید</h2>

<form method="post" action="/apartment_system/public/?route=floors_store">

    <div class="mb-3">
        <label class="form-label">بلاک</label>
        <select name="block_id" class="form-control" required>
            <option value="">انتخاب بلاک</option>
            <?php foreach ($blocks as $block): ?>
                <option value="<?= $block['id'] ?>"><?= $block['name'] ?> (<?= $block['project_name'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">شماره طبقه</label>
        <input type="number" name="floor_number" class="form-control" required>
    </div>

    <button class="btn btn-success">ذخیره</button>
    <a href="/apartment_system/public/?route=floors" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
