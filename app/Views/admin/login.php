<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container col-md-3">
    <h2 class="text-center mt-5 mb-3">Log In</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <span><?= session()->getFlashdata('error') ?></span>
        </div>
    <?php endif; ?>

    <form action="/admin/login" method="post">
        <?= csrf_field() ?>

        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>

        <button class="btn btn-outline-primary mt-3" type="submit" name="submit">Log In</button>
    </form>
</div>

<?= $this->endSection() ?>