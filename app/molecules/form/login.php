<?php
if(isset($_POST["THIS_FORM"])) {
    if ($_POST["THIS_FORM"] === "CREATE_ACCOUNT") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmpassword"];
        $database = Database::getInstance();
        if ($password !== $confirmPassword) {
            echo HTMLHelper::inlineError("The passwords do not match.");
        } else if ($database->hasValue("users", "email", $email)) {
            echo HTMLHelper::inlineError("The email address is already in use.");
        } else if ($database->hasValue("users", "username", $username)) {
            echo HTMLHelper::inlineError("The username is already in use.");
        }
    }
}

?>

<form method="POST" action="" class="form form-login">
    <? // This allows us to identify the form when used on multiple pages. ?>
    <input type="hidden" name="THIS_FORM" value="LOGIN">
    <input type="text" placeholder="Username or Email Address" name="username" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="submit" value="Create Account">
</form>
