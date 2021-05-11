<?php
/*
 * Author: Paul M.
 * validate.php supports and inspects the input gave by the user
 * quality checker for all forms linked to the page
 * and guide user to enter the right inputs
 */

/*
 * checking if the input for age and id are integers
 * @param $n
 */
function number($n) {
    try {
        if (!is_integer($n)) {
            throw new InvalidArgumentException();
        } elseif ($n == NULL) {
            return null;
        } else {
            return null;
        }
    } catch (Exception $ex) {
        echo "<div class='alert alert-danger mx-auto w-25 text-center'><i class='fa fa-times-circle' aria-hidden='true'> ERROR: Not an integer. \n
        Place only an integer with no decimals or other characters.</div>";
    }
}

/*
 * checking if the input for firstname, lastname and/or address are string characters
 * @param $o
 */
function letter($o) {
    try {
        if (!is_string($o)) {
            throw new InvalidArgumentException();
        } elseif ($o == NULL) {
            return null;
        } else {
            return null;
        }
    } catch (Exception $ex) {
        echo "<div class='alert alert-danger mx-auto w-25 text-center'><i class='fa fa-times-circle' aria-hidden='true'> ERROR: Not a letter. \n
        Please use alphabets and occassional apostrophe, hyphen if required.</div>";
    }
}

/*
 * checking if the input for age, id are positive numbers
 * @param $z
 */
function belowZero($z) {
    try {
        if ($z < 0) {
            throw new InvalidArgumentException();
        } elseif ($z == NULL) {
            return null;
        } else {
            return null;
        }
    } catch (Exception $ex) {
        echo "<div class='alert alert-danger mx-auto w-25 text-center'><i class='fa fa-times-circle' aria-hidden='true'> ERROR: All numbers provide must be above zero.</div>";
    }
}

?>