<?php

namespace App\Controllers\Admin;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Posts extends ResourceController
{
    protected $modelName = 'App\Models\PostModel';

    public function __construct()
    {
        helper('form');
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        return redirect()->to('/admin');
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        if (!$post = $this->model->find($id)) {
            throw new PageNotFoundException("Couldn't find post");
        }

        return view('admin/show', ['post' => $post]);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('admin/create');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = [];

        $file = $this->request->getFile('image');

        if($file != '') {
            $validate_file = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[image,1024]',
                ],
            ]);

            if(!$validate_file) {
                return redirect()->back()->withInput()->with('errors', ['This file could not be uploaded']);
            } else {
                $file_name = $file->getRandomName();

                $file->move('./uploads/images', $file_name);

                $data += ['image' => $file_name];
            }
        }

        $data += [
            'title' => $this->request->getPost('title'),
            'label' => $this->request->getPost('label'),
            'slug' => url_title($this->request->getPost('title'), '-', true) . '-' . random_int(100, 100000),
            'body' => $this->request->getPost('body'),
        ];

        if (!$this->model->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/admin')->with('success', 'Post created successfully');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        if (!$post = $this->model->find($id)) {
            throw new PageNotFoundException("Couldn't find post");
        }

        return view('admin/edit', ['post' => $post]);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        if (!$post = $this->model->find($id)) {
            throw new PageNotFoundException("Couldn't find post");
        }

        $data = [];

        $file = $this->request->getFile('image');

        if($file != '') {
            $validate_file = $this->validate([
                'image' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[image,1024]',
                ],
            ]);

            if(!$validate_file) {
                return redirect()->back()->withInput()->with('errors', ['This file could not be uploaded']);
            } else {
                $file_name = $file->getRandomName();

                $file->move('./uploads/images', $file_name);

                if($post['image']) {
                    unlink('./uploads/images/' . $post['image']);
                }

                $data += ['image' => $file_name];
            }
        }

        $data += [
            'title' => $this->request->getPost('title'),
            'label' => $this->request->getPost('label'),
            'slug' => url_title($this->request->getPost('title'), '-', true) . '-' . random_int(100, 100000),
            'body' => $this->request->getPost('body'),
        ];

        if (!$this->model->where('id', $id)->set($data)->update()) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/admin')->with('success', 'Post updated successfully');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if (!$post = $this->model->find($id)) {
            throw new PageNotFoundException("Couldn't find post");
        }

        $this->model->delete($id);

        if($post['image']) {
            unlink('./uploads/images/' . $post['image']);
        }

        return redirect()->to('/admin')->with('success', 'Post deleted successfully');
    }
}