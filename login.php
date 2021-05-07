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
 <form method='get' action='' id='form_lang' >
   Select Language : <select name='lang' onchange='changeLang();' >
   <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
   <option value='hi' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'hi'){ echo "selected"; } ?> >Hindi</option>
  </select>
 </form>
    <div class="container-fluid">
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="index.php" class="nav-link"> <?= _HOME ?> </a> </li>
          <li class="nav-item"> <a href="signup.php" class="nav-link"><?= _SIGNUP ?></a> </li>

        </ul>

    </nav>

    <div class="container">

      <div class="jumbotron">
        <h1> <?= _CONTENT4 ?></h1> <br>
        <form class="" action="login-backend.php" method="POST"> <br><br>
          <input type="email" class="form-control" placeholder="<?= _USERNAME?>/<?= _EMAIL?>" name="mail" value="">
          <br>
          <input type="password" class="form-control" placeholder="<?=_PASSWORD?>" name="pass" value="">
          <br><br>

          <div class="loginbutton">
            <button type="submit" class="btn btn-success btn-lg" name="login"><?= _LOGIN ?></button>

          </div>
          </form>

          </div>


      </div>
      <?php
      include 'footer.php';
       ?>
  </body>
</html>
