
<div class="navigation">
    <ul>
        <li>
            <a href="/">
                <img src="/static/images/SVG/logo.svg" alt="Site Logo" class="brand-logo">
            </a>
        </li>
        <li>
            <a href="#">
                Trending
            </a>
        </li>
        <li>
            <a href="#">
                What's New
            </a>
        </li>
    </ul>

    <?php
    $page = Page::current();
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