<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BloodBank-Home</title>
    <link rel="stylesheet" href="index.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="homepage.php" class="nav-link"> Home </a> </li>

          <li class="nav-item"> <a href="issue.php" class="nav-link"> Issue </a> </li>
          <li class="nav-item"> <a href="donate.php" class="nav-link"> Donate </a> </li>
          <li class='nav-item'> <a href='issued.php' class='nav-link'>Issued</a> </li>
          <li class="nav-item"> <a href="account.php" class="nav-link"> Account </a> </li>
          <li class="nav-item"> <a href="logout.php" class="nav-link"> Logout</a> </li>

        </ul>

    </nav>
    <div class="container">
      <div class="jumbotron">
        <p style='text-align:center;'><b>Donors : </b>1 (Amount) = 500 ml</p>
        <?php
          include 'dbh.php';

            $nsql = "SELECT name,phone,email,amount,bloodgrp,donate_dt FROM donate
                    INNER JOIN blooduser on donate.id = blooduser.id";
            $stock = mysqli_query($conn,$nsql);
            echo"<table align='center' style='width: 50%;background-color: lemonchiffon;
  border-collapse: collapse; ' >";
            echo"<tr style='text-align:center;'><th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
  color: white; '>Name</th>
                     <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
  color: white; '>Phone</th>
                    <th style='padding-left:30px;padding-right:30px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Email</th>
                    <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Amount</th>
                    <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Bloodgrp</th>
                    <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Donate Date</th>";
                while($row = mysqli_fetch_assoc($stock)){
                  echo "<tr style='text-align:center;border: 1px solid black;'><td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['name'] . "</td><td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['phone'] . "</td>
                        <td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['email'] . "</td><td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['amount'] . "</td>
                        <td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['bloodgrp'] . "</td><td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['donate_dt'] . "</td>
                  </tr>";
                }

        ?>

      </div>
</div>


  </body>

</html>
