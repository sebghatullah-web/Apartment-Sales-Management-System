<?php

class BlockController extends Controller
{
    public function index()
    {
        $blockModel = $this->model("Block");
        $projectModel = $this->model("Project");

        $blocks = $blockModel->all();
        $projects = $projectModel->all();

        $page_title = "لیست بلاک‌ها";

        $this->view("blocks/index", compact('blocks', 'projects', 'page_title'));
    }

    public function create()
    {
        $projectModel = $this->model("Project");
        $projects = $projectModel->all();

        $page_title = "ایجاد بلاک جدید";

        $this->view("blocks/create", compact('projects', 'page_title'));
    }

    public function store()
    {
        $blockModel = $this->model("Block");

        $data = [
            'project_id' => $_POST['project_id'],
            'name' => $_POST['name'],
            'floors_count' => $_POST['floors_count'],
        ];

        $blockModel->create($data);

        header("Location: /apartment_system/public/?route=blocks");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("بلاک مشخص نشده است.");

        $blockModel = $this->model("Block");
        $projectModel = $this->model("Project");

        $block = $blockModel->find($id);
        $projects = $projectModel->all();

        if (!$block) die("بلاک یافت نشد.");

        $page_title = "ویرایش بلاک";

        $this->view("blocks/edit", compact('block', 'projects', 'page_title'));
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) die("بلاک مشخص نشده است.");

        $blockModel = $this->model("Block");

        $data = [
            'project_id' => $_POST['project_id'],
            'name' => $_POST['name'],
            'floors_count' => $_POST['floors_count'],
        ];

        $blockModel->updateBlock($id, $data);

        header("Location: /apartment_system/public/?route=blocks");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("بلاک مشخص نشده است.");

        $blockModel = $this->model("Block");
        $blockModel->deleteBlock($id);

        header("Location: /apartment_system/public/?route=blocks");
        exit;
    }
}
