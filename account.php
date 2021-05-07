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
  <body>
    <div class="container-fluid">
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="homepage.php" class="nav-link"> <?=_HOME?></a> </li>
            <li class="nav-item"> <a href="stock.php" class="nav-link"> <?=_STOCK?> </a> </li>
          <li class="nav-item"> <a href="issue.php" class="nav-link"><?=_ISSUE?> </a> </li>
            <li class="nav-item"> <a href="donate.php" class="nav-link"><?=_DONATE?></a> </li>
          <?php
          if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == 1) {
              echo "<li class='nav-item'> <a href='donor.php' class='nav-link'>Donors</a> </li>";
              echo "<li class='nav-item'> <a href='issued.php' class='nav-link'>Issued</a> </li>";
            }
          }
          if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] !== 1) {
              echo "<li class='nav-item'> <a href='transaction.php' class='nav-link'>Transactions</a> </li>";

            }
          }
           ?>

          <li class="nav-item"> <a href="logout.php" class="nav-link"> <?=_LOGOUT?></a> </li>

        </ul>

    </nav>
    <div class="container">
      <div class="jumbotron">

        <div class="container">
          <?php
                include 'dbh.php';
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM blooduser WHERE id = $id ";
                $newrecords = mysqli_query($conn,$sql);
                $result = mysqli_fetch_assoc($newrecords);

        echo"  <form  action='update.php' method='POST'>

            <br><br><input type='text' class='form-control' placeholder='Enter full name' name='fname' value='".ucwords($result['name'])."'>
            <br>
            <input type='text' class='form-control' placeholder='Enter mobile number' name='phn' value='".$result['phone']."'>
            <br>
            <input type='text' class='form-control' placeholder='Address' name='addr' value='".$result['addr']."'>
            <br>
            <label><b>Date of Birth : </b></label>
            <input type='text' class='from-control' placeholder='Enter Date of Birth' name='dob' value='".$result['DOB']."'><br>

                <div class='signupbutton'>
                  <br><br>
                  <button type='submit' class='btn btn-success' name='sub' value='submit'>Update Details</button>

                </div>
                </form>


                <br><br>
                <label><b>Email Id : </b>".$result['email']."</label>
                <br><br>
                <a href='accountp.php'>Change Password</a>



                ";
        echo"</div>
        </div></div>";
        include 'footer.php';
    ?>
  </body>
</html>
