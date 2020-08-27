<?php
include_once "app/utilities/page.php";
$page = new Page("User Directory", true);
$page->renderHeader();

$users = $page->getDatabase()->getDatabase()->query("SELECT username FROM users")->fetchAll();
?>

<div class="navigation-container">
    <?php $page->renderNavbar(); ?>
</div>

<div class="container d-block">
    <h1>User Directory</h1>
    <h2>A list of all users on the platform</h2>

    <ul>
    <?php
        foreach($users as $user) {
            $username = $user['username'];
            echo "<li><a href='/profile.php?user=$username'>$username</a></li>";
        }
    ?>
    </ul>
</div>

<?php $page->endPage(true); ?>