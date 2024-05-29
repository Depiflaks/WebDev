<?php

require_once "./src/Controller/UserController.php";
require_once "./src/Path/StaticPath.php";
require_once "./src/Infrastructure/ConnectionProvider.php";
require_once "./src/Model/PostTable.php";

function getColorByFirstLetter($letter) {
    $colors = array(
        'a' => '#FF5733', 'b' => '#33FF57', 'c' => '#3357FF', 'd' => '#F333FF', 'e' => '#FF33B8',
        'f' => '#FF8C33', 'g' => '#33FFC1', 'h' => '#337BFF', 'i' => '#FF3333', 'j' => '#33FF8C',
        'k' => '#8C33FF', 'l' => '#FF33F5', 'm' => '#FF5733', 'n' => '#33FF57', 'o' => '#3357FF',
        'p' => '#F333FF', 'q' => '#FF33B8', 'r' => '#FF8C33', 's' => '#33FFC1', 't' => '#337BFF',
        'u' => '#8C33FF', 'v' => '#33FF8C', 'w' => '#8C33FF', 'x' => '#FF33F5', 'y' => '#FF5733',
        'z' => '#33FF57'
    );

    $letter = strtolower($letter);

    return $colors[$letter] ?? '#FFFFFF';
}

session_start();
$conn = ConnectionProvider::connectDatabase();
$table = new PostTable($conn);
$controller = new UserController($table);

if (!$controller->authByCookie()) {
    exit();
}

$letter = $_SESSION["email"][0];
$color = getColorByFirstLetter($_SESSION["email"][0]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Escape.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/admin/css/style.css">
    <link rel="stylesheet" href="static/admin/css/header/header.css">
    <link rel="stylesheet" href="static/admin/css/main/bar/bar.css">
    <link rel="stylesheet" href="static/admin/css/main/information/information.css">
    <link rel="stylesheet" href="static/home/css/main/most-recent/most-recent.css">
    <link rel="stylesheet" href="static/admin/css/main/input-block/input-block.css">
    <link rel="stylesheet" href="static/admin/css/main/content/content.css">
    <link rel="stylesheet" href="static/admin/css/main/alert/alert.css">
</head>

<body>

<header>
    <div class="header__logo">
        <img src="static/admin/assets/header_logo.svg" alt="logo-header">
    </div>
    <nav class="header__links">
        <a href="" class="header__user" style="background-color: <?=$color?>"><?=$letter?></a>
        <form id="logout-form">
            <button type="submit" class="header__log-out">
                <img src="./static/admin/assets/logOut.svg">
            </button>
        </form>
        
    </nav>
</header>

<main>
<form id="main-form">
    <article class="bar">
        <div class="bar__caption">
            <h1>New Post</h1>
            <p>Fill out the form bellow and publish your article</p>
        </div>
        <button class="bar__button">Publish</button>
    </article>
    <article class="alert hidden">
        <div class="alert__icon">
            <img id="alert-icon" src="./static/admin/assets/alert-circle.svg">
        </div>
        <p>Whoops! Some fields need your attention :o</p>
    </article>
    <article class="information">
        <h2>Main Information</h2>
        <section class="information__form">
            <!--    Title    -->
            <div class="input-block" id="title-block"> 
                <label for="title-input" class="input-block__caption">Title</label>
                <input type="text" id="title-input" class="input-block__text-area" placeholder="Hello, World!">
                <label for="title-input" class="input-block__tip"></label>
            </div>
            <!--    Short description    -->
            <div class="input-block" id="description-block"> 
                <label for="subtitle-input" class="input-block__caption">Short description</label>
                <input type="text" id="subtitle-input" class="input-block__text-area" placeholder="Let`s get it started!">
                <label for="subtitle-input" class="input-block__tip"></label>
            </div>
            <!--    Author Name    -->
            <div class="input-block" id="name-block"> 
                <label for="author-input" class="input-block__caption">Author Name</label>
                <input type="text" id="author-input" class="input-block__text-area">
                <label for="author-input" class="input-block__tip"></label>
            </div>
            <!--    Is Featured    -->
            <div class="input-block" id="is-featured-block">
                <label for="checkbox-input" class="input-block__caption">Post Type</label>
                <div class="input-block__checkbox-block">
                    <input id="checkbox-input" type="checkbox" class="input-block__checkbox" value="featured", checked>
                    <label for="checkbox-input">Featured</label>
                </div>
                <label for="checkbox-input" class="input-block__tip"></label>
            </div>
            <!--    Author Photo    -->
            <div class="input-block" id="avatar-block"> 
                <label for="author-img-input" class="input-block__caption">Author Photo</label>
                <div class="input-block__img-block">
                    <div class="input-block__avatar">
                        <img src="static/admin/assets/upload_photo.svg">
                    </div>
                    <label class="input-block__img-input">
                        <input type="file" id="author-img-input" accept="image/png, image/jpg, image/gif" require>
                        <img src="static/admin/assets/upload_photo.svg">
                        <span>Upload New</span>
                    </label>
                    <label class="input-block__img-delete">
                        <input type="button" id="author-img-delete" require>
                        <img src="static/admin/assets/remove_img.svg">
                        <span>Remove</span>
                    </label>
                </div>
                <label for="author-img-input" class="input-block__tip"></label>
            </div>
            <!--    Publish Date    -->
            <div class="input-block" id="date-block"> 
                <label for="date-input" class="input-block__caption">Publish Date</label>
                <input type="date" id="date-input" class="input-block__date">
                <label for="date-input" class="input-block__tip"></label>
            </div>
            <!--    Hero Image    -->
            <div class="input-block" id="hero-block"> 
                <label for="hero-img-input-2" class="input-block__caption">Hero Image</label>
                <div class="input-block__img-block">
                    <div class="input-block__hero-img input-block__hero-img_none">
                        <img>
                        <label class="input-block__img-input">
                            <input type="file" id="hero-img-input-1" accept="image/png, image/jpg, image/gif">
                            <img src="static/admin/assets/upload_photo.svg">
                            <span>Upload</span>
                        </label>
                    </div>
                    <label class="input-block__img-input">
                        <input type="file" id="hero-img-input-2" accept="image/png, image/jpg, image/gif">
                        <img src="static/admin/assets/upload_photo.svg">
                        <span>Upload New</span>
                    </label>
                    <label class="input-block__img-delete">
                        <input type="button" id="author-img-delete">
                        <img src="static/admin/assets/remove_img.svg">
                        <span>Remove</span>
                    </label>
                    <label for="hero-img-input-2" class="input-block__sub-caption">
                        Size up to 10mb. Format: png, jpeg, gif.
                    </label>
                </div>
                <label for="hero-img-input-2" class="input-block__tip"></label>
            </div>
            <!--    Sub-Hero Image    -->
            <div class="input-block" id="sub-hero-block"> 
                <label for="sub-hero-img-input-2" class="input-block__caption">Hero Image</label>
                <div class="input-block__img-block">
                    <div class="input-block__hero-img input-block__hero-img_sub input-block__hero-img_none">
                        <img>
                        <label class="input-block__img-input">
                            <input type="file" id="sub-hero-img-input-1" accept="image/png, image/jpg, image/gif">
                            <img src="static/admin/assets/upload_photo.svg">
                            <span>Upload</span>
                        </label>
                    </div>
                    <label class="input-block__img-input">
                        <input type="file" id="sub-hero-img-input-2" accept="image/png, image/jpg, image/gif">
                        <img src="static/admin/assets/upload_photo.svg">
                        <span>Upload New</span>
                    </label>
                    <label class="input-block__img-delete">
                        <input type="button" id="author-img-delete">
                        <img src="static/admin/assets/remove_img.svg">
                        <span>Remove</span>
                    </label>
                    <label for="sub-hero-img-input-2" class="input-block__sub-caption">
                        Size up to 5mb. Format: png, jpeg, gif.
                    </label>
                </div>
                <label for="sub-hero-img-input-2" class="input-block__tip"></label>
            </div>
        </section>
        <section class="information__preview"> 
            <!--    Article preview    -->
            <h3>Article preview</h3>
            <div class="information__article-preview">
                <h2>New Post</h2>
                <h3>Please, enter any description</h3>
                <div>
                    <img>
                </div>
            </div>
            <!--    Post card preview    -->
            <h3>Post card preview</h3>
            <div class="information__post-card-preview">
                <div class="most-recent__post">
                    <div class="most-recent__background-picture">
                        <img src="">
                    </div>
                    <h1>New Post</h1>
                    <h2>Please, enter any description</h2>
                    <div class="most-recent__footer-bar">
                        <div class="most-recent__profile-picture">
                            <img src="">
                        </div>
                        <p>Enter author name</p>
                        <time datetime="2015-09-25">2024-19-04</time>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <article class="content">
         <h2>Content</h2>
         <!--    Post content    -->
         <div class="input-block" id="content-block"> 
            <label for="content-input" class="input-block__caption">Post content (plain text)</label>
            <textarea id="content-input" class="input-block__content-area" placeholder="Type anyting you want ..."></textarea>
            <label for="content-input" class="input-block__tip"></label>
        </div>
    </article>
</form>
</main>

<footer>

</footer>

</body>
<script src="./static/admin/script/index.js"></script>
</html>
