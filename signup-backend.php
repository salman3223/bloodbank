<?php
  session_start();
  include 'dbh.php';


    $fname = strtolower($_POST['fname']);
    $lname =  strtolower($_POST['lname']);
    $name = $fname." ".$lname;
    $phn =  $_POST['phn'];
    $addr = $_POST['add'];
    $email =  $_POST['mail'];
    $username =  $_POST['mail'];
    $password =  $_POST['pass'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dob = $date."/".$month."/".$year;


    $sql = "INSERT INTO blooduser(username, passwd, name, phone, email, DOB, addr)
    values('$username','$password','$name','$phn','$email','$dob','$addr')";
    $result = $conn->query($sql);

    header("Location: login.php");
?>
