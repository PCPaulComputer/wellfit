<?php
/*
 * Author: Paul Madduma
 */
/*
 * connect.php linked php to mysql database - phpmyadmin
 * using the code for the other php files
 * linked to members and staff tables
 */
try {
    $dbh = new PDO("mysql:host=localhost;dbname=staff", "root", "");
} catch (Exception $e) {
    die("Error: Found problems connecting to a database.");
}
?>

