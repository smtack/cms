<section>
    <?php if ($posts !== []): ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h3>
                    <a href="/posts/<?= esc($post['slug'], 'url') ?>"><?= esc($post['title']) ?></a>
                </h3>

                <p>
                    <?= mb_strimwidth(esc($post['body']), 0, 250, '...') ?>
                </p>
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <h3>No posts found</h3>

        <p>No posts have been made yet.</p>
    <?php endif; ?>
</section>