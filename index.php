<?php
    include_once "app/utilities/page.php";
    $page = new Page("Welcome");
    if(isset($_SERVER['page']['user'])) {
        header('Location: /home.php');
    }
    $page->renderHeader();

?>
        <div class="hero-section">
            <?php $page->renderNavbar(); ?>
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
            <div class="svg-shape-layer-bottom">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>

    <div class="container">
        <div class="col-homepage text-center">
            <h2>Latest Activity</h2>
            <div class="activity">
                <?php include_once("./app/molecules/homepage/activity.php"); ?>
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
