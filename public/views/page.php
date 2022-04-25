<?php require_once VIEW_ROOT . "/includes/header.php"; ?>

<div class="content">
  <h1><a href="<?php echo BASE_URL; ?>">CMS</a></h1>

  <div class="page">
    <h2><?php echo $page_data->page_title; ?></h2>
    <h3><?php echo $page_data->page_label; ?></h3>
    <p><?php echo $page_data->page_content; ?></p>
    <span>Created on <?php echo date('jS M Y H:i a', strtotime($page_data->page_created)); ?></span>

    <?php if($page_data->page_updated): ?>
      <span>Updated on <?php echo date('jS M Y H:i a', strtotime($page_data->page_updated)); ?></span>
    <?php endif; ?>
  </div>
</div>

<?php require_once VIEW_ROOT . "/includes/footer.php"; ?>