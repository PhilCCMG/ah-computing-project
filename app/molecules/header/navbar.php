<?php $page = Page::current(); ?>
<div class="navigation">
    <ul>
        <li>
            <a href="/">
                <img src="/static/images/SVG/logo.svg" alt="Site Logo" class="brand-logo">
            </a>
        </li>


        <?php
        if($page->user() !== NULL) {
        ?>
        <li>
            <a href="/users.php">Users</a>
        </li>
        <li>
            <a href="/settings.php">Settings</a>
        </li>
        <li>
            <a href="/logout.php">Log Out</a>
        </li>
        <?php } ?>
    </ul>

    <?php
    if($page->user() !== NULL) {
        ?>
        <ul class="user-nav">
            <li>
                <a href="/profile.php?user=<?=$page->user()->getUsername();?>">
                    <?=$page->user()->getUsername();?>
                </a>
            </li>
        </ul>
    <?php
    } ?>
</div>