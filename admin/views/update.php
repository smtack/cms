<?php require_once VIEW_ROOT . "/includes/header.php"; ?>

<div class="content">
  <h1><a href="<?php echo BASE_URL; ?>">CMS</a></h1>
  <h2><a href="<?php echo BASE_URL; ?>/admin">Admin Area</a></h2>
  <h3>Update Page</h3>

  <form action="<?php $self; ?>" method="POST">
    <div class="form-group">
      <p><?php echo isset($error) ? $error : ""; ?></p>
    </div>
    <div class="form-group">
      <input type="text" name="title" value="<?php echo $page_data->page_title; ?>">
    </div>
    <div class="form-group">
      <input type="text" name="label" value="<?php echo $page_data->page_label; ?>">
    </div>
    <div class="form-group">
      <input type="text" name="new_slug" value="<?php echo $page_data->page_slug; ?>">
    </div>
    <div class="form-group">
      <textarea name="content"><?php echo $page_data->page_content; ?></textarea>
    </div>
    <div class="form-group">
      <input type="submit" name="update" value="Update">
    </div>
  </form>

  <h3>Delete Page</h3>

  <form action="<?php $self; ?>" method="POST">
    <div class="form-group">
      <p><?php echo isset($delete_error) ? $delete_error : ""; ?></p>
    </div>
    <div class="form-group">
      <input type="submit" name="delete" value="Delete Page">
    </div>
  </form>
</div>

<?php require_once VIEW_ROOT . "/includes/footer.php"; ?>