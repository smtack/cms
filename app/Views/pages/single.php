<section>
    <h2>
        <?= esc($post['title']) ?>
    </h2>
    
    <?php if($post['label']): ?>
        <h5><?= esc($post['label']) ?></h5>
    <?php endif; ?>

    <h6 class="fw-light text-secondary">
        Created at <?= date('jS M Y H:i a', strtotime(esc($post['created_at']))) ?>

        <?php if($post['created_at'] !== $post['updated_at']): ?>
            Updated at <?= date('jS M Y H:i a', strtotime(esc($post['updated_at']))) ?>
        <?php endif; ?>
    </h6>

    <?php if($post['image']): ?>
        <img class="my-5 mx-auto d-block" src="<?= base_url('/uploads/images/') ?><?= esc($post['image']) ?>" alt="Post Image">
    <?php endif; ?>

    <p class="mt-4"><?= esc($post['body']) ?></p>
</section>