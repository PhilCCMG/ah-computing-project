<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/utilities/User.php';
$posts = Page::current()->getDatabase()->getDatabase()->query("SELECT * FROM `posts` ORDER BY `id` DESC");
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
        <div class="post-footer">
            <?=date('D jS M Y \a\t g:iA', $post['posted_at']);?>
        </div>
    </div>

<?php
}