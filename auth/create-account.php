<?php
include_once "../app/utilities/page.php";
$page = new Page("Create Account");
$page->renderHeader();
?>

<div class="navigation-container">
    <?php $page->renderNavbar(); ?>
</div>

<div class="container">
    <div class="d-center text-center w-50">
        <h2>Create Account</h2>
        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/app/molecules/form/create-account.php"); ?>
    </div>
</div>

<?php
$page->endPage(true);
?>
