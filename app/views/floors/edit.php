<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ویرایش طبقه</h2>

<form method="post" action="/apartment_system/public/?route=floors_update">

    <input type="hidden" name="id" value="<?= $floor['id'] ?>">

    <div class="mb-3">
        <label class="form-label">بلاک</label>
        <select name="block_id" class="form-control" required>
            <?php foreach ($blocks as $block): ?>
                <option value="<?= $block['id'] ?>"
                    <?= $block['id'] == $floor['block_id'] ? 'selected' : '' ?>>
                    <?= $block['name'] ?> (<?= $block['project_name'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">شماره طبقه</label>
        <input type="number" name="floor_number" class="form-control" value="<?= $floor['floor_number'] ?>" required>
    </div>

    <button class="btn btn-success">به‌روزرسانی</button>
    <a href="/apartment_system/public/?route=floors" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
