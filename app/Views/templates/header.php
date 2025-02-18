<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">
        <ul>
            <li class="menu-toggle">
                <button id="menuToggle">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="/">Home</a></li>
            <li class="menu-item hidden"><a href="/posts">Posts</a></li>
            <li class="menu-item hidden"><a href="/admin">Admin</a></li>
            <li class="menu-item hidden"><a href="/about">About</a></li>

            <?php if (session()->loggedIn): ?>
                <li class="menu-item hidden"><a href="/admin/logout">Log Out</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="heroe">

        <h1><?= esc($title) ?></h1>

        <h2><?= $description ?? 'A simple content management system' ?></h2>

    </div>

</header>

<main>