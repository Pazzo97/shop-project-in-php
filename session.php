
<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not

if (!isset($_SESSION['login']) || (trim($_SESSION['login']) == '')) {
    header("location: login.php");
    exit();
}
else {
    header("location: admin.php");
}


$session_id=$_SESSION['login'];
?>
