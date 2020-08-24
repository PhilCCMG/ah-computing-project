<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/utilities/User.php';
if(isset($_POST["THIS_FORM"])) {
    if ($_POST["THIS_FORM"] === "LOGIN") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $database = Database::getInstance();
        $user = User::get($username);
        if($user === null) {
            echo HTMLHelper::inlineError('That user does not exist.');
        } else {
           $success = $user->validatePassword($password);
           if($success) {
               $_SESSION['user'] = $user->getId();
               echo "<meta http-equiv='refresh' content='0;URL=\"/home.php\"' />";
               return;
           } else {
               echo HTMLHelper::inlineError('Incorrect password.');
           }
        }
    }
}

?>

<form method="POST" action="" class="form form-login">
    <? // This allows us to identify the form when used on multiple pages. ?>
    <input type="hidden" name="THIS_FORM" value="LOGIN">
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" value="Create Account">
</form>
