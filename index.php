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
display; none; }
</style>
    <div class="container-fluid">
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="#A" class="nav-link">  <?= _CONTACTUS ?></a> </li>
          <li class="nav-item"> <a href="login.php" class="nav-link"> <?= _LOGIN ?></a> </li>
          <li class="nav-item"> <a href="signup.php" class="nav-link"> <?= _SIGNUP ?></a> </li>

        </ul>

    </nav>
    <div class="container">
      <section class="features">

          <h2> <?= _OURSERVICES ?></h2><br><br>

          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <p class="arrange"><img src="images/mob.jpg" alt=""> <br><?= _CONTENT1 ?>
                </p>
              </div><div class="col-md-4">
                <p class="arrange"><img src="images/mess.png" alt=""> <br><?= _CONTENT2 ?>
                </p>
              </div>
                <div class="col-md-4">
                  <p class="arrange">
                    <img src="images/desktop.jpg"> <br>  <?= _CONTENT3 ?>
                  </p>
                </div>

              </div>

            </div>
            <h3></h3>

      </section>

      <section class="features"><hr>
        <a href="#" name="A"></a>
        <h2><?= _CONTACTUS ?></h2><br><br><br>
        <div class="row">

          <div class="col">
            <div class="row">
              <div class="col">
                  <img src="images/add.png" alt="">
              </div>
              <div class="col">
                <p>+917867569876<br>022-676578</p>
              </div>
            </div>

          </div>

          <div class="col">
            <div class="row">
              <div class="col">
                <img src="images/loc.png" height='40px' width='40px' alt="">
              </div>
              <div class="col">
                <?= _LOCATION ?>
              </div>
            </div>

          </div>
        </div>

<hr>
      </section>
    </div>
    <?php
    include 'footer.php';
     ?>
  </body>
</html>
