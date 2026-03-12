<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ایجاد آپارتمان جدید</h2>

<form method="post" action="/apartment_system/public/?route=apartments_store">

    <div class="mb-3">
        <label class="form-label">طبقه</label>
        <select name="floor_id" class="form-control" required>
            <option value="">انتخاب طبقه</option>
            <?php foreach ($floors as $floor): ?>
                <option value="<?= $floor['id'] ?>">
                    <?= $floor['project_name'] ?> → بلاک <?= $floor['block_name'] ?> → طبقه <?= $floor['floor_number'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>شماره آپارتمان</label>
        <input type="text" name="apartment_number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>متراژ</label>
        <input type="number" name="area" class="form-control">
    </div>

    <div class="mb-3">
        <label>تعداد اتاق</label>
        <input type="number" name="rooms" class="form-control">
    </div>

    <div class="mb-3">
        <label>وضعیت ساخت</label>
        <select name="status" class="form-control">
            <option value="COMPLETED">تکمیل‌شده</option>
            <option value="UNDER_CONSTRUCTION">در حال ساخت</option>
            <option value="NOT_STARTED">شروع نشده</option>
        </select>
    </div>

    <div class="mb-3">
        <label>قیمت پایه</label>
        <input type="number" name="base_price" class="form-control">
    </div>

    <div class="mb-3">
        <label>هزینه کل برآوردی</label>
        <input type="number" name="estimated_total_cost" class="form-control">
    </div>

    <div class="mb-3">
        <label>هزینه خرج‌شده</label>
        <input type="number" name="spent_cost" class="form-control" value="0">
    </div>

    <button class="btn btn-success">ذخیره</button>
    <a href="/apartment_system/public/?route=apartments" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
