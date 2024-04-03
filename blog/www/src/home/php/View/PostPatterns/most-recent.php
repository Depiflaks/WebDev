<div class="most-recent__post">
    <div class="most-recent__background-picture">
        <img src=<?= $post['image-url']?> alt="background-image">
    </div>
    <h1><?= $post['title']?></h1>
    <h2><?= $post['subtitle']?></h2>
    <div class="most-recent__footer-bar">
        <div class="most-recent__profile-picture">
            <img src=<?= $post['author-url']?> alt="profile-picture">
        </div>
        <p><?= $post['author']?></p>
        <time datetime="2015-09-25"><?= $post['publish-date']?></time>
    </div>
</div>