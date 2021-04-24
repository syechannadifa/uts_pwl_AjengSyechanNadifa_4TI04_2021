<?php
session_start();

unset($_SESSION['MEMBER']);
//landing page
header('Location:http://localhost/SyeApp/index.php?hal=home');
?>
