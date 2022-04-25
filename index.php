<?php
require_once "src/init.php";

$page = new Page($db);

$pages = $page->readPages();

$page_title = "CMS";

require VIEW_ROOT . "/index.php";