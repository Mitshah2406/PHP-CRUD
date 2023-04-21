<?php

require('./_dbConnect.php');
session_destroy();
session_start();
set_flash_message('You Have Been Logged Out !!', 'info');
redirect('login.php');
?>