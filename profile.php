<?php
include_once "app/utilities/page.php";

// Find user
if(isset($_GET['user'])) {
    $username = $_GET['user'];

    $user = User::get($username);

    if($user == NULL) {
        $page = new Page("Profile", true);
        $page->renderHeader();
        echo HTMLHelper::inlineError('Unknown user account.');
        $page->endPage(true);
        die;
    }

    $query = Database::getInstance()->getDatabase()->prepare("SELECT * FROM posts WHERE poster=:poster ORDER BY `id` DESC");
    $id = $user->getId();
    $query->bindParam(':poster', $id);
    $query->execute();

    $posts = $query->fetchAll();
} else {
    $page = new Page("Profile", true);
    $page->renderNavbar();
    echo HTMLHelper::inlineError('An error occurred.');
    $page->endPage(true);
    die;
}

$page = new Page("Profile of " . $user->getUsername(), true);
$page->renderHeader();
?>

    <div class="navigation-container">
        <?php $page->renderNavbar(); ?>
    </div>

    <div class="container d-block">
        <h1><?=$user->getUsername(); ?></h1>
        <h2>Posts</h2>

        <?php foreach($posts as $post) {
            ?>

    <div class="post">
        <div class="post-header">
            <strong><?=$user->getUsername()?></strong>
        </div>
        <div class="post-body">
            <p><?=$post['content'];?></p>
        </div>
        <div class="post-footer">
            <?=date('D jS M Y \a\t g:iA', $post['posted_at']);?>
        </div>
    </div>

    <?php
        } ?>
    </div>

<?php $page->endPage(true); ?>