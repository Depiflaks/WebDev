<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/login/css/style.css">
    <link rel="stylesheet" href="static/admin/css/main/input-block/input-block.css">
    <link rel="stylesheet" href="static/admin/css/main/bar/bar.css">
    <link rel="stylesheet" href="static/login/css/main/heading/heading.css">
    <link rel="stylesheet" href="static/login/css/main/login-block/login-block.css">
    <link rel="stylesheet" href="static/login/css/main/main.css">
    <link rel="stylesheet" href="static/admin/css/main/alert/alert.css">
</head>

<body>

<header>

</header>

<main>
    <article class="heading">
        <div class="heading__logo">
            <img src="./static/login/assets/logo.svg" alt="logo">
        </div>
        <p>Log in to start creating</p>
    </article>

    <article class="login-block">
        <h1>Log In</h1>
        <div class="alert hidden">
            <div class="alert__icon">
                <img id="alert-icon" src="./static/admin/assets/alert-circle.svg">
            </div>
            <p>A-Ah! Check all fields</p>
        </div>
        <form class="login-block__form">
            <!--    Email    -->
            <div class="input-block" id="email-block"> 
                <label for="email-input" class="input-block__caption">Email</label>
                <input type="text" id="email-input" class="input-block__text-area">
                <label for="email-input" class="input-block__tip"></label>
            </div>
            <!--    Password    -->
            <div class="input-block" id="password-block"> 
                <label for="password-input" class="input-block__caption">Password</label>
                <input type="text" id="password-input" class="input-block__text-area hide-password">
                <div id="hide-switch" class="input-block__hide-switch">
                    <img src="./static/login/assets/eye.svg" alt="">
                </div>
                <label for="password-input" class="input-block__tip"></label>
            </div>
            <button class="bar__button">Log In</button>
        </form>
    </article>
</main>

<footer>

</footer>

</body>
<script src="./static/login/script/script.js"></script>
</html>
