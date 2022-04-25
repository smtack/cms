<?php
require_once "../src/init.php";

$page = new Page($db);

if(!$page_data = $page->readPage(escape($_GET['p']))) {
  header("Location: " . BASE_URL . "/admin");
}

if(isset($_POST['update'])) {
  if(empty($_POST['title']) || empty($_POST['label']) || empty($_POST['new_slug']) || empty($_POST['content'])) {
    $error = "Fill in all fields";
  } else {
    if($page->updatePage($page_data->page_slug)) {
      header("Location: " . BASE_URL . "/admin");
    } else {
      $error = "Unable to update page";
    }
  }
}

if(isset($_POST['delete'])) {
  if($page->deletePage($page_data->page_slug)) {
    header("Location: " . BASE_URL . "/admin");
  } else {
    $delete_error = "Unable to delete page";
  }
}

$page_title = "CMS - Update Page: " . $page_data->page_title;

require ADMIN_VIEW_ROOT . "/update.php";