    <?php 
    /**
     * Author: Paul Madduma
     * index.php is the Login page of Customer Management App
     * index.php is where the staff will login information
     */
    require_once './templates/header.tpl.php';

    // starting the session
    session_start();
    $_SESSION['login'] = isset($_POST['login']);

    $errorfound = '';
    $outcomeName = '';
    $outcomeWord = '';

    /*
     * setting up the database for the staff table to authenticate 
     * the users to login information. 
     * @param $username, $password, $login
     * @return activate the task.php if the user is authorized.
     */
    include 'connect.php';
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['login'])) {

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        if ($username !== null) {
            if (!preg_match('/^[a-z]+a-z0-9?\w?\-?\.?\_?a-z0-9?\.?[a-z]?&/', $username)) {
                $outcomeName = "<div class = 'alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'> Enter a username given to you.</div>";
            } else {
                $outcomeName = "<div class = 'alert alert-success'><i class='fas fa-check-circle'></i> Valid Username</div>";
            }
        }

        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        if ($password !== null) {
            if (!preg_match('/A-Z+a-z+\d?/', $password)) {
                $outcomeWord = "<div class = 'alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'> Invalid Password. Please try again.</div>";
                echo $outcomeWord;
            } else {
                $outcomeWord = "<div class = 'alert alert-success'><i class='fas fa-check-circle'></i> Valid Password</div>";
                echo $outcomeWord;
            }
        }
        $log = "SELECT `username`, `password` FROM `staff` "
                . "WHERE username = :username AND password = :password ";
        $sql = $dbh->prepare($log);
        $sql->bindValue(":username", $username);
        $sql->bindValue(":password", $password);
        $sql->execute();
        $count = $sql->rowCount();
        /*
         * when users successfully login $_SESSION variables are on
         * and direct the user on the task php else stay in index.php
         * @return $_SESSION['login'] or $_SESSION['message']
         */

        if ($count > 0) {
            $_SESSION['username'] = isset($_POST['username']);
            $_SESSION['password'] = isset($_POST['password']);
            $_SESSION['login'] = true;
            header("location: task.php");
            $_SESSION['message'] = "";
            $_SESSION['outcomeName'] = "";
            $_SESSION['outcomeWord'] = "";
        } else {
            $errorfound = "<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'></i> 
            Wrong username or password. Please try again</div>";
            header("location: index.php");
            $_SESSION['message'] = $errorfound;
            $_SESSION['outcomeName'] = $outcomeName;
            $_SESSION['outcomeWord'] = $outcomeWord;
    } }
    ?>
        <div id="main" class="img-fluid h-2000 bg bg-success" style="background-image: url('./images/gym.png');">
            <div class="row mb-4 mb-4">
                <div class="col-md-4"></div>
                <div class="col-md-4 w-25 mx-auto my-4 bg bg-info w-75">
                    <h1 class="text-light text-center">WellFit Centre</h1>
                    <p class="lead text-light text-center">Health and Fitness Centre dedicated to promote active and healthy communities</h2>
                    <h3 class="text-light text-center">STAFF LOGIN</h3>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row my-4">
                <div class="col-md-4 col-sm-1 col-xs-1"></div>
                <div class="col-md-4 col-sm-10 col-xs-10 mx-auto border border-light my-4 bg-gradient bg-danger w-75">
                    <form action ="index.php" method ="post" class="center-div p-4 my-4">
                    <fieldset>
                        <div class="form-group my-4">
                            <label class="text-light font-weight-bold">Username:</label><br><input type ="text" name ="username" class="w-100" pattern="^([A-Za-z0-9]+[,.]?|[A-Za-z0-9]+['-_]?)+$" 
                            title="Must mostly contain alphanumeric characters and sometimes with approved special characters" required> <br>
                        </div>
                        <div class="form-group my-4">
                            <label class="text-light font-weight-bold">Password:</label><br><input type="password" name ="password" pattern="^([A-Za-z0-9]+[,.]?|[A-Za-z0-9]+['-_]?)+$" class="w-100" required> <br>
                        </div>
                        <div class="form-group my-4">
                            <input type ="submit" name ="login" value="Login" class="btn btn-primary btn-block">
                        </div>                       
                      <?php
                        /*
                        * if user inputs incorrect username/password that was not in
                        * staff.sql table @return $errorfound and cannot go into task.php
                        */
                        if (isset($_SESSION["message"]) && !empty(($_SESSION["message"]))) {
                            $errorfound = $_SESSION['message'];
                            $outcomeName = $_SESSION['outcomeName'];
                            $outcomeWord = $_SESSION['outcomeWord'];
                            echo "<p class = 'bad'>$errorfound</p>";
                            echo "\n<p class = 'bad'>$outcomeName</p>";
                            echo "\n<p class = 'bad'>$outcomeWord</p>";
                        } elseif (empty($_SESSION['username']) && empty($_SESSION['password'])) {
                            $_SESSION['message'] = null;
                            $_SESSION['outcomeName'] = null;
                            $_SESSION['outcomeWord'] = null;
                        }
                        ?>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-4 col-sm-1 col-xs-1"></div>
            </div>
            
            <br />
        </div>
        <?php require_once './templates/footer.tpl.php'; ?>
        