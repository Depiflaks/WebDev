<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Escape.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/header/heading/heading.css">
    <link rel="stylesheet" href="css/main/main.css">
    <link rel="stylesheet" href="css/main/featured-posts/featured-posts.css">
    <link rel="stylesheet" href="css/main/most-recent/most-recent.css">
    <link rel="stylesheet" href="css/main/post-group/post-group.css">
    <link rel="stylesheet" href="css/footer/footer.css">
</head>

<body>

<header>
    <section class="header__bar">
        <div class="header__logo">
            <img src="assets/logo-header.svg" alt="logo-header">
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
            <div class="featured-posts__post">
                <ul class="featured-posts__filter"></ul>
                <h1>The Road Ahead</h1>
                <h2>The road ahead might be paved - it might not be</h2>
                <div class="featured-posts__footer-bar">
                    <div class="featured-posts__profile-picture">
                        <img src="assets/profile-pictures/mat-vogels.png" alt="profile-picture">
                    </div>
                    <p>Mat Vogels</p>
                    <time datetime="2015-09-25">September 25, 2015</time>
                </div>
            </div>
            <div class="featured-posts__post">
                <ul class="featured-posts__filter">
                    <li>adventure</li>
                </ul>
                <h1>From Top Down</h1>
                <h2>Once a year, go someplace you've never been before.</h2>
                <div class="featured-posts__footer-bar">
                    <div class="featured-posts__profile-picture">
                        <img src="assets/profile-pictures/william-wong.png" alt="profile-picture">
                    </div>
                    <p>William Wong</p>
                    <time datetime="2015-09-25">September 11, 2015</time>
                </div>
            </div>
        </div>
    </section>
    <section class="post-group">
        <h2 class="post-group__caption">Most Recent</h2>
        <div class="most-recent">
            <?php
            foreach ($posts as $post) {
                require __DIR__ . "/PostPatterns/most-recent.php";
            }
            ?>
        </div>
        
    </section>
    
    
</main>

<footer>
    <div class="footer__logo">
        <img src="assets/logo-footer.svg" alt="logo-footer">
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