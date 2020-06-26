<form method="POST" action="" class="form form-create-account">
    <? // This allows us to identify the form when used on multiple pages. ?>
    <input type="hidden" name="THIS_FORM" value="CREATE_ACCOUNT">
    <input type="text" placeholder="Username" name="username" required>
    <input type="text" placeholder="Email Address" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
    <input type="submit" value="Create Account">
</form>
