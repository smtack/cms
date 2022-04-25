<?php require_once VIEW_ROOT . "/includes/header.php"; ?>

<div class="content">
  <h1><a href="<?php echo BASE_URL; ?>">CMS</a></h1>

  <div class="pages">
    <?php if(!$pages): ?>
      <p>No pages</p>
    <?php else: ?>
      <?php foreach($pages as $page): ?>
        <div class="page">
          <h2><a href="<?php echo BASE_URL; ?>/page?p=<?php echo $page->page_slug; ?>"><?php echo $page->page_title; ?></a></h2>
          <h3><?php echo $page->page_label; ?></h3>
          <p><?php echo substr($page->page_content, 0, 150) . "..."; ?></p>
          <span>Created on <?php echo date('jS M Y H:i a', strtotime($page->page_created)); ?></span>
          
          <?php if($page->page_updated): ?>
            <span>Updated on <?php echo date('jS M Y H:i a', strtotime($page->page_updated)); ?></span>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php require_once VIEW_ROOT . "/includes/footer.php"; ?>