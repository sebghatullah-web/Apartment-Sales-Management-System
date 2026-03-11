<?php require "../app/views/layouts/header.php"; ?>
<?php require "../app/views/layouts/sidebar.php"; ?>

<h2 class="mb-3">ایجاد پروژه جدید</h2>

<form method="post" action="/apartment_system/public/?route=projects_store">
    <div class="mb-3">
        <label class="form-label">نام پروژه</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">موقعیت</label>
        <input type="text" name="location" class="form-control">
    </div>

    <div class="mb-3">
        <select name="status" class="form-control">
            <option value="ACTIVE">فعال</option>
            <option value="INACTIVE">غیرفعال</option>
            <option value="COMPLETED">تکمیل‌شده</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">توضیحات</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-success">ذخیره</button>
    <a href="/apartment_system/public/?route=projects" class="btn btn-secondary">بازگشت</a>
</form>

<?php require "../app/views/layouts/footer.php"; ?>
