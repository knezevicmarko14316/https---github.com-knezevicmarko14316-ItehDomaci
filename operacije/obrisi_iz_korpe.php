<?php
session_start();
    if(isset($_GET['id'])){
    $niz=$_SESSION['korpa'];
    array_splice($niz,$_GET['id'], 1);
    $_SESSION['korpa']=$niz;
}
?>