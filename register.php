<?php

include('./header.php');
require('./_dbConnect.php');

// if ($_SERVER['REQUEST_METHOD']==='POST') {
//   # code...
//   $tableExists = `SELECT *  FROM crud WHERE TABLE_NAME = "users"`;
  
// }
if(isset($_SESSION['user'])){
    redirect('homepage.php');
}
if ($_SERVER['REQUEST_METHOD']==='POST') {
  # code...

  $name = secure($_POST['name']);
  $email = secure($_POST['email']);
  $password = secure($_POST['password']);

  // echo $name ."". $password;
  $sql = "INSERT INTO `user`(`id`, `name`, `email`, `password`) VALUES (UUID(),'$name','$email','$password')";
  $mysqli ->query($sql);
  set_flash_message('Your Account Has Been Created !! Please Login To Continue', 'success');
  redirect("login.php");
}
?>
<?php display_flash_message(); ?>

    <!-- <form method="POST">
        Name: <input type="text" name="name" placeholder="Enter your name" required><br>
        Email: <input type="email" name="email" placeholder="Enter your email" required><br>
        Password: <input type="password" name="password" placeholder="Enter your password" required><br>
        <input type="submit" name="submit" value="Register">
    </form> -->

    <h1 class=" mt-5 text-center">Register Page</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
<?php
include('./footer.php');
?>