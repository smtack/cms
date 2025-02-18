<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="text-center mt-5 mb-3"><?= esc($post['title']) ?></h2>

    <div class="card">
        <div class="card-header">
            <a href="/admin" class="btn btn-outline-info float-right">View All</a>
        </div>
        <div class="card-body">
            <p><?= esc($post['body']) ?></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>