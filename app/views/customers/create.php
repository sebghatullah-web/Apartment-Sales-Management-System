<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ایجاد مشتری جدید</h2>

<form method="post" action="/apartment_system/public/?route=customers_store">

    <div class="mb-3">
        <label class="form-label">نام کامل</label>
        <input type="text" name="full_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">ولد/بنت</label>
        <input type="text" name="father_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">نمبر تذکره</label>
        <input type="text" name="passport" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">شماره تلفن</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">آدرس</label>
        <input type="text" name="addressc" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">ایمیل</label>
        <input type="email" name="email" class="form-control">
    </div>



    <button class="btn btn-success">ذخیره</button>
    <a href="/apartment_system/public/?route=customers" class="btn btn-secondary">بازگشت</a>

</form>

<?php require "../app/views/layouts/footer.php"; ?>
