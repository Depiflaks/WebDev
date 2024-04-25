<div class="most-recent__post">
    <div class="most-recent__background-picture">
        <img src=<?= STATIC_PATH . MOST_RECENT . $post['background_url']?> alt="background-image">
    </div>
    <h1><?= $post['title']?></h1>
    <h2>
        <a style="text-decoration: none; color: #7a7a7a;" title='<?= $post['title'] ?>' href='../post?id=<?= $post['post_id'] ?>'>
            <?= $post['subtitle'] ?>
        </a>
    </h2>
    <div class="most-recent__footer-bar">
        <div class="most-recent__profile-picture">
            <img src=<?= STATIC_PATH . PROFILE . $post['author_url']?> alt="profile-picture">
        </div>
        <p><?= $post['author']?></p>
        <time datetime="2015-09-25"><?= $post['publish_date']?></time>
    </div>
</div>