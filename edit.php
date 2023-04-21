<?php
require('_dbConnect.php');

if(isset($_GET['id'])){
    $id = secure($_GET['id']);
    $sql = "SELECT * FROM `user` WHERE `id`='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);
}else{
    set_flash_message('Internal Error., Please Try Again !!', 'danger');
    redirect('homepage.php');
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlUpdate = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`='$id'";
    $res = mysqli_query($mysqli, $sqlUpdate);
    set_flash_message('User Details Updated Successfully !!', 'success');
    redirect('homepage.php');
}
include('header.php');
?>
  <h1 class=" mt-5 text-center">Edit Page</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" value="<?php echo $row['password']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>

    </div>

 
<?php  include('footer.php'); ?>