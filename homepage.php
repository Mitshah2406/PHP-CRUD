<?php
require('./_dbConnect.php');
if(!isset($_SESSION['user'])){
    set_flash_message('You must be a authorized user to access this page', 'danger');
    redirect('login.php');
}


include('./header.php');
display_flash_message();
?>

<div class="container mt-4">
<h2 class="text-center">All Users</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($mysqli, $sql);
    $index=0;
    while($row = mysqli_fetch_assoc($result)){
       
            $index++;
            ?>
             <tr>
      <th scope="row"><?php echo $index ?></th>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td><?php echo $row["password"] ?></td>
      <td><a href='edit.php?id=<?php echo $row["id"];?>'>Edit</a></td>
      <td><a href='delete.php?id=<?php echo $row["id"];?>'>Delete</a></td>
    </tr>
   <?php     
    }?>
   
  </tbody>
</table>
</div>
<?php
include("./footer.php");
?>
