<?php
session_start();
// public/index.php

require_once "../app/core/Database.php";
require_once "../app/core/Controller.php";
require_once "../app/core/Model.php";

$route = $_GET['route'] ?? 'dashboard';

// کنترل دسترسی
if (!isset($_SESSION['user']) && !in_array($route, ['login', 'do_login'])) {
    header("Location: /apartment_system/public/?route=login");
    exit;
}

require_once "../routes/web.php";
