<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="text-center mt-5 mb-3">New Post</h2>

    <div class="card">
        <div class="card-header">
            <a href="/admin" class="btn btn-outline-info float-right">View All</a>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('errors')): ?>
                <?php foreach(session()->getFlashdata('errors') as $field => $error): ?>
                    <div class="alert alert-danger">
                        <span><?= $error ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form enctype="multipart/form-data" action="/admin/posts/create" method="post">
                <?= csrf_field() ?>

                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input class="form-control" type="input" name="title" value="<?= set_value('title') ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="label">Label</label>
                    <input class="form-control" type="input" name="label" value="<?= set_value('label') ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="image">Image (Optional)</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="body">Text</label>
                    <textarea class="form-control" name="body" cols="45" rows="20"><?= set_value('body') ?></textarea>
                </div>

                <button class="btn btn-outline-primary mt-3" type="submit" name="submit">Create post</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>