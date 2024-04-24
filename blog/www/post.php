<?php

if (is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: http://localhost:8001/home.php', true, 301);
    exit();
}

require_once "./src/Path/StaticPath.php";
require_once "./src/Infrastructure/ConnectionProvider.php";
require_once "./src/Model/PostTable.php";

$conn = ConnectionProvider::connectDatabase();

$table = new PostTable;

$data = $table->getPostById($conn, $id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <title>The Road Ahead</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/post/css/style.css">
</head>

<body>
<div class="container">
    <header>
        <div class="logo">
            <img src="static/post/assets/logo-header.svg">
        </div>
        <div class="links">
            <a>home</a>
            <a>categories</a>
            <a>about</a>
            <a>contact</a>
        </div>
    </header>
    <main>
        <section class="heading">
            <div class="main-title"><?= $data['title']?></div>
            <div class="sub-title"><?= $data['subtitle']?></div>
        </section>
        <div class="body-image">
            <img src=<?= $STATIC . $HERO . $data['background_url']?> alt="mountains image">
        </div>
        <section class="main-text">
            <p>
                <?= $data['contents']?>
            </p>
        </section>
    </main>
    <footer>
        <div class="logo">
            <img src="static/post/assets/logo-footer.svg">
        </div>
        <div class="links">
            <a>home</a>
            <a>categories</a>
            <a>about</a>
            <a>contact</a>
        </div>
    </footer>
</div>
</body>

</html>