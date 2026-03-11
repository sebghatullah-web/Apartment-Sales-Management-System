<?php
if (!isset($page_title)) {
    $page_title = "پنل مدیریت";
}
$baseUrl = "/apartment_system/public"; // اگر نام فولدرت چیز دیگری است، این را عوض کن
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $baseUrl ?>/?route=dashboard">سیستم مدیریت اپارتمان</a>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
