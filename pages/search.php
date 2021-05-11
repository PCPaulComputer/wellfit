<?php
/**
 * Author: Paul Madduma
 * Navigation, information search page 
 */
require_once '../templates/header.tpl.php';
session_start();
include '../utilities/connect.php';
$_SESSION["username"] = isset($_POST["username"]);
$_SESSION["password"] = isset($_POST["password"]);
$id = "";
$firstname = isset($_POST["firstname"]);
$lastname = isset($_POST["lastname"]);
$age = "";
$address = "";
$membershipdate = "";
$accommodation = "";
?>
    <!--Navigation template -->
    <?php require_once '../templates/navigation.tpl.php'; ?>
    <div class="image-fluid" style="background-image:url('./images/gym_picture.png'); height:100%; width:100%; background-repeat:no-repeat;
        background-size:cover;">
        <h1 class="text-center text-light my-4 p-4 bg bg-secondary w-50 mx-auto">Search</h1>    
        <!-- FORM -->
            <div class="row my-2">
                <div class="col-md-2 col-sm-1 col-xs-1"></div>
                <div class="col-md-8 col-sm-10 col-xs-10 mx-auto border border-light my-4 bg-gradient bg-warning w-80">
                <form action = "search.php" method="post" class="p-2"><!--First form -->
                    <p class="lead">Do you want to print the customer information by?</p>
                    <p class="lead">Please type in one of the boxes</p>
                    <label class = "rad">First Name:</label><br><input type ="text" name="firstname" class="w-100"> <br>
                    <label class = "rad">Last Name:</label><br><input type ="text" name="lastname" class="w-100"> <br>
                    <label class = "rad">ID: </label><br><input type ="number" name="id" class="w-100"> <br>
                    <div class="mx-auto p-2 my-2 w-75 text-center">
                        <input type ="submit" name="search" value = "Search" class="btn btn-lg btn-primary btn-block">
                    </div>
                </form>
                <?php
                /*
                * when the user wants individual search each field
                */
                $message = "";
                if (isset($_POST['search']) && !empty(($_POST['search']))) {

                    $id = "";
                    $firstname = "";
                    $lastname = "";
                    $age = "";
                    $address = "";
                    $membershipdate = "";
                    $accommodation = "";
                    
                    include 'validation.php';
                    /*
                    * Searching records individually 
                    * @param $id (primary key) because each record is unique
                    * to find individual record 
                    * @return $id, $firstname, $lastname
                    */
                    $result = '';
                    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
                    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
                    if ($firstname !== null && $lastname !== null) {
                        if (!preg_match('/^A-Za-z{2,}&/', $firstname) ||
                                !preg_match('/^A-Za-z{2,}&/', $lastname)) {
                            $regName = "<div class = 'alert alert-warning'><i class='fas fa-exclamation'></i> Enter a proper First and Last Name.</div>";
                        }
                    }
                    if ((isset($_POST['id'])) && !empty($_POST['id'])) {
                        belowZero($id);
                        $id = $_POST['id'];
                        $query = "SELECT * FROM `members` WHERE  id = :id";
                        $sql = $dbh->prepare($query);
                        $result = $sql->execute(array(
                            ":id" => $id));
                    } else if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
                        letter($firstname);
                        $firstname = $_POST['firstname'];
                        $query = "SELECT * FROM `members` WHERE  firstname = :firstname";
                        $sql = $dbh->prepare($query);
                        $result = $sql->execute(array(
                            ":firstname" => $firstname));
                    } else if ((isset($_POST['lastname'])) && !empty($_POST['lastname'])) {
                        letter($lastname);
                        $lastname = $_POST['lastname'];
                        $query = "SELECT * FROM `members` WHERE  lastname = :lastname";
                        $sql = $dbh->prepare($query);
                        $result = $sql->execute(array(
                            ":lastname" => $lastname));
                    }  else {
                        $message = "<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'> Search results not found</div>";
                    }
                    
                    if ($result) {
                        /*
                        * Checkin for records
                        * @return $outFirstName, $outLastName, $outID
                        */
                        if ($sql->rowCount() > 0) {
                            $message = '';
                            foreach ($sql as $row) {
                                $id = $row['id'];
                                $firstname = $row['firstname'];
                                $lastname = $row['lastname'];
                                $age = $row['age'];
                                $address = $row['address'];
                                $membershipdate = $row['membershipdate'];
                                $accommodation = $row['accommodation'];
                                break;
                            }
                        } else {
                            $message = "<div class='alert alert-warning'><i class='fas fa-exclamation'></i> Search results not found.</div>";
                        }
                    }
                }
                ?>
                </div>
                <div class="col-md-2 col-sm-1 col-xs-1">
                </div>
            </div>
            <br>
        </div>
       
        <div class="mx-2">
            <table class="table table-responsive border border-dark">
                <tr>
                    <th scope="row">ID</th>
                    <td><?php echo $id; ?></td>                   
                </tr>
                <tr>
                    <th scope="row">First Name</th>  
                    <td><?php echo $firstname; ?></td>                 
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td><?php echo $lastname; ?></td>                
                </tr>
                <tr>
                    <th scope="row">Age</th>
                    <td><?php echo $age; ?></td>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <td><?php echo $address; ?></td>                  
                </tr>
                <tr>
                    <th scope="row">Membership Date</th>
                    <td><?php echo $membershipdate; ?></td>                 
                </tr>
                <tr>
                    <th scope="row">Accommodation</th>
                    <td><?php echo $accommodation; ?></td>
                </tr>
            </table>
        </div>
        
        <br>
        <!--Second form -->
        <div id="main" style="background-image:url('./images/gym_picture.png'); height:100%; width:100%; background-repeat:no-repeat;
        background-size:cover;">            
        <h3 class="text-center text-light my-4 p-4 bg bg-secondary w-50 mx-auto">List Records</h3>
            <div class="row my-4">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-10 col-xs-10 mx-auto border border-light my-4 bg-gradient bg-warning">
                <form action = "search.php" method = "post" class="w-100 p-2 text-center">
                    <h3 class="text-center">Sort Customer Information By:</h3>
                    <input type ="radio" value="byID"  name="opt"><label class = "rad font-weight-bold mx-2">ID </label>
                    <input type ="radio" value ="lastName" name="opt"><label class = "rad font-weight-bold mx-2">Last Name </label>
                    <input type ="radio" value="ageNum" name="opt" ><label class = "rad font-weight-bold mx-2">Age </label>
                    <input type ="radio" value="member" name="opt" ><label class = "rad font-weight-bold mx-2">Membership Date </label><br>
                    <div class="mx-auto p-2 my-2 w-75 text-center">
                        <input type ="submit" name="submit" value = "Submit" class="btn btn-block btn-primary">
                    </div>
                </form>

                <?php
                $message = "";
                $id = "";
                $firstname = "";
                $lastname = "";
                $age = "";
                $address = "";
                $membershipdate = "";
                $accommodation = "";
                /*
                * function table() to reuse the method for different SELECT options
                * @param $sql @return $row['column value']
                */

                function table($x) {
                    echo "<div class='table-responsive'>
                    <table class='table border border-dark'>
                        <thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Membership Date</th>
                            <th>Accommodation</th>
                        </tr>";

                    foreach ($x as $row) {

                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['membershipdate'] . "</td>";
                        echo "<td>" . $row['accommodation'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>
                    </div>";
                }

                /*
                * when the user wants to sort the database according
                * to ID, Last Name, Age, Membership Date
                */
                if (isset($_POST['submit']) && isset($_POST['opt']) && !empty(($_POST['submit']))) {
                    // order by id
                    $rate = $_POST["opt"];
                    if ($rate == "byID") {
                        $query = "SELECT * FROM `members`";
                        $sql = $dbh->query($query);
                        table($sql);
                        // order by lastname alphabetically
                    } if ($rate == "lastName") {
                        $query = "SELECT * FROM `members` ORDER BY lastname";
                        $stmt = $dbh->query($query);
                        table($stmt);
                        // order by age from oldest to youngest
                    } if ($rate == "ageNum") {
                        $query = "SELECT * FROM `members` ORDER BY age DESC";
                        $state = $dbh->query($query);
                        table($state);
                        // order by membership date the most recent to oldest
                    } if ($rate == "member") {
                        $query = "SELECT * FROM `members` ORDER BY membershipdate DESC";
                        $state = $dbh->query($query);
                        table($state);
                    }
                }
                // Close connection
                unset($pdo);
                ?>
                </div>
                <div class="col-md-2 col-sm-1 col-xs-1"></div>
            </div>
            <?= $message ?>

        </div>
        
        <!--Printing research records-->
        <!--Logout template -->
        <?php require_once '../templates/logout.tpl.php'; ?>
    </div>
        
<?php require_once '../templates/footer.tpl.php'; ?>
