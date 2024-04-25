<?php

require_once "./src/Path/StaticPath.php";
require_once "./src/Infrastructure/ConnectionProvider.php";
require_once "./src/Model/PostTable.php";

$conn = ConnectionProvider::connectDatabase();

$table = new PostTable;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Escape.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/home/css/style.css">
    <link rel="stylesheet" href="static/home/css/header/header.css">
    <link rel="stylesheet" href="static/home/css/header/heading/heading.css">
    <link rel="stylesheet" href="static/home/css/main/main.css">
    <link rel="stylesheet" href="static/home/css/main/featured-posts/featured-posts.css">
    <link rel="stylesheet" href="static/home/css/main/most-recent/most-recent.css">
    <link rel="stylesheet" href="static/home/css/main/post-group/post-group.css">
    <link rel="stylesheet" href="static/home/css/footer/footer.css">
</head>

<body>

<header>
    <section class="header__bar">
        <div class="header__logo">
            <img src="static/home/assets/logo-header.svg" alt="logo-header">
        </div>
        <nav class="header__links">
            <a href="">home</a>
            <a href="">categories</a>
            <a href="">about</a>
            <a href="">contact</a>
        </nav>
    </section>
    <section class="heading">
        <h1 class="heading__caption">Let's do it together.</h1>
        <h2 class="heading__sub-caption">We travel the world in search of stories. Come along for the ride</h2>
        <button class="heading__button">View Latest Posts</button>
    </section>
</header>

<main>
    <nav class="main__filter-bar">
        <a href="">Nature</a>
        <a href="">Photography</a>
        <a href="">Relaxation</a>
        <a href="">Vacation</a>
        <a href="">Travel</a>
        <a href="">Adventure</a>
    </nav>
    <section class="post-group">
        <h2 class="post-group__caption">Featured Posts</h2>
        <div class="featured-posts">
            <?php
            foreach ($table->getFeaturedPosts($conn) as $post) {
                include "./template/Featured.php";
            }
            ?>
        </div>
    </section>
    <section class="post-group">
        <h2 class="post-group__caption">Most Recent</h2>
        <div class="most-recent">
            <?php
            foreach ($table->getMostRecentPosts($conn) as $post) {
                include "./template/MostRecent.php";
            }
            ?>
        </div>
        
    </section>
</main>

<footer>
    <div class="footer__logo">
        <img src="static/home/assets/logo-footer.svg" alt="logo-footer">
    </div>
    <div class="footer__links">
        <a href="">home</a>
        <a href="">categories</a>
        <a href="">about</a>
        <a href="">contact</a>
    </div>
</footer>

</body>

</html>
