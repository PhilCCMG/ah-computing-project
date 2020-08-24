<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/utilities/User.php';

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
        } else if(!is_null(User::get($username))) {
            echo HTMLHelper::inlineError("There is already a user with that username");
        }
        else {
            // Create the user account
            $createQuery = $database
                ->getDatabase()
                ->prepare("INSERT INTO users (`username`, `email`, `password`) VALUES (:username, :email, :password)");
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $createQuery->bindParam(':username', $username);
            $createQuery->bindParam(':email', $email);
            $createQuery->bindParam(':password', $hashed_password);
            $success = $createQuery->execute();

            if($success) {
                $user = User::get($username);
                $_SESSION['user'] = $user->getId();
                echo "<meta http-equiv='refresh' content='0;URL=\"/home.php\"' />";
                return;
            }
            echo HTMLHelper::inlineError('An unknown error occurred');
        }
    }
}

?>

<form method="POST" action="" class="form form-create-account">
    <? // This allows us to identify the form when used on multiple pages. ?>
    <input type="hidden" name="THIS_FORM" value="CREATE_ACCOUNT">
    <input type="text" placeholder="Username" name="username" required>
    <input type="text" placeholder="Email Address" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
    <input type="submit" value="Create Account">
</form>
