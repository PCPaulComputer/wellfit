    <?php
    require_once './templates/header.tpl.php';
    session_start();
    /*
     * Author: Paul Madduma
     * Update Information page
     * when the user clicks on the update button
     * depending on which variable to be updated
     * @return $firstname, $lastname, $id, $age,
     * $address, $membershipdate, $accommodation
     */
    include 'connect.php';
    $message = '';
    $firstname = '';
    $lastname = '';
    $id = '';
    $age = '';
    $address = '';
    $membershipdate = '';
    $accommodation = '';
    if (isset($_POST[`update`])) {
        $id = $_POST["id"];
        $info = $stmt->fetch_data($id);

        if (isset($_POST["firstname"], $_POST["lastname"], $_POST["age"], $_POST["id"], $_POST["address"], $_POST["membershipdate"], $_POST["accommodation"])) {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $id = $_POST["id"];
            $age = $_POST["age"];
            $address = $_POST["address"];
            $membershipdate = $_POST["membershipdate"];
            $accommodation = $_POST["accommodation"];
            $info = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'id' => $id,
                'age' => $age,
                'address' => $address,
                'membershipdate' => $membershipdate,
                'accommodation' => $accommodation
            ];
            $sql = "UPDATE members "
                    . "SET firstname = :firstname, lastname = :lastname, id = :id, age = :age, address = :address, membershipdate = :membershipdate, accommodation = :accommodation"
                    . "WHERE id =:id";
            $stmt = $dbh->prepare($sql);
            $result = $stmt->execute($info);

            if ($result) {
                $message = "<div class='alert alert-success'><i class='fas fa-check-circle'></i> Data has been updated successfully</div>";
            } else {
                $message = "<div class='alert alert-danger'><i class='fas fa-exclamation'></i> Failed to update the data</div>";
            }
        }
    }
    /*
     * sanitize the input $firstname, $lastname, $id, $age & $address
     * for 1st action of preventing SQL injection
     */

    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
    if ($firstname !== null) {
        if (!preg_match('/^[A-Za-z]A-Za-z\'\-+\s?A-Za-z+\'?\-?/', $firstname) == 0) {
            $message = "<div class='alert alert-warning'><i class='fas fa-exclamation'></i> First Name must be an alphabet</div>";
            echo $message;
        }
    }

    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
    if ($lastname !== null) {
        if (!preg_match('/^[A-Za-z]A-Za-z\'\-+\s?A-Za-z+\'\-?/', $lastname) == 0) {
            $message = "<div class='alert alert-warning'><i class='fas fa-exclamation'></i> Last Name must be an alphabet</div>";
            echo $message;
        }
    }

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    if ($id !== null) {
        if (!preg_match('/^\d{3,}&/', $id) == 0) {
            $message = "<div class='alert alert-warning'><i class='fas fa-exclamation'></i> Password must include atleast 3 numbers.</div>";
            echo $message;
        }
    }

    $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
    if ($age !== null) {
        if (!preg_match('/^\d{1,3}&/', $age) == 0) {
            $message = "<div class='alert alert-warning'><i class='fas fa-exclamation'></i> Only numbers work for age.</div>";
            echo $message;
        }
    }

    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
    if ($address !== null) {
        if ((!preg_match('/^[0-9+]\s([A-Z]a-z?\'?\-?a-z+\s)+(St\.|Street|Ave\.|Avenue|Rd\.|Road)&/', $address)) == 0) {
            $message = "<div class='alert alert-warning'><i class='fas fa-exclamation'></i> Address must follow</div>";
            echo $message;
        }
    }

    //$membershipdate and $accommodation do not have strict format requirements
    $membershipdate = filter_input(INPUT_POST, "membershipdate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $accommodation = filter_input(INPUT_POST, "accommodation", FILTER_SANITIZE_STRING);
    /*
     * update query based on id (primary key)
     */
    include 'connect.php';
    $query = "UPDATE `members` SET firstname = :firstname, lastname = :lastname, id = :id, age = :age,"
            . "address = :address, membershipdate = :membershipdate, accommodation = :accommodation "
            . "WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(":firstname", $firstname);
    $sql->bindValue(":lastname", $lastname);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":age", $age);
    $sql->bindValue(":address", $address);
    $sql->bindValue(":membershipdate", $membershipdate);
    $sql->bindValue(":accommodation", $accommodation);

    $result = $sql->execute(array(
        ":firstname" => $firstname,
        ":lastname" => $lastname,
        ":id" => $id,
        ":age" => $age,
        ":address" => $address,
        ":membershipdate" => $membershipdate,
        ":accommodation" => $accommodation
    ));
    if ($result) {
        $message = "<div class='alert alert-success'><i class='fas fa-check-circle'></i> Customer information has been updated successfully</div>";
    } else {
        $message = "<div class='alert alert-danger'><i class='fas fa-exclamation'></i>  Failed to update the customer information</div>";
    }
    ?>

    <!--Navigation template -->
    <?php require_once './templates/navigation.tpl.php'; ?>
    
    <!-- FORM -->
    <div id="main" class="img-fluid h-2000 bg bg-success" style="background-image: url('./images/gym.png'); height: 1000px;">
        <h1 class="text-center text-light my-4 p-4 bg bg-secondary w-50 mx-auto">Update</h1>
        <div class="row my-2">
            <div class="col-md-3 col-sm-1 col-xs-1"></div>
            <div class="col-md-6 col-sm-10 col-xs-10 mx-auto border border-light my-4 bg-gradient bg-warning w-80">
                <form action = "update.php" method="post" class="w-100 p-2">
                        <label>First Name:</label><br><input type ="text" name ="firstname" value="" class="w-100" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required><br>
                        <label>Last Name:</label><br><input type="text" name ="lastname" class="w-100" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required><br>
                        <label>Age:</label><br><input type="number" name ="age"  min=18 max=100  class="w-100"><br>
                        <label>Address:</label><br><input type="text" name ="address" pattern='\d+[ ](?:[A-Za-z0-9.-]+[ ]?)+(?:Avenue|Lane|Road|Boulevard|Drive|Street|Ave|Dr|Rd|Blvd|Ln|St)\.?' class="w-100"><br>
                        <label>Membership Date:</label><br><input type="date" name ="membershipdate" class="w-100"><br>
                        <label>Accommodations:</label><br>
                        <textarea name ="accommodation" rows = 6 class="w-100"></textarea><br>
                        <div class="mx-auto p-2 my-2 w-75 text-center">
                            <input type ="submit" name="update" value = "Update" class="btn btn-primary btn-block"> <br>
                            <?php
                            /*
                            * Checking for errors: input validation
                            * @param $firstname, $lastname, $id, $age
                            * as these variables have a certain format 
                            * @return error comments to guide user to follow
                            * format to successfully update
                            */
                            if (isset($_POST["submit"])) {
                                echo "<p>Notes: $message</p>\n";
                            }
                            ?>
                        </div>
                </form>
                    </div>
                    <div class="col-md-3 col-sm-1 col-xs-1">
                    </div>
                </div>
        
        <br>
        <!--Logout template -->
        <?php require_once './templates/logout.tpl.php' ?>
    </div>
    
<?php require_once './templates/footer.tpl.php'; ?>