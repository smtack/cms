<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="text-center mt-5 mb-3">
        CMS Admin
    </h2>
    <div class="card">
        <div class="card-header">
            <a href="/admin/posts/new" class="btn btn-outline-primary">New Post</a>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <b><?= session()->getFlashdata('success') ?></b>
                </div>
            <?php endif; ?>

            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Summary</th>
                    <th width="240px">Actions</th>
                </tr>
                <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?= $post['title'] ?></td>
                        <td><?= mb_strimwidth($post['body'], 0, 250, '...') ?></td>
                        <td>
                            <form action="/admin/posts/delete/<?= $post['id'] ?>" method="post">
                                <?= csrf_field() ?>

                                <a href="/admin/posts/show/<?= $post['id'] ?>" class="btn btn-outline-info">View</a>
                                <a href="/admin/posts/edit/<?= $post['id'] ?>" class="btn btn-outline-success">Edit</a>

                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>