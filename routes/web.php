<?php

switch ($route) {
    case 'dashboard':
        require "../app/controllers/DashboardController.php";
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'projects':
        require "../app/controllers/ProjectController.php";
        $controller = new ProjectController();
        $controller->index();
        break;

    case 'projects_create':
        require "../app/controllers/ProjectController.php";
        $controller = new ProjectController();
        $controller->create();
        break;

    case 'projects_store':
        require "../app/controllers/ProjectController.php";
        $controller = new ProjectController();
        $controller->store();
        break;

    case 'projects_edit':
        require "../app/controllers/ProjectController.php";
        $controller = new ProjectController();
        $controller->edit();
        break;

    case 'projects_update':
        require "../app/controllers/ProjectController.php";
        $controller = new ProjectController();
        $controller->update();
        break;

    case 'projects_delete':
        require "../app/controllers/ProjectController.php";
        $controller = new ProjectController();
        $controller->delete();
        break;

    case 'blocks':
    require "../app/controllers/BlockController.php";
    (new BlockController())->index();
    break;

    case 'blocks_create':
        require "../app/controllers/BlockController.php";
        (new BlockController())->create();
        break;

    case 'blocks_store':
        require "../app/controllers/BlockController.php";
        (new BlockController())->store();
        break;

    case 'blocks_edit':
        require "../app/controllers/BlockController.php";
        (new BlockController())->edit();
        break;

    case 'blocks_update':
        require "../app/controllers/BlockController.php";
        (new BlockController())->update();
        break;

    case 'blocks_delete':
        require "../app/controllers/BlockController.php";
        (new BlockController())->delete();
        break;

    case 'floors':
    require "../app/controllers/FloorController.php";
    (new FloorController())->index();
    break;

    case 'floors_create':
        require "../app/controllers/FloorController.php";
        (new FloorController())->create();
        break;

    case 'floors_store':
        require "../app/controllers/FloorController.php";
        (new FloorController())->store();
        break;

    case 'floors_edit':
        require "../app/controllers/FloorController.php";
        (new FloorController())->edit();
        break;

    case 'floors_update':
        require "../app/controllers/FloorController.php";
        (new FloorController())->update();
        break;

    case 'floors_delete':
        require "../app/controllers/FloorController.php";
        (new FloorController())->delete();
        break;

    case 'apartments':
    require "../app/controllers/ApartmentController.php";
    (new ApartmentController())->index();
    break;

    case 'apartments_create':
        require "../app/controllers/ApartmentController.php";
        (new ApartmentController())->create();
        break;

    case 'apartments_store':
        require "../app/controllers/ApartmentController.php";
        (new ApartmentController())->store();
        break;

    case 'apartments_edit':
        require "../app/controllers/ApartmentController.php";
        (new ApartmentController())->edit();
        break;

    case 'apartments_update':
        require "../app/controllers/ApartmentController.php";
        (new ApartmentController())->update();
        break;

    case 'apartments_delete':
        require "../app/controllers/ApartmentController.php";
        (new ApartmentController())->delete();
        break;

    case 'reservations':
    require "../app/controllers/ReservationController.php";
    (new ReservationController())->index();
    break;

    case 'reservations_create':
        require "../app/controllers/ReservationController.php";
        (new ReservationController())->create();
        break;

    case 'reservations_store':
        require "../app/controllers/ReservationController.php";
        (new ReservationController())->store();
        break;

    case 'reservations_convert':
        require "../app/controllers/ReservationController.php";
        (new ReservationController())->convertToSale();
        break;

    case 'reservations_delete':
        require "../app/controllers/ReservationController.php";
        (new ReservationController())->delete();
        break;

    case 'customers':
        require "../app/controllers/CustomerController.php";
        (new CustomerController())->index();
        break;

    case 'customers_create':
        require "../app/controllers/CustomerController.php";
        (new CustomerController())->create();
        break;

    case 'customers_store':
        require "../app/controllers/CustomerController.php";
        (new CustomerController())->store();
        break;

    case 'customers_edit':
        require "../app/controllers/CustomerController.php";
        (new CustomerController())->edit();
        break;

    case 'customers_update':
        require "../app/controllers/CustomerController.php";
        (new CustomerController())->update();
        break;

    case 'customers_delete':
        require "../app/controllers/CustomerController.php";
        (new CustomerController())->delete();
        break;

    case 'ownerships':
    require "../app/controllers/OwnershipController.php";
    (new OwnershipController())->index();
    break;

    case 'ownerships_create':
        require "../app/controllers/OwnershipController.php";
        (new OwnershipController())->create();
        break;

    case 'ownerships_store':
        require "../app/controllers/OwnershipController.php";
        (new OwnershipController())->store();
        break;

    case 'ownerships_delete':
        require "../app/controllers/OwnershipController.php";
        (new OwnershipController())->delete();
        break;
    
    case 'payments':
    require "../app/controllers/PaymentController.php";
    (new PaymentController())->index();
    break;

    case 'payments_create':
        require "../app/controllers/PaymentController.php";
        (new PaymentController())->create();
        break;

    case 'payments_store':
        require "../app/controllers/PaymentController.php";
        (new PaymentController())->store();
        break;

    case 'payments_invoice':
        require "../app/controllers/PaymentController.php";
        (new PaymentController())->invoice();
        break;

    case 'login':
    require "../app/controllers/AuthController.php";
    (new AuthController())->login();
    break;

    case 'do_login':
        require "../app/controllers/AuthController.php";
        (new AuthController())->doLogin();
        break;

    case 'logout':
        require "../app/controllers/AuthController.php";
        (new AuthController())->logout();
        break;

    case 'reports':
        require "../app/controllers/ReportController.php";
        (new ReportController())->index();
        break;

    case 'report_sales':
        require "../app/controllers/ReportController.php";
        (new ReportController())->sales();
        break;

    case 'report_payments':
        require "../app/controllers/ReportController.php";
        (new ReportController())->payments();
        break;

    case 'report_reservations':
        require "../app/controllers/ReportController.php";
        (new ReportController())->reservations();
        break;



    default:
        echo "404 - Page Not Found";
}
