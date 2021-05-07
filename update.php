<?php
  session_start();
  include 'dbh.php';

if(isset($_POST['sub'])){

    $nam = strtolower($_POST['fname']);
    $phn =  $_POST['phn'];
    $rid = $_SESSION['id'];
    $date = $_POST['dob'];
    $addr = $_POST['addr'];

    $nsql = "UPDATE blooduser SET name= '$nam', DOB= '$date',phone= '$phn',addr='$addr' WHERE id='$rid'";
    $result = mysqli_query($conn,$nsql);
    header("Location: homepage.php");
   }
?>
