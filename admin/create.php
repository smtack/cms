<?php
require_once "../src/init.php";

$page = new Page($db);

if(isset($_POST['create'])) {
  if(empty($_POST['title']) || empty($_POST['label']) || empty($_POST['slug']) || empty($_POST['content'])) {
    $error = "Fill in all fields";
  } else {
    if($page->createPage()) {
      header("Location: " . BASE_URL . "/admin");
    } else {
      $error = "Unable to create page";
    }
  }
}

$page_title = "CMS - Create Page";

require ADMIN_VIEW_ROOT . "/create.php";