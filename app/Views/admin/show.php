<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="text-center mt-5 mb-3"><?= esc($post['title']) ?></h2>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <a href="/admin" class="btn btn-outline-info">View All</a>
            <a href="/admin/posts/edit/<?= esc($post['id']) ?>" class="btn btn-outline-success">Edit</a>
        </div>
        <div class="card-body">
            <?php if($post['image']): ?>
                <img class="mx-auto d-block mb-5" src="<?= base_url('/uploads/images/') ?><?= esc($post['image']) ?>" alt="Post Image">
            <?php endif; ?>

            <p><?= esc($post['body']) ?></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>