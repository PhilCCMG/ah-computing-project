<?php
    include_once "app/utilities/page.php";
    $page = new Page("Welcome");
    $page->renderHeader();
?>
        <div class="hero-section">
            <div class="navigation">
                <ul>
                    <li>
                        <img src="/static/images/SVG/logo.svg" alt="Site Logo" class="brand-logo">
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
            </div>
            <div>
                <h1>
                    A basic social network
                </h1>
                <h2>
                    Socialise with your friends and communicate
                </h2>
                <div class="buttons">
                    <a href="/auth/create-account.php" class="create-account">Create Account</a>
                    <a href="/auth/login.php" class="login">Login</a>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="col-homepage text-center">
            <h2>Latest Activity</h2>
            <div class="activity">
                <span>Oh snap! There's no activity yet :(</span>
            </div>
        </div>
        <div class="col-homepage text-center">
            <h2>Join the Network!</h2>
            <?php include_once("./app/molecules/form/create-account.php"); ?>
        </div>
    </div>

<?php
$page->endPage(true);
?>
