<?php

$username='root';
$password='';
$servername = 'localhost';
$dbName = 'crud';


$mysqli = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

session_start();

function secure($str){
    global $mysqli;
    $str = mysqli_real_escape_string($mysqli, $str);
    $str = trim($str);
    $str = htmlentities($str);
    return $str;
}

function printArr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function alert($msg)
{
    echo "<script>alert('$msg');</script>";
}

function redirect($url)
{
    header("Location:$url");
    exit();
}


function set_flash_message($message, $type)
{
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
}
function display_flash_message()
{
    if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_type'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'];
        // echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
        echo '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
  <strong>'.ucfirst($type).' !! </strong>'.$message.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        unset($_SESSION['flash_message']);
        unset($_SESSION['flash_type']);
    }
}

?>