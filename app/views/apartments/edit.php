<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ویرایش آپارتمان</h2>

<form method="post" action="/apartment_system/public/?route=apartments_update">

    <input type="hidden" name="id" value="<?= $apartment['id'] ?>">

    <!-- انتخاب طبقه -->
    <div class="mb-3">
        <label class="form-label">طبقه</label>
        <select name="floor_id" class="form-control" required>
            <?php foreach ($floors as $floor): ?>
                <option value="<?= $floor['id'] ?>"
                    <?= $floor['id'] == $apartment['floor_id'] ? 'selected' : '' ?>>
                    <?= $floor['project_name'] ?> → <?= $floor['block_name'] ?> → طبقه <?= $floor['floor_number'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- شماره آپارتمان -->
    <div class="mb-3">
        <label class="form-label">شماره آپارتمان</label>
        <input type="text" name="apartment_number" class="form-control"
               value="<?= $apartment['apartment_number'] ?>" required>
    </div>

    <!-- متراژ -->
    <div class="mb-3">
        <label class="form-label">متراژ (متر مربع)</label>
        <input type="number" name="area" class="form-control"
               value="<?= $apartment['area'] ?>">
    </div>

    <!-- تعداد اتاق -->
    <div class="mb-3">
        <label class="form-label">تعداد اتاق</label>
        <input type="number" name="rooms" class="form-control"
               value="<?= $apartment['rooms'] ?>">
    </div>

    <!-- وضعیت ساخت -->
    <div class="mb-3">
        <label class="form-label">وضعیت ساخت</label>
        <select name="status" class="form-control">
            <option value="COMPLETED" 
                <?= $apartment['status'] == 'COMPLETED' ? 'selected' : '' ?>>
                تکمیل‌شده
            </option>

            <option value="UNDER_CONSTRUCTION" 
                <?= $apartment['status'] == 'UNDER_CONSTRUCTION' ? 'selected' : '' ?>>
                در حال ساخت
            </option>

            <option value="NOT_STARTED" 
                <?= $apartment['status'] == 'NOT_STARTED' ? 'selected' : '' ?>>
                شروع نشده
            </option>
        </select>
    </div>

    <!-- قیمت پایه -->
    <div class="mb-3">
        <label class="form-label">قیمت پایه</label>
        <input type="number" name="base_price" class="form-control"
               value="<?= $apartment['base_price'] ?>">
    </div>

    <!-- هزینه کل برآوردی -->
    <div class="mb-3">
        <label class="form-label">هزینه کل برآوردی</label>
        <input type="number" name="estimated_total_cost" class="form-control"
               value="<?= $apartment['estimated_total_cost'] ?>">
    </div>

    <!-- هزینه خرج‌شده -->
    <div class="mb-3">
        <label class="form-label">هزینه خرج‌شده</label>
        <input type="number" name="spent_cost" class="form-control"
               value="<?= $apartment['spent_cost'] ?>">
    </div>

    <button class="btn btn-success">به‌روزرسانی</button>
    <a href="/apartment_system/public/?route=apartments" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
