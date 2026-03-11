<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">فروش جدید</h2>

<form method="post" action="/apartment_system/public/?route=ownerships_store">

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
                <option value="<?= $ap['id'] ?>">
                    <?= $ap['project_name'] ?> → <?= $ap['block_name'] ?> → طبقه <?= $ap['floor_number'] ?> → آپارتمان <?= $ap['apartment_number'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">قیمت فروش</label>
        <input type="number" name="sale_price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">تاریخ فروش</label>
        <input type="date" name="sale_date" class="form-control" required>
    </div>

    <button class="btn btn-success">ثبت فروش</button>
    <a href="/apartment_system/public/?route=ownerships" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
