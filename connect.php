<?php
$con = new mysqli('localhost', 'root', '', 'ajaxcrud');
if (!$con) {

    die(mysqli_error($con));
}
