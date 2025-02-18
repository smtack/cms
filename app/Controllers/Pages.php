<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    // Welcome Page
    public function index(): string
    {
        return view('templates/header', ['title' => 'Welcome to CMS'])
            . view('pages/index')
            . view('templates/footer');
    }

    // Display page if view exists
    public function view(string $page)
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }

    // Posts page
    public function posts()
    {
        $model = model(PostModel::class);

        $data = [
            'posts' => $model->getPosts(),
            'title' => 'Posts',
        ];

        return view('templates/header', $data)
            . view('pages/posts')
            . view('templates/footer');
    }

    // Single post page
    public function post(?string $slug = null)
    {
        $model = model(PostModel::class);

        $data['post'] = $model->getPosts($slug);

        if ($data['post'] === null) {
            throw new PageNotFoundException('Cannot find post: ' . $slug);
        }

        $data['title'] = $data['post']['title'];

        return view('templates/header', $data)
            . view('pages/single')
            . view('templates/footer');
    }
}