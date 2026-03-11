<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">پرداخت جدید</h2>

<form method="post" action="/apartment_system/public/?route=payments_store">

    <div class="mb-3">
        <label>مالکیت (فروش)</label>
        <select name="ownership_id" class="form-control" required>
            <option value="">انتخاب</option>
            <?php foreach ($ownerships as $o): ?>
                <option value="<?= $o['id'] ?>">
                    <?= $o['customer_name'] ?> → آپارتمان <?= $o['apartment_number'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>مبلغ</label>
        <input type="number" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>تاریخ پرداخت</label>
        <input type="date" name="payment_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>روش پرداخت</label>
        <input type="text" name="method" class="form-control">
    </div>

    <div class="mb-3">
        <label>توضیحات</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button class="btn btn-success">ثبت پرداخت</button>
</form>

<?php require "../app/views/layouts/footer.php"; ?>
