<?php
include 'connect.php';
if(isset($_POST['deleteSend'])){
    $id=$_POST['deleteSend'];
    $sql= "delete from crud where id=$id" ;
    $result= mysqli_query($con,$sql);
}
