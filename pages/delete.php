<?php
/**
 * Author: Paul Madduma
 * Delete page
 */
    require_once '../templates/header.tpl.php';
    session_start();
     
    // Navigation template
    require_once '../templates/navigation.tpl.php';
    $message = '';
    include '../utilities/connect.php';
    include '../utilities/validation.php';
    //error checking invalid inputs
        
    if (isset($_POST['delete'])) {
        $id = isset($_POST["id"]);
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if(!empty($_POST['id'])) {
            number($id);
        }
        $stmt = $dbh->prepare("DELETE FROM `members` WHERE `id` = :id");
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();
        if ($result && $id != null) {
            $message = "<div class = 'alert alert-success text-center mx-auto w-25 text-center'><i class='fas fa-check-circle'></i> Data has been deleted successfully </div>";
        } else if($id == null ) {
            $message = "";
        } else {
            $message = "<div class = 'alert alert-danger text-center mx-auto w-25 text-center'><i class='fa fa-times-circle' aria-hidden='true'> Failed to delete the data. Try again.</div>";
        }
    }
    ?>
        <div id="main" class="img-fluid h-2000 bg bg-success" style="background-image: url('./images/gym.png'); height: 800px;">            
        <h1 class="text-center text-light mb-4 p-4 bg bg-secondary w-50 mx-auto">Delete</h1>
            <div class="row my-4">
                <div class="col-md-3"></div>
                <div class="col-md-6 col-sm-10 col-xs-10 mx-auto border border-light my-4 bg-gradient bg-warning w-75">
                    <form action = "delete.php" method="post">
                        <label class = "rad font-weight-bold w-100">Please enter the customer id:</label>
                        <input class = "w-100" type ="number" name ="id" pattern="^([0-9]+)$" required>
                        <div class="mx-auto p-2 my-2 w-75 text-center">
                            <input type ="submit" name="delete" value = "Delete" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-sm-1 col-xs-1"></div>
            </div>
            <?= $message ?>
            <!--Logout template -->
            <?php require_once '../templates/logout.tpl.php' ?>
        </div>
        
<?php require_once '../templates/footer.tpl.php'; ?>
