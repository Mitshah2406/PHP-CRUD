<?php
 require("_dbConnect.php"); 
 require("./header.php"); 


?>


<?php
if(isset($_SESSION['user'])){
    redirect('homepage.php');
}
if($_SERVER['REQUEST_METHOD']==='POST'){

    $email = secure($_POST['email']);
    $password = secure($_POST['password']);

    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
    $res = mysqli_query( $mysqli,$sql);
        if(mysqli_num_rows($res)==1){
            $_SESSION['user'] = $res;
        set_flash_message('Your account has been created successfully.', 'success');
        redirect('login.php');
        }else{
        set_flash_message('Wrong Credentials OR No User Exists...', 'danger');
        // alert('No User found');
            redirect('login.php');
        }

}
?>
  
<?php display_flash_message();?>
    <h1 class=" mt-5 text-center">Login Page</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="POST">
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
    require("./footer.php"); ?>