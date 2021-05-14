    <?php
    // Paul Madduma
    // Registration Page
    require_once '../templates/header.tpl.php';
    /*
     * placing all the sessions for variables 
     * @param $firstname, $lastname, $id, $age, $address, 
     * $membershipdate, $accommodation
     */
    session_start();
    /*
     * connecting to phpmyadmin database 
     * @return members table, use bindValue to passthrough
     * values and variables effectively link database
     */
    include '../utilities/connect.php'; ?>
        <!--Navigation template -->
        <?php require_once '../templates/navigation.tpl.php'; ?>

        <!-- CONTENT -->
        <div id="main" class="img-fluid h-2000 bg bg-success" style="background-image: url('./images/gym.png');">
            <h1 class="text-center text-light mb-4 p-4 bg bg-secondary w-75 mx-auto">Register</h1>
            <div class="row mb-4">
                <div class="col-md-4"></div>
                <div class="col-md-4 mx-auto my-4 bg bg-info w-75">
                    <p class="lead text-light text-center">Health and Fitness Centre dedicated to promote active and healthy communities</h2>
                    <h3 class="text-light text-center">Customer Registration Form</h3>
                    <p>Please enter the customer information on the form below.</p>
                </div>
                <div class="col-md-4"></div>
            </div>

            <!-- FORM -->
            <div class="row my-2">
                <div class="col-md-3 col-sm-1 col-xs-1"></div>
                <div class="col-md-6 col-sm-10 col-xs-10 mx-auto border border-light my-4 bg-gradient bg-warning w-80">
                    <form action ="registration.php" method ="POST" class="w-100 p-2">
                        <fieldset>
                            <label class="rad">First Name:</label><br><input type ="text" name ="firstname" class="w-100" 
                            title="Must only contain characters from alphabet and sometimes with approved special characters for names" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required> <br>
                            <label class="rad">Last Name:</label><br><input type="text" name ="lastname" class="w-100" 
                            title="Must only contain characters from alphabet and sometimes with approved special characters for names" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required> <br>
                            <label class="rad">Age:</label><br><input type="number" name ="age" class="w-100" min=18 max=100 required> <br>
                            <label class="rad">Address:</label><br><input type="text" name ="address"  class="w-100" required> <br>
                            <label class="rad">Membership Date:</label><br><input type="date" name ="membershipdate"  class="w-100" required> <br>
                            <label class="rad">Accommodations:</label>
                            <textarea name ="accommodation" class="w-100"></textarea><br>
                            <div class="mx-auto p-2 my-2 w-75 text-center">
                                <input type ="submit" name ="register" class="btn btn-primary btn-block text-center mx-auto" value="Register">
                            </div>
                            <?php 
                            global $register;
                            if (isset($_POST['register'])) {
                                if(isset($_SESSION['register']) && !empty(($_SESSION['register']))){
                                    $register = $_SESSION['register'];
                                }                            
                                /*
                                * after entering customer information via register button
                                * @return $message if data is delivered in php database
                                */
                                if (!empty($_POST['register']) || !empty($_POST['firstname']) ||
                                        !empty($_POST['lastname']) || !empty($_POST['id']) ||
                                        !empty($_POST['age']) || !empty($_POST['address']) ||
                                        !empty($_POST['membershipdate']) || !empty($_POST['accommodation'])) {
                                    $regName = '';
                                    $regID = '';
                                    $regAge = '';
                                    $regAddress = '';
                                    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
                                    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
                                    if ($firstname !== null && $lastname !== null) {
                                        if (preg_match('/^A-Za-z{2,}&/', $firstname) ||
                                                preg_match('/^A-Za-z{2,}&/', $lastname)) {
                                            $regName = "<div class = 'alert alert-warning'><i class='fas fa-exclamation'></i> Enter a proper First and Last Name.</div>";
                                            echo $regName;
                                        }
                                    }

                                    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                                    if ($id !== null) {
                                        if (preg_match('/^0-9+&/', $id)) {
                                            $regID = "<div class = 'alert alert-warning'><i class='fas fa-exclamation'></i> Enter the ID.</div>";
                                            echo $regID;
                                        }
                                    }
                                    $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
                                    if ($age !== null) {
                                        if (preg_match('/^0-9{1,3}&/', $age)) {
                                            $regAge = "<div class = 'alert alert-warning'><i class='fas fa-exclamation'></i> Enter the proper age.</div>";
                                            echo $regAge;
                                        }
                                    }
                                    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
                                    if ($address !== null) {
                                        if (preg_match('/^[0-9+]\s([A-Z]a-z?\'?\-?a-z+\s)+(St\.|Street|Ave\.|Avenue|Rd\.|Road)&/', $address)) {
                                            $regAddress = "<div class = 'alert alert-warning'><i class='fas fa-exclamation'></i> Enter the proper address.</div>";
                                            echo $regAddress;
                                        }
                                    }

                                    $membershipdate = filter_input(INPUT_POST, "membershipdate", FILTER_SANITIZE_SPECIAL_CHARS);
                                    $accommodation = filter_input(INPUT_POST, "accommodation", FILTER_SANITIZE_STRING);

                                    $sql = $dbh->prepare("INSERT INTO `members`(`firstname`, `lastname`, `id`, `age`, `address`, `membershipdate`, `accommodation`) "
                                            . "VALUES (:firstname,:lastname,:id, :age, :address, :membershipdate, :accommodation)");
                                    $sql->bindValue(':firstname', $firstname);
                                    $sql->bindValue(':lastname', $lastname);
                                    $sql->bindValue(':id', $id);
                                    $sql->bindValue(':age', $age);
                                    $sql->bindValue(':address', $address);
                                    $sql->bindValue(':membershipdate', $membershipdate);
                                    $sql->bindValue(':accommodation', $accommodation);
                                    $result = $sql->execute();
                                    if ($result) {
                                        $regName = "";
                                        $regID = "";
                                        $regAge = "";
                                        $regAddress = "";
                                        $register = "<div class = 'alert alert-success'><i class='fas fa-check-circle'></i> Registered successfully</div>";
                                        $_SESSION['register'] = $register;
                                    } elseif ($result == null) {
                                        $register = "";
                                        $_SESSION['register'] = $register;
                                    } else {
                                        $register = "<div class = 'alert alert-danger text-light'><i class='fa fa-times-circle' aria-hidden='true'> Failed to register</div>";
                                        $_SESSION['register'] = false;
                                    }
                                    //when refresing the page
                                } elseif (empty($_POST['register']) || empty($_POST['firstname']) ||
                                        empty($_POST['lastname']) || empty($_POST['id']) ||
                                        empty($_POST['age']) || empty($_POST['address']) ||
                                        empty($_POST['membershipdate']) || empty($_POST['accommodation'])) {
                                    $_SESSION['register'] = $register;
                                    $register = "";
                                }
                            }
                            ?>
                            <div class="alert alert-success mx-auto p-2 my-2 w-50 text-center"><p><?php echo $register; ?></p></div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 col-sm-1 col-xs-1">
                </div>
            </div>
            <br>

            <!--Logout template -->
            <?php require_once '../templates/logout.tpl.php' ?>
        </div>
    
<!--FOOTER -->  
<?php require_once '../templates/footer.tpl.php'; ?>

