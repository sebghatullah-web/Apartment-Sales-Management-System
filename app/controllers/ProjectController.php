<?php

class ProjectController extends Controller
{
    public function index()
    {
        $projectModel = $this->model("Project");
        $projects = $projectModel->all();
        $page_title = "لیست پروژه‌ها";

        $this->view("projects/index", compact('projects', 'page_title'));
    }

    public function create()
    {
        $page_title = "ایجاد پروژه جدید";
        $this->view("projects/create", compact('page_title'));
    }

    public function store()
    {
        $projectModel = $this->model("Project");

        $data = [
            'name' => $_POST['name'] ?? '',
            'location' => $_POST['location'] ?? '',
            'description' => $_POST['description'] ?? '',
            'status' => $_POST['status'] ?? '',
        ];

        $projectModel->create($data);

        header("Location: /apartment_system/public/?route=projects");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("پروژه مشخص نشده است.");
        }

        $projectModel = $this->model("Project");
        $project = $projectModel->find($id);
        if (!$project) {
            die("پروژه یافت نشد.");
        }

        $page_title = "ویرایش پروژه";
        $this->view("projects/edit", compact('project', 'page_title'));
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            die("پروژه مشخص نشده است.");
        }

        $projectModel = $this->model("Project");

        $data = [
            'name' => $_POST['name'] ?? '',
            'location' => $_POST['location'] ?? '',
            'description' => $_POST['description'] ?? '',
            'status' => $_POST['status'] ?? '',
        ];

        $projectModel->updateProject($id, $data);

        header("Location: /apartment_system/public/?route=projects");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("پروژه مشخص نشده است.");
        }

        $projectModel = $this->model("Project");
        $projectModel->deleteProject($id);

        header("Location: /apartment_system/public/?route=projects");
        exit;
    }
}
