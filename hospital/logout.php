<?php
session_start();

if(!isset($_SESSION['hospitalSession']))
{
 header("Location: hospitaldashboard.php");
}
else if(isset($_SESSION['hospitalSession'])!="")
{
 header("Location: index.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['hospitalSession']);
 header("Location: index.php");
}
?>