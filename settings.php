<?php
include_once "app/utilities/page.php";
$page = new Page("Settings", true);

// Find user
$user = $page->user();

$query = Database::getInstance()->getDatabase()->prepare("SELECT * FROM posts WHERE poster=:poster ORDER BY `id` DESC");
$id = $user->getId();
$query->bindParam(':poster', $id);
$query->execute();

$posts = $query->fetchAll();

$page->renderHeader();
?>

    <div class="navigation-container">
        <?php $page->renderNavbar(); ?>
    </div>

    <div class="container d-block">

        <?php
        if(@$_POST["THIS_FORM"] == "ACCOUNT_SETTINGS") {
            $username = $_POST['username'];
            // Check if it already exists
            $query = $page->getDatabase()->getDatabase()->prepare("SELECT username FROM users WHERE username=:name LIMIT 1");
            $query->bindParam(':name', $username);
            $query->execute();
            if($query->rowCount() === 1)
                echo HTMLHelper::inlineError("That username is already taken.");
            else {
                $id = $user->getId(); // PDO cannot have computed properties as a parameter
                $update = $page->getDatabase()->getDatabase()->prepare("UPDATE users SET username=:name WHERE id=$id");
                $update->bindParam(':name', $username);
                $success = $update->execute();
                echo $success
                    ? "<meta http-equiv='refresh' content='0' />"
                    : HTMLHelper::inlineError('An error occurred: ' . $update->errorInfo());

            }
        }
        ?>

        <h1><?=$user->getUsername(); ?></h1>
        <h2>Account Settings</h2>

        <form method="POST">
            <input type="hidden" name="THIS_FORM" value="ACCOUNT_SETTINGS">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?=$user->getUsername();?>"></td>
                </tr>
            </table>
            <input type="submit" value="Save Settings">
        </form>
    </div>

<?php $page->endPage(true); ?>