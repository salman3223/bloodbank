<?php
session_start();

// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])){
 $_SESSION['lang'] = $_GET['lang'];

 if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
  echo "<script type='text/javascript'> location.reload(); </script>";
 }
}

// Include Language file
if(isset($_SESSION['lang'])){
 include "lang_".$_SESSION['lang'].".php";
}else{
 include "lang_en.php";
}
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
 <script>
function changeLang(){
  document.getElementById('form_lang').submit();
 }
 </script>
<!-- Language -->
 <form method='get' action='' id='form_lang' class="hidden" >
   Select Language : <select name='lang' onchange='changeLang();' >
   <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
   <option value='hi' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'hi'){ echo "selected"; } ?> >Hindi</option>
  </select>
 </form>
<style>
.hidden input {
display; none; }</style>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="homepage.php" class="nav-link"><?=_HOME?> </a> </li>
          <li class="nav-item"> <a href="issue.php" class="nav-link"><?=_ISSUE?> </a> </li>
          <li class="nav-item"> <a href="donate.php" class="nav-link"> <?=_DONATE?> </a> </li>
          <li class="nav-item"> <a href="transaction.php" class="nav-link"><?=_DONATED?></a> </li>

          <li class="nav-item"> <a href="account.php" class="nav-link"> <?=_ACCOUNT?> </a> </li>
          <li class="nav-item"> <a href="logout.php" class="nav-link"><?=_LOGOUT?></a> </li>

        </ul>

    </nav>
    <div class="container">
      <div class="jumbotron">
        <p style='text-align:center;'><b><?=_CONTENT9?> : </b>1 (<?=_AMOUNT?>) = 500 ml</p>
        <?php
          include 'dbh.php';
            $person = $_SESSION['id'];
            $nsql = "SELECT amount,bloodgrp,issue_dt FROM issue where id = '$person'";
            $stock = mysqli_query($conn,$nsql);
            echo"<table align='center' style='width: 50%;background-color: lemonchiffon;
  border-collapse: collapse; ' >";
            echo"<tr style='text-align:center;'>
                    <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Amount</th>
                    <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Bloodgrp</th>
                    <th style='padding-left:20px;padding-right:20px;height: 50px;text-align:center;background-color: goldenrod;
color: white; '>Issue Date</th>";
                while($row = mysqli_fetch_assoc($stock)){
                  echo "<tr style='text-align:center;border: 1px solid black;'><td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['amount'] . "</td>
                        <td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['bloodgrp'] . "</td><td style='height: 50px;text-align:center;border: 1px solid goldenrod;'>" . $row['issue_dt'] . "</td>
                  </tr>";
                }
              echo"<br><br>";




        ?>

      </div>

</div>


  </body>

</html>
