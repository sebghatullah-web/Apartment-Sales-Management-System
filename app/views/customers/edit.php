<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ویرایش مشتری</h2>

<form method="post" action="/apartment_system/public/?route=customers_update">

    <input type="hidden" name="id" value="<?= $customer['id'] ?>">

    <div class="mb-3">
        <label class="form-label">نام کامل</label>
        <input type="text" name="full_name" class="form-control" value="<?= $customer['full_name'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">شماره تلفن</label>
        <input type="text" name="phone" class="form-control" value="<?= $customer['phone'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">ایمیل</label>
        <input type="email" name="email" class="form-control" value="<?= $customer['email'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">کد ملی</label>
        <input type="text" name="national_id" class="form-control" value="<?= $customer['national_id'] ?>">
    </div>

    <button class="btn btn-success">به‌روزرسانی</button>
    <a href="/apartment_system/public/?route=customers" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
