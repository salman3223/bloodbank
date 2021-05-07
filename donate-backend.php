<?php
  session_start();
  include 'dbh.php';

    $amt =  $_POST['amt'];
    $grp =  $_POST['grp'];
    $id = $_SESSION['id'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dt = $date."/".$month."/".$year;


    $sql = "INSERT INTO donate( amount, bloodgrp, donate_dt, id)
    values('$amt','$grp','$dt','$id')";
    $result = $conn->query($sql);

    $nsql = "UPDATE stock SET amount= amount + '$amt' WHERE bloodgrp ='$grp'";
    $stock = mysqli_query($conn,$nsql);

    header("Location: homepage.php");
?>
