<?php
/**
 * Logout template 
 */
?>
<div class="row">
    <div class="col-md-4"></div>
        <div class="col-md-4 mx-auto my-4 w-75 text-center mx-auto">
            <form action = "index.php" method="post">
            <input type ="submit" name="logout" value = "Logout" class="text-center mx-auto btn btn-lg btn-secondary"
                <?php
                /*
                * logout means back to orignial settings
                * @return null to start with new session
                */if (isset($_POST['logout'])) {
                    session_unset();
                    session_destroy();
                }
                ?> >
            </form>
        </div>
    <div class="col-md-4"></div>
</div>