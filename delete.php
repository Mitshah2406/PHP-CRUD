<?php
require('_dbConnect.php');

if(isset($_GET['id']) && isset($_SESSION['user'])){
    $id = secure($_GET['id']);
    $sql = "DELETE FROM `user` WHERE `id`='$id'";
    $res = mysqli_query($mysqli, $sql);
    set_flash_message('User Deleted Successfully !!', 'success');
    redirect('homepage.php');
}else{
    set_flash_message('Internal Error., Please Try Again !!', 'danger');
    redirect('homepage.php');
}
?>