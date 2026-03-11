<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ایجاد رزرو جدید</h2>

<form method="post" action="/apartment_system/public/?route=reservations_store">

    <div class="mb-3">
        <label class="form-label">مشتری</label>
        <select name="customer_id" class="form-control" required>
            <option value="">انتخاب مشتری</option>
            <?php foreach ($customers as $c): ?>
                <option value="<?= $c['id'] ?>"><?= $c['full_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">آپارتمان</label>
        <select name="apartment_id" class="form-control" required>
            <option value="">انتخاب آپارتمان</option>
            <?php foreach ($apartments as $ap): ?>
                <?php if ($ap['status'] != 'COMPLETED'): ?>
                    <option value="<?= $ap['id'] ?>">
                        <?= $ap['project_name'] ?> → <?= $ap['block_name'] ?> → طبقه <?= $ap['floor_number'] ?> → آپارتمان <?= $ap['apartment_number'] ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-success">ذخیره</button>
    <a href="/apartment_system/public/?route=reservations" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
