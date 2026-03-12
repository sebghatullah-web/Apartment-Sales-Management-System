<?php

class FloorController extends Controller
{
    public function index()
    {
        $floorModel = $this->model("Floor");
        $blockModel = $this->model("Block");

        $floors = $floorModel->all();
        $blocks = $blockModel->all();

        $page_title = "لیست طبقات";

        $this->view("floors/index", compact('floors', 'blocks', 'page_title'));
    }

    public function create()
    {
        $blockModel = $this->model("Block");
        $blocks = $blockModel->getBlocksWithAvailableFloors();

        $page_title = "ایجاد طبقه جدید";

        $this->view("floors/create", compact('blocks', 'page_title'));
    }

    public function store()
    {
        $floorModel = $this->model("Floor");

        $data = [
            'block_id' => $_POST['block_id'],
            'floor_number' => $_POST['floor_number'],
        ];

        $floorModel->create($data);

        header("Location: /apartment_system/public/?route=floors");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("طبقه مشخص نشده است.");

        $floorModel = $this->model("Floor");
        $blockModel = $this->model("Block");

        $floor = $floorModel->find($id);
        $blocks = $blockModel->all();

        if (!$floor) die("طبقه یافت نشد.");

        $page_title = "ویرایش طبقه";

        $this->view("floors/edit", compact('floor', 'blocks', 'page_title'));
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) die("طبقه مشخص نشده است.");

        $floorModel = $this->model("Floor");

        $data = [
            'block_id' => $_POST['block_id'],
            'floor_number' => $_POST['floor_number'],
        ];

        $floorModel->updateFloor($id, $data);

        header("Location: /apartment_system/public/?route=floors");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("طبقه مشخص نشده است.");

        $floorModel = $this->model("Floor");
        $floorModel->deleteFloor($id);

        header("Location: /apartment_system/public/?route=floors");
        exit;
    }
}
