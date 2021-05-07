<?php
session_start();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>NeonFlix-Account</title>
   <link rel="stylesheet" href="index.css" type="text/css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </head>
   <body>
     <header>

       <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
           <ul class="navbar-nav">
             <li class="nav-item"> <a href="homepage.php" class="nav-link"> Home </a> </li>
               <li class="nav-item"> <a href="stock.php" class="nav-link"> Stock </a> </li>
             <li class="nav-item"> <a href="issue.php" class="nav-link"> Issue </a> </li>
             <li class="nav-item"> <a href="donate.php" class="nav-link"> Donate </a> </li>
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
             <li class="nav-item"> <a href="logout.php" class="nav-link"> Logout</a> </li>

           </ul>

       </nav>

      </header>

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
          <input type='text' class='form-control' placeholder='Enter mobile number' name='addr' value='".$result['addr']."'>
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
              <form class='' action='updatep.php' method='post'>
                <input type='password' class='form-control' placeholder='Enter old password' name='oldp'><br>
                <input type='password' class='form-control' placeholder='Enter new password' name='newp'><br>
                <button type='submit' class='btn btn-success ' name='subpass' value='submit'>Update Password</button><br>


              </form>


              ";
         ?>




      </div>
      <?php
      include 'footer.php';
       ?>
    </body>

  </html>
