<div class="featured-posts__post" style="background-image: url('<?= STATIC_PATH . FEATURED . $post['background_url']?>');">
    <ul class="featured-posts__filter"></ul>
    <h1><?= $post['title']?></h1>
    <h2>
        <a style="text-decoration: none; color: #ffffffb3;" title='<?= $post['title'] ?>' href='../post?id=<?= $post['post_id'] ?>'>
            <?= $post['subtitle'] ?>
        </a>
    </h2>
    <div class="featured-posts__footer-bar">
        <div class="featured-posts__profile-picture">
            <img src=<?= STATIC_PATH . PROFILE . $post['author_url']?> alt="profile-picture">
        </div>
        <p><?= $post['author']?></p>
        <time datetime="2015-09-25"><?= date("Y-m-d", $post['publish-date'])?></time>
    </div>
</div>