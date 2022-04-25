<?php require_once VIEW_ROOT . "/includes/header.php"; ?>

<div class="content">
  <h1><a href="<?php echo BASE_URL; ?>">CMS</a></h1>
  <h2><a href="<?php echo BASE_URL; ?>/admin">Admin Area</a></h2>
  
  <h3>Create Page</h3>

  <form action="<?php $self; ?>" method="POST">
    <div class="form-group">
      <p><?php echo isset($error) ? $error : ""; ?></p>
    </div>
    <div class="form-group">
      <input type="text" name="title" placeholder="Title">
    </div>
    <div class="form-group">
      <input type="text" name="label" placeholder="Label">
    </div>
    <div class="form-group">
      <input type="text" name="slug" placeholder="Slug">
    </div>
    <div class="form-group">
      <textarea name="content" placeholder="Content"></textarea>
    </div>
    <div class="form-group">
      <input type="submit" name="create" value="Create">
    </div>
  </form>
</div>

<?php require_once VIEW_ROOT . "/includes/footer.php"; ?>