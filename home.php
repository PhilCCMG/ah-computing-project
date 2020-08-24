<?php
include_once "app/utilities/page.php";
$page = new Page("Home", true);
$page->renderHeader();
?>

<div class="navigation-container">
    <?php $page->renderNavbar(); ?>
</div>

<div class="container d-block">
    <h1>Hey, <?=$page->user()->getUsername();?>!</h1>
    <h2>Welcome back to <b>A Social Network</b>...</h2>
</div>

<?php $page->endPage(true); ?>