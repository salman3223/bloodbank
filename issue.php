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
    <div class="container-fluid">
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="homepage.php" class="nav-link"> <?=_HOME?> </a> </li>
          <li class="nav-item"> <a href="stock.php" class="nav-link"> <?=_STOCK?> </a> </li>
          <li class="nav-item"> <a href="donate.php" class="nav-link"> <?=_DONATE?> </a> </li>
          <li class="nav-item"> <a href="#A" class="nav-link"><?=_CONTACTUS?></a> </li>
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
          <li class="nav-item"> <a href="account.php" class="nav-link"> <?=_ACCOUNT?> </a> </li>
          <li class="nav-item"> <a href="logout.php" class="nav-link"> <?=_LOGOUT?></a> </li>

        </ul>

    </nav>
    <div class="container">
      <div class="jumbotron">

        <p> <i> <?=_CONTENT5?></i></p> <br>

        <form class="" action="issue-backend.php" method="POST">
          <div class="row">
            <div class="col">
              <select class="form-control" name='amt'>
                <option selected><?=_AMOUNT?>..</option>
                <option value='1'>1 (500ml)</option>
                <option value='2'>2 (1 ltr)</option>
                <option value='3'>3 (1.5 ltr)</option>
                <option value='4'>4 (2 ltr)</option>
              </select>
            </div>
            <div class="col">
              <select class="form-control" name='grp'>
                <option selected><?=_BLOODGROUP?>..</option>
                <option value='A+'>A+</option>
                <option value='A-'>A-</option>
                <option value='B+'>B+</option>
                <option value='B-'>B-</option>
                <option value='O+'>O+</option>
                <option value='O-'>O-</option>
                <option value='AB+'>AB+</option>
                <option value='AB-'>AB-</option>
              </select>
            </div>

          </div> <br>
          <br>

          <div class="form-group col-md-8" >
            <div class="row">
              <div class="col">
                <select class="form-control" name='date'>


                  <option selected><?=_DATE?>..</option>
                  <option value='1'>1</option>
                  <option value='2'>2</option>
                  <option value='3'>3</option>
                  <option value='4'>4</option>
                  <option value='5'>5</option>
                  <option value='6'>6</option>
                  <option value='7'>7</option>
                  <option value='8'>8</option>
                  <option value='9'>9</option>
                  <option value='10'>10</option>
                  <option value='11'>11</option>
                  <option value='12'>12</option>
                  <option value='13'>13</option>
                  <option value='14'>14</option>
                  <option value='15'>15</option>
                  <option value='16'>16</option>
                  <option value='17'>17</option>
                  <option value='18'>18</option>
                  <option value='19'>19</option>
                  <option value='20'>20</option>
                  <option value='21'>21</option>
                  <option value='22'>22</option>
                  <option value='23'>23</option>
                  <option value='24'>24</option>
                  <option value='25'>25</option>
                  <option value='26'>26</option>
                  <option value='27'>27</option>
                  <option value='28'>28</option>
                  <option value='29'>29</option>
                  <option value='30'>30</option>
                  <option value='31'>31</option>

              </select>
            </div>
              <div class="col">
                  <select class="form-control" name='month'>
                    <option selected><?=_MONTH?>..</option>


                    <option value='01'>Jan</option>
                    <option value='02'>Feb</option>
                    <option value='03'>Mar</option>
                    <option value='04'>Apr</option>
                    <option value='05'>May</option>
                    <option value='06'>Jun</option>
                    <option value='07'>Jul</option>
                    <option value='08'>Aug</option>
                    <option value='09'>Sep</option>
                    <option value='10'>Oct</option>
                    <option value='11'>Nov</option>
                    <option value='12'>Dec</option>

                  </select>
              </div>
              <div class="col">
                <select class="form-control" name='year'>
                  <option selected><?=_YEAR?>...</option>

                  <option value='2016'>2016</option>
                  <option value='2017'>2017</option>
                  <option value='2018'>2018</option>
                  <option value='2019'>2019</option>
                  <option value='2020'>2020</option>


                  </select>
              </div>

                </div>

              </div>

              <div class="signupbutton">
                <br><br>
                <button type="submit" class="btn btn-success btn-lg" name="sub" value="submit"><?=_ISSUE?></button>

              </div>
            </form>
          </div>


      <section class="features"><hr>
        <a href="#" name="A"></a>
        <h2><?=_CONTACTUS?></h2><br><br><br>
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
                <?=_LOCATION?>
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
