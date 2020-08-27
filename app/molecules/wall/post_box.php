<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/utilities/User.php';
if(isset($_POST["THIS_FORM"])) {
    if ($_POST["THIS_FORM"] === "POST_FEED") {
        $content = $_POST["content"];
        if(Page::current()->user() === null) {
            echo HTMLHelper::inlineError('You are not authenticated to do that.');
        } else {
            $page = Page::current();
            $query = $page->getDatabase()->getDatabase()->prepare(
                "INSERT INTO posts (`poster`, `content`, `posted_at`) VALUES(:poster, :content, :postedTime)"
            );
            $id = $page->user()->getId();
            $time = time();
            $query->bindParam(":poster", $id);
            $query->bindParam(":content", $content);
            $query->bindParam(":postedTime", $time);
            $success = $query->execute();
            if(!$success) {
                echo HTMLHelper::inlineError('Something went wrong.');
            }

            // Prevent re-posting unintentionally
            $POST["THIS_FORM"] = null;
        }
    }
}

?>

<form method="POST" action="" class="form form-post-box">
    <? // This allows us to identify the form when used on multiple pages. ?>
    <input type="hidden" name="THIS_FORM" value="POST_FEED">
    <textarea placeholder="What's on your mind?" name="content" required></textarea>
    <input type="submit" value="Post Update">
</form>
