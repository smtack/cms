<?php
require_once "src/init.php";

$page = new Page($db);

if(!$page_data = $page->readPage(escape($_GET['p']))) {
  header("Location: " . BASE_URL);
}

$page_title = "CMS - " . $page_data->page_title;

require VIEW_ROOT . "/page.php";