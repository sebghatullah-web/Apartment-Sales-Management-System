<?php
$baseUrl = "http://localhost/apartment_system/public";
$currentRoute = $_GET['route'] ?? 'dashboard';

// تابع کمکی برای فعال کردن لینک
function isActive($route, $currentRoute) {
    return $route === $currentRoute ? 'active bg-secondary text-white' : 'text-white';
}

// تابع کمکی برای باز کردن collapse
function isOpen($routes, $currentRoute) {
    return in_array($currentRoute, $routes) ? 'show' : '';
}
?>

<div class="col-md-2 col-lg-2 bg-dark text-white min-vh-100 p-0">

    <div class="p-3 border-bottom">
        <h5 class="text-center">پنل مدیریت</h5>
    </div>

    <ul class="nav flex-column p-2">

        <!-- داشبورد -->
        <li class="nav-item">
            <a class="nav-link <?= isActive('dashboard', $currentRoute) ?>" 
               href="<?= $baseUrl ?>/?route=dashboard">
                <i class="bi bi-speedometer2"></i> داشبورد
            </a>
        </li>

        <hr class="text-secondary">

        <!-- پروژه‌ها -->
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#projectsMenu">
                <i class="bi bi-building"></i> پروژه‌ها
                <i class="bi bi-chevron-down float-end"></i>
            </a>

            <div class="collapse <?= isOpen(['projects','blocks','floors','apartments'], $currentRoute) ?>" id="projectsMenu">
                <ul class="nav flex-column ms-3">

                    <li>
                        <a class="nav-link <?= isActive('projects', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=projects">لیست پروژه‌ها</a>
                    </li>

                    <li>
                        <a class="nav-link <?= isActive('blocks', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=blocks">بلاک‌ها</a>
                    </li>

                    <li>
                        <a class="nav-link <?= isActive('floors', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=floors">طبقات</a>
                    </li>

                    <li>
                        <a class="nav-link <?= isActive('apartments', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=apartments">آپارتمان‌ها</a>
                    </li>

                </ul>
            </div>
        </li>

        <hr class="text-secondary">

        <!-- مشتریان -->
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#customersMenu">
                <i class="bi bi-people"></i> مشتریان
                <i class="bi bi-chevron-down float-end"></i>
            </a>

            <div class="collapse <?= isOpen(['customers'], $currentRoute) ?>" id="customersMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link <?= isActive('customers', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=customers">لیست مشتریان</a>
                    </li>
                </ul>
            </div>
        </li>

        <hr class="text-secondary">

        <!-- فروش و رزرو -->
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#salesMenu">
                <i class="bi bi-receipt"></i> فروش و رزرو
                <i class="bi bi-chevron-down float-end"></i>
            </a>

            <div class="collapse <?= isOpen(['reservations','ownerships'], $currentRoute) ?>" id="salesMenu">
                <ul class="nav flex-column ms-3">

                    <li>
                        <a class="nav-link <?= isActive('reservations', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=reservations">رزروها</a>
                    </li>

                    <li>
                        <a class="nav-link <?= isActive('ownerships', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=ownerships">فروش‌ها</a>
                    </li>

                </ul>
            </div>
        </li>

        <hr class="text-secondary">

        <!-- پرداخت‌ها -->
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#paymentsMenu">
                <i class="bi bi-cash-stack"></i> پرداخت‌ها
                <i class="bi bi-chevron-down float-end"></i>
            </a>

            <div class="collapse <?= isOpen(['payments'], $currentRoute) ?>" id="paymentsMenu">
                <ul class="nav flex-column ms-3">
                    <li>
                        <a class="nav-link <?= isActive('payments', $currentRoute) ?>" 
                           href="<?= $baseUrl ?>/?route=payments">لیست پرداخت‌ها</a>
                    </li>
                </ul>
            </div>
        </li>

        <hr class="text-secondary">

        <!-- گزارش‌ها -->
        <li class="nav-item">
            <a class="nav-link text-white" data-bs-toggle="collapse" href="#reportsMenu">
                <i class="bi bi-bar-chart"></i> گزارش‌ها
                <i class="bi bi-chevron-down float-end"></i>
            </a>

            <div class="collapse <?= isOpen(['reports', 'report_sales', 'report_payments', 'report_reservations'], $currentRoute) ?>" id="reportsMenu">
                <ul class="nav flex-column ms-3">

                    <li>
                        <a class="nav-link text-white" href="/apartment_system/public/?route=report_sales">
                            گزارش فروش
                        </a>
                    </li>

                    <li>
                        <a class="nav-link text-white" href="/apartment_system/public/?route=report_payments">
                            گزارش پرداخت‌ها
                        </a>
                    </li>

                    <li>
                        <a class="nav-link text-white" href="/apartment_system/public/?route=report_reservations">
                            گزارش رزروها
                        </a>
                    </li>

                </ul>
            </div>
        </li>


    </ul>
</div>

<div class="col-md-10 col-lg-10 p-4">
