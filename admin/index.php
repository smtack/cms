<?php
require_once "../src/init.php";

$page = new Page($db);

$pages = $page->readPages();

$page_title = "CMS - Admin Area";

require ADMIN_VIEW_ROOT . "/index.php";