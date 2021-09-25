<?php
session_start();
unset($_SESSION['admin']);
header("Location:http://localhost/telefoni-master/index.html");
?>