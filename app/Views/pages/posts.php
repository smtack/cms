<section>
    <?php if ($posts !== []): ?>
        <?php foreach ($posts as $post): ?>
            <h3>
                <a href="/posts/<?= esc($post['slug'], 'url') ?>"><?= esc($post['title']) ?></a>
            </h3>

            <div class="main">
                <?= esc(mb_strimwidth($post['body'], 0, 250, '...')) ?>
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <h3>No posts found</h3>

        <p>No posts have been made yet.</p>
    <?php endif; ?>
</section>