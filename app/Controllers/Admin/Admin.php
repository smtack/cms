<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $model = model(PostModel::class);

        $data = [
            'posts' => $model->orderBy('id', 'DESC')->findAll(),
            'title' => 'Welcome to CMS',
        ];

        return view('admin/index', $data);
    }
}
