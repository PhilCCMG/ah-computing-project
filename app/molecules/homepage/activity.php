<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/utilities/User.php';
$posts = Page::current()->getDatabase()->getDatabase()->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 5");
foreach($posts as $post) {
    $author = User::byId($post['poster']);
    ?>

    <div class="post">
        <div class="post-header">
            <strong><a href="/profile.php?user=<?=$author->getUsername()?>"><?=$author->getUsername()?></a></strong>
        </div>
        <div class="post-body">
            <p><?=$post['content'];?></p>
        </div>
    </div>

    <?php
}