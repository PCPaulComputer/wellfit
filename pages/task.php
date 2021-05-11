    <?php
    /*
     * Author: Paul Madduma
     * task.php is the task management site that will show once the user
     * (staff, admin) has been authorized and authenticated their login 
     * credentials from index.php
     */
    require_once '../templates/header.tpl.php'; 
    session_start();
    include '../utilities/connect.php';
    $_SESSION['username'] = isset($_POST['username']);
    $_SESSION['password'] = isset($_POST['password']);
    $_SESSION['login'] = true;
    $_SESSION["password"] = isset($_POST["password"]);
    ?>
    <div id="main" class="img-fluid h-2000 bg bg-warning px-4" style="background-image: url('./images/gym.png'); height: 800px;">
        <div class="bg bg-warning text-center mx-2 py-2">
            <h1 class="text-center mx-auto">WellFit Centre</h1>
            <h2 class="text-center mx-auto">Hi, What would you like to do?</h2>
        </div>
        <div class="container my-4">
            <form action = "registration.php" method="post">
                <input type ="submit" name="register" value = "Register for Membership" class="btn btn-lg btn-primary btn-block w-100 text-center mx-auto">
            </form>
            <br>
            <form action = "delete.php" method="post">
                <input type ="submit" name="delete" value = "Delete a record" class="btn btn-lg btn-primary btn-block w-100 text-center mx-auto">
            </form>
            <br>
            <form action = "update.php" method="post">
                <input type ="submit" name="update" value = "Update a record" class="btn btn-lg btn-primary btn-block w-100 text-center mx-auto">
            </form>
            <br>
            <form action = "search.php" method="post">
                <input type ="submit" name="search" value = "Search a record" class="btn btn-lg btn-primary btn-block w-100 text-center mx-auto">
            </form>
            <!--Logout template -->
            <?php require_once '../templates/logout.tpl.php' ?>
        </div>
        
    </div>      
<?php require_once '../templates/footer.tpl.php'; ?>